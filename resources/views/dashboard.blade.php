<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Halaman Pengaturan Gereja
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="d-flex justify-content-end mb-3">
                <!-- Tombol untuk membuka modal Tambah Jadwal -->
                <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalTambahJadwal">
                    Tambah Jadwal Kebaktian
                </button>
                <!-- Tombol untuk membuka modal Tambah Informasi -->
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahInformasi">
                    Tambah Informasi Gereja
                </button>
            </div>

            <!-- Modal Tambah Jadwal Kebaktian -->
            <div class="modal fade" id="modalTambahJadwal" tabindex="-1" aria-labelledby="modalTambahJadwalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('gereja.jadwal.simpan') }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahJadwalLabel">Tambah Jadwal Kebaktian</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="liturgis" class="form-label">Liturgos</label>
                                    <input type="text" name="liturgis" id="liturgis" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pengkhotbah" class="form-label">Pengkhotbah</label>
                                    <input type="text" name="pengkhotbah" id="pengkhotbah" class="form-control"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="pemusik" class="form-label">Pemusik</label>
                                    <input type="text" name="pemusik" id="pemusik" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kolektan" class="form-label">Kolektan</label>
                                    <input type="text" name="kolektan" id="kolektan" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah Informasi Gereja -->
            <div class="modal fade" id="modalTambahInformasi" tabindex="-1" aria-labelledby="modalTambahInformasiLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('gereja.informasi.simpan') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahInformasiLabel">Tambah Informasi Gereja</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" name="judul" id="judul" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar (opsional)</label>
                                    <input type="file" name="gambar" id="gambar" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="isi" class="form-label">Isi Informasi</label>
                                    <textarea name="isi" id="isi" rows="4" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan Informasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Daftar Jadwal Kebaktian dengan Tabel -->
            <div class="card mb-4">
                <div class="card-header">Jadwal Kebaktian</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Liturgos</th>
                                    <th scope="col">Pengkhotbah</th>
                                    <th scope="col">Pemusik</th>
                                    <th scope="col">Kolektan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwal as $j)
                                    <tr>
                                        <td>{{ $j->tanggal }}</td>
                                        <td>{{ $j->liturgis }}</td>
                                        <td>{{ $j->pengkhotbah }}</td>
                                        <td>{{ $j->pemusik }}</td>
                                        <td>{{ $j->kolektan }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada jadwal kebaktian.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Daftar Informasi Gereja dengan Tabel -->
            <div class="card">
                <div class="card-header">Informasi Gereja</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Isi Informasi</th>
                                    <th scope="col">Tanggal Diterbitkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($informasi as $info)
                                    <tr>
                                        <td>{{ $info->judul }}</td>
                                        <td>{{ \Str::limit($info->isi, 100) }}...</td>
                                        <td>{{ $info->created_at->format('d M Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Belum ada informasi gereja.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>