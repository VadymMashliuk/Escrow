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
}