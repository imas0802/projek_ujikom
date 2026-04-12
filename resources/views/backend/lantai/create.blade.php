@extends('layouts.backend')

@section('content')

<div class="container-fluid">

    <div class="card card-form p-4">

        <h4 class="mb-4 fw-bold">🏢 Tambah Lantai</h4>

        <form action="{{ route('backend.lantai.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Gedung</label>
                <select name="gedung_id" class="form-select @error('gedung_id') is-invalid @enderror" required>
                    <option value="" disabled selected>Pilih gedung</option>
                    @foreach ($gedung as $ged)
                        <option value="{{ $ged->id }}">
                            {{ $ged->nama_gedung }}
                        </option>
                    @endforeach
                </select>

                @error('gedung_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Lantai</label>
                <input
                    type="number"
                    name="nama_lantai"
                    class="form-control @error('nama_lantai') is-invalid @enderror"
                    placeholder="Masukkan nomor lantai"
                    required
                >

                @error('nama_lantai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-main">💾 Simpan</button>
                <button type="reset" class="btn btn-outline-secondary btn-reset">Reset</button>
            </div>

        </form>

    </div>

</div>

@endsection