<?php
// app/Models/Producto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     * Lo definimos explícitamente porque Laravel asumiría "productos" (plural)
     * pero nuestra tabla se llama "producto" (singular).
     */
    protected $table = 'producto';

    /**
     * Campos que se pueden asignar masivamente.
     */
    protected $fillable = [
        'nombre',
        'cantidad',
        'precio',
        'categoria',
    ];

    /**
     * Conversión automática de tipos.
     * Esto hace que "precio" siempre sea tratado como decimal en PHP.
     */
    protected $casts = [
        'precio' => 'decimal:2',
    ];
}