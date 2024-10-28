@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Crear Servicio')
@section('main')
    <section class="grid grid-cols-2 gap-10 justify-items-center">
        <div>
            <h1 class="text-bold font-bold text-4xl text-center mb-10">Crear Servicio</h1>
            {{-- poner el metodo update en la ruta --}}
            <form action="{{ route('Motores-Servicios.store') }}" method="POST" enctype="multipart/form-data"
                class="grid gap-5">

                @csrf
                <div id="form1" class="grid grid-cols-2 gap-5">
                    <label for="servicio" class="font-bold flex flex-col gap-2">
                        Servicio
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" 
                            name=servicio>
                        <span class="text-red-500 text-sm hidden" id="numeroServicioError">Este campo es obligatorio.</span>
                    </label>

                    <label for="id_cliente" class="font-bold flex flex-col gap-2">
                        Cliente
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                            name=id_cliente>
                        <span class="text-red-500 text-sm hidden" id="clienteError">Este campo es obligatorio.</span>
                    </label>

                    <label for="componente" class="font-bold flex flex-col gap-2">
                        Componente
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                            name=componente>
                        <span class="text-red-500 text-sm hidden" id="componenteError">Este campo es obligatorio.</span>
                    </label>
                    <label for="modelo" class="font-bold flex flex-col gap-2">
                        Modelo
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                            name=modelo>
                        <span class="text-red-500 text-sm hidden" id="modeloError">Este campo es obligatorio.</span>
                    </label>
                    <label for="serial" class="font-bold flex flex-col gap-2">
                        Serial
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                            name=serial>
                        <span class="text-red-500 text-sm hidden" id="serialError">Este campo es obligatorio.</span>
                    </label>
                    <label for="horometro" class="font-bold flex flex-col gap-2">
                        Horómetro
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                            name=horometro>
                        <span class="text-red-500 text-sm hidden" id="horometroError">Este campo es obligatorio.</span>
                    </label>
                    <label for="marca" class="font-bold flex flex-col gap-2">
                        Marca
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                            name=marca>
                        <span class="text-red-500 text-sm hidden" id="marcaError">Este campo es obligatorio.</span>
                    </label>
                    <label for="fecha_llegada" class="font-bold flex flex-col gap-2">
                        Fecha Llegada
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
                    <label for="fecha_salida_estimada" class="font-bold flex flex-col gap-2">
                        Fecha Salida Estimada
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                            name=fecha_salida_estimada>
                        <span class="text-red-500 text-sm hidden" id="fechaSalidaEstimadaError">Este campo es
                            obligatorio.</span>
                    </label>
                    <label for="fecha_salida_real" class="font-bold flex flex-col gap-2">
                        Fecha Salida Real
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                            name=fecha_salida_real>
                        <span class="text-red-500 text-sm hidden" id="fechaSalidaRealError">Este campo es
                            obligatorio.</span>
                    </label>
                    <label for="requisito" class="font-bold flex flex-col gap-2">
                        Requisitos del Trabajo
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                            name=requisito>
                        <span class="text-red-500 text-sm hidden" id="requisitosTrabajoError">Este campo es
                            obligatorio.</span>
                    </label>
                    <label for="Nota" class="font-bold flex flex-col gap-2">
                        Nota
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                            name=nota>
                        <span class="text-red-500 text-sm hidden" id="notaError">Este campo es obligatorio.</span>
                    </label>
                    <label for="contador" class="font-bold flex flex-col gap-2">
                        Contador
                        <input type="text"
                            class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                            name=contador>
                        <span class="text-red-500 text-sm hidden" id="contadorError">Este campo es obligatorio.</span>
                    </label>
                    <!-- <label for="imageUpload" class="flex hover:cursor-pointer items-center">
                        <div class="flex flex-col justify-center items-center gap-2">
                            <span class="font-bold">Foto</span>
                            <span class="custom-file-upload-text">Seleccione una imagen...</span>
                        </div>
                        <input type="file" name="image" id="imageUpload" accept="image/*" style="display: none;">
                        <img id="imagePreview" src=""
                            class="w-[135px] h-[135px] object-cover border-4 border-black">
                    </label> -->
                    <span id="btn-anterior"
                        class="px-10 py-2 bg-naranja-claro-400 border-2 border-black transition-all ease-in-out duration-300 text-center cursor-pointer hover:bg-naranja-industrial-500 hover:text-white">Anterior</span>
                </div>
                {{-- hasta aca --}}
                <div class="mt-5 flex justify-evenly w-full">
                    <a href="{{ route('Motores-Servicios.index') }}"
                        class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out hover:bg-amarillo-pollo-300">Volver</a>
                    <button type="submit"
                        class="font-bold py-2 px-10 rounded-sm bg-amarillo-pollo-300 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500">Guardar</button>
                </div>
            </form>
        </div>
        <img src="{{ asset('/css/images/CRM1.jpeg') }}"
            class="self-center border-4 border-black p-5 bg-gray-200 object-cover" style="height: 400px">
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
    $(document).ready(function() {
        // Referencias a los formularios y botones usando jQuery
        const $form1 = $('#form1');
        const $form2 = $('#form2');
        const $nextButton = $('#btn-siguiente');
        const $previousButton = $('#btn-anterior');

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
