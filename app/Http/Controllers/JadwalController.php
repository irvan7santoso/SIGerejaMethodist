<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiGereja;
use App\Models\JadwalKebaktian;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = JadwalKebaktian::orderBy('tanggal', 'asc')->get();
        $informasi = InformasiGereja::orderBy('created_at', 'desc')->get();

        return view('jadwal', compact('jadwal', 'informasi'));
    }
}
