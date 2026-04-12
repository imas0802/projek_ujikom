@extends('layouts.backend')

@section('content')

<div class="container-fluid">
    <div class="card card-form p-4">

        <h4 class="mb-4 fw-bold">✏️ Edit Ruangan</h4>

        <form action="{{ route('backend.ruangan.update', $ruangan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Ruangan</label>
                    <input type="text" name="nama_ruangan"
                        value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}"
                        class="form-control @error('nama_ruangan') is-invalid @enderror">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori_id" class="form-select">
                        @foreach ($kategori as $data)
                            <option value="{{ $data->id }}"
                                {{ $ruangan->kategori_id == $data->id ? 'selected' : '' }}>
                                {{ $data->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Lantai</label>
                    <select name="lantai_id" class="form-select">
                        @foreach ($lantai as $data)
                            <option value="{{ $data->id }}"
                                {{ $ruangan->lantai_id == $data->id ? 'selected' : '' }}>
                                Lantai {{ $data->lantai_id }} - {{ $data->gedung->nama_gedung ?? '' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <div class="d-flex gap-2">
                        <input type="radio" name="status" value="kosong" id="kosong"
                            class="btn-check" {{ $ruangan->status == 'kosong' ? 'checked' : '' }}>
                        <label for="kosong" class="btn btn-outline-success btn-soft">🟢 Kosong</label>

                        <input type="radio" name="status" value="dipakai" id="dipakai"
                            class="btn-check" {{ $ruangan->status == 'dipakai' ? 'checked' : '' }}>
                        <label for="dipakai" class="btn btn-outline-danger btn-soft">🔴 Dipakai</label>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control">{{ $ruangan->deskripsi }}</textarea>
                </div>

                <!-- FASILITAS -->
                <div class="col-12 mb-3">
                    <label class="form-label">Fasilitas</label>

                    <div class="d-flex flex-wrap gap-2" id="fasilitas-container">
                        @foreach ($fasilitas as $fas)
                            <span class="badge border px-3 py-2 fasilitas-tag {{ $ruangan->fasilitas->contains($fas->id) ? 'active' : '' }}"
                                data-id="{{ $fas->id }}">
                                {{ $fas->nama_fasilitas }}
                            </span>
                        @endforeach
                    </div>

                    <div id="fasilitas-input-wrapper"></div>
                </div>

                <!-- GAMBAR -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control">

                    @if ($ruangan->gambar)
                        <img src="{{ asset('storage/' . $ruangan->gambar) }}"
                            class="img-preview" width="120">
                    @endif
                </div>

                <!-- DENAH -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Denah</label>
                    <input type="file" name="denah" class="form-control">

                    @if ($ruangan->denah)
                        <img src="{{ asset('storage/' . $ruangan->denah) }}"
                            class="img-preview" width="120">
                    @endif
                </div>

            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-main">💾 Simpan</button>
                <button type="reset" class="btn btn-outline-warning btn-soft">Reset</button>
            </div>

        </form>
    </div>
</div>

<script>
    const tags = document.querySelectorAll('.fasilitas-tag');
    const wrapper = document.getElementById('fasilitas-input-wrapper');

    let selected = [];

    tags.forEach(tag => {
        const id = tag.dataset.id;

        if (tag.classList.contains('active')) {
            selected.push(id);
        }

        tag.addEventListener('click', function() {
            if (selected.includes(id)) {
                selected = selected.filter(v => v !== id);
                this.classList.remove('active');
            } else {
                selected.push(id);
                this.classList.add('active');
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