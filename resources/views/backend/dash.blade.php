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
    <!-- #/ container -->
@endsection
