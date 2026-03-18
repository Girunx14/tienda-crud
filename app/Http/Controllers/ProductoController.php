<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
{
    /**
     * INDEX — Muestra la lista de todos los productos.
     */
    public function index()
    {
        // Obtenemos los productos paginados de 10 en 10, ordenados por nombre
        $productos = Producto::orderBy('nombre')->paginate(10);

        return view('productos.index', compact('productos'));
    }

    /**
     * CREATE — Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * STORE — Guarda el nuevo producto en la base de datos.
     */
    public function store(StoreProductoRequest $request)
    {
        Producto::create($request->validated());

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * SHOW — Muestra los detalles de un producto específico.
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * EDIT — Muestra el formulario para editar un producto existente.
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * UPDATE — Actualiza el producto en la base de datos.
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $producto->update($request->validated());

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * DESTROY — Elimina un producto de la base de datos.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }
}