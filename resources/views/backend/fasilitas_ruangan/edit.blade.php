@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                  ✏️  Edit Fasilitas Ruangan
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.fasilitas-ruangan.update',$data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="">Fasilitas</label>
                            <input type="text" name="fasilitas_id" value="{{ $fasilitas->fasilitas_id }}"
                                class="form-control @error('fasilitas_id') is-invalid @enderror">
                            @error('fasilitas_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="">Ruangan</label>
                            <select name="ruangan_id"
                                class="form-control @error('ruangan_id') is-invalid @enderror">
                                @foreach ($data as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $ruangan->ruangan_id ?
                                    'selected' :'' }}>
                                    {{$item->nama_ruangan}}
                                </option>
                                @endforeach
                            </select>
                            @error('ruangan_id')
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