<?php

namespace App\Services;

use App\Models\Archivo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArchivoService
{
    /**
     * Get all files with user information.
     */
    public function getAllArchivos()
    {
        return Archivo::with('user')->orderBy('created', 'desc')->get();
    }

    /**
     * Handle the file upload and database record creation.
     */
    public function storeArchivo($file, $descripcionCorta, $descripcionLarga)
    {
        $originalName = $file->getClientOriginalName();
        $tempName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        
        // Store file in app/public/archivos
        $path = $file->storeAs('archivos', $tempName, 'public');

        return Archivo::create([
            'nombre' => $originalName,
            'nombre_temporal' => $tempName,
            'ruta' => $path,
            'tipo' => $file->getMimeType(),
            'tamano' => $file->getSize(),
            'descripcion_corta' => $descripcionCorta,
            'descripcion_larga' => $descripcionLarga,
            'descargas' => 0,
            'fk_user_id' => auth()->id(),
        ]);
    }

    /**
     * Delete file from storage and database.
     */
    public function deleteArchivo(Archivo $archivo)
    {
        // Delete physical file
        Storage::disk('public')->delete($archivo->ruta);
        
        // Delete database record
        return $archivo->delete();
    }

    /**
     * Increment download count for a file.
     */
    public function incrementDownloads(Archivo $archivo)
    {
        $archivo->increment('descargas');
        return $archivo;
    }
}
