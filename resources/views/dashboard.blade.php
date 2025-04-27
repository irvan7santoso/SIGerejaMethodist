<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Halaman Pengaturan Gereja
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-end mb-3 gap-2">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahJadwalModal">
                    <i class="bi bi-calendar-plus"></i> Tambah Jadwal Kebaktian
                </button>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahInformasiModal">
                    <i class="bi bi-megaphone"></i> Tambah Informasi Gereja
                </button>
            </div>

            <!-- Modal Tambah Jadwal Kebaktian -->
            <div class="modal fade" id="tambahJadwalModal" tabindex="-1" aria-labelledby="tambahJadwalModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('gereja.jadwal.simpan') }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahJadwalModalLabel">Tambah Jadwal Kebaktian</h5>
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
            <div class="modal fade" id="tambahInformasiModal" tabindex="-1" aria-labelledby="tambahInformasiModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('gereja.informasi.simpan') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahInformasiModalLabel">Tambah Informasi Gereja</h5>
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

            <!-- Daftar Jadwal Kebaktian -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Jadwal Kebaktian</h5>
                    <ul class="list-group list-group-flush">
                        @forelse ($jadwal as $j)
                            <li class="list-group-item">
                                <strong>{{ \Carbon\Carbon::parse($j->tanggal)->format('d M Y') }}</strong> -
                                {{ $j->liturgos }}, {{ $j->pengkhotbah }}, {{ $j->pemusik }}, Kolektan: {{ $j->kolektan }}
                            </li>
                        @empty
                            <li class="list-group-item">Belum ada jadwal kebaktian.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!-- Daftar Informasi Gereja -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Informasi Gereja</h5>
                    <ul class="list-group list-group-flush">
                        @forelse ($informasi as $info)
                            <li class="list-group-item">
                                <strong>{{ $info->judul }}</strong><br>
                                {{ $info->isi }}
                            </li>
                        @empty
                            <li class="list-group-item">Belum ada informasi.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>