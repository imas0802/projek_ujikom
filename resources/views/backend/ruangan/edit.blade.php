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
                        <form action="{{ route('backend.ruangan.update', $ruangan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-2">
                                <label>Nama Ruangan</label>
                                <input type="text" name="nama_ruangan"
                                    value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}"
                                    class="form-control @error('nama_ruangan') is-invalid @enderror">
                                @error('nama_ruangan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label>Kategori</label>
                                <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $ruangan->kategori_id == $data->id ? 'selected' : '' }}>
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
                                        <option value="{{ $data->id }}"
                                            {{ $ruangan->lantai_id == $data->id ? 'selected' : '' }}>
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

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status Ruangan</label>
                                    <div class="d-flex gap-3">
                                        <!-- Kosong -->
                                        <div class="form-check">
                                            <input type="radio" name="status" id="statusKosong" value="kosong"
                                                class="btn-check" {{ $ruangan->status == 'kosong' ? 'checked' : '' }}
                                                required>
                                            <label class="btn btn-outline-success rounded-pill px-4 py-2"
                                                for="statusKosong">
                                                Kosong
                                            </label>
                                        </div>

                                        <!-- Dipakai -->
                                        <div class="form-check">
                                            <input type="radio" name="status" id="statusDipakai" value="dipakai"
                                                class="btn-check" {{ $ruangan->status == 'dipakai' ? 'checked' : '' }}>
                                            <label class="btn btn-outline-danger rounded-pill px-4 py-2"
                                                for="statusDipakai">
                                                Dipakai
                                            </label>
                                        </div>
                                    </div>
                                    @error('status')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Fasilitas</label>

                                <div class="d-flex flex-wrap gap-2" id="fasilitas-container">
                                    @foreach ($fasilitas as $fas)
                                        <span class="badge rounded-pill border px-3 py-2 text-dark fasilitas-tag"
                                            data-id="{{ $fas->id }}" style="cursor: pointer;">
                                            {{ $fas->nama_fasilitas }}
                                        </span>
                                    @endforeach
                                </div>

                                {{-- tempat nampung input hidden --}}
                                <div id="fasilitas-input-wrapper"></div>
                            </div>


                            <div class="mb-2">
                                <label>Gambar</label>
                                <input type="file" name="gambar"
                                    class="form-control @error('gambar') is-invalid @enderror">
                                @error('gambar')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                @if ($ruangan->gambar)
                                    <img src="{{ asset('storage/' . $ruangan->gambar) }}" alt="Gambar Ruangan"
                                        width="100" class="mt-2">
                                @endif
                            </div>
                            <div class="mb-2">
                                <label>Denah</label>
                                <input type="file" name="denah"
                                    class="form-control @error('denah') is-invalid @enderror">
                                @error('denah')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                @if ($ruangan->denah)
                                    <img src="{{ asset('storage/' . $ruangan->denah) }}" alt="Denah Ruangan" width="100"
                                        class="mt-2">
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
    <script>
        const tags = document.querySelectorAll('.fasilitas-tag');
        const wrapper = document.getElementById('fasilitas-input-wrapper');

        let selected = [];

        tags.forEach(tag => {
            tag.addEventListener('click', function() {
                const id = this.dataset.id;

                if (selected.includes(id)) {
                    selected = selected.filter(v => v !== id);
                    this.classList.remove('bg-primary', 'text-white');
                    this.classList.add('text-dark');
                } else {
                    selected.push(id);
                    this.classList.add('bg-primary', 'text-white');
                    this.classList.remove('text-dark');
                }
                wrapper.innerHTML = '';
                selected.forEach(val => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'fasilitas_id[]';
                    input.value = val;
                    wrapper.appendChild(input);
                });
            });
        });
    </script>
@endsection
