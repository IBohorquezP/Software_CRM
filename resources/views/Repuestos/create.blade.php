@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Crear Repuestos')
@section('main')
<section class="grid grid-cols-2 gap-10 jus">
    <div>
        <h1 class="text-bold font-bold text-4xl text-center mb-10">Nuevo Repuesto</h1>
        <form action="{{ route('Repuestos.store') }}" method="POST" enctype="form-data"
            class="grid grid-cols-2 gap-5">

            @csrf
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
                <span class="font-bold">
                    Fecha Inicio de Cotización
                </span>
                <input type="date"
                    name="fecha_inicio_cotizacion"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
            <label for="fecha_fin_cotizacion" class="flex flex-col gap-2 w-full">
                <span class="font-bold">
                    Fecha Fin de Cotización
                </span>
                <input type="date"
                    name="fecha_fin_cotizacion"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
            <label for="contador_cotizacion" class="flex flex-col gap-2 w-full">
                <span class="font-bold">
                    Contador Cotización
                </span>
                <input type="text"
                    name="contador_cotizacion"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
            <label for="nro_orden" class="flex flex-col gap-2 w-full">
                <span class="font-bold">
                    Nro Orden
                </span>
                <input type="text"
                    name="nro_orden"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
            <label for="fecha_inicio_cotizacion" class="flex flex-col gap-2 w-full">
                <span class="font-bold">
                    Fecha Inicio Colocación
                </span>
                <input
                    type="date"
                    name="fecha_inicio_colocacion"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
            <label for="fecha_fin_colocación" class="flex flex-col gap-2 w-full">
                <span class="font-bold">
                    Fecha Fin Colocación
                </span>
                <input type="date"
                    name="fecha_fin_colocacion"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
            <label for="contador_colocación" class="flex flex-col gap-2 w-full">
                <span class="font-bold">
                    Contador Colocación
                </span>
                <input type="text"
                    name="contador_cotizacion"
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>

            <div class="col-span-2 flex justify-evenly w-full">
                <a href="{{ route('Repuestos.show', $servicio->id_servicio) }}"
                    class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out hover:bg-amarillo-pollo-300">Volver</a>
                <button type="submit"
                    class="font-bold py-2 px-10 rounded-sm bg-amarillo-pollo-300 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500">Guardar</button>
            </div>
            <label for="id_servicio" class=" flex flex-col gap-2">
                <input type="hidden" name=id_servicio value="{{$id_servicio}}">
            </label>
        </form>
    </div>
    <img src="{{ asset('/css/images/CRM1.jpeg') }}"
        class="justify-self-center border-4 border-black p-5 bg-gray-200 h-[500px] object-cover">
</section>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>