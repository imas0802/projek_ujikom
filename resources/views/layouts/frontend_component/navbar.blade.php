<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="container-fluid container-xl d-flex align-items-center">

    <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
      <h1 class="sitename">SIG</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#recent-blog-postst">Blog</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
    <a class="btn-getstarted" href="{{ route('login') }}">
      Login
    </a>
  </div>
</header>
