<?php

namespace App\Controllers;

use App\Models\Users;

class Home extends BaseController
{
    public function index()
    {
        $userModel = new Users();
        /*$data = [
            'users' => $this->users->find($id),
            'deals' => $this->deals->where('buyer', $id)->findAll(),
            'allUsers' => $this->users->findAll()
        ];*/
        $data = ['users' => $userModel->findAll()];
        return view('home', $data);
    }
}
