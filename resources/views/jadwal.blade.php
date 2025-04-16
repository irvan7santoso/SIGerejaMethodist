<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Halaman Pengaturan Gereja
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Form Tambah Jadwal Kebaktian -->
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('gereja.jadwal.simpan') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="w-full border-gray-300 rounded-md"
                                required>
                        </div>
                        <div>
                            <label for="liturgos">Liturgos</label>
                            <input type="text" name="liturgis" id="liturgis" class="w-full border-gray-300 rounded-md"
                                required>
                        </div>
                        <div>
                            <label for="pengkhotbah">Pengkhotbah</label>
                            <input type="text" name="pengkhotbah" id="pengkhotbah"
                                class="w-full border-gray-300 rounded-md" required>
                        </div>
                        <div>
                            <label for="pemusik">Pemusik</label>
                            <input type="text" name="pemusik" id="pemusik" class="w-full border-gray-300 rounded-md"
                                required>
                        </div>
                        <div>
                            <label for="kolektan">Kolektan</label>
                            <input type="text" name="kolektan" id="kolektan" class="w-full border-gray-300 rounded-md"
                                required>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Simpan Jadwal</button>
                    </div>
                </form>
            </div>

            <!-- Form Tambah Informasi Gereja -->
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('gereja.informasi.simpan') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" class="w-full border-gray-300 rounded-md"
                                required>
                        </div>
                        <div>
                            <label for="gambar">Gambar (opsional)</label>
                            <input type="file" name="gambar" id="gambar" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-2">
                            <label for="isi">Isi Informasi</label>
                            <textarea name="isi" id="isi" rows="4" class="w-full border-gray-300 rounded-md"
                                required></textarea>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md">Simpan
                            Informasi</button>
                    </div>
                </form>
            </div>

            <!-- Daftar Jadwal Kebaktian -->
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <h3 class="text-lg font-bold mb-2">Jadwal Kebaktian</h3>
                <ul class="list-disc list-inside">
                    @forelse ($jadwal as $j)
                        <li>{{ $j->tanggal }} - {{ $j->liturgos }}, {{ $j->pengkhotbah }}, {{ $j->pemusik }}, Kolektan:
                            {{ $j->kolektan }}
                        </li>
                    @empty
                        <li>Belum ada jadwal kebaktian.</li>
                    @endforelse
                </ul>
            </div>

            <!-- Daftar Informasi Gereja -->
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <h3 class="text-lg font-bold mb-2">Informasi Gereja</h3>
                <ul class="list-disc list-inside">
                    @forelse ($informasi as $info)
                        <li>
                            <strong>{{ $info->judul }}</strong><br>
                            {{ $info->isi }}
                        </li>
                    @empty
                        <li>Belum ada informasi.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>