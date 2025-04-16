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
        $request->validate([
            'tanggal' => 'required|date',
            'liturgis' => 'required|string',
            'pengkhotbah' => 'required|string',
            'pemusik' => 'required|string',
            'kolektan' => 'required|string',
        ]);

        JadwalKebaktian::create($request->all());
        return back()->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function simpanInformasi(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'isi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('informasi', 'public');
        }

        InformasiGereja::create($data);
        return back()->with('success', 'Informasi berhasil ditambahkan');
    }

}
