@extends('layouts.backend')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-6">Tambah Lantai</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('backend.lantai.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Gedung</label>
                        <select name="gedung_id" class="form-select" required>
                            <option value="" disabled selected>Pilih salah satu gedung</option>
                            @foreach ($gedung as $ged)
                                <option value="{{ $ged->id }}">
                                    {{ $ged->nama_gedung }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lantai</label>
                        <input
                            type="number"
                            name="nama_lantai"
                            class="form-control"
                            placeholder="Masukkan nomor lantai"
                            required
                        >
                    </div>

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
