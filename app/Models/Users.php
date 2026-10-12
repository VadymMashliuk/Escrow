<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table = 'Escrow_users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'numberOfCoins',
    ];

    protected $returnType = 'array';
}