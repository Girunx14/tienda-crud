@extends('layouts.app')

@section('title', 'Crear Cuenta')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5">
        <div class="glass-card border-0 p-5 shadow-lg animate__animated animate__zoomIn">
            <div class="text-center mb-5">
                <div class="d-inline-flex bg-primary bg-opacity-10 p-3 rounded-circle mb-3">
                    <i class="bi bi-person-plus-fill text-primary display-6"></i>
                </div>
                <h3 class="fw-bold">Crear Cuenta</h3>
                <p class="text-muted small">Regístrate para acceder al sistema</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="form-label fw-bold small text-muted text-uppercase mb-2">Nombre Completo</label>
                    <div class="input-group border rounded-3 p-1 bg-white">
                        <span class="input-group-text border-0 bg-transparent text-muted"><i class="bi bi-person"></i></span>
                        <input id="name" type="text" class="form-control border-0 shadow-none @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Tu nombre">
                    </div>
                    @error('name')
                        <span class="text-danger x-small mt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label fw-bold small text-muted text-uppercase mb-2">Correo Electrónico</label>
                    <div class="input-group border rounded-3 p-1 bg-white">
                        <span class="input-group-text border-0 bg-transparent text-muted"><i class="bi bi-envelope"></i></span>
                        <input id="email" type="email" class="form-control border-0 shadow-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="usuario@empresa.com">
                    </div>
                    @error('email')
                        <span class="text-danger x-small mt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-bold small text-muted text-uppercase mb-2">Contraseña</label>
                    <div class="input-group border rounded-3 p-1 bg-white">
                        <span class="input-group-text border-0 bg-transparent text-muted"><i class="bi bi-key"></i></span>
                        <input id="password" type="password" class="form-control border-0 shadow-none @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="••••••••">
                    </div>
                    @error('password')
                        <span class="text-danger x-small mt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="form-label fw-bold small text-muted text-uppercase mb-2">Confirmar Contraseña</label>
                    <div class="input-group border rounded-3 p-1 bg-white">
                        <span class="input-group-text border-0 bg-transparent text-muted"><i class="bi bi-key-fill"></i></span>
                        <input id="password-confirm" type="password" class="form-control border-0 shadow-none" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
                    </div>
                </div>

                <div class="mb-0">
                    <button type="submit" class="btn btn-premium w-100 py-3 rounded-3 mb-3">
                        Crear Cuenta <i class="bi bi-arrow-right ms-2"></i>
                    </button>

                    <p class="text-center text-muted small mb-0">
                        ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none">Inicia sesión</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
