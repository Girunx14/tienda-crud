<?php
namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;

class ClienteController extends Controller
{
    /**
     * INDEX — Muestra la lista de todos los clientes.
     */
    public function index()
    {
        $clientes = Cliente::orderBy('nombre')->paginate(10);

        return view('clientes.index', compact('clientes'));
    }

    /**
     * CREATE — Muestra el formulario para crear un nuevo cliente.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * STORE — Guarda el nuevo cliente en la base de datos.
     * Recibe StoreClienteRequest que ya validó los datos automáticamente.
     */
    public function store(StoreClienteRequest $request)
    {
        // validated() retorna solo los campos que pasaron la validación
        Cliente::create($request->validated());

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * SHOW — Muestra los detalles de un cliente específico.
     */
    public function show(Cliente $cliente)
    {
        // Laravel resuelve automáticamente el modelo por su ID (Route Model Binding)
        return view('clientes.show', compact('cliente'));
    }

    /**
     * EDIT — Muestra el formulario para editar un cliente existente.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * UPDATE — Actualiza el cliente en la base de datos.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * DESTROY — Elimina un cliente de la base de datos.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente eliminado exitosamente.');
    }
}