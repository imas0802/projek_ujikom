@extends('layouts.frontend')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 fw-bold">
        {{ $ruangan->nama_ruangan }}
    </h2>

    <div class="card shadow-sm">
        <div class="row g-0">

            {{-- PANORAMA --}}
            <div class="col-md-5 p-3">
                @if($ruangan->gambar)
                    <div id="panorama-{{ $ruangan->id }}"
                         style="width:100%; height:250px;"
                         class="rounded mb-2"></div>

                    <script>
                    pannellum.viewer('panorama-{{ $ruangan->id }}', {
                        type: 'equirectangular',
                        panorama: "{{ asset('storage/'.$ruangan->gambar) }}",
                        autoLoad: true,
                        autoRotate: -2,
                        showControls: true
                    });
                    </script>
                @endif

                <p class="mb-1 text-muted">
                    Kategori : {{ $ruangan->kategori->nama ?? '-' }}
                </p>
                <p class="mb-1 text-muted">
                    Lantai : {{ $ruangan->lantai->nama_lantai ?? '-' }}
                </p>

                <p class="mb-1">
                    Fasilitas ({{ $ruangan->fasilitas->count() }}):
                </p>

                @if($ruangan->fasilitas->count())
                    <ul>
                        @foreach($ruangan->fasilitas as $fas)
                            <li>{{ $fas->nama_fasilitas }}</li>
                        @endforeach
                    </ul>
                @else
                    <span class="text-muted">Tidak ada fasilitas</span>
                @endif

                <p class="mt-3">
                    {{ $ruangan->deskripsi }}
                </p>
            </div>

            {{-- DENAH --}}
            <div class="col-md-7 p-3 d-flex align-items-center justify-content-center">
                @if ($ruangan->denah)
                    <img src="{{ asset('storage/' . $ruangan->denah) }}"
                         class="img-fluid rounded border"
                         alt="Denah Ruangan"
                         style="max-height:300px; object-fit:contain;">
                @endif
            </div>

        </div>
    </div>

    <a href="{{ route('index') }}" class="btn btn-secondary mt-4">
        ← Kembali ke Beranda
    </a>

</div>
@endsection
