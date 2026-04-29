<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Services\ClienteService;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class ClienteController extends Controller
{
    protected $clienteService;

    /**
     * Inject ClienteService.
     */
    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    /**
     * Display a listing of clientes.
     */
    public function index()
    {
        $clientes = $this->clienteService->getAllClientes();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show form for creating a new cliente.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created cliente.
     */
    public function store(StoreClienteRequest $request)
    {
        $this->clienteService->createCliente($request->validated());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Display the specified cliente.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show form for editing the specified cliente.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified cliente.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $this->clienteService->updateCliente($cliente, $request->validated());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified cliente.
     */
    public function destroy(Cliente $cliente)
    {
        $this->clienteService->deleteCliente($cliente);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente eliminado exitosamente.');
    }

    /**
     * Generate PDF report of all clientes.
     */
    public function report()
    {
        $clientes = $this->clienteService->getAllClientes();
        $fecha = now()->format('d/m/Y H:i');
        $totalClientes = $clientes->count();

        $pdf = Pdf::loadView('reports.clientes', compact('clientes', 'fecha', 'totalClientes'));
        return $pdf->download('reporte-clientes-' . now()->format('Y-m-d') . '.pdf');
    }
}