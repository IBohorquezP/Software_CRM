<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Servicio - Bahías</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-arial">
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <!-- Información del Cliente y Servicio -->
        <div class="w-full mx-auto p-6 bg-white shadow-md">
              <img src="{{asset('/css/images/Logo2.png')}}" >
            <h1 class="text-2xl font-bold text-center">Reporte de Bahía</h1>
            <p class="text-gray-600 text-lg mt-4">
                Cliente: <span class="font-semibold">{{ $nombre_cliente }}</span>
            </p>
            <p class="text-gray-600">Fecha de Reporte: <span class="font-semibold">{{ date('d/m/Y') }}</span></p>
            <div class="mt-4 text-center">
                <p class="text-gray-600">Número de Servicio: <span class="font-semibold">{{ $servicio['servicio'] }}</span></p>
                <p class="text-gray-600">Modelo: <span class="font-semibold">{{ $servicio['modelo'] }}</span></p>
                <p class="text-gray-600">Serial: <span class="font-semibold">{{ $servicio['serial'] }}</span></p>
            </div>
        </div>

        <!-- Información de la Bahía -->
        <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Bahía: {{ $bahia->nombre }}</h2>
            <ul class="space-y-4">
                <li>
                    <strong class="text-gray-700">TRG:</strong> <span class="text-gray-600">{{ $bahia->pivot->TRG }}</span>
                </li>
                <li>
                    <strong class="text-gray-700">Fecha Inicio:</strong> <span class="text-gray-600">{{ $bahia->pivot->fecha_inicio }}</span>
                </li>
                <li>
                    <strong class="text-gray-700">Fecha Fin:</strong> <span class="text-gray-600">{{ $bahia->pivot->fecha_fin }}</span>
                </li>
                <li>
                    <strong class="text-gray-700">Alcance:</strong> <span class="text-gray-600">{{ $bahia->pivot->alcance }}</span>
                </li>
                <li>
                    <strong class="text-gray-700">Herramienta:</strong> <span class="text-gray-600">{{ $bahia->pivot->herramienta }}</span>
                </li>
                <li>
                    <strong class="text-gray-700">Documentación:</strong> <span class="text-gray-600">{{ $bahia->pivot->documentacion }}</span>
                </li>
                <li>
                    <strong class="text-gray-700">Requerimientos:</strong> <span class="text-gray-600">{{ $bahia->pivot->requerimientos }}</span>
                </li>
                <li>
                    <strong class="text-gray-700">Actividad:</strong> <span class="text-gray-600">{{ $bahia->pivot->actividad }}</span>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
