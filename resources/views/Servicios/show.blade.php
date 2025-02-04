@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Mostrar Servicio')
@section('main')
<section class="grid grid-cols-2 gap-10 justify-items-center">
    <div class="w-full col-start-2">
        <h1 class="text-bold font-bold text-4xl text-center mb-10">Ver Servicio {{$servicio->servicio}}</h1>
        {{-- poner el metodo update en la ruta --}}
        <div action="{{ route('Servicios.store') }}" method="POST" enctype="multipart/form-data" class="grid gap-5">

            @csrf
            <div id="form1" class="grid grid-cols-2 gap-5">
                <label for="servicio" class=" flex flex-col gap-2">
                    <span class="font-bold">
                        Servicio
                    </span>
                    <input type="text" value="{{ $servicio->servicio }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        disabled name=servicio>
                    <span class="text-red-500 text-sm hidden" id="numeroServicioError">Este campo es obligatorio.</span>
                </label>

                <label for="id_cliente" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Cliente
                    </span>
                    <input type="text" value="{{ $servicio->cliente->nombre }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        disabled name=id_cliente>
                    <span class="text-red-500 text-sm hidden" id="clienteError">Este campo es obligatorio.</span>
                </label>

                <label for="componente" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Componente
                    </span>
                    <input type="text" value="{{ $servicio->componente }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        disabled name=componente>
                    <span class="text-red-500 text-sm hidden" id="componenteError">Este campo es obligatorio.</span>
                </label>
                <label for="modelo" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Modelo
                    </span>
                    <input type="text" value="{{ $servicio->modelo }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        disabled name=modelo>
                    <span class="text-red-500 text-sm hidden" id="modeloError">Este campo es obligatorio.</span>
                </label>
                <label for="serial" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Serial
                    </span>
                    <input type="text" value="{{ $servicio->serial }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        disabled name=serial>
                    <span class="text-red-500 text-sm hidden" id="serialError">Este campo es obligatorio.</span>
                </label>
                <label for="horometro" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Horómetro
                    </span>
                    <input type="text" value="{{ $servicio->horometro }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        disabled name=horometro>
                    <span class="text-red-500 text-sm hidden" id="horometroError">Este campo es obligatorio.</span>
                </label>
                <label for="marca" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Marca
                    </span>
                    <input type="text" value="{{ $servicio->marca }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        disabled name=marca>
                    <span class="text-red-500 text-sm hidden" id="marcaError">Este campo es obligatorio.</span>
                </label>
                <label for="fecha_llegada" class="flex flex-col gap-2">
                    <span class="font-bold">Fecha Llegada</span>
                    <input type="text" value="{{ $servicio->fecha_llegada ? \Carbon\Carbon::parse($servicio->fecha_llegada)->format('d-m-Y') : '' }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        disabled name="fecha_llegada">
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
                    <input type="text" value="{{ $servicio->fecha_de_despacho ? \Carbon\Carbon::parse($servicio->fecha_de_despacho)->format('d-m-Y') : '' }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        disabled name="fecha_de_despacho">
                    <span class="text-red-500 text-sm hidden" id="fechallegadaError">Este campo es obligatorio.</span>
                </label>
                <label for="fecha_inicio_estimada" class="flex flex-col gap-2">
                    <span class="font-bold">Fecha Inicio Estimada</span>
                    <input type="text" value="{{ $servicio->fecha_inicio_estimada ? \Carbon\Carbon::parse($servicio->fecha_inicio_estimada)->format('d-m-Y') : '' }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        disabled name="fecha_inicio_estimada">
                    <span class="text-red-500 text-sm hidden" id="fechallegadaError">Este campo es obligatorio.</span>
                </label>
                <label for="fecha_salida_estimada" class="flex flex-col gap-2">
                    <span class="font-bold">Fecha Fin Estimada</span>
                    <input type="text" value="{{ $servicio->fecha_salida_estimada ? \Carbon\Carbon::parse($servicio->fecha_salida_estimada)->format('d-m-Y') : '' }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        disabled name="fecha_salida_estimada">
                    <span class="text-red-500 text-sm hidden" id="fechaSalidaEstimadaError">Este campo es obligatorio.</span>
                </label>
                <label for="fecha_salida_real" class="flex flex-col gap-2">
                    <span class="font-bold">Fecha Fin Real</span>
                    <input type="text" value="{{ $servicio->fecha_salida_real ? \Carbon\Carbon::parse($servicio->fecha_salida_real)->format('d-m-Y') : '' }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        disabled name="fecha_salida_real">
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
                </label>
                <label for="requisito" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Requisitos del Trabajo
                    </span>
                    <input type="text" value="{{ $servicio->requisito }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        disabled name=requisito>
                    <span class="text-red-500 text-sm hidden" id="requisitosTrabajoError">Este campo es
                        obligatorio.</span>
                </label>
                <label for="Nota" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Nota
                    </span>
                    <input type="text" value="{{ $servicio->nota }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        disabled name=nota>
                    <span class="text-red-500 text-sm hidden" id="notaError">Este campo es obligatorio.</span>
                </label>
                <label for="etapa" class=" flex flex-col gap-2">
                    <span class="font-bold">

                        Etapa
                    </span>
                    <input type="text" value="{{ $servicio->etapa->nombre }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        disabled name=etapa>
                    <span class="text-red-500 text-sm hidden" id="etapaError">Este campo es obligatorio.</span>
                </label>

                <span id="btn-anterior"
                    class="px-10 py-2 bg-naranja-claro-400 border-2 border-black transition-all ease-in-out duration-300 text-center cursor-pointer hover:bg-naranja-industrial-500 hover:text-white">Anterior</span>
                </label>
            </div>
            <form action="{{ route('Servicios.destroy', $servicio->id_servicio) }}" method="POST"
                class="flex w-full justify-evenly gap-5">
                @csrf
                @method('DELETE')
                <a href="{{ route('Etapas.servicios', $id_etapa) }}"
                    class="font-bold py-2 px-10 text-center rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out  hover:bg-amarillo-pollo-300">
                    Volver
                </a>
                @can('Servicios.edit')
                <a href="{{ route('Servicios.edit', $servicio->id_servicio) }}"
                    class="font-bold py-2 px-10 text-center rounded-sm bg-amarillo-pollo-300 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500">Editar</a>
                @endcan
                @can('Servicios.destroy')
                <button type="submit"
                    class="font-bold py-2 px-10 rounded-sm bg-naranja-claro-400 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-600">Eliminar</button>
                @endcan
            </form>
        </div>
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
        const $form3 = $('#form3');
        const $nextButton = $('#btn-siguiente');
        const $previousButton = $('#btn-anterior');
        const $backform2 = $('#backform2');
        const $nextform3 = $('#nextform3');



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

        // Manejador de eventos para el botón "Siguiente" del formulario 2
        $nextform3.click(function() {
            $form3.show();
            $form2.hide();
            $form3.removeClass('hidden').show();
            document.getElementById('form3').style.display = 'grid';
        });

        // Manejador de eventos para el botón "Anterior" del formulario 3
        $backform2.click(function() {
            $form2.show();
            $form3.hide();
            $form1.hide();
            // Remover la clase 'grid' del formulario 3 (opcional)
        });
    });
</script>