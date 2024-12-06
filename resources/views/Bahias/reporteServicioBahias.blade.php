<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Servicio - Bahías</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #1f2937;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 0;
            max-width: 100%;
            margin: 0;
            box-sizing: border-box;
        }

        .header {
            display: flex;
            justify-content: space-between;
            /* Alinea los elementos a los extremos */
            padding: 0rem;
        }

        .header img {
             height: 70px;
             width: 200px;   

        }
        .header h1 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #000000;
            text-align: center;
            margin-top: -5rem;
            flex-grow: 1;
        }

                /* Fecha de reporte en la esquina superior derecha */
        .fecha-reporte {
            font-size: 0.8rem;
            font-weight: bold;
            color: #4b5563;
            text-align: right;
            width: 100%;
            margin-top: -5rem;
            /* Mueve la fecha hacia arriba para ajustarla al margen superior */
            margin-right: 0.5rem;
        }

        .info {
            margin-top: -1rem;
            font-size: 0.8rem;
            color: #4b5563;
            text-align: center;
            line-height: 0.1rem;
        }

        .info span {
            font-weight: bold;
            color: #1f2937;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #000000;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }

        .list {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin: 0;
            border: 1px solid #e5e7eb;
            max-width: 100%;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .list li {
            margin-bottom: 1rem;
            font-size: 1rem;
            line-height: 1.5;
        }

        .list strong {
            font-weight: bold;
            color: #000000;
        }

        .list span {
            color: #000100;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Información del Cliente y Servicio -->
        <div class="header">
            <img src="{{ public_path() . '/css/images/Logo2.jpg' }}" alt="Logo">
            <h1>Reporte de Bahía</h1>
        </div>

        <!-- Fecha de Reporte en la esquina superior derecha -->
        <div class="fecha-reporte">
            <p>Fecha de Reporte: <span>{{ date('d/m/Y') }}</span></p>
        </div>

        <div class="info">
            <p>Cliente: <span>{{ $nombre_cliente }}</span></p>
            <p>Número de Servicio: <span>{{ $servicio['servicio'] }}</span></p>
            <p>Modelo: <span>{{ $servicio['modelo'] }}</span></p>
            <p>Serial: <span>{{ $servicio['serial'] }}</span></p>
        </div>

        <!-- Información de la Bahía -->
        <div>
            <h2 class="section-title">Bahía: {{ $bahia->nombre }}</h2>
            <ul class="list">
                <li><strong>TRG:</strong> <span>{{ $bahia->pivot->TRG }}</span></li>
                <li><strong>Fecha Inicio:</strong> <span>{{ $bahia->pivot->fecha_inicio }}</span></li>
                <li><strong>Fecha Fin:</strong> <span>{{ $bahia->pivot->fecha_fin }}</span></li>
                <li><strong>Alcance:</strong> <span>{{ $bahia->pivot->alcance }}</span></li>
                <li><strong>Herramienta:</strong> <span>{{ $bahia->pivot->herramienta }}</span></li>
                <li><strong>Documentación:</strong> <span>{{ $bahia->pivot->documentacion }}</span></li>
                <li><strong>Requerimientos:</strong> <span>{{ $bahia->pivot->requerimientos }}</span></li>
                <li><strong>Actividad:</strong> <span>{{ $bahia->pivot->actividad }}</span></li>
            </ul>
        </div>
    </div>
</body>

</html>