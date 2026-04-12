@extends('layouts.backend')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card card-form p-4">

                <h5 class="fw-bold mb-3">Tambah Fasilitas ke Ruangan</h5>

                <form action="{{ route('backend.fasilitas-ruangan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Fasilitas</label>
                        <select name="fasilitas_id"
                            class="form-select @error('fasilitas_id') is-invalid @enderror" required>
                            <option value="">Pilih Fasilitas</option>
                            @foreach($data as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('fasilitas_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_fasilitas }}
                                </option>
                            @endforeach
                        </select>
                        @error('fasilitas_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ruangan</label>
                        <select name="ruangan_id"
                            class="form-select @error('ruangan_id') is-invalid @enderror" required>
                            <option value="">Pilih Ruangan</option>
                            @foreach($ruangan as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('ruangan_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_ruangan }}
                                </option>
                            @endforeach
                        </select>
                        @error('ruangan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('backend.fasilitas-ruangan.index') }}"
                            class="btn btn-outline-secondary btn-sm">
                            Kembali
                        </a>

                        <button type="submit" class="btn btn-main btn-sm">
                            Simpan
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</div>

@endsection