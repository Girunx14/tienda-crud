<?php
// app/Models/Cliente.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     * Lo definimos explícitamente porque Laravel asumiría "clientes" (plural)
     * pero nuestra tabla se llama "cliente" (singular).
     */
    protected $table = 'cliente';

    /**
     * Campos que se pueden asignar masivamente.
     * Esto protege contra ataques de Mass Assignment.
     */
    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'rfc',
    ];
}