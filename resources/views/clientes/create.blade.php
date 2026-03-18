{{-- resources/views/clientes/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Nuevo Cliente')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="bi bi-person-plus"></i> Nuevo Cliente
                </h4>
            </div>

            <div class="card-body">
                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf

                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-bold">
                            Nombre <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control @error('nombre') is-invalid @enderror"
                               id="nombre" name="nombre"
                               value="{{ old('nombre') }}"
                               placeholder="Ej: Juan">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Apellido Paterno --}}
                    <div class="mb-3">
                        <label for="apellido_paterno" class="form-label fw-bold">
                            Apellido Paterno <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control @error('apellido_paterno') is-invalid @enderror"
                               id="apellido_paterno" name="apellido_paterno"
                               value="{{ old('apellido_paterno') }}"
                               placeholder="Ej: García">
                        @error('apellido_paterno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Apellido Materno --}}
                    <div class="mb-3">
                        <label for="apellido_materno" class="form-label fw-bold">
                            Apellido Materno <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control @error('apellido_materno') is-invalid @enderror"
                               id="apellido_materno" name="apellido_materno"
                               value="{{ old('apellido_materno') }}"
                               placeholder="Ej: López">
                        @error('apellido_materno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- RFC --}}
                    <div class="mb-3">
                        <label for="rfc" class="form-label fw-bold">
                            RFC <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control @error('rfc') is-invalid @enderror"
                               id="rfc" name="rfc"
                               value="{{ old('rfc') }}"
                               placeholder="Ej: GALJ850101ABC"
                               maxlength="13"
                               style="text-transform: uppercase;">
                        @error('rfc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Botones --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Guardar Cliente
                        </button>
                        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection