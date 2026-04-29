<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Services\ProductoService;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductoController extends Controller
{
    protected $productoService;

    /**
     * Inject ProductoService.
     */
    public function __construct(ProductoService $productoService)
    {
        $this->productoService = $productoService;
    }

    /**
     * Display a listing of productos.
     */
    public function index()
    {
        $productos = $this->productoService->getAllProductos();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show form for creating a new producto.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created producto.
     */
    public function store(StoreProductoRequest $request)
    {
        $this->productoService->createProducto($request->validated());

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified producto.
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Show form for editing the specified producto.
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified producto.
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $this->productoService->updateProducto($producto, $request->validated());

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified producto.
     */
    public function destroy(Producto $producto)
    {
        $this->productoService->deleteProducto($producto);

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }

    /**
     * Generate PDF report of all productos.
     */
    public function report()
    {
        $productos = $this->productoService->getAllProductos();
        $fecha = now()->format('d/m/Y H:i');
        $totalProductos = $productos->count();
        $stockBajo = $productos->where('cantidad', '<', 5)->count();
        $valorTotal = $productos->sum(function($producto) {
            return $producto->precio * $producto->cantidad;
        });

        $pdf = Pdf::loadView('reports.productos', compact('productos', 'fecha', 'totalProductos', 'stockBajo', 'valorTotal'));
        return $pdf->download('reporte-productos-' . now()->format('Y-m-d') . '.pdf');
    }
}