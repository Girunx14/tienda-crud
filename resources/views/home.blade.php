@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 60vh;">
    <div class="col-md-8">
        <div class="glass-card border-0 p-5 text-center animate__animated animate__fadeInUp">
            <div class="d-inline-flex bg-primary bg-opacity-10 p-4 rounded-circle mb-4">
                <i class="bi bi-speedometer2 text-primary display-4"></i>
            </div>
            <h2 class="fw-bold mb-3">{{ __('Dashboard') }}</h2>
            <p class="text-muted mb-4">{{ __('You are logged in!') }}</p>

            @if (session('status'))
                <div class="alert alert-success border-0" role="alert" style="border-radius: 12px; background: #ecfdf5; color: #065f46;">
                    {{ session('status') }}
                </div>
            @endif

            <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                <a href="{{ route('clientes.index') }}" class="btn btn-premium">
                    <i class="bi bi-people me-2"></i> Clientes
                </a>
                <a href="{{ route('productos.index') }}" class="btn btn-premium-secondary">
                    <i class="bi bi-box-seam me-2"></i> Productos
                </a>
                <a href="{{ route('archivos.index') }}" class="btn btn-premium">
                    <i class="bi bi-file-earmark-arrow-up me-2"></i> Archivos
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
