{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5">
        <div class="glass-card border-0 p-5 shadow-lg animate__animated animate__zoomIn">
            <div class="text-center mb-5">
                <div class="d-inline-flex bg-primary bg-opacity-10 p-3 rounded-circle mb-3">
                    <i class="bi bi-shield-lock-fill text-primary display-6"></i>
                </div>
                <h3 class="fw-bold">Bienvenido de nuevo</h3>
                <p class="text-muted small">Ingresa tus credenciales para acceder al sistema</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="form-label fw-bold small text-muted text-uppercase mb-2">Correo Electrónico</label>
                    <div class="input-group border rounded-3 p-1 bg-white">
                        <span class="input-group-text border-0 bg-transparent text-muted"><i class="bi bi-envelope"></i></span>
                        <input id="email" type="email" class="form-control border-0 shadow-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="usuario@empresa.com">
                    </div>
                    @error('email')
                        <span class="text-danger x-small mt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-bold small text-muted text-uppercase mb-2">Contraseña</label>
                    <div class="input-group border rounded-3 p-1 bg-white">
                        <span class="input-group-text border-0 bg-transparent text-muted"><i class="bi bi-key"></i></span>
                        <input id="password" type="password" class="form-control border-0 shadow-none @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
                    </div>
                    @error('password')
                        <span class="text-danger x-small mt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label small text-muted" for="remember">
                            Recordarme
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="text-primary small text-decoration-none fw-bold" href="{{ route('password.request') }}">
                            ¿Olvidaste tu clave?
                        </a>
                    @endif
                </div>

                <div class="mb-0">
                    <button type="submit" class="btn btn-premium w-100 py-3 rounded-3 mb-3">
                        Entrar al Sistema <i class="bi bi-arrow-right ms-2"></i>
                    </button>
                    
                    @if (Route::has('register'))
                        <p class="text-center text-muted small mb-0">
                            ¿No tienes cuenta? <a href="{{ route('register') }}" class="text-primary fw-bold text-decoration-none">Regístrate gratis</a>
                        </p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
