{{-- resources/views/archivos/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Visualizar: ' . $archivo->nombre)

@section('content')
<div class="row mb-4 animate__animated animate__fadeIn">
    <div class="col-md-8">
        <a href="{{ route('archivos.index') }}" class="btn btn-light rounded-pill border shadow-sm mb-3">
            <i class="bi bi-arrow-left me-2"></i> Volver al listado
        </a>
        <h2 class="fw-bold mb-1">{{ $archivo->nombre }}</h2>
        <p class="text-muted small">{{ $archivo->descripcion_corta ?? 'Sin descripción corta' }}</p>
    </div>
    <div class="col-md-4 text-md-end pt-4">
        <a href="{{ route('archivos.download', $archivo) }}" class="btn btn-premium d-inline-flex align-items-center">
            <i class="bi bi-download me-2"></i> Descargar Documento
        </a>
    </div>
</div>

<div class="row g-4 animate__animated animate__fadeInUp">
    {{-- Previsualización --}}
    <div class="col-lg-8">
        <div class="glass-card p-2 border-0 shadow-lg mb-4 overflow-hidden" style="min-height: 600px; background: #334155;">
            @php
                $isImage = Str::startsWith($archivo->tipo, 'image/');
                $isPdf = Str::contains($archivo->tipo, 'pdf');
                $fileUrl = asset('storage/' . $archivo->ruta);
            @endphp

            @if($isImage)
                <div class="d-flex align-items-center justify-content-center h-100 p-4">
                    <img src="{{ $fileUrl }}" alt="{{ $archivo->nombre }}" class="img-fluid rounded-3 shadow">
                </div>
            @elseif($isPdf)
                <iframe src="{{ $fileUrl }}#toolbar=0" width="100%" height="700px" style="border: none; border-radius: 12px;"></iframe>
            @else
                <div class="d-flex flex-column align-items-center justify-content-center h-100 p-5 text-white text-center">
                    <i class="bi bi-file-earmark-lock display-1 opacity-25 mb-4"></i>
                    <h4>Vista previa no disponible</h4>
                    <p class="opacity-75">El formato de este archivo ({{ $archivo->tipo }}) no admite previsualización directa en el navegador.</p>
                    <a href="{{ route('archivos.download', $archivo) }}" class="btn btn-outline-light rounded-pill mt-3 px-4">
                        Descargar para ver localmente
                    </a>
                </div>
            @endif
        </div>
    </div>

    {{-- Detalles Laterales --}}
    <div class="col-lg-4">
        <div class="glass-card p-4 border-0 mb-4">
            <h5 class="fw-bold mb-4 border-bottom pb-2">Detalles del Archivo</h5>
            
            <div class="mb-3">
                <small class="text-muted d-block text-uppercase fw-bold letter-spacing-1" style="font-size: 0.7rem;">Tamaño</small>
                <span class="fw-semibold">{{ number_format($archivo->tamano / 1024, 2) }} KB</span>
            </div>

            <div class="mb-3">
                <small class="text-muted d-block text-uppercase fw-bold letter-spacing-1" style="font-size: 0.7rem;">Tipo de MIME</small>
                <code class="bg-light p-1 rounded small">{{ $archivo->tipo }}</code>
            </div>

            <div class="mb-3">
                <small class="text-muted d-block text-uppercase fw-bold letter-spacing-1" style="font-size: 0.7rem;">Subido por</small>
                <div class="d-flex align-items-center mt-1">
                    <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px; font-size: 0.8rem;">
                        {{ strtoupper(substr($archivo->user->name, 0, 1)) }}
                    </div>
                    <span class="fw-semibold">{{ $archivo->user->name }}</span>
                </div>
            </div>

            <div class="mb-3">
                <small class="text-muted d-block text-uppercase fw-bold letter-spacing-1" style="font-size: 0.7rem;">Fecha de Registro</small>
                <span class="fw-semibold">{{ \Carbon\Carbon::parse($archivo->created)->format('l, d F Y') }}</span>
            </div>

            <div class="mb-0">
                <small class="text-muted d-block text-uppercase fw-bold letter-spacing-1" style="font-size: 0.7rem;">Métricas</small>
                <div class="mt-2 p-3 rounded-4" style="background: rgba(99, 102, 241, 0.05);">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="small text-muted"><i class="bi bi-download me-1"></i> Descargas totales</span>
                        <span class="h4 mb-0 fw-bold text-primary">{{ $archivo->descargas }}</span>
                    </div>
                </div>
            </div>
        </div>

        @if($archivo->descripcion_larga)
        <div class="glass-card p-4 border-0">
            <h5 class="fw-bold mb-3 border-bottom pb-2">Descripción Completa</h5>
            <p class="text-muted small mb-0" style="white-space: pre-line;">
                {{ $archivo->descripcion_larga }}
            </p>
        </div>
        @endif
    </div>
</div>
@endsection

@push('css')
<style>
    .letter-spacing-1 { letter-spacing: 1px; }
</style>
@endpush
