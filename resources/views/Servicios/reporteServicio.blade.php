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
            flex-direction: column;
            /* Cambiar a columna para formato vertical */
            align-items: center;
            /* Centrar los elementos */
            padding: 0;
        }

        .header img {
            height: 50px;
            width: 170px;
            margin-bottom: 1rem;
            /* Espacio entre la imagen y el título */
        }

        .header h1 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #000000;
            text-align: center;
            margin-top: -3rem;
        }

        /* Fecha de reporte en la parte superior derecha */
        .fecha-reporte {
            font-size: 0.8rem;
            font-weight: bold;
            color: #4b5563;
            text-align: right;
            margin-top: -4rem;
            /* Ajustar la fecha cerca del margen superior */
            margin-right: 0.5rem;
        }

        .info {
            margin-top: 0rem;
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
            margin-top: 1rem;
            margin-bottom: 0rem;
            text-align: center;
            margin-left: 1rem;
        }

        .list {
            list-style-type: disc;
            padding: 1.5rem;
            border: 1px solid #e5e7eb;
            max-width: 100%;
            margin: 0;
            word-wrap: break-word;
            overflow-wrap: break-word;
            margin-left: 1rem;
        }

        .list li {
            margin-bottom: 1rem;
            font-size: 1rem;
            line-height: 1;
        }

        .list strong {
            font-weight: bold;
            color: #000000;
        }

        .list span {
            color: #000000;
        }

        p {
            padding-left: 1rem;
            color: #000000;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Información del Cliente y Servicio -->
        <div class="header">
            <img src="{{ public_path() . '/css/images/Logo2.jpg' }}" alt="Logo">
            <h1>Reporte del Servicio</h1>
        </div>

        <!-- Fecha de Reporte en la esquina superior derecha -->
        <div class="fecha-reporte">
            <p>Fecha de Reporte: <span>{{ date('d/m/Y') }}</span></p>
        </div>

        <div class="info">
            <p>Cliente: <span>{{ $nombre_cliente }}</span></p>
            <p>Etapa: <span>{{ $nombre_etapa }}</span></p>
        </div>

        <!-- Información de la Bahía -->
        <div>
            <h2 class="section-title">Servicio: {{$servicio['servicio']}} </h2>
            <ul class="list">
                <li><strong>Serial:</strong> <span>{{ $servicio['serial'] }}</span></li>
                <li><strong>Componente:</strong> <span>{{ $servicio['componente'] }}</span></li>
                <li><strong>Modelo:</strong> <span>{{ $servicio['modelo'] }}</span></li>
                <li><strong>Marca:</strong> <span>{{ $servicio['marca'] }}</span></li>
                <li><strong>Horometro:</strong> <span>{{ $servicio['horometro'] }}</span></li>
                <li><strong>Fecha llegada:</strong> <span>{{ $servicio['fecha_llegada'] }}</span></li>
                <li><strong>Fecha Salida Estimada:</strong> <span>{{ $servicio['fecha_salida_estimada'] }}</span></li>
                <li><strong>Fecha Salida Real:</strong> <span>{{ $servicio['fecha_salida_real'] }}</span></li>
                <li><strong>Contador:</strong> <span>{{ $servicio['contador'] }}</span></li>
                <li><strong>Requisito:</strong> <span>{{ $servicio['requisito'] }}</span></li>
                <li><strong>Observación:</strong> <span>{{ $servicio['nota'] }}</span></li>
            </ul>
        </div>
            <h2 class="section-title">Bahías Asignadas</h2>
            <p><strong>Bahias:</strong> {{ $bahias }}</p>
            
            <h2 class="section-title">Técnicos Asignados</h2>
            <p><strong>Técnicos:</strong> {{ $bahias }}</p>
    </div>
</body>

</html>