<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $table = 'archivos';

    // Specify custom column names for timestamps
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';

    protected $fillable = [
        'nombre',
        'nombre_temporal',
        'ruta',
        'tipo',
        'tamano',
        'descripcion_corta',
        'descripcion_larga',
        'descargas',
        'fk_user_id',
    ];

    /**
     * Get the user that owns the file.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_id');
    }
}
