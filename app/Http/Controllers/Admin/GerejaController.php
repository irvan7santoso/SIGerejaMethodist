<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\InformasiGereja;
use App\Models\JadwalKebaktian;
use App\Http\Controllers\Controller;

class GerejaController extends Controller
{
    public function jadwal()
    {
        $jadwal = JadwalKebaktian::latest('tanggal')->get();
        $informasi = InformasiGereja::latest()->get();
        return view('jadwal', compact('jadwal', 'informasi'));
    }

    public function simpanJadwal(Request $request)
    {
        JadwalKebaktian::create($request->all());
        return back()->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function simpanInformasi(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('informasi', 'public');
        }
        InformasiGereja::create($data);
        return back()->with('success', 'Informasi berhasil ditambahkan');
    }

}
