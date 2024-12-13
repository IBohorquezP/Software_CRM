@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Editar Trabajo Exeterno')
@section('main')
<section class="grid grid-cols-2 gap-10 justify-items-center">
    <div class="w-full">
        <h1 class="text-bold font-bold text-4xl text-center mb-10">Editar Trabajo Externo</h1>
        {{-- poner el metodo update en la ruta --}}
        <form action="{{ route('Externos.update', ['id_servicio' => $servicio->id_servicio, 'id_externo' => $externo->id_externo]) }}" method="POST" enctype="multipart/form-data"
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
            <label for="proveedor" class="flex flex-col gap-2 w-full">
                <span class="font-bold">
                    Proveedor
                </span>
                <input type="text"
                    value="{{$externo->proveedor}}"
                    name="proveedor"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
            <label for="componente" class="flex flex-col gap-2 w-full">
                <span class="font-bold">
                    Componente
                </span>
                <input type="text"
                    value="{{$externo->componente}}"
                    name="componente"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
            <label for="serial" class="flex flex-col gap-2 w-full">
                <span class="font-bold">
                    Serial
                </span>
                <input type="text"
                    value="{{$externo->serial}}"
                    name="serial"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
            <label for="cantidad" class="flex flex-col gap-2 w-full">
                <span class="font-bold">
                    Cantidad
                </span>
                <input type="number"
                    value="{{$externo->cantidad}}"
                    name="cantidad"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
            <label for="fecha_salida" class="flex flex-col gap-2 w-full">
                <span class="font-bold">Fecha Salida del CRM</span>
                <input type="date"
                    value="{{ \Carbon\Carbon::parse($externo->fecha_salida)->format('Y-m-d') }}"
                    name="fecha_salida"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
            </label>

            <label for="fecha_llegada" class="flex flex-col gap-2 w-full">
                <span class="font-bold">Fecha Llegada al CRM</span>
                <input type="date"
                    value="{{ \Carbon\Carbon::parse($externo->fecha_llegada)->format('Y-m-d') }}"
                    name="fecha_llegada"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
            </label>
            <label for="ot" class="flex flex-col gap-2 w-full">
                <span class="font-bold">OT</span>
                <input type="text"
                    value="{{ $externo->ot }}"
                    name="ot"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
            </label>
            <label for="contador_cotizacion" class="flex flex-col gap-2 w-full">
                <span class="font-bold">Duración Cotización</span>
                <span class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
                    @if($externo->fecha_salida && $externo->fecha_llegada)
                    {{ \Carbon\Carbon::parse($externo->fecha_llegada)->diffInDays($externo->fecha_salida, false) }} días
                    @else
                    {{ $externo->contador }} días
                    @endif
                </span>
            </label>


            <div class="col-span-2 flex justify-evenly w-full">
                <a href="{{ route('Externos.show', $servicio->id_servicio) }}"
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