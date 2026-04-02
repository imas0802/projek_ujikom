@extends('layouts.frontend')
@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1>Selamat Datang di Sistem Informasi Geografis</h1>
                    <p>Akses informasi gedung, lantai, dan fasilitas sekolah dalam satu tempat</p>
                    <div class="d-flex">
                        <a href="#about" class="btn-get-started">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('frontend/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

        <div class="container" data-aos="zoom-in">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 120
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
            </div>

        </div>

    </section><!-- /Clients Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About Us</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('frontend/assets/img/sekul.jpg') }}" alt="About Image" class="img-fluid rounded">
                </div>
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <h2>Projek Sistem Informasi Geografis SMK Assalaam</h2>
                    <p>
                        Aplikasi Sistem Infromasi Geografis (SIG) ini dibuat sebagaibentuk digitalisasi data ruangan dan
                        fasilitas
                        di lingkungan SMK Assalaam Bandung. Tujuannya adalah untuk memudahkan pengguna dalam mencari
                        informasi
                        tentang lokasi,fasilitas,dan detail setiap ruangan secara interaktif dan efisien. Dengan menggunakan
                        teknologi berbasis Laravel, aplikasi ini menyediakan tampilan yang interaktif,informatif,dan mudah
                        digunakan
                        baik oleh siswa,guru,maupun pihak sekolah. Fitur utama daftar dan detail ruangan. Filter berdasarkan
                        gedung. Menampilkan fasilitas
                        per ruangan. visualisasi gambar ruangan dan denah sekolah.
                    </p>
                </div>

            </div>

        </div>

    </section><!-- /About Section -->

    {{-- <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-activity icon"></i></div>
              <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
              <h4><a href="" class="stretched-link">Sed ut perspici</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
              <h4><a href="" class="stretched-link">Magni Dolores</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-broadcast icon"></i></div>
              <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-product">Card</li>
            <li data-filter=".filter-branding">Web</li>
          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="{{ asset ('frontend/assets/img/portfolio/portfolio-portrait-1.webp')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset ('frontend/assets/img/portfolio/portfolio-portrait-1.webp')}}" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="{{ asset ('frontend/assets/img/portfolio/portfolio-1.webp')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset ('frontend/assets/img/portfolio/portfolio-1.webp')}}" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="{{ asset ('frontend/assets/img/portfolio/portfolio-3.webp')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset ('frontend/assets/img/portfolio/portfolio-3.webp')}}" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="{{ asset ('frontend/assets/img/portfolio/portfolio-4.webp')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset ('frontend/assets/img/portfolio/portfolio-4.webp')}}" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="{{ asset ('frontend/assets/img/portfolio/portfolio-portrait-2.webp')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset ('frontend/assets/img/portfolio/portfolio-portrait-2.webp')}}" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="{{ asset ('frontend/assets/img/portfolio/portfolio-portrait-3.webp')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset ('frontend/assets/img/portfolio/portfolio-portrait-3.webp')}}" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="{{ asset ('frontend/assets/img/portfolio/portfolio-7.webp')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset ('frontend/assets/img/portfolio/portfolio-7.webp')}}" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="{{ asset ('frontend/assets/img/portfolio/portfolio-8.webp')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 3</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset ('frontend/assets/img/portfolio/portfolio-8.webp')}}" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="{{ asset ('frontend/assets/img/portfolio/portfolio-9.webp')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 3</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset ('frontend/assets/img/portfolio/portfolio-9.webp')}}" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section --> --}}

    <!-- Recent Blog Postst Section -->
    <section id="recent-blog-postst" class="recent-blog-postst section light-background">
        <div class="container">
            <div class="row gy-5">

                @foreach ($ruangan as $data)
                    <div class="col-xl-4 col-md-6">

                        <a href="{{ route('frontend.detail', $data->slug) }}" class="text-decoration-none text-dark">

                            <div class="post-item h-100">

                                <div class="post-img overflow-hidden">
                                    <img src="{{ asset('storage/' . $data->gambar) }}" class="img-fluid"
                                        style="width:100%; height:400px; object-fit:cover; border-radius:10px;">
                                </div>

                                <div class="post-content d-flex flex-column">
                                    <h3 class="post-title">{{ $data->nama_ruangan }}</h3>
                                    <hr>
                                    <span class="readmore">
                                        Read More <i class="bi bi-arrow-right"></i>
                                    </span>
                                </div>

                            </div>

                        </a>

                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- /Recent Blog Postst Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Informasi & Kontak</h2>
            <p>Temukan informasi tentang SMK Assalaam serta hubungi kami untuk pertanyaan lebih lanjut.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-5">

                    <div class="info-wrap">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Address</h3>
                                <p>Jl. Situ Tarate Jl. Cibaduyut, Cangkuang Kulon, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa
                                    Barat 40265</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p> (022) 5420220</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>marketingassalaam@gmail.com</p>
                            </div>
                        </div><!-- End Info Item -->

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.3607277706346!2d107.59005787415578!3d-6.966702493033849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8deccecb6f1%3A0x658cc60fbe5017b9!2sSMK%20Assalaam%20Bandung!5e0!3m2!1sen!2sid!4v1770352914930!5m2!1sen!2sid"
                            width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-lg-7">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="accordion" id="faqAccordion">

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                        Kenapa harus memilih SMK Assalaam Bandung?
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        SMK Assalaam Bandung menawarkan pembelajaran berbasis praktik dengan fasilitas yang
                                        lengkap serta didukung oleh tenaga pengajar yang berpengalaman. Kami berkomitmen
                                        untuk mencetak siswa yang siap kerja dan memiliki keterampilan yang sesuai dengan
                                        kebutuhan industri.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#faq2">
                                        Apa perbedaan SMK Assalaam dengan SMK lainnya di Bandung?
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        Perbedaan utama SMK Assalaam terletak pada fokus pembelajaran praktik, fasilitas
                                        bengkel yang lengkap, serta pembinaan karakter siswa yang disiplin dan profesional.
                                        Kami juga memberikan pengalaman belajar yang lebih dekat dengan dunia kerja.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#faq3">
                                        Apakah lulusan SMK Assalaam siap kerja?
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        Ya, lulusan SMK Assalaam dipersiapkan untuk siap kerja melalui pembelajaran praktik,
                                        pelatihan keterampilan, serta pengalaman langsung di lapangan yang sesuai dengan
                                        bidang keahlian masing-masing.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#faq4">
                                        Apakah ada kegiatan selain belajar di kelas?
                                    </button>
                                </h2>
                                <div id="faq4" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        Tentu, siswa dapat mengikuti berbagai kegiatan ekstrakurikuler dan pengembangan diri
                                        yang bertujuan untuk meningkatkan kemampuan soft skill seperti kerja sama tim,
                                        kepemimpinan, dan kreativitas.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection
