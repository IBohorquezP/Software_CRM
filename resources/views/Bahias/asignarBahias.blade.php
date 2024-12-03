@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Crear Servicio')
@section('main')
<section class="grid grid-cols-2 gap-10 justify-items-center">
    <div class="w-full">
        <h1 class="text-bold font-bold text-4xl text-center mb-10">Agregar Bahías</h1>
        {{-- poner el metodo update en la ruta --}}
        <form action="{{ route('Bahias.attachServicio') }}" method="POST" enctype="multipart/form-data"
            class="grid gap-5">

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

            <div id="form" class="grid grid-cols-2 gap-5">
                <label for="bahia" class=" col-span-2 flex flex-col gap-2">

                    <span class="font-bold">
                        Seleccione una bahia
                    </span>
                    <select name="id_bahia" id="id_bahia"
                        class="w-full col-span-2 p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
                        <option value="">Seleccione una bahía</option>
                        @foreach ($bahias as $bahia)
                        <option value="{{ $bahia->id_bahia }}">{{ $bahia->nombre }}</option>
                        @endforeach
                    </select>
                </label>
                <label for="TRG" class=" flex flex-col gap-2">

                    <span class="font-bold">
                        TRG
                    </span>
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=TRG>
                    <span class="text-red-500 text-sm hidden" id="alcanceError">Este campo es obligatorio.</span>
                </label>
                <label for="actividad" class=" flex flex-col gap-2">

                    <span class="font-bold">
                        Actividad
                    </span>
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=actividad>
                    <span class="text-red-500 text-sm hidden" id="alcanceError">Este campo es obligatorio.</span>
                </label>
                <label for="fecha_inicio" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Fecha Inicio
                    </span>
                    <input type="date"
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
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=fecha_fin>
                    <span class="text-red-500 text-sm hidden" id="fechaRealError">Este campo es
                        obligatorio.</span>
                </label>
                <label for="requerimento" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Requerimentos del Trabajo
                    </span>
                    <input type="text"
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
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=herramienta>
                    <span class="text-red-500 text-sm hidden" id="herramientaError">Este campo es obligatorio.</span>
                </label>
                <label for="documentacion" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Documentación
                    </span>
                    <input type="text"
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
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=alcance>
                    <span class="text-red-500 text-sm hidden" id="alcanceError">Este campo es obligatorio.</span>
                </label>
            </div>
            <div class="mt-5 flex justify-evenly w-full">
                <button type="button" onclick="guardarYAgregar()" class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-400 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500">Guardar</button>
                <a href="{{ route('showServicioBahias', $servicio->id_servicio) }}" class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out hover:bg-amarillo-pollo-300">Finalizar</a>
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

<script>
    function guardarYAgregar() {
        const form = document.querySelector('form');

        // Guardar el formulario
        form.submit();

        // Agregar un pequeño retraso para limpiar los campos después del envío
        setTimeout(() => {
            form.reset();
        }, 300); // Espera 300 ms antes de limpiar los campos
    }
</script>