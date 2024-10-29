@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Editar Servicio')
@section('main')
    <section class="grid grid-cols-2 gap-10 justify-items-center">
        <div class="w-full col-start-2">
            <h1 class="text-bold font-bold text-4xl text-center mb-10">Editar Servicio</h1>
            {{-- poner el metodo update en la ruta --}}
            <form action="{{ route('Motores-Servicios.store') }}" method="POST" enctype="multipart/form-data"
                class="grid gap-5">

                @csrf
                <div id="form1" class="grid grid-cols-2 gap-5">
                    <label for="servicio" class=" flex flex-col gap-2">
                        <span class="font-bold">
                            Servicio
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=servicio>
                        <span class="text-red-500 text-sm hidden" id="numeroServicioError">Este campo es obligatorio.</span>
                    </label>

                    <label for="id_cliente" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Cliente
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=id_cliente>
                        <span class="text-red-500 text-sm hidden" id="clienteError">Este campo es obligatorio.</span>
                    </label>

                    <label for="componente" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Componente
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=componente>
                        <span class="text-red-500 text-sm hidden" id="componenteError">Este campo es obligatorio.</span>
                    </label>
                    <label for="modelo" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Modelo
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=modelo>
                        <span class="text-red-500 text-sm hidden" id="modeloError">Este campo es obligatorio.</span>
                    </label>
                    <label for="serial" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Serial
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=serial>
                        <span class="text-red-500 text-sm hidden" id="serialError">Este campo es obligatorio.</span>
                    </label>
                    <label for="horometro" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Horómetro
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=horometro>
                        <span class="text-red-500 text-sm hidden" id="horometroError">Este campo es obligatorio.</span>
                    </label>
                    <label for="marca" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Marca
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=marca>
                        <span class="text-red-500 text-sm hidden" id="marcaError">Este campo es obligatorio.</span>
                    </label>
                    <label for="fecha_llegada" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Fecha Llegada
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=fecha_llegada>
                        <span class="text-red-500 text-sm hidden" id="fechallegadaError">Este campo es obligatorio.</span>
                    </label>
                    <span id="btn-siguiente"
                        class="col-start-2 px-10 py-2 bg-naranja-claro-400 border-2 border-black transition-all ease-in-out duration-300 cursor-pointer text-center hover:bg-naranja-industrial-500 hover:text-white">
                        Siguiente</span>
                </div>
                {{-- aqui es el otro formulario --}}
                <div id="form2" class="hidden grid-cols-2 gap-5">
                    <label for="fecha_salida_estimada" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Fecha Salida Estimada
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=fecha_salida_estimada>
                        <span class="text-red-500 text-sm hidden" id="fechaSalidaEstimadaError">Este campo es
                            obligatorio.</span>
                    </label>
                    <label for="fecha_salida_real" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Fecha Salida Real
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=fecha_salida_real>
                        <span class="text-red-500 text-sm hidden" id="fechaSalidaRealError">Este campo es
                            obligatorio.</span>
                    </label>
                    <label for="requisito" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Requisitos del Trabajo
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=requisito>
                        <span class="text-red-500 text-sm hidden" id="requisitosTrabajoError">Este campo es
                            obligatorio.</span>
                    </label>
                    <label for="Nota" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Nota
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=nota>
                        <span class="text-red-500 text-sm hidden" id="notaError">Este campo es obligatorio.</span>
                    </label>
                    <label for="contador" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Contador
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=contador>
                        <span class="text-red-500 text-sm hidden" id="contadorError">Este campo es obligatorio.</span>
                    </label>
                    <label for="etapa" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Etapa
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=etapa>
                        <span class="text-red-500 text-sm hidden" id="etapaError">Este campo es obligatorio.</span>
                    </label>

                    <span id="btn-anterior"
                        class="px-10 py-2 bg-naranja-claro-400 border-2 border-black transition-all ease-in-out duration-300 text-center cursor-pointer hover:bg-naranja-industrial-500 hover:text-white">Anterior</span>
                    <span id="nextform3"
                        class="col-start-2 px-10 py-2 bg-naranja-claro-400 border-2 border-black transition-all ease-in-out duration-300 cursor-pointer text-center hover:bg-naranja-industrial-500 hover:text-white">
                        Siguiente</span>
                </div>
                {{-- hasta aca --}}
                {{-- formulario 3 --}}
                <div id="form3" class="hidden grid-cols-2 gap-5">
                    <label for="fecha_estimada" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Fecha Estimada
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=fecha_estimada>
                        <span class="text-red-500 text-sm hidden" id="fechaEstimadaError">Este campo es
                            obligatorio.</span>
                    </label>
                    <label for="fecha_real" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Fecha Real
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=fecha__real>
                        <span class="text-red-500 text-sm hidden" id="fechaRealError">Este campo es
                            obligatorio.</span>
                    </label>
                    <label for="requerimento" class=" flex flex-col gap-2">
                        <span class="font-bold">

                            Requerimentos del Trabajo
                        </span>
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=requerimento>
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
                    <label for="bahia" class=" col-span-2 flex flex-col gap-2">

                        <span class="font-bold">
                            Seleccione una bahia
                        </span>
                        <select
                            class="w-full col-span-2 p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" >
                            <option value="">Seleccione una opción</option>
                            {{-- @foreach ($servicios as $servicio)
                                <option value="{{ $servicio->id }}">{{ $servicio->descripcion }}</option>
                            @endforeach --}}
                            <option value="Otro">Otro</option>
                        </select>
                    </label>
                    <span id="backform2"
                        class="px-10 py-2 bg-naranja-claro-400 border-2 border-black transition-all ease-in-out duration-300 text-center cursor-pointer hover:bg-naranja-industrial-500 hover:text-white">Anterior</span>

                </div>
                <div class="mt-5 flex justify-evenly w-full">
                    <a href="{{ route('Motores-Servicios.index') }}"
                        class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out hover:bg-amarillo-pollo-300">Volver</a>
                    <button type="submit"
                        class="font-bold py-2 px-10 rounded-sm bg-amarillo-pollo-300 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500">Guardar</button>
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
