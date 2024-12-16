@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Servicio')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
@endsection

@section('main2')
<div class="w-full flex justify-between items-center">
    <a href="/Etapas" class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-claro-400 hover:bg-naranja-industrial-500">Volver</a>
    <h1 class="text-[60px] font-bold drop-shadow-xl mx-auto">Servicios</h1>
    @can('Servicios.create')
    <a href="/Servicios/create" class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-claro-500 hover:bg-naranja-industrial-500">Agregar</a>
    @endcan
</div>
<div class="card p-4">
    <div class="card-body">
        <table id="motores" class="table" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">Etapa</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Servicio</th>
                    <th class="text-center">Componente</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Serial</th>
                    <th class="text-center">Horometro</th>
                    <th class="text-center">Fecha Llegada</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicios as $servicio)
                <td class="text-center">{{ $servicio->etapa->nombre }}</td>
                <td class="text-center">{{ $servicio->cliente->nombre }}</td>
                <td class="text-center">{{ $servicio->servicio }}</td>
                <td class="text-center">{{ $servicio->componente }}</td>
                <td class="text-center">{{ $servicio->modelo }}</td>
                <td class="text-center">{{ $servicio->serial }}</td>
                <td class="text-center">{{ $servicio->horometro }}</td>
                <td class="text-center">{{ $servicio->fecha_llegada ? \Carbon\Carbon::parse($servicio->fecha_llegada)->format('d-m-Y') : '' }}</td>
                <td class="">
                    <ul
                        class="relative w-9 h-9 bg-naranja-claro-500 p-1 border-[2px] border-amarillo-oscuro-950 font-semibold transition-all duration-300 hover:bg-naranja-claro-600 hover:text-white float-right">
                        <li>
                            <img src='{{ asset('/css/images/menu.svg') }}' class='w-6 h-6 cursor-pointer menu-icon' onclick="toggle_menu('menu-content-1')">
                        </li>
                        <div class="absolute bg-white rounded-md shadow-md menu-content hidden z-40" id="menu-content-1">
                            <li class="transition-all duration-300 ease-in-out rounded-t-md hover:bg-naranja-industrial-500 group ">
                                <a href="{{ route('Servicios.show', ['id_servicio' => $servicio->id_servicio]) }}" class="block py-2 px-4 text-gray-800 group-hover:text-white hover:text-gray-900">Ver</a>
                            </li>
                            <li class="transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500 group ">
                                <a href="{{ route('Bahias.showServicioBahias', $servicio->id_servicio) }}" class="block py-2 px-4 text-gray-800 group-hover:text-white hover:text-gray-900">Bahías</a>
                            </li>
                            <li class="transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500 group ">
                                <a href="{{ route('Tecnicos.showServicioTecnicos', $servicio->id_servicio) }}" class="block py-2 px-4 text-gray-800 group-hover:text-white hover:text-gray-900">Técnicos</a>
                            </li>
                            <li class="transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500 group ">
                                <a href="{{ route('Repuestos.show', $servicio->id_servicio) }}" class="block py-2 px-4 text-gray-800 group-hover:text-white hover:text-gray-900">Repuestos</a>
                            </li>
                            <li class="transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500 group ">
                                <a href="{{ route('Externos.show', $servicio->id_servicio) }}"" class=" block py-2 px-4 text-gray-800 group-hover:text-white hover:text-gray-900">Externos</a>
                            </li>
                            <li class="transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500 group ">
                                <a href="{{ route('Servicios.reporteServicio', ['id_servicio' => $servicio->id_servicio]) }}" class="block py-2 px-4 text-gray-800 group-hover:text-white hover:text-gray-900">Reporte</a>
                            </li>
                        </div>
                    </ul>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>

<script>
    new DataTable('#motores', {
        responsive: true,
        autoWith: false,
        "language": {
            "lengthMenu": "Mostrar" + `
        <select class="border-2 border-gray-300 p-1.5 rounded-md outline-none focus:border-naranja-industrial-500">
            <option value = '5'>5</option>
            <option value = '10'>10</option>
            <option value = '25'>25</option>
            <option value = '50'>50</option>
            <option value = '100'>100</option>
            <option value = '-1'>Todos</option>
            </select>
        ` +
                "registros por pagina",
            "zeroRecords": "No se encontro nada - disculpa",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
</script>
@endsection