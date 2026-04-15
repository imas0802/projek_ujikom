<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Details Ruangan</title>

    <!-- CSS -->
    <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/main.css') }}" rel="stylesheet">
</head>

<body>

<main class="main">

    <!-- TITLE -->
    <div class="container mt-4">
        <h2 class="fw-bold">{{ $ruangan->nama_ruangan }}</h2>
    </div>

    <div class="container mt-3">
        <div class="row">

            <!-- KIRI -->
            <div class="col-lg-8">

                <!-- PANORAMA -->
                <div class="card p-3 mb-4">
                    @if ($ruangan->gambar)
                        <div id="panorama-{{ $ruangan->id }}"
                             style="width:100%; height:350px; border-radius:10px;">
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                pannellum.viewer('panorama-{{ $ruangan->id }}', {
                                    type: 'equirectangular',
                                    panorama: "{{ asset('storage/' . $ruangan->gambar) }}",
                                    autoLoad: true,
                                    autoRotate: -2
                                });
                            });
                        </script>
                    @else
                        <p class="text-center text-muted">Foto belum ada</p>
                    @endif
                </div>

                <!-- DETAIL -->
                <div class="card p-3">
                    <h5 class="fw-bold mb-3">Detail Ruangan</h5>

                    <!-- TOTAL -->
                    <span class="badge bg-success mb-3">
                        Total Fasilitas: {{ $ruangan->fasilitas->count() }}
                    </span>

                    <table class="table table-sm">
                        <tr>
                            <th width="150">Kategori</th>
                            <td>: {{ $ruangan->kategori->nama ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Lantai</th>
                            <td>: {{ $ruangan->lantai->nama_lantai ?? '-' }}</td>
                        </tr>

                        <!-- STATUS -->
                        <tr>
                            <th>Status</th>
                            <td>:
                                @if($ruangan->status == 'kosong')
                                    <span class="badge bg-success">Kosong</span>
                                @elseif($ruangan->status == 'dipakai')
                                    <span class="badge bg-danger">Dipakai</span>
                                @else
                                    <span class="badge bg-secondary">-</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Fasilitas</th>
                            <td>:
                                @if ($ruangan->fasilitas->count())
                                    @foreach ($ruangan->fasilitas as $fasilitas)
                                        <span class="badge bg-primary me-1 mb-1">
                                            {{ $fasilitas->nama_fasilitas }}
                                        </span>
                                    @endforeach
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                        </tr>
                    </table>

                    <p class="mt-3">{{ $ruangan->deskripsi }}</p>
                </div>

            </div>

            <!-- KANAN (DENAH + ZOOM) -->
            <div class="col-lg-4">
                @if ($ruangan->denah)
                    <a href="{{ asset('storage/' . $ruangan->denah) }}" class="glightbox">
                        <img src="{{ asset('storage/' . $ruangan->denah) }}"
                             class="img-fluid border rounded"
                             style="height:250px; object-fit:contain; cursor: zoom-in;">
                    </a>
                @endif
            </div>

        </div>

        <!-- BUTTON -->
        <div class="text-center mt-4">
            <a href="{{ route('index') }}" class="btn btn-secondary">
                ← Kembali
            </a>
        </div>
    </div>

</main>

<!-- JS -->
<script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>

<!-- INIT LIGHTBOX -->
<script>
    const lightbox = GLightbox({
        selector: '.glightbox'
    });
</script>

</body>
</html>