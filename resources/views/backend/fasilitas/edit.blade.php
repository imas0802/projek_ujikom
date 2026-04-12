@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                   ✏️ Edit Fasilitas
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.fasilitas.update',$fasilitas->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="">Nama fasilitas</label>
                            <input type="text" name="nama_fasilitas" value="{{ $fasilitas->nama_fasilitas }}"
                                class="form-control @error('nama_fasilitas') is-invalid @enderror">
                            @error('nama_fasilitas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <button type="submit" class="btn btn-sm btn-outline-primary">Simpan</button>
                            <button type="reset" class="btn btn-sm btn-outline-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection