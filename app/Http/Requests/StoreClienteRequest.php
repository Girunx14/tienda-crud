<?php
// app/Http/Requests/StoreClienteRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    /**
     * Cualquier usuario autenticado puede hacer esta petición.
     * Retornamos true porque aún no tenemos sistema de autenticación.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación para CREAR un cliente.
     */
    public function rules(): array
    {
        return [
            'nombre'           => ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'apellido_materno' => ['required', 'string', 'max:255'],
            // unique:cliente = busca en tabla "cliente", columna "rfc"
            'rfc'              => ['required', 'string', 'max:13', 'unique:cliente,rfc'],
        ];
    }

    /**
     * Mensajes de error personalizados en español.
     */
    public function messages(): array
    {
        return [
            'nombre.required'           => 'El nombre es obligatorio.',
            'apellido_paterno.required' => 'El apellido paterno es obligatorio.',
            'apellido_materno.required' => 'El apellido materno es obligatorio.',
            'rfc.required'              => 'El RFC es obligatorio.',
            'rfc.unique'                => 'Este RFC ya está registrado.',
            'rfc.max'                   => 'El RFC no puede tener más de 13 caracteres.',
        ];
    }
}