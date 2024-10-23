@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Ver Tecnico')
@section('main')
    <section class="grid grid-cols-2 gap-10 items-center">
        <div class="col-start-2">
            <h1 class="text-bold font-bold text-4xl text-center mb-10">Ver Técnico</h1>
            {{-- poner el metodo update en la ruta --}}
            <div class="grid grid-cols-2 gap-5">
                <label for="Nombre" class="font-bold flex flex-col gap-2">
                    Nombre
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        required disabled name="Nombre">
                    <span class="text-red-500 text-sm hidden" id="nombreError">Este campo es obligatorio.</span>
                </label>
                <label for="Apellido" class="font-bold flex flex-col gap-2">
                    Apellido
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        required disabled name="Apellido">
                    <span class="text-red-500 text-sm hidden" id="apellidoError">Este campo es obligatorio.</span>
                </label>
                <label for="Cedula" class="font-bold flex flex-col gap-2">
                    Cédula
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name="Cedula" required disabled>
                    <span class="text-red-500 text-sm hidden" id="cedulaError">Este campo es obligatorio.</span>
                </label>
                <label for="Cargo" class="font-bold flex flex-col gap-2">
                    Cargo
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        required disabled name="Cargo">
                    <span class="text-red-500 text-sm hidden" id="cargoError">Este campo es obligatorio.</span>
                </label>
                <label for="Correo" class="col-span-2 font-bold flex flex-col gap-2">Correo<input type="email"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" required disabled
                        name='Correo'></label>

                {{-- <label for="imageUpload" class="flex hover:cursor-pointer justify-center items-center ">
                    <div class="flex flex-col gap-2 justify-center items-center">
                        <span class="font-bold">Foto</span>
                        <span class="custom-file-upload-text">Seleccione una imagen...</span>
                    </div>
                    <input type="file" name="image" id="imageUpload" accept="image/*" style="display: none;">
                    <img id="imagePreview" src="" class="w-[135px] h-[135px] object-cover border-4 border-black">
                </label> --}}

                <form action="" class="col-span-2 flex justify-evenly w-full gap-5">
                  <a href="{{ route('Tecnicos.index') }}"
                      class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out  hover:bg-amarillo-pollo-300">Volver</a>
                  <a href="#"
                      class="font-bold py-2 px-10 rounded-sm bg-amarillo-pollo-300 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500">Editar</a>
                  <button type="submit" class="font-bold py-2 px-10 rounded-sm bg-naranja-claro-400 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-600">Eliminar</button>
              </form>
            </div>
        </div>
        <img src="{{ asset('/css/images/CRM3.webp') }}" class="row-start-1 border-4 border-black p-5 bg-gray-200 h-[400px] object-cover">
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
</script>
