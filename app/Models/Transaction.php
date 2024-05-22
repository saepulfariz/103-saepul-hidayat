<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'datetime',
        'type',
        'nominal',
        'note',
    ];

    public $table = 'transactions';

    function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
