<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Details Ruangan</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('frontend/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('frontend/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Feb 22 2025 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="blog-details-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="{{ asset('frontend/assets/img/logo.webp') }}" alt=""> -->
                <h1 class="sitename">SIG</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="recent-blog-postst">Blog</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
        </div>
    </header>

    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container">
                <h2 class="mb-4 fw-bold">
                    {{ $ruangan->nama_ruangan }}
                </h2>
            </div>
        </div><!-- End Page Title -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Details Section -->
                    <section id="blog-details" class="blog-details section">
                        <div class="container" data-aos="fade-up">
                            <article class="article">
                                <div class="hero-img" data-aos="zoom-in">
                                    @if ($ruangan->gambar)
                                        <div id="panorama-{{ $ruangan->id }}"
                                            style="width: 100%; max-width: 720px; height: 360px; margin: 0 auto;">
                                        </div>
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                pannellum.viewer('panorama-{{ $ruangan->id }}', {
                                                    type: 'equirectangular',
                                                    panorama: "{{ asset('storage/' . $ruangan->gambar) }}",
                                                    autoLoad: true,
                                                    autoRotate: -2,
                                                    showControls: true
                                                });
                                            });
                                        </script>
                                    @else
                                        <p class="text-muted">Foto ruangan belum tersedia</p>
                                    @endif
                                </div>

                                <div class="article-content" data-aos="fade-up" data-aos-delay="100">
                                    <div class="content-header">
                                        <div class="card mb-4 shadow-sm">
                                            <div class="card-body">
                                                <h5 class="mb-3">Detail Ruangan</h5>

                                                <table class="table table-sm">
                                                    <tr>
                                                        <th width="150">Kategori</th>
                                                        <td>: {{ $ruangan->kategori->nama ?? '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Lantai</th>
                                                        <td>: {{ $ruangan->lantai->nama_lantai ?? '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Fasilitas</th>
                                                        <td>:
                                                            @if ($ruangan->fasilitas->count())
                                                                {{ $ruangan->fasilitas->pluck('nama_fasilitas')->join(', ') }}
                                                            @else
                                                                -
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>

                                                <p class="mt-3">{{ $ruangan->deskripsi }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </article>

                        </div>
                    </section><!-- /Blog Details Section -->
                </div>
                <div class="col-lg-4 sidebar">
                    <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-md-7 p-3 flex-column justify-content-center">
                            @if ($ruangan->denah)
                                <div class="denah-wrapper text-center mb-4">
                                    <img src="{{ asset('storage/' . $ruangan->denah) }}" class="rounded border"
                                        alt="Denah Ruangan"
                                        style="
                                        width: 200%;
                                        max-width: 720px;
                                        height: 250px;
                                        object-fit: contain;
                                        background: #f8f9fa;
                                        padding: 10px;
                                      ">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center"><a href="{{ route('index') }}" class="btn btn-secondary mb-4">
                ← Kembali ke Beranda
            </a>
        </div>
    </main>


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
</body>

</html>
