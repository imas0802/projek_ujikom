@extends('layouts.backend')

@section('content')

<div class="container-fluid">

    <div class="card card-form p-4">

        <h4 class="mb-4 fw-bold">➕ Tambah Kategori</h4>

        <form action="{{ route('backend.kategori.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="kategori"
                    class="form-control @error('kategori') is-invalid @enderror"
                    placeholder="Masukkan nama kategori">

                @error('kategori')
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