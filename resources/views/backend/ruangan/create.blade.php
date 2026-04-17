@extends('layouts.backend')

@section('content')
<div class="container-fluid">

    <div class="card p-4">

        <h5 class="mb-4 fw-semibold">➕ Tambah Ruangan</h5>

        <form action="{{ route('backend.ruangan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <!-- NAMA RUANGAN -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Ruangan</label>
                    <input type="text" name="nama_ruangan"
                        class="form-control"
                        placeholder="Masukkan nama ruangan" required>
                </div>

                <!-- KATEGORI -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori</label>

                    <div class="row g-2">
                        @foreach ($kategori as $kat)
                            <div class="col-6">
                                <input type="radio" class="btn-check"
                                    name="kategori_id"
                                    id="kat{{ $kat->id }}"
                                    value="{{ $kat->id }}" required>

                                <label class="btn btn-outline-primary w-100"
                                    for="kat{{ $kat->id }}">
                                    {{ $kat->nama }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- LOKASI -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Lokasi</label>

                    <div class="row g-2">
                        @foreach ($lantai as $lokasi)
                            <div class="col-6">
                                <input type="radio" class="btn-check"
                                    name="lantai_id"
                                    id="lok{{ $lokasi->id }}"
                                    value="{{ $lokasi->id }}" required>

                                <label class="btn btn-outline-success w-100"
                                    for="lok{{ $lokasi->id }}">
                                    L{{ $lokasi->nama_lantai }} - {{ $lokasi->gedung->nama_gedung }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- DESKRIPSI -->
                <div class="col-12 mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"
                        placeholder="Deskripsi ruangan"></textarea>
                </div>

                <!-- FASILITAS -->
                <div class="col-12 mb-3">
                    <label class="form-label">Fasilitas</label>

                    <div class="d-flex flex-wrap gap-2"
                        id="fasilitas-container"
                        style="max-height:200px; overflow:auto;">

                        @foreach ($fasilitas as $fas)
                            <button type="button"
                                class="btn btn-outline-secondary fasilitas-btn"
                                data-id="{{ $fas->id }}">
                                {{ $fas->nama_fasilitas }}
                            </button>
                        @endforeach
                    </div>

                    <div id="fasilitas-input-wrapper"></div>
                </div>

                <!-- GAMBAR -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <!-- DENAH -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Denah</label>
                    <input type="file" name="denah" class="form-control">
                </div>

            </div>

            <div class="mt-3 text-end">
                <button type="submit" class="btn btn-primary">
                    💾 Simpan
                </button>
            </div>

        </form>
    </div>

</div>

<!-- SCRIPT FASILITAS -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const buttons = document.querySelectorAll('.fasilitas-btn');
    const wrapper = document.getElementById('fasilitas-input-wrapper');

    let selected = [];

    buttons.forEach(btn => {
        btn.addEventListener('click', function () {

            const id = this.dataset.id;

            if (selected.includes(id)) {
                selected = selected.filter(v => v !== id);
                this.classList.remove('btn-primary');
                this.classList.add('btn-outline-secondary');
            } else {
                selected.push(id);
                this.classList.remove('btn-outline-secondary');
                this.classList.add('btn-primary');
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

});
</script>

@endsection