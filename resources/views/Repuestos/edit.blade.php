@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Editar Repuesto')
@section('main')
<section class="grid grid-cols-2 gap-10 justify-items-center">
    <div class="w-full">
        <h1 class="text-bold font-bold text-4xl text-center mb-10">Editar Repuesto {{$repuesto->nro_orden}}</h1>
        {{-- poner el metodo update en la ruta --}}
        <form action="{{ route('Repuestos.update', ['id_servicio' => $servicio->id_servicio, 'id_repuesto' => $repuesto->id_repuesto]) }}" method="POST" enctype="multipart/form-data"
            class="grid gap-5">

            @csrf
            @method ('PUT')

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <label for="fecha_inicio_cotizacion" class="flex flex-col gap-2 w-full">
                <span class="font-bold">Fecha Inicio de Cotización</span>
                <input type="date" value="{{ $repuesto->fecha_inicio_cotizacion ? \Carbon\Carbon::parse($repuesto->fecha_inicio_cotizacion)->format('Y-m-d') : '' }}"
                    name="fecha_inicio_cotizacion"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
            </label>

            <label for="fecha_fin_cotizacion" class="flex flex-col gap-2 w-full">
                <span class="font-bold">Fecha Fin de Cotización</span>
                <input type="date" value="{{ $repuesto->fecha_fin_cotizacion ? \Carbon\Carbon::parse($repuesto->fecha_fin_cotizacion)->format('Y-m-d') : '' }}"
                    name="fecha_fin_cotizacion"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
            </label>
            <label for="nro_orden" class="flex flex-col gap-2 w-full">
                <span class="font-bold">Número Cotización</span>
                <input type="text"
                    value="{{ $repuesto->nro_cotizacion }}"
                    name="nro_cotizacion"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
            </label>
            <label for="contador_cotizacion" class="flex flex-col gap-2 w-full">
                <span class="font-bold">Duración Cotización</span>
                <span class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
                    @if($repuesto->fecha_inicio_cotizacion && $repuesto->fecha_fin_cotizacion)
                    {{ \Carbon\Carbon::parse($repuesto->fecha_fin_cotizacion)->diffInDays($repuesto->fecha_inicio_cotizacion, false) }} días
                    @else
                    {{ $repuesto->contador_cotizacion }} días
                    @endif
                </span>
            </label>
            <label for="fecha_inicio_colocacion" class="flex flex-col gap-2 w-full">
                <span class="font-bold">Fecha Inicio Colocación</span>
                <input type="date" value="{{ $repuesto->fecha_inicio_colocacion ? \Carbon\Carbon::parse($repuesto->fecha_inicio_colocacion)->format('Y-m-d') : '' }}"
                    name="fecha_inicio_colocacion"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
            </label>

            <label for="fecha_fin_colocacion" class="flex flex-col gap-2 w-full">
                <span class="font-bold">Fecha Fin Colocación</span>
                <input type="date" value="{{ $repuesto->fecha_fin_colocacion ? \Carbon\Carbon::parse($repuesto->fecha_fin_colocacion)->format('Y-m-d') : '' }}"
                    name="fecha_fin_colocacion"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
            </label>
            <label for="nro_orden" class="flex flex-col gap-2 w-full">
                <span class="font-bold">Número Orden</span>
                <input type="text"
                    value="{{ $repuesto->nro_orden }}"
                    name="nro_orden"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
            </label>
            <label for="contador_colocacion" class="flex flex-col gap-2 w-full">
                <span class="font-bold">Duración Colocación</span>
                <span class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
                    @if($repuesto->fecha_inicio_colocacion && $repuesto->fecha_fin_colocacion)
                    {{ \Carbon\Carbon::parse($repuesto->fecha_fin_colocacion)->diffInDays($repuesto->fecha_inicio_colocacion, false) }} días
                    @else
                    {{ $repuesto->contador_colocacion }} días
                    @endif
                </span>
            </label>

            <div class="col-span-2 flex justify-evenly w-full">
                <a href="{{ route('Repuestos.show', $servicio->id_servicio) }}"
                    class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out hover:bg-amarillo-pollo-300">Volver</a>
                <button type="submit"
                    class="font-bold py-2 px-10 rounded-sm bg-amarillo-pollo-300 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500">Guardar</button>
            </div>
        </form>
    </div>
    <img src="{{ asset('/css/images/CRM1.jpeg') }}"
        class="justify-self-center border-4 border-black p-5 bg-gray-200 h-[500px] object-cover">
</section>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>