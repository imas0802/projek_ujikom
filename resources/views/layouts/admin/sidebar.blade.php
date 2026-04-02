<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">

            <li class="nav-label">Dashboard</li>
            <li>
                <a href="{{ url('/admin/dashboard') }}">
                    <i class="icon-speedometer menu-icon"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-label">Master Data</li>

            <li>
                <a href="{{ route('backend.kategori.index') }}">
                    <i class="icon-menu menu-icon"></i>
                    <span class="nav-text">Kategori</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.gedung.index') }}">
                    <i class="icon-home menu-icon"></i>
                    <span class="nav-text">Gedung</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.lantai.index') }}">
                    <i class="icon-layers menu-icon"></i>
                    <span class="nav-text">Lantai</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.ruangan.index') }}">
                    <i class="icon-grid menu-icon"></i>
                    <span class="nav-text">Ruangan</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.fasilitas.index') }}">
                    <i class="icon-wrench menu-icon"></i>
                    <span class="nav-text">Fasilitas</span>
                </a>
            </li>
        </ul>
    </div>
</div>
