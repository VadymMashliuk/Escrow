<?php

namespace App\Models;

use CodeIgniter\Model;

class Deals extends Model
{
    protected $table = 'Escrow_deals';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'buyer',
        'seller',
        'amount',
        'status',
        'createdAt',
        'updatedAt',
    ];

    protected $returnType = 'array';
}