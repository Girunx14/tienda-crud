{{-- resources/views/clientes/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-people"></i> Clientes</h2>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nuevo Cliente
    </a>
</div>

{{-- Tabla de clientes --}}
@if($clientes->isEmpty())
    <div class="alert alert-info">
        <i class="bi bi-info-circle"></i> No hay clientes registrados aún.
        <a href="{{ route('clientes.create') }}">¡Registra el primero!</a>
    </div>
@else
    <div class="table-responsive">
        <table class="table table-striped table-hover shadow-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>RFC</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido_paterno }}</td>
                    <td>{{ $cliente->apellido_materno }}</td>
                    <td><span class="badge bg-secondary">{{ $cliente->rfc }}</span></td>
                    <td class="text-center">
                        {{-- Ver --}}
                        <a href="{{ route('clientes.show', $cliente) }}"
                           class="btn btn-sm btn-info btn-action" title="Ver">
                            <i class="bi bi-eye"></i>
                        </a>

                        {{-- Editar --}}
                        <a href="{{ route('clientes.edit', $cliente) }}"
                           class="btn btn-sm btn-warning btn-action" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>

                        {{-- Eliminar --}}
                        <form action="{{ route('clientes.destroy', $cliente) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirmarEliminar(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-sm btn-danger btn-action"
                                    title="Eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Paginación --}}
    <div class="d-flex justify-content-center">
        {{ $clientes->links() }}
    </div>
@endif
@endsection

{{-- Script de confirmación de eliminación --}}
@push('scripts')
<script>
    function confirmarEliminar(e) {
        e.preventDefault();
        if (confirm('¿Estás seguro de que deseas eliminar este cliente? Esta acción no se puede deshacer.')) {
            e.target.submit();
        }
        return false;
    }
</script>
@endpush