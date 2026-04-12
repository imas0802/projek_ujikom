@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                   ✏️ Edit Gedung
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.gedung.update',$gedung->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="">Nama Gedung</label>
                            <input type="text" name="nama_gedung" value="{{ $gedung->nama_gedung }}"
                                class="form-control @error('nama_gedung') is-invalid @enderror">
                            @error('nama_gedung')
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