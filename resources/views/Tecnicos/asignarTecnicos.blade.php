@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Asignar Tecnicos a Servicios')
@section('main')
<section class="grid grid-cols-2 gap-10 justify-items-center">
    <div class="w-full">
        <h1 class="text-bold font-bold text-4xl text-center mb-10">Agregar Técnicos</h1>
        {{-- poner el metodo update en la ruta --}}
        <form action="{{ route('Tecnicos.attachServicio') }}" method="POST" enctype="multipart/form-data"
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
                        Seleccione Técnicos
                    </span>
                    <select name="id_tecnico" id="id_tecnico"
                        class="w-full col-span-2 p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
                        <option value="">Seleccione Técnicos</option>
                        @foreach ($tecnicos as $tecnico)
                        <option value="{{ $tecnico->id_tecnico }}">{{ $tecnico->nombre }} {{ $tecnico->apellido }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="mt-5 flex justify-evenly w-full">
                <button type="button" onclick="guardarYAgregar()" class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-400 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500">Guardar</button>
                <a href="{{ route('Tecnicos.showServicioTecnicos', $servicio->id_servicio) }}" class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out hover:bg-amarillo-pollo-300">Finalizar</a>
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