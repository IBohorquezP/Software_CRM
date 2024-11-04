@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Ver Tecnico')
@section('main')
    <section class="grid grid-cols-2 gap-10 items-center">
        <div class="col-start-2">
            <h1 class="text-bold font-bold text-4xl text-center mb-10">Ver Técnico</h1>
            {{-- poner el metodo update en la ruta --}}
            <div class="grid grid-cols-2 gap-5">
                <label for="Nombre" class="flex flex-col gap-2">
                    <span class="font-bold">
                        Nombre
                    </span>
                    <input type="text"
                        value= "{{$tecnico->nombre}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        required disabled name="nombre">
                    <span class="text-red-500 text-sm hidden" id="nombreError">Este campo es obligatorio.</span>
                </label>
                <label for="Apellido" class="flex flex-col gap-2">
                    <span class="font-bold">
                        Apellido
                    </span>
                    <input type="text"
                        value= "{{$tecnico->apellido}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        required disabled name="apellido">
                    <span class="text-red-500 text-sm hidden" id="apellidoError">Este campo es obligatorio.</span>
                </label>
                <label for="Cedula" class="flex flex-col gap-2">
                    <span class="font-bold">
                        Cédula
                    </span>
                    <input type="text"
                        value= "{{$tecnico->cedula}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name="cedula" required disabled>
                    <span class="text-red-500 text-sm hidden" id="cedulaError">Este campo es obligatorio.</span>
                </label>
                <label for="Cargo" class="flex flex-col gap-2">
                    <span class="font-bold">
                        Cargo
                    </span>
                    <input type="text"
                        value= "{{$tecnico->cargo}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        required disabled name="cargo">
                    <span class="text-red-500 text-sm hidden" id="cargoError">Este campo es obligatorio.</span>
                </label>
                <label for="cod_mecanico" class="col-span-2 flex flex-col gap-2">
                    <span class="font-bold">
                        Código Mecanico
                    </span>
                    <input type="text"
                        value= "{{$tecnico->cod_mecanico}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" required disabled
                        name='cod_mecanico'></label>

                <form action="" class="col-span-2 flex justify-evenly w-full gap-5">
                  <a href="{{ route('Tecnicos.index') }}"
                      class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out  hover:bg-amarillo-pollo-300">Volver</a>
                  <a href="{{ route('Tecnicos.edit', $tecnico->id_tecnico) }}"
                      class="font-bold py-2 px-10 rounded-sm bg-amarillo-pollo-300 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500">Editar</a>
                  <button type="submit" class="font-bold py-2 px-10 rounded-sm bg-naranja-claro-400 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-600">Eliminar</button>
              </form>
            </div>
        </div>
        <img src="{{ asset('/css/images/CRM3.webp') }}" class="justify-self-center row-start-1 border-4 border-black p-5 bg-gray-200 h-[500px] object-cover">
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
