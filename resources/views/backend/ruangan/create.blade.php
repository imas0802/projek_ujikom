@extends('layouts.backend')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Tambah Ruangan</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('backend.ruangan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Nama Ruangan --}}
                    <div class="mb-3">
                        <label class="form-label">Nama Ruangan</label>
                        <input type="text" name="nama_ruangan" class="form-control" placeholder="Masukkan nama ruangan" required>
                    </div>

                    {{-- Kategori & Lokasi --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="kategori_id" class="form-select" required>
                                @foreach ($kategori as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Lokasi</label>
                            <select name="lantai_id" class="form-select" required>
                                @foreach ($lantai as $lokasi)
                                    <option value="{{ $lokasi->id }}">
                                        Lantai {{ $lokasi->nama_lantai }} - {{ $lokasi->gedung->nama_gedung }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Fasilitas --}}
                    <div class="mb-3">
                        <label class="form-label">Fasilitas</label>
                        <div class="row">
                            @foreach ($fasilitas as $fas)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="fasilitas_id[]"
                                            id="fas{{ $fas->id }}"
                                            value="{{ $fas->id }}"
                                        >
                                        <label class="form-check-label" for="fas{{ $fas->id }}">
                                            {{ $fas->nama_fasilitas }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi ruangan"></textarea>
                    </div>

                    {{-- Upload --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Gambar</label>
                            <input type="file" name="gambar" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Denah</label>
                            <input type="file" name="denah" class="form-control">
                        </div>
                    </div>

                    {{-- Button --}}
                    <div class="text-end">
                        <button type="submit" class="btn btn-info">
                            Tambah
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
