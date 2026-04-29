{{-- resources/views/clientes/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Directorio de Clientes')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h2 class="fw-bold mb-0">Base de Clientes</h2>
        <p class="text-muted small">Gestión centralizada de perfiles y facturación.</p>
    </div>
<div class="col-md-6 text-md-end">
            <a href="{{ route('clientes.report') }}" class="btn btn-outline-dark rounded-pill px-4 me-2">
                <i class="bi bi-file-earmark-pdf me-2"></i> Reporte PDF
            </a>
            <a href="{{ route('clientes.create') }}" class="btn btn-premium d-inline-flex align-items-center">
                <i class="bi bi-person-plus-fill me-2 fs-5"></i> Nuevo Registro
            </a>
        </div>
</div>

<div class="glass-card border-0 p-4 mb-5">
    @if($clientes->isEmpty())
        <div class="text-center py-5">
            <i class="bi bi-people display-1 text-muted opacity-25"></i>
            <h5 class="text-muted mt-3">No hay clientes registrados</h5>
            <a href="{{ route('clientes.create') }}" class="btn btn-link">Crear el primer registro</a>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>RFC / Identificación</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-md bg-soft-primary text-primary rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background: rgba(99, 102, 241, 0.1);">
                                    <i class="bi bi-person-fill fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">{{ $cliente->nombre }}</h6>
                                    <span class="text-muted small">{{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-light text-dark border px-3 py-2 fw-semibold" style="letter-spacing: 0.5px;">
                                {{ $cliente->rfc }}
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-light btn-sm rounded-3 border" title="Ver Perfil">
                                    <i class="bi bi-person-vcard text-primary"></i>
                                </a>
                                <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-light btn-sm rounded-3 border" title="Editar">
                                    <i class="bi bi-pencil-square text-warning"></i>
                                </a>
                                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" onsubmit="return confirm('¿Eliminar registro de cliente?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-light btn-sm rounded-3 border" title="Eliminar">
                                        <i class="bi bi-trash text-danger"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $clientes->links() }}
        </div>
    @endif
</div>
@endsection