<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Clientes</title>
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
            width: 30%;
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
        td {
            padding: 10px 8px;
            border-bottom: 1px solid #e2e8f0;
        }
        tr:nth-child(even) {
            background: #f8fafc;
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
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Reporte de Clientes</h1>
        <p>Generado el {{ $fecha }} | Sistema de Gestión</p>
    </div>

    <div class="summary">
        <h3>Resumen</h3>
        <div class="summary-grid">
            <div class="summary-item">
                <strong>{{ $totalClientes }}</strong>
                <span>Total de Clientes</span>
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
                <th width="25%">Nombre</th>
                <th width="25%">Apellido Paterno</th>
                <th width="22%">Apellido Materno</th>
                <th width="20%">RFC</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->apellido_paterno }}</td>
                <td>{{ $cliente->apellido_materno }}</td>
                <td>{{ $cliente->rfc }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Página {PAGE_NUM} de {PAGE_COUNT} | Reporte generado por {{ auth()->user()->name ?? 'Sistema' }}
    </div>
</body>
</html>
