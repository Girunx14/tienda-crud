<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Services\ArchivoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    protected $archivoService;

    /**
     * Inject the ArchivoService.
     */
    public function __construct(ArchivoService $archivoService)
    {
        $this->middleware('auth');
        $this->archivoService = $archivoService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $archivos = $this->archivoService->getAllArchivos();
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
            $this->archivoService->storeArchivo(
                $request->file('archivo'),
                $request->descripcion_corta,
                $request->descripcion_larga
            );

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
        $this->archivoService->deleteArchivo($archivo);

        return redirect()->route('archivos.index')->with('success', 'Archivo eliminado correctamente.');
    }

    /**
     * Download the specified file.
     */
    public function download(Archivo $archivo)
    {
        $this->archivoService->incrementDownloads($archivo);
        return Storage::disk('public')->download($archivo->ruta, $archivo->nombre);
    }
}
