<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArchivoController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $archivos = Archivo::with('user')->orderBy('created', 'desc')->get();
        return view('archivos.index', compact('archivos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file|max:10240', // 10MB limit
            'descripcion_corta' => 'nullable|string|max:150',
            'descripcion_larga' => 'nullable|string',
        ]);

        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $originalName = $file->getClientOriginalName();
            $tempName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            
            // Store file in app/public/archivos
            $path = $file->storeAs('archivos', $tempName, 'public');

            Archivo::create([
                'nombre' => $originalName,
                'nombre_temporal' => $tempName,
                'ruta' => $path,
                'tipo' => $file->getMimeType(),
                'tamano' => $file->getSize(),
                'descripcion_corta' => $request->descripcion_corta,
                'descripcion_larga' => $request->descripcion_larga,
                'descargas' => 0,
                'fk_user_id' => auth()->id(),
            ]);

            return redirect()->route('archivos.index')->with('success', 'Archivo subido correctamente.');
        }

        return back()->with('error', 'Error al subir el archivo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Archivo $archivo)
    {
        return view('archivos.show', compact('archivo'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archivo $archivo)
    {
        // Delete physical file
        Storage::disk('public')->delete($archivo->ruta);
        
        // Delete database record
        $archivo->delete();

        return redirect()->route('archivos.index')->with('success', 'Archivo eliminado correctamente.');
    }

    /**
     * Download the specified file.
     */
    public function download(Archivo $archivo)
    {
        $archivo->increment('descargas');
        return Storage::disk('public')->download($archivo->ruta, $archivo->nombre);
    }
}
