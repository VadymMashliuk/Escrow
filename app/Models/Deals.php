<?php

namespace App\Models;

use CodeIgniter\Model;
use RuntimeException;

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
        'updatedAt'
    ];
}