{{-- resources/views/clientes/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detalle del Cliente')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="glass-card border-0 p-4">
            <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                <div class="icon-shape bg-primary text-white rounded-3 d-flex align-items-center justify-content-center me-3"
                    style="width: 50px; height: 50px; background: var(--gradient-1) !important;">
                    <i class="bi bi-person-lines-fill fs-4"></i>
                </div>
                <div>
                    <h4 class="mb-0 fw-bold">Detalle del Cliente</h4>
                    <small class="text-muted">Información completa del cliente</small>
                </div>
            </div>

            <div>
                <table class="table">
                    <tr>
                        <th width="30%" class="text-muted fw-semibold">ID</th>
                        <td class="fw-bold">{{ $cliente->id }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted fw-semibold">Nombre</th>
                        <td>{{ $cliente->nombre }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted fw-semibold">Apellido Paterno</th>
                        <td>{{ $cliente->apellido_paterno }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted fw-semibold">Apellido Materno</th>
                        <td>{{ $cliente->apellido_materno }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted fw-semibold">RFC</th>
                        <td><span class="badge-premium" style="background: rgba(99, 102, 241, 0.1); color: #6366f1;">{{ $cliente->rfc }}</span></td>
                    </tr>
                    <tr>
                        <th class="text-muted fw-semibold">Registrado el</th>
                        <td>{{ $cliente->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted fw-semibold">Última actualización</th>
                        <td>{{ $cliente->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
            </div>

            <div class="d-flex gap-2 pt-3 border-top">
                <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-premium">
                    <i class="bi bi-pencil me-2"></i> Editar
                </a>
                <a href="{{ route('clientes.index') }}" class="btn btn-outline-dark rounded-3 px-4">
                    <i class="bi bi-arrow-left me-2"></i> Volver
                </a>
            </div>
        </div>

    </div>
</div>
@endsection