@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Crear Servicio')
@section('main')
<section class="grid grid-cols-2 gap-10 justify-items-center">
    <div class="w-full">
        <h1 class="text-bold font-bold text-4xl text-center mb-10">Editar Bahia</h1>
        {{-- poner el metodo update en la ruta --}}
        <form action="{{ route('Bahias.updateServicioBahias', $servicio_existentes->id_servicio_bahia) }}" method="POST" enctype="multipart/form-data"
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

            <div id="form" class="grid grid-cols-2 gap-5">
                <label for="bahia" class=" col-span-2 flex flex-col gap-2">

                    <span class="font-bold">
                        Seleccione una bahia
                    </span>
                    <select name="id_bahia" id="id_bahia"
                        class="w-full col-span-2 p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
                        <option value="">Seleccione una bahía</option>

                    </select>
                </label>
                <label for="TRG" class=" flex flex-col gap-2">

                    <span class="font-bold">
                        TRG
                    </span>
                    <input type="text"
                        value="{{$servicio_existentes->TRG}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=TRG>
                    <span class="text-red-500 text-sm hidden" id="alcanceError">Este campo es obligatorio.</span>
                </label>
                <label for="actividad" class=" flex flex-col gap-2">

                    <span class="font-bold">
                        Actividad
                    </span>
                    <input type="text"
                        value="{{$servicio_existentes->actividad}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=actividad>
                    <span class="text-red-500 text-sm hidden" id="alcanceError">Este campo es obligatorio.</span>
                </label>
                <label for="fecha_inicio" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Fecha Inicio
                    </span>
                    <input type="date"
                        value="{{$servicio_existentes->fecha_inicio}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=fecha_inicio>
                    <span class="text-red-500 text-sm hidden" id="fechaEstimadaError">Este campo es
                        obligatorio.</span>
                </label>
                <label for="fecha_real" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Fecha Fin
                    </span>
                    <input type="date"
                        value="{{$servicio_existentes->fecha_real}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=fecha_fin>
                    <span class="text-red-500 text-sm hidden" id="fechaRealError">Este campo es
                        obligatorio.</span>
                </label>
                <label for="requerimento" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Requerimientos del Trabajo
                    </span>
                    <input type="text"
                        value="{{$servicio_existentes->requerimientos}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=requerimientos>
                    <span class="text-red-500 text-sm hidden" id="requerimentosTrabajoError">Este campo es
                        obligatorio.</span>
                </label>
                <label for="Herramienta" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Herramienta
                    </span>
                    <input type="text"
                        value="{{$servicio_existentes->herramienta}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=herramienta>
                    <span class="text-red-500 text-sm hidden" id="herramientaError">Este campo es obligatorio.</span>
                </label>
                <label for="documentacion" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Documentación
                    </span>
                    <input type="text"
                        value="{{$servicio_existentes->documentacion}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=documentacion>
                    <span class="text-red-500 text-sm hidden" id="documentacionError">Este campo es
                        obligatorio.</span>
                </label>
                <label for="alcance" class=" flex flex-col gap-2">

                    <span class="font-bold">
                        Alcance
                    </span>
                    <input type="text"
                        value="{{$servicio_existentes->alcance}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=alcance>
                    <span class="text-red-500 text-sm hidden" id="alcanceError">Este campo es obligatorio.</span>
                </label>
            </div>
            <div class="mt-5 flex justify-evenly w-full">
                <a href="{{ route('showServicioBahias', $servicio->id_servicio) }}" class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out hover:bg-amarillo-pollo-300">Volver</a>
                <button type="submit"
                    class="font-bold py-2 px-10 rounded-sm bg-amarillo-pollo-300 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500">Guardar</button>
            </div>
        </form>
    </div>
    <img src="{{ asset('/css/images/CRM1.jpeg') }}"
        class="justify-self-center border-4 border-black p-5 bg-gray-200 h-[500px] object-cover">
</section>
@endsection