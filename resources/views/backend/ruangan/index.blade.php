@extends('layouts.backend')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-secondary">
                        Data Ruangan
                        <a href="{{ route('backend.ruangan.create') }}" class="btn btn-info btn-sm"
                            style="color:white; float: right;">
                            Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle w-100" id="dataRuangan">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Ruangan</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Fasilitas</th>
                                        <th>Gambar</th>
                                        <th>Denah</th>
                                        <th>Lantai</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ruangan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_ruangan }}</td>
                                            <td>{{ $item->kategori->nama ?? '-' }}</td>
                                            <td>{{ Str::limit($item->deskripsi, 30) }}</td>
                                            <td>
                                                @if ($item->fasilitas->count())
                                                    <ul class="mb-0 ps-3">
                                                        @foreach ($item->fasilitas as $fas)
                                                            <li>{{ $fas->nama_fasilitas }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->gambar)
                                                    <img src="{{ asset('storage/' . $item->gambar) }}" class="img-thumbnail"
                                                        style="width:120px; height:80px; object-fit:cover;">
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>

                                            {{-- DENAH --}}
                                            <td class="text-center">
                                                @if ($item->denah)
                                                    <img src="{{ asset('storage/' . $item->denah) }}" class="img-thumbnail"
                                                        style="width:80px; height:80px; object-fit:contain;">
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {{ $item->lantai->nama_lantai ?? '-' }}
                                            </td>

                                            <td>
                                                <form action="{{ route('backend.ruangan.updateStatus', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')

                                                    <select name="status" class="form-select form-select-sm"
                                                        onchange="this.form.submit()">

                                                        <option value="kosong"
                                                            {{ $item->status == 'kosong' ? 'selected' : '' }}>
                                                            Kosong
                                                        </option>

                                                        <option value="dipakai"
                                                            {{ $item->status == 'dipakai' ? 'selected' : '' }}>
                                                            Dipakai
                                                        </option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('backend.ruangan.edit', $item->id) }}"
                                                    class="btn btn-sm btn-success mb-1">
                                                    Edit
                                                </a>
                                                <a href="{{ route('backend.ruangan.show', $item->id) }}"
                                                    class="btn btn-sm btn-warning mb-1">
                                                    Show
                                                </a>
                                                <form action="{{ route('backend.ruangan.destroy', $item->id) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Yakin ingin menghapus?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataRuangan').DataTable({
                scrollX: true,
                autoWidth: false,
                ordering: false
            });
        });
    </script>
@endpush
