<?php

namespace App\Services;

use App\Models\Cliente;

class ClienteService
{
    /**
     * Get all clients with pagination.
     */
    public function getAllClientes($paginate = 10)
    {
        return Cliente::orderBy('nombre')->paginate($paginate);
    }

    /**
     * Create a new client.
     */
    public function createCliente(array $data)
    {
        return Cliente::create($data);
    }

    /**
     * Update an existing client.
     */
    public function updateCliente(Cliente $cliente, array $data)
    {
        return $cliente->update($data);
    }

    /**
     * Delete a client record.
     */
    public function deleteCliente(Cliente $cliente)
    {
        return $cliente->delete();
    }
}
