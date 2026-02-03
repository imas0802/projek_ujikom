@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Tambah Fasilitas Ruangan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.fasilitas-ruangan.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="fasilitas_id" class="form-label">Fasilitas</label>
                            <select name="fasilitas_id" id="fasilitas_id" class="form-select @error('fasilitas_id') is-invalid @enderror" required>
                                <option value="">Pilih Fasilitas</option>
                                @foreach($data as $item)
                                    <option value="{{ $item->id }}" {{ old('fasilitas_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_fasilitas }}
                                    </option>
                                @endforeach
                            </select>
                            @error('fasilitas_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ruangan_id" class="form-label">Ruangan</label>
                            <select name="ruangan_id" id="ruangan_id" class="form-select @error('ruangan_id') is-invalid @enderror" required>
                                <option value="">Pilih Ruangan</option>
                                @foreach($ruangan as $item)
                                    <option value="{{ $item->id }}" {{ old('ruangan_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_ruangan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ruangan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-end">
                            <a href="{{ route('backend.fasilitas-ruangan.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
