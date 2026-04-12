<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/assets/images/favicon.png') }}">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/pg-calendar/css/pignose.calendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <style>
    /* ===== GLOBAL BACKGROUND ===== */
    body {
        background: linear-gradient(135deg, #eef2ff, #dbeafe);
        min-height: 100vh;
    }

    /* ===== CARD ===== */
    .card-clean {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        border: none;
    }

    .card-header-clean {
        background: transparent;
        border-bottom: 1px solid #eee;
        font-weight: 600;
    }

    /* ===== BUTTON ===== */
    .btn-main {
        background: #4D96FF;
        color: white;
        border-radius: 10px;
        border: none;
        padding: 6px 14px;
    }

    .btn-main:hover {
        background: #3a7be0;
    }

    /* ===== TABLE ===== */
    .table-clean thead {
        background: #f8f9ff;
        color: #666;
    }

    .table-clean tbody tr:hover {
        background: #f5f8ff;
    }

    /* ===== ACTION BUTTON ===== */
    .btn-sm {
        border-radius: 8px;
        font-size: 12px;
    }
</style>
</head>

<body>

<!-- Preloader -->
<div id="preloader">
     <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"/>
        </svg>
    </div>
</div>

<!-- Main Wrapper -->
<div id="main-wrapper">

    {{-- Navbar --}}
    @include('layouts.admin.navbar')

    {{-- Sidebar --}}
    @include('layouts.admin.sidebar')

    <!-- Content -->
    <div class="content-body">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('admin/assets/plugins/common/common.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/settings.js') }}"></script>
<script src="{{ asset('admin/assets/js/gleek.js') }}"></script>
<script src="{{ asset('admin/assets/js/styleSwitcher.js') }}"></script>

<!-- Plugin JS -->
<script src="{{ asset('admin/assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>

@stack('scripts')
@include('sweetalert::alert')
</body>
</html>
