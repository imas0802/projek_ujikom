@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Edit Lantai
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.lantai.update',$lantai->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="">Nama Lantai</label>
                            <input type="text" name="nama_lantai" value="{{ $lantai->nama_lantai }}"
                                class="form-control @error('nama_lantai') is-invalid @enderror">
                            @error('nama_lantai')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="">Kategori</label>
                            <select name="gedung_id"
                                class="form-control @error('gedung_id') is-invalid @enderror">
                                @foreach ($gedung as $data)
                                <option value="{{ $data->id }}" {{ $data->id == $lantai->gedung_id ?
                                    'selected' :'' }}>
                                    {{$data->nama_gedung}}
                                </option>
                                @endforeach
                            </select>
                            @error('gedung_id')
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