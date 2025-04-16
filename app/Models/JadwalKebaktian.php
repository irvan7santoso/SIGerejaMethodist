<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalKebaktian extends Model
{
    protected $table = 'jadwal_kebaktian';

    use HasFactory;

    protected $fillable = [
        'tanggal',
        'liturgis',
        'pengkhotbah',
        'pemusik',
        'kolektan',
    ];
}
