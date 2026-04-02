@extends('layouts.backend')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Tambah Ruangan</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('backend.ruangan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Nama Ruangan --}}
                        <div class="mb-3">
                            <label class="form-label">Nama Ruangan</label>
                            <input type="text" name="nama_ruangan" class="form-control"
                                placeholder="Masukkan nama ruangan" required>
                        </div>

                        {{-- Kategori & Lokasi --}}
                        <div class="row">
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
                        </div>

                        {{-- Fasilitas --}}
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


                        {{-- Deskripsi --}}
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi ruangan"></textarea>
                        </div>

                        {{-- Upload --}}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gambar</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Denah</label>
                                <input type="file" name="denah" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Foto Fasilitas Ruangan
                                    <small class="text-muted">(bisa lebih dari satu)</small>
                                </label>
                                <input type="file" name="images[]" class="form-control" multiple>
                            </div>
                        </div>

                        {{-- Button --}}
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

    <script>
    const tags = document.querySelectorAll('.fasilitas-tag');
    const wrapper = document.getElementById('fasilitas-input-wrapper');

    let selected = [];

    tags.forEach(tag => {
        tag.addEventListener('click', function () {
            const id = this.dataset.id;

            if (selected.includes(id)) {
                // Unselect
                selected = selected.filter(v => v !== id);
                this.classList.remove('bg-primary', 'text-white');
                this.classList.add('text-dark');
            } else {
                // Select
                selected.push(id);
                this.classList.add('bg-primary', 'text-white');
                this.classList.remove('text-dark');
            }

            // Update hidden inputs
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
