@extends('layouts.app')

@section('content')
<div class="container h-100">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-xl-6 col-lg-7 col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">

                    <!-- Header -->
                    <div class="text-center mb-5">
                        <h2 class="fw-bold text-primary">Rosella</h2>
                        <p class="text-muted mb-0">Buat akun baru untuk melanjutkan</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                            <input id="name" type="text" 
                                   class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                   placeholder="Masukkan nama lengkap">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Alamat Email</label>
                            <input id="email" type="email" 
                                   class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                   placeholder="Masukkan email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input id="password" type="password" 
                                   class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="new-password"
                                   placeholder="Buat password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-4">
                            <label for="password-confirm" class="form-label fw-semibold">Konfirmasi Password</label>
                            <input id="password-confirm" type="password" 
                                   class="form-control form-control-lg" 
                                   name="password_confirmation" required autocomplete="new-password"
                                   placeholder="Ulangi password">
                        </div>

                        <!-- Tombol Register -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg fw-semibold py-3">
                                Daftar Sekarang
                            </button>
                        </div>
                    </form>

                    <!-- Link ke Login -->
                    <div class="text-center mt-4">
                        <p class="mb-0">
                            Sudah punya akun? 
                            <a href="{{ route('login') }}" class="text-primary fw-semibold">
                                Login di sini
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection