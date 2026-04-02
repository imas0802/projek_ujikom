@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">{{ $totalFasilitas }} FASILITAS </h3>
                    <div class="d-inline-block">
                        <p class="text-white mb-0">Total {{ $totalFasilitas }} fasilitas di SMK ASSALAAM BANDUNG</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">{{ $totalRuangan }} RUANGAN</h3>
                    <div class="d-inline-block">
                        <p class="text-white mb-0">Total {{ $totalRuangan }} ruangan di SMK ASSALAAM BANDUNG</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">{{ $totalGedung }} GEDUNG</h3>
                    <div class="d-inline-block">
                        <p class="text-white mb-0">Total {{ $totalGedung }} gedung di SMK ASSALAAM BANDUNG</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">{{ $totalKategori }} KATEGORI</h3>
                    <div class="d-inline-block">
                        <p class="text-white mb-0">Total {{ $totalKategori }} kategori di SMK ASSALAAM BANDUNG</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        Status Penggunaan Ruangan
                    </h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ruangan</th>
                                    <th>Gedung</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ruangan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_ruangan }}</td>
                                        <td>{{ $item->lantai->gedung->nama_gedung ?? '-' }}</td>
                                        <td>
                                            @if ($item->status === 'dipakai')
                                                <span class="badge badge-danger px-3 py-2">
                                                    Dipakai
                                                </span>
                                            @else
                                                <span class="badge badge-success px-3 py-2">
                                                    Kosong
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">
                                            Belum ada data ruangan
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
@endsection