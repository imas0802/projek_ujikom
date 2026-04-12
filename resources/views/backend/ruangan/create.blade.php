@extends('layouts.backend')

@section('content')
<div class="container-fluid">

    <div class="card card-clean p-4">

        <h5 class="mb-4 fw-semibold">Tambah Ruangan</h5>

        <form action="{{ route('backend.ruangan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Ruangan</label>
                    <input type="text" name="nama_ruangan"
                        class="form-control"
                        placeholder="Masukkan nama ruangan" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori_id" class="form-select" required>
                        @foreach ($kategori as $kat)
                            <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Lokasi</label>
                    <select name="lantai_id" class="form-select" required>
                        @foreach ($lantai as $lokasi)
                            <option value="{{ $lokasi->id }}">
                                Lantai {{ $lokasi->nama_lantai }} - {{ $lokasi->gedung->nama_gedung }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"
                        placeholder="Deskripsi ruangan"></textarea>
                </div>

                <!-- FASILITAS -->
                <div class="col-12 mb-3">
                    <label class="form-label">Fasilitas</label>

                    <div class="d-flex flex-wrap gap-2" id="fasilitas-container">
                        @foreach ($fasilitas as $fas)
                            <span class="badge border px-3 py-2 fasilitas-tag"
                                data-id="{{ $fas->id }}">
                                {{ $fas->nama_fasilitas }}
                            </span>
                        @endforeach
                    </div>

                    <div id="fasilitas-input-wrapper"></div>
                </div>

                <!-- UPLOAD -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Denah</label>
                    <input type="file" name="denah" class="form-control">
                </div>

            </div>

            <div class="mt-3 text-end">
                <button type="submit" class="btn btn-main">Simpan</button>
            </div>

        </form>
    </div>

</div>

<script>
    const tags = document.querySelectorAll('.fasilitas-tag');
    const wrapper = document.getElementById('fasilitas-input-wrapper');

    let selected = [];

    tags.forEach(tag => {
        tag.addEventListener('click', function () {
            const id = this.dataset.id;

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