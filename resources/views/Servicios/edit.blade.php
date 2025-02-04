@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Editar Servicio')
@section('main')
<section class="grid grid-cols-2 gap-10 justify-items-center">
    <div class="w-full col-start-2">
        <h1 class="text-bold font-bold text-4xl text-center mb-10">Editar Servicio {{$servicio->servicio}}</h1>
        {{-- poner el metodo update en la ruta --}}
        <form action="{{ route('Servicios.update', $servicio->id_servicio) }}" method="POST" enctype="multipart/form-data"
            class="grid gap-5">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @csrf
            @method('PUT')
            <div id="form1" class="grid grid-cols-2 gap-5">
                <label for="servicio" class=" flex flex-col gap-2">
                    <span class="font-bold">
                        Servicio
                    </span>
                    <input type="text"
                        value="{{$servicio->servicio}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=servicio>
                    <span class="text-red-500 text-sm hidden" id="numeroServicioError">Este campo es obligatorio.</span>
                </label>

                <label for="cliente" class="flex flex-col gap-2">
                    <span class="font-bold">Cliente</span>
                    <select name="id_cliente" id="id_cliente"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
                        <option value="">Seleccione un cliente</option>
                        @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id_cliente }}"
                            {{ $cliente->id_cliente == $servicio->clientes_id_cliente ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                        @endforeach
                    </select>
                    <span class="text-red-500 text-sm hidden" id="clienteError">Este campo es obligatorio.</span>
                </label>

                <label for="componente" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Componente
                    </span>
                    <input type="text"
                        value="{{$servicio->componente}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=componente>
                    <span class="text-red-500 text-sm hidden" id="componenteError">Este campo es obligatorio.</span>
                </label>
                <label for="modelo" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Modelo
                    </span>
                    <input type="text"
                        value="{{$servicio->modelo}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=modelo>
                    <span class="text-red-500 text-sm hidden" id="modeloError">Este campo es obligatorio.</span>
                </label>
                <label for="serial" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Serial
                    </span>
                    <input type="text"
                        value="{{$servicio->serial}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=serial>
                    <span class="text-red-500 text-sm hidden" id="serialError">Este campo es obligatorio.</span>
                </label>
                <label for="horometro" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Horómetro
                    </span>
                    <input type="text"
                        value="{{$servicio->horometro}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=horometro>
                    <span class="text-red-500 text-sm hidden" id="horometroError">Este campo es obligatorio.</span>
                </label>
                <label for="marca" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Marca
                    </span>
                    <input type="text"
                        value="{{$servicio->marca}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=marca>
                    <span class="text-red-500 text-sm hidden" id="marcaError">Este campo es obligatorio.</span>
                </label>
                <label for="fecha_llegada" class="flex flex-col gap-2">
                    <span class="font-bold">Fecha Llegada</span>
                    <input type="date" value="{{ $servicio->fecha_llegada ? \Carbon\Carbon::parse($servicio->fecha_llegada)->format('Y-m-d') : '' }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name="fecha_llegada">
                    <span class="text-red-500 text-sm hidden" id="fechallegadaError">Este campo es obligatorio.</span>
                </label>
                <span id="btn-siguiente"
                    class="col-start-2 px-10 py-2 bg-naranja-claro-400 border-2 border-black transition-all ease-in-out duration-300 cursor-pointer text-center hover:bg-naranja-industrial-500 hover:text-white">
                    Siguiente</span>
            </div>
            {{-- aqui es el otro formulario --}}
            <div id="form2" class="hidden grid-cols-2 gap-5">
                <label for="fecha_de_despacho" class="flex flex-col gap-2">
                    <span class="font-bold">Fecha de Despacho</span>
                    <input type="date" value="{{ $servicio->fecha_de_despacho ? \Carbon\Carbon::parse($servicio->fecha_de_despacho)->format('Y-m-d') : '' }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name="fecha_de_despacho">
                    <span class="text-red-500 text-sm hidden" id="fechallegadaError">Este campo es obligatorio.</span>
                </label>
                <label for="fecha_inicio_estimada" class="flex flex-col gap-2">
                    <span class="font-bold">Fecha Inicio Estimada</span>
                    <input type="date" value="{{ $servicio->fecha_inicio_estimada ? \Carbon\Carbon::parse($servicio->fecha_inicio_estimada)->format('Y-m-d') : '' }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name="fecha_inicio_estimada">
                    <span class="text-red-500 text-sm hidden" id="fechallegadaError">Este campo es obligatorio.</span>
                </label>
                <label for="fecha_salida_estimada" class="flex flex-col gap-2">
                    <span class="font-bold">Fecha Fin Estimada</span>
                    <input type="date" value="{{ $servicio->fecha_salida_estimada ? \Carbon\Carbon::parse($servicio->fecha_salida_estimada)->format('Y-m-d') : '' }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name="fecha_salida_estimada">
                    <span class="text-red-500 text-sm hidden" id="fechaSalidaEstimadaError">Este campo es obligatorio.</span>
                </label>
                <label for="fecha_salida_real" class="flex flex-col gap-2">
                    <span class="font-bold">Fecha Fin Real</span>
                    <input type="date" value="{{ $servicio->fecha_salida_real ? \Carbon\Carbon::parse($servicio->fecha_salida_real)->format('Y-m-d') : '' }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name="fecha_salida_real">
                    <span class="text-red-500 text-sm hidden" id="fechaSalidaRealError">Este campo es obligatorio.</span>
                </label>
                <label for="contador" class="flex flex-col gap-2">
                    <span class="font-bold">
                        Variación
                    </span>
                    <span class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
                        @if($servicio->fecha_salida_estimada && $servicio->fecha_salida_real)
                        {{ abs(\Carbon\Carbon::parse($servicio->fecha_salida_real)->diffInDays($servicio->fecha_salida_estimada, false)) }} días
                        @else
                        {{ $servicio->contador }} días
                        @endif
                    </span>
                    <span class="text-red-500 text-sm hidden" id="contadorError">Este campo es obligatorio.</span>
                </label>
                <label for="requisito" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Requisitos del Trabajo
                    </span>
                    <input type="text"
                        value="{{$servicio->requisito}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=requisito>
                    <span class="text-red-500 text-sm hidden" id="requisitosTrabajoError">Este campo es
                        obligatorio.</span>
                </label>
                <label for="nota" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Nota
                    </span>
                    <input type="text"
                        value="{{$servicio->nota}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=nota>
                    <span class="text-red-500 text-sm hidden" id="notaError">Este campo es obligatorio.</span>
                </label>
                <label for="id_etapa" class="flex flex-col gap-2">
                    <span class="font-bold">Etapa</span>
                    <select name="id_etapa" id="id_etapa"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
                        <option value="">Seleccione una etapa</option>
                        @foreach ($etapas as $etapa)
                        <option value="{{ $etapa->id_etapa }}"
                            {{ $etapa->id_etapa == $servicio->etapas_id_etapa ? 'selected' : '' }}>
                            {{ $etapa->nombre }}
                        </option>
                        @endforeach
                    </select>
                    <span class="text-red-500 text-sm hidden" id="etapaError">Este campo es obligatorio.</span>
                </label>

                <span id="btn-anterior"
                    class="px-10 py-2 bg-naranja-claro-400 border-2 border-black transition-all ease-in-out duration-300 text-center cursor-pointer hover:bg-naranja-industrial-500 hover:text-white">Anterior</span>
            </div>
            {{-- hasta aca --}}
            <div class="mt-5 flex justify-evenly w-full">
                <a href="{{ route('Etapas.servicios', $id_etapa) }}"
                    class="font-bold py-2 px-10 rounded-sm bg-amarillo-pollo-300 transition-all duration-300 ease-in-out hover:bg-amarillo-pollo-400">
                    Volver
                </a>
                <button type="submit"
                    class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500  transition-all duration-300 ease-in-out hover:bg-naranja-industrial-600">Guardar</button>
            </div>
        </form>
    </div>
    <img src="{{ asset('/css/images/CRM1.jpeg') }}"
        class="justify-self-center row-start-1 border-4 border-black p-5 bg-gray-200 h-[500px] object-cover">
</section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        const imageInput = $('.image-input');
        const imageUpload = $('#imageUpload');
        const imagePreview = $('#imagePreview');

        imageUpload.change(function() {
            const file = this.files[0];
            const allowedTypes = ['image/webp', 'image/jpeg', 'image/png'];

            if (!allowedTypes.includes(file.type)) {
                alert('Por favor, selecciona un archivo de imagen válido (JPEG, PNG o WebP).');
                return false; // Prevent default behavior
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        });
    });
    // Función de validación utilizando jQuery
    // function validateForm($form) {
    //     let isValid = true;
    //     $form.find('input[type="text"]').each(function() {
    //         if ($(this).val().trim() === '') {
    //             isValid = false;
    //             $(this).next().text('Este campo es obligatorio.').removeClass('hidden');
    //         } else {
    //             $(this).next().text('').addClass('hidden');
    //         }
    //     });
    //     return isValid;
    // }
    $(document).ready(function() {
        // Referencias a los formularios y botones usando jQuery
        const $form1 = $('#form1');
        const $form2 = $('#form2');
        const $nextButton = $('#btn-siguiente');
        const $previousButton = $('#btn-anterior');
        const $backform2 = $('#backform2');




        // Manejador de eventos para el botón "Siguiente"
        $nextButton.click(function() {
            $form1.hide();
            // Agregar la clase 'grid' al formulario 2
            $form2.removeClass('hidden').show();
            $form2.addClass('grid').show();

        });

        // Manejador de eventos para el botón "Anterior"
        $previousButton.click(function() {
            $form1.show();
            // Remover la clase 'grid' del formulario 2 (opcional)
            $form2.removeClass('grid').hide();
            $form2.addClass('hidden').hide();
        });
    });
</script>