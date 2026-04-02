<!-- Nav Header -->
<div class="nav-header">
    <div class="brand-logo">
        <a href="{{ url('/admin/dashboard') }}">
            <b class="logo-abbr">
                <img src="{{ asset('admin/assets/images/logo.png') }}" alt="logo">
            </b>
            <span class="brand-title">
                <img src="{{ asset('admin/assets/images/logo-text.png') }}" alt="logo-text">
            </span>
        </a>
    </div>
</div>

<!-- Header -->
<div class="header">
    <div class="header-content clearfix">

        <!-- Hamburger -->
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>

        <!-- User Profile -->
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                    <div class="user-img c-pointer" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="{{ asset('admin/assets/images/user/1.png') }}" width="40" alt="user">
                    </div>

                    <div class="dropdown-menu dropdown-profile animated fadeIn">
                        <ul class="dropdown-content-body">
                            <li>
                                <a href="#"><i class="icon-user"></i> Profile</a>
                            </li>
                            <hr>
                            <li>
                                <a href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="icon-key"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>

                </li>
            </ul>
        </div>

    </div>
</div>
