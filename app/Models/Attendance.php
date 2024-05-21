<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'meet_id',
        'presensi',
        'datetime',
        'note',
    ];

    public $presensis = [
        'hadir',
        'sakit',
        'ijin',
        'alfa',
    ];

    function meeting()
    {
        return $this->belongsTo(Meeting::class, 'meet_id', 'id');
    }

    function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
