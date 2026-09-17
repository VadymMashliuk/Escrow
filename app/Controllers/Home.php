<?php

namespace App\Controllers;

use App\Models\Users;

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
        $model = new Users();
        $data = ['users' => $model->find($id)];
        return view('testUser', $data);
    }
}