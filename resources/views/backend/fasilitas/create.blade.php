@extends('layouts.backend')

@section('content')

<div class="container-fluid">

    <div class="card card-form p-4">

        <h4 class="mb-4 fw-bold">➕ Tambah Fasilitas</h4>

        <form action="{{ route('backend.fasilitas.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Fasilitas</label>
                <input type="text" name="nama_fasilitas"
                    class="form-control @error('nama_fasilitas') is-invalid @enderror"
                    placeholder="Masukkan nama fasilitas">

                @error('nama_fasilitas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
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