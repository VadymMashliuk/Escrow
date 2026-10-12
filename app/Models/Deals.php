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
        'updatedAt',
    ];

    protected $returnType = 'array';

    public function createDeal(int $buyerId, int $sellerId, int $amount): int
    {
        if ($buyerId === $sellerId)
        {
            throw new RuntimeException('Buyer and seller cannot be the same user.');    
        }
        if ($amount <= 0)
        {
            throw new RuntimeException('Amount must be greater than zero.');
        }

        $this->insert([
            'buyer' => $buyerId,
            'seller' => $sellerId,
            'amount' => $amount,
            'status' => 'Created',
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        ]);

        return $this->getInsertID();
    }
}