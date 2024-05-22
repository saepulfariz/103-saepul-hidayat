<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'balance',
        'debit',
        'credit',
        'datetime',
        'user_id',
    ];

    public $table = 'transaction_history';
}
