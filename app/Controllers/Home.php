<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\Deals;

class Home extends BaseController
{
    public function index()
    {
        $model = new Users();
        $data = ['users' => $model->findAll()];
        return view('home', $data);
    }
    public function testUser($id)
    {
        $users = new Users();
        $deals = new Deals();
        $data = [
            'users' => $users->find($id),
            'deals' => $deals->where('buyer', $id)->findAll(),
            'allUsers' => $users->findAll()
        ];
        return view('testUser', $data);
    }
    public function createDeal($buyerId)
    {
        $users = new Users();
        $deals = new Deals();
        $sellerId = $this->request->getPost('seller');
        $amount = $this->request->getPost('amount');
        $buyer = $users->find($buyerId);
        $seller = $users->find($sellerId);
        if (!$buyer || $seller)
        {
            return redirect()->back()->with('error', 'User not found');
        }
        if ($buyerId == $sellerId)
        {
            return redirect()->back()->with('error', 'Buyer and seller must be different');
        }
        if ($amout <= 0)
        {
            return redirect()->back()->with('error', 'Amount must be greater than zero');
        }
        if ($amount > $buyer['numberOfCoins'])
        {
            return redirect()->back()->with('error', 'Buyer does not have enough coins');
        }
        $deals->insert([
            'buyer' => $buyerId,
            'seller' => $sellerId,
            'amount' => $amount,
            'status' => 'Created',
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        ]);
        return redirect()->to('testUser/'.$buyerId);
    }
}