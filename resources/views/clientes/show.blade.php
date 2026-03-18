{{-- resources/views/clientes/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detalle del Cliente')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">
                    <i class="bi bi-person-lines-fill"></i> Detalle del Cliente
                </h4>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%" class="bg-light">ID</th>
                        <td>{{ $cliente->id }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Nombre</th>
                        <td>{{ $cliente->nombre }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Apellido Paterno</th>
                        <td>{{ $cliente->apellido_paterno }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Apellido Materno</th>
                        <td>{{ $cliente->apellido_materno }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">RFC</th>
                        <td><span class="badge bg-secondary fs-6">{{ $cliente->rfc }}</span></td>
                    </tr>
                    <tr>
                        <th class="bg-light">Registrado el</th>
                        <td>{{ $cliente->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Última actualización</th>
                        <td>{{ $cliente->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
            </div>

            <div class="card-footer d-flex gap-2">
                <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Editar
                </a>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>
        </div>

    </div>
</div>
@endsection