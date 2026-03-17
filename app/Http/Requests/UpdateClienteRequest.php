<?php
// app/Http/Requests/UpdateClienteRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación para ACTUALIZAR un cliente.
     * El RFC sigue siendo único EXCEPTO para el registro actual
     * (ignore evita que falle al compararse consigo mismo).
     */
    public function rules(): array
    {
        return [
            'nombre'           => ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'apellido_materno' => ['required', 'string', 'max:255'],
            // ignore:{id} = ignora el registro actual al validar unicidad
            'rfc'              => [
                'required',
                'string',
                'max:13',
                'unique:cliente,rfc,' . $this->route('cliente'),
            ],
        ];
    }

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