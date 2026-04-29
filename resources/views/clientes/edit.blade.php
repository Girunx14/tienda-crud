{{-- resources/views/clientes/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

<div class="glass-card border-0 p-4">
                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="icon-shape bg-primary text-white rounded-3 d-flex align-items-center justify-content-center me-3"
                        style="width: 50px; height: 50px; background: var(--gradient-1) !important;">
                        <i class="bi bi-pencil-square fs-4"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 fw-bold">Editar Cliente</h4>
                        <small class="text-muted">Actualiza la información del cliente</small>
                    </div>
                </div>

                <div>
                <form action="{{ route('clientes.update', $cliente) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-bold">
                            Nombre <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control @error('nombre') is-invalid @enderror"
                               id="nombre" name="nombre"
                               value="{{ old('nombre', $cliente->nombre) }}"
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
                               value="{{ old('apellido_paterno', $cliente->apellido_paterno) }}"
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
                               value="{{ old('apellido_materno', $cliente->apellido_materno) }}"
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
                               value="{{ old('rfc', $cliente->rfc) }}"
                               placeholder="Ej: GALJ850101ABC"
                               maxlength="13"
                               style="text-transform: uppercase;">
                        @error('rfc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Botones --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-premium">
                            <i class="bi bi-save me-2"></i> Actualizar Cliente
                        </button>
                        <a href="{{ route('clientes.index') }}" class="btn btn-outline-dark rounded-3 px-4">
                            <i class="bi bi-arrow-left me-2"></i> Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection