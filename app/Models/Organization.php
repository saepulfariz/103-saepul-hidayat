<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'shortname',
        'logo',
        'year',
        'visi',
        'misi',
        'qoute',
        'email',
        'telephone',
        'instagram',
        'website',
        'youtube',
        'address',
        'description',
    ];
}
