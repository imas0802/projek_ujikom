@extends('layouts.backend')

@section('content')

<div class="container-fluid">

    <div class="card card-form p-4">

        <h4 class="mb-4 fw-bold">➕ Tambah Gedung</h4>

        <form action="{{ route('backend.gedung.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Gedung</label>
                <input type="text" name="nama_gedung"
                    class="form-control @error('nama_gedung') is-invalid @enderror"
                    placeholder="Masukkan nama gedung">

                @error('nama_gedung')
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