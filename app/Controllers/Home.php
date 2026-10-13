<?php

namespace App\Controllers;

use App\Models\Users;

class Home extends BaseController
{
    public function index()
    {
        $userModel = new Users();
        $users = $userModel->findAll();
        return view('home');
    }
}
