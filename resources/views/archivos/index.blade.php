{{-- resources/views/archivos/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Gestión de Archivos')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h2 class="fw-bold mb-0">Centro de Documentos</h2>
        <p class="text-muted">Administra y visualiza la documentación del sistema.</p>
    </div>
<div class="col-md-6 text-md-end">
            <a href="{{ route('archivos.report') }}" class="btn btn-outline-dark rounded-pill px-4 me-2">
                <i class="bi bi-file-earmark-pdf me-2"></i> Reporte PDF
            </a>
            <button type="button" class="btn btn-premium d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#uploadModal">
                <i class="bi bi-cloud-arrow-up-fill fs-5 me-2"></i> Subir Nuevo Documento
            </button>
        </div>
</div>

<div class="glass-card border-0 p-4 mb-5">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Tipo</th>
                    <th>Tamaño</th>
                    <th>Subido por</th>
                    <th>Fecha</th>
                    <th class="text-center">Descargas</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($archivos as $archivo)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="file-icon-box me-3 rounded-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: rgba(99, 102, 241, 0.1); color: var(--primary-color);">
                                @php
                                    $icon = 'bi-file-earmark';
                                    if(Str::contains($archivo->tipo, 'pdf')) $icon = 'bi-file-earmark-pdf-fill text-danger';
                                    elseif(Str::contains($archivo->tipo, 'image')) $icon = 'bi-file-earmark-image-fill text-success';
                                    elseif(Str::contains($archivo->tipo, 'word')) $icon = 'bi-file-earmark-word-fill text-primary';
                                    elseif(Str::contains($archivo->tipo, 'excel')) $icon = 'bi-file-earmark-excel-fill text-success';
                                @endphp
                                <i class="bi {{ $icon }} fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">{{ $archivo->nombre }}</h6>
                                <small class="text-muted">{{ $archivo->descripcion_corta ?? 'Sin descripción' }}</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-light text-dark border rounded-pill small px-3">
                            {{ strtoupper(explode('/', $archivo->tipo)[1] ?? 'FILE') }}
                        </span>
                    </td>
                    <td class="text-muted small">
                        {{ number_format($archivo->tamano / 1024, 2) }} KB
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="avatar-xs bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 24px; height: 24px; font-size: 0.7rem;">
                                {{ strtoupper(substr($archivo->user->name, 0, 1)) }}
                            </div>
                            <span class="small">{{ $archivo->user->name }}</span>
                        </div>
                    </td>
                    <td class="text-muted small">
                        {{ \Carbon\Carbon::parse($archivo->created)->format('d/m/Y') }}
                    </td>
                    <td class="text-center">
                        <span class="fw-bold text-primary">{{ $archivo->descargas }}</span>
                    </td>
                    <td class="text-end">
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm rounded-3 shadow-sm border" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg" style="border-radius: 12px; font-size: 0.9rem;">
                                <li>
                                    <a class="dropdown-item py-2" href="{{ route('archivos.show', $archivo) }}">
                                        <i class="bi bi-eye me-2 text-primary"></i> Visualizar
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2" href="{{ route('archivos.download', $archivo) }}">
                                        <i class="bi bi-download me-2 text-success"></i> Descargar
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('archivos.destroy', $archivo) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este archivo?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="dropdown-item py-2 text-danger">
                                            <i class="bi bi-trash me-2"></i> Eliminar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <div class="mb-3">
                            <i class="bi bi-folder2-open display-1 text-muted opacity-25"></i>
                        </div>
                        <h5 class="text-muted">No hay archivos registrados</h5>
                        <p class="text-muted small">Sube tu primer documento usando el botón superior.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Subir Archivo Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 24px;">
            <div class="modal-header border-0 pb-0">
                <h5 class="fw-bold ms-2 mt-2">Subir Documento</h5>
                <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Seleccionar Archivo</label>
                        <div class="upload-drop-zone border-2 border-dashed rounded-4 p-4 text-center" id="dropZone" style="border-color: #cbd5e1; background: #f8fafc; transition: all 0.3s ease;">
                            <i class="bi bi-cloud-upload display-4 text-primary opacity-50"></i>
                            <p class="mt-2 text-muted small">Arrastra y suelta o haz clic para buscar</p>
                            <input type="file" name="archivo" class="form-control" id="fileInput" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-uppercase text-muted">Descripción Corta</label>
                        <input type="text" name="descripcion_corta" class="form-control rounded-3" placeholder="Ej. Factura Marzo 2024">
                    </div>
                    <div class="mb-0">
                        <label class="form-label fw-bold small text-uppercase text-muted">Descripción Larga (Opcional)</label>
                        <textarea name="descripcion_larga" class="form-control rounded-3" rows="3" placeholder="Detalles adicionales sobre el documento..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-premium">Iniciar Carga</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
