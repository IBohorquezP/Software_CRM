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
    <a href="/Servicios/create" class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-claro-400 hover:bg-naranja-industrial-500">Agregar</a>
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
                <td class="">
                    <a href="{{ route('Servicios.show', ['id_servicio' => $servicio->id_servicio]) }}" class="w-20 h-10 px-6 py-2 self-end rounded-md transition-all duration-300 ease-in-out hover:bg-naranja-industrial-600/80 bg-[#F0A21C] text-white">Ver</a>
                    <a href="{{ route('Bahias.showServicioBahias', $servicio->id_servicio) }}" type="button" class="w-20 h-10px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500/80 bg-naranja-industrial-400 text-white text-center">Bahías</a>
                    <a href="{{ route('Tecnicos.showServicioTecnicos', $servicio->id_servicio) }}" type="button" class="w-20 h-10px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-naranja-industrial-400/80 bg-naranja-industrial-300 text-white text-center">Técnicos</a>
                    <a href="{{ route('Repuestos.show', $servicio->id_servicio) }}" type="button" class="w-20 h-10px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-gris-industrial-400/80 bg-gris-industrial-400 text-white text-center">Repuestos</a>
                    <a href="{{ route('Externos.show', $servicio->id_servicio) }}" type="button" class="w-20 h-10px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-gris-industrial-400/80 bg-gris-industrial-500 text-white text-center">T. Externos</a>
                    <a href="{{ route('Servicios.reporteServicio', ['id_servicio' => $servicio->id_servicio]) }}" type="button" target="_blank" class="w-20 h-10px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-gris-industrial-500/80 bg-gris-input-700 text-white text-center">Reporte</a>
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
