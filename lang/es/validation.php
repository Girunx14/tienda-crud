<?php

return [
    'required' => 'El campo :attribute es obligatorio.',
    'string'   => 'El campo :attribute debe ser una cadena de texto.',
    'max'      => [
        'string' => 'El campo :attribute no debe ser mayor a :max caracteres.',
    ],
    'min' => [
        'numeric' => 'El campo :attribute debe ser al menos :min.',
    ],
    'unique'  => 'El :attribute ya ha sido registrado.',
    'numeric' => 'El campo :attribute debe ser un número.',

    'attributes' => [
        'nombre'           => 'nombre',
        'apellido_paterno' => 'apellido paterno',
        'apellido_materno' => 'apellido materno',
        'rfc'              => 'RFC',
        'cantidad'         => 'cantidad',
        'precio'           => 'precio',
        'categoria'        => 'categoría',
    ],
];