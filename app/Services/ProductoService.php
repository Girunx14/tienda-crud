<?php

namespace App\Services;

use App\Models\Producto;

class ProductoService
{
    /**
     * Get all products with pagination.
     */
    public function getAllProductos($paginate = 10)
    {
        return Producto::orderBy('nombre')->paginate($paginate);
    }

    /**
     * Create a new product.
     */
    public function createProducto(array $data)
    {
        return Producto::create($data);
    }

    /**
     * Update an existing product.
     */
    public function updateProducto(Producto $producto, array $data)
    {
        return $producto->update($data);
    }

    /**
     * Delete a product record.
     */
    public function deleteProducto(Producto $producto)
    {
        return $producto->delete();
    }
}
