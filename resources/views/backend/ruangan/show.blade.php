@extends('layouts.backend')

@section('content')


<div class="container">

    <div class="card card-detail mt-4 p-4">

        <h4 class="mb-4 fw-bold">📋 Detail Ruangan</h4>

        <div class="row">

            <!-- LEFT SIDE -->
            <div class="col-md-6">

                <div class="detail-item">
                    <div class="detail-label">Nama Ruangan</div>
                    <div class="detail-value">{{ $ruangan->nama_ruangan }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Kategori</div>
                    <div class="detail-value">{{ $ruangan->kategori->nama ?? '-' }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Lantai</div>
                    <div class="detail-value">{{ $ruangan->lantai->nama_lantai ?? '-' }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Deskripsi</div>
                    <div class="detail-value">{{ $ruangan->deskripsi }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Fasilitas</div>

                    @if ($ruangan->fasilitas && $ruangan->fasilitas->count())
                        @foreach ($ruangan->fasilitas as $fas)
                            <span class="badge-fasilitas">
                                {{ $fas->nama_fasilitas }}
                            </span>
                        @endforeach
                    @else
                        <div class="text-muted">Tidak ada fasilitas</div>
                    @endif
                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="col-md-6 text-center">

                <div class="mb-4">
                    <div class="detail-label mb-2">Gambar</div>

                    @if ($ruangan->gambar)
                        <img src="{{ asset('storage/' . $ruangan->gambar) }}"
                            class="img-preview"
                            style="width:100%; max-height:220px;">
                    @else
                        <div class="text-muted">Tidak ada gambar</div>
                    @endif
                </div>

                <div>
                    <div class="detail-label mb-2">Denah</div>

                    @if ($ruangan->denah)
                        <img src="{{ asset('storage/' . $ruangan->denah) }}"
                            class="img-preview"
                            style="width:100%; max-height:220px; object-fit:contain;">
                    @else
                        <div class="text-muted">Tidak ada denah</div>
                    @endif
                </div>

            </div>

        </div>

        <div class="mt-4">
            <a href="{{ route('backend.ruangan.index') }}" class="btn btn-secondary">
                ← Kembali
            </a>
        </div>

    </div>

</div>

@endsection