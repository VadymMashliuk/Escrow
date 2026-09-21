<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\Deals;

class Home extends BaseController
{
    protected Users $users;
    protected Deals $deals;
    public function __construct()
    {
        $this->users = new Users();
        $this->deals = new Deals();
    }
    public function index()
    {
        $data = ['users' => $this->users->findAll()];
        return view('home', $data);
    }
    public function testUser($id)
    {
        $data = [
            'users' => $this->users->find($id),
            'deals' => $this->deals->where('buyer', $id)->findAll(),
            'allUsers' => $this->users->findAll()
        ];
        return view('testUser', $data);
    }
    public function create($id)
    {
        $sellerId = $this->request->getPost('seller');
        $amount = $this->request->getPost('amount');
        $this->deals->createDeal($id, $sellerId, $amount);
        return redirect()->to('testUser/'.$id);
    }
    public function fundDeal(int $dealId, int $buyerId): void
    {
        $deal = $this->find($dealId);
        if (!$deal)
        {
            throw new RuntimeException('Deal not found.');
        }
        if ($deal['status'] !== 'Created')
        {
            throw new RuntimeException('Deal is not in Created status.');
        }
        if ((int) $deal['buyer'] !== $buyerId)
        {
            throw new RuntimeException('Only buyer can fund the deal.');
        }
        $buyer = $this->users->find($buyerId);
        if (!$buyer)
        {
            throw new RuntimeException('Buyer not found');
        }
        if ((int) $buyer['numberOfCoins'] < (int) $deal['amount'])
        {
            throw new RuntimeException('Not enough coins.');
        }
        $db = $this->db;
        $db->transStart();
        $this->users->update(
            $buyerId,
            [
                'numberOfCoins' => $buyer['numberOfCoins'] - $deal['amount']
            ]
        );
        $this->update(
            $dealId,
            [
                'status' => 'Funded',
                'updatedAt' => date('Y-m-d H:i:s')
            ]
        );
        $db->transComplete();
        if ($db->transStatus() === false)
        {
            throw new RuntimeException('Failed to fund deal.');
        }
    }
    public function confirmDelivery(int $dealId, int $buyerId): void
    {
        $deal = $this->find($dealId);
        if (!$deal)
        {
            throw new RuntimeException('Deal not found.');
        }
        if ($deal['status'] !== 'Funded')
        {
            throw new RuntimeException('Deal is not Funded');
        }
        if ((int) $deal['buyer'] !== $buyerId)
        {
            throw new RuntimeException('Only buyer can confirm delivery.');
        }
        $seller = $this->users->find($deal['seller']);
    }
}