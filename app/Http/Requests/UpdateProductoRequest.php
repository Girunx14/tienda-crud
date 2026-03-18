<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'    => ['required', 'string', 'max:255'],
            'cantidad'  => ['required', 'numeric', 'min:0'],
            'precio'    => ['required', 'numeric', 'min:0'],
            'categoria' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'    => 'El nombre del producto es obligatorio.',
            'cantidad.required'  => 'La cantidad es obligatoria.',
            'cantidad.numeric'   => 'La cantidad debe ser un número.',
            'cantidad.min'       => 'La cantidad no puede ser negativa.',
            'precio.required'    => 'El precio es obligatorio.',
            'precio.numeric'     => 'El precio debe ser un número.',
            'precio.min'         => 'El precio no puede ser negativo.',
            'categoria.required' => 'La categoría es obligatoria.',
        ];
    }
}