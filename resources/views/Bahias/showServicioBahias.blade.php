@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Bahias del servicio')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
@endsection
@section('main2')
    <div class="w-full flex justify-between items-center">
        <a href="/Servicios"
            class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-claro-400 hover:bg-naranja-industrial-500">Volver</a>
        <a href="/Etapas/show" class="text-[45px] font-bold drop-shadow-xl ">Bahias del Servicio {{$servicio->serial}}</a>
        <a href="{{ route('Bahias.asignarBahias', $servicio->id_servicio) }}"
            class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-claro-400 hover:bg-naranja-industrial-500">Agregar</a>
    </div>
    <div class="card p-4">
        <div class="card-body">
            <table id="motores" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">TRG</th>
                        <th class="text-center">Fecha Inicio</th>
                        <th class="text-center">Fecha Fin</th>
                        <th class="text-center">Alcance</th>
                        <th class="text-center">Herramienta</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicio_existentes as $servicio_existente)
                        <tr>
                            <td class="text-center">{{ $servicio_existente->TRG }}</td>
                            <td class="text-center">{{ $servicio_existente->fecha_inicio }}</td>
                            <td class="text-center">{{ $servicio_existente->fecha_fin }}</td>
                            <td class="text-center">{{ $servicio_existente->alcance }}</td>
                            <td class="text-center">{{ $servicio_existente->herramienta }}</td>
                            <td class="flex justify-center space-x-2">
                              <a href="{{ route('Servicios.show', ['id_servicio' => $servicio->id_servicio]) }}" class="w-20 h-10 py-2 text-center rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver</a>
                              <button type="button" class="w-20 h-10 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80 bg-[#DC3545] text-white">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
