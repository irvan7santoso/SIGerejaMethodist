<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Informasi Gereja & Jadwal Kebaktian
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">

            <!-- Jadwal Kebaktian -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Jadwal Kebaktian Terbaru
                </div>
                <div class="card-body">
                    @if($jadwal->count())
                        <ul class="list-group list-group-flush">
                            @foreach ($jadwal as $j)
                                <li class="list-group-item">
                                    <strong>{{ \Carbon\Carbon::parse($j->tanggal)->format('d M Y') }}</strong><br>
                                    Liturgos: {{ $j->liturgis }}<br>
                                    Pengkhotbah: {{ $j->pengkhotbah }}<br>
                                    Pemusik: {{ $j->pemusik }}<br>
                                    Kolektan: {{ $j->kolektan }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">Belum ada jadwal kebaktian.</p>
                    @endif
                </div>
            </div>

            <!-- Informasi Gereja -->
            <div class="card">
                <div class="card-header bg-success text-white">
                    Informasi Gereja
                </div>
                <div class="card-body">
                    @if($informasi->count())
                        @foreach ($informasi as $info)
                            <div class="mb-4">
                                <h5>{{ $info->judul }}</h5>
                                @if ($info->gambar)
                                    <img src="{{ asset('storage/' . $info->gambar) }}" alt="gambar" class="img-fluid mb-2 rounded">
                                @endif
                                <p>{{ $info->isi }}</p>
                                <small class="text-muted">Diposting pada {{ $info->created_at->format('d M Y') }}</small>
                                <hr>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">Belum ada informasi gereja.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>