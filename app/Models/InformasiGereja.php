<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformasiGereja extends Model
{
    protected $table = 'informasi_gereja';

    use HasFactory;

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
    ];
}
