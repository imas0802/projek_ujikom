@extends('layouts.app')
@section('content')
        <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card shadow-lg border-0 rounded-4 mb-0">
                            <div class="card-body p-5">
                                <div class="text-center mb-4">
                                    <h2 class="fw-bold">Rosella</h2>
                                    <p class="text-muted mb-0">Silakan login untuk melanjutkan</p>
                                </div>

                                <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input id="email" type="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus placeholder="Masukkan email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <input id="password" type="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password"
                                            placeholder="Masukkan password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg w-100 fw-semibold">
                                        {{ __('Login') }}
                                    </button>
                                </form>

                                <!-- Bagian Register yang sudah diperbaiki -->
                                <div class="text-center mt-4">
                                    <p class="login-form__footer mb-0">
                                        Belum punya akun? 
                                        <a href="{{ route('register') }}" class="text-primary fw-semibold">
                                            Register di sini
                                        </a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection