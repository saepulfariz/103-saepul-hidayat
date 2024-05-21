<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'divisi_id',
        'user_id',
        'coordinator',
    ];

    // public $timestamps = false;
    // public $table = 'members';

    public $coordinators = [
        [
            'id' => 1,
            'name' => 'Coordinator'
        ],
        [
            'id' => 0,
            'name' => 'Participant'
        ],
    ];

    function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    function divisi()
    {
        return $this->belongsTo(Division::class, 'divisi_id', 'id');
    }
}
