@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header bg-secondary text-white">
            Detail Ruangan
        </div>
        <div class="card-body pt-3">
            <table class="table table-bordered mt-2">
                <tr>
                    <th>Nama Ruangan</th>
                    <td>{{ $ruangan->nama_ruangan }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $ruangan->kategori->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $ruangan->deskripsi }}</td>
                </tr>
                <tr>
                    <th>Lantai</th>
                    <td>{{ $ruangan->lantai->nama_lantai ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Fasilitas</th>
                    <td>
                        @if ($ruangan->fasilitas && $ruangan->fasilitas->count())
                            <ul>
                                @foreach ($ruangan->fasilitas as $fas)
                                    <li>{{ $fas->nama_fasilitas }}</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-muted">Tidak ada fasilitas</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Gambar</th>
                    <td>
                        @if ($ruangan->gambar)
                            <img src="{{ asset('storage/' . $ruangan->gambar) }}" alt="Gambar Ruangan" width="150">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Denah</th>
                    <td>
                        @if ($ruangan->denah)
                            <img src="{{ asset('storage/' . $ruangan->denah) }}" alt="Denah Ruangan" width="150">
                        @else
                            <span class="text-muted">Tidak ada denah</span>
                        @endif
                    </td>
                </tr>
            </table>

            <a href="{{ route('backend.ruangan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
