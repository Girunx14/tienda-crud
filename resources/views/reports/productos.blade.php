<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Productos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
            line-height: 1.5;
            color: #1e293b;
        }
        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 3px solid #1e293b;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 5px;
        }
        .header p {
            color: #64748b;
            font-size: 11px;
        }
        .summary {
            background: #f8fafc;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            border-left: 4px solid #1e293b;
        }
        .summary h3 {
            font-size: 14px;
            margin-bottom: 10px;
            color: #1e293b;
        }
        .summary-grid {
            display: table;
            width: 100%;
        }
        .summary-item {
            display: inline-block;
            width: 22%;
            margin-right: 3%;
            margin-bottom: 10px;
        }
        .summary-item strong {
            display: block;
            font-size: 18px;
            color: #1e293b;
        }
        .summary-item span {
            color: #64748b;
            font-size: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        thead {
            background: #1e293b;
            color: white;
        }
        th {
            padding: 12px 8px;
            text-align: left;
            font-weight: 600;
            font-size: 11px;
            text-transform: uppercase;
        }
        th.text-right {
            text-align: right;
        }
        td {
            padding: 10px 8px;
            border-bottom: 1px solid #e2e8f0;
        }
        td.text-right {
            text-align: right;
        }
        tr:nth-child(even) {
            background: #f8fafc;
        }
        .stock-bajo {
            color: #dc2626;
            font-weight: bold;
        }
        .categoria {
            background: rgba(99, 102, 241, 0.1);
            color: #6366f1;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 600;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 10px;
            color: #64748b;
            padding: 10px 0;
            border-top: 1px solid #e2e8f0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Reporte de Productos</h1>
        <p>Generado el {{ $fecha }} | Sistema de Gestion</p>
    </div>

    <div class="summary">
        <h3>Resumen del Inventario</h3>
        <div class="summary-grid">
            <div class="summary-item">
                <strong>{{ $totalProductos }}</strong>
                <span>Total de Productos</span>
            </div>
            <div class="summary-item">
                <strong>{{ $stockBajo }}</strong>
                <span>Stock Bajo (< 5)</span>
            </div>
            <div class="summary-item">
                <strong>${{ number_format($valorTotal, 2) }}</strong>
                <span>Valor Total del Inventario</span>
            </div>
            <div class="summary-item">
                <strong>{{ $fecha }}</strong>
                <span>Fecha del Reporte</span>
            </div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th width="8%">ID</th>
                <th width="30%">Producto</th>
                <th width="15%">Categoria</th>
                <th width="12%">Stock</th>
                <th width="17%" class="text-right">Precio</th>
                <th width="18%" class="text-right">Valor Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td><span class="categoria">{{ $producto->categoria }}</span></td>
                <td class="{{ $producto->cantidad < 5 ? 'stock-bajo' : '' }}">{{ $producto->cantidad }}</td>
                <td class="text-right">${{ number_format($producto->precio, 2) }}</td>
                <td class="text-right">${{ number_format($producto->precio * $producto->cantidad, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Reporte generado por {{ auth()->user()->name ?? 'Sistema' }}
    </div>
</body>
</html>
