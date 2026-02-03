@extends('layouts.backend')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Edit Ruangan
                    </div>
                    <div class="card-body">
                        <form action="{{ route('backend.ruangan.update', $ruangan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-2">
                                <label>Nama Ruangan</label>
                                <input type="text" name="nama_ruangan" value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}"
                                    class="form-control @error('nama_ruangan') is-invalid @enderror">
                                @error('nama_ruangan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label>Kategori</label>
                                <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->id }}" {{ $ruangan->kategori_id == $data->id ? 'selected' : '' }}>
                                            {{ $data->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label>Lantai</label>
                                <select name="lantai_id" class="form-control @error('lantai_id') is-invalid @enderror">
                                    @foreach ($lantai as $data)
                                        <option value="{{ $data->id }}" {{ $ruangan->lantai_id == $data->id ? 'selected' : '' }}>
                                            Lantai {{ $data->lantai_id }} - Gedung {{ $data->gedung->nama_gedung ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('lantai_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $ruangan->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label  class="mt-2">
                                    Fasilitas
                                </label><br>
                                
                                   @foreach ($fasilitas as $fas)
                                 <input type="checkbox" name="fasilitas_id"  class="form-checkbox mt-1" id="checkbox" value="{{ $fas->id }}"> <span for="#checkbox"> {{ $fas->nama_fasilitas }}</span> 
                                   @endforeach
                            </div>

                            <div class="mb-2">
                                <label>Gambar</label>
                                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                                @error('gambar')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                @if ($ruangan->gambar)
                                    <img src="{{ asset('storage/' . $ruangan->gambar) }}" alt="Gambar Ruangan" width="100" class="mt-2">
                                @endif
                            </div>
                            <div class="mb-2">
                                <label>Denah</label>
                                <input type="file" name="denah" class="form-control @error('denah') is-invalid @enderror">
                                @error('denah')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                @if ($ruangan->denah)
                                    <img src="{{ asset('storage/' . $ruangan->denah) }}" alt="Denah Ruangan" width="100" class="mt-2">
                                @endif
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
