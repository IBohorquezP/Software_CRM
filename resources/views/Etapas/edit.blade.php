@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Editar Etapa')
@section('main')
    <section class="grid grid-cols-2 gap-10 justify-items-center">
        <div class="col-start-2">
            <h1 class="text-bold font-bold text-4xl text-center mb-10">Editar Etapa</h1>
            {{-- poner el metodo update en la ruta --}}
            <form action="{{ route('Servicios.store') }}" method="POST" enctype="multipart/form-data"
                class="grid grid-cols-2 gap-10">
                {{ method_field('PUT') }}
                @csrf

                <label for="Numero" class="font-bold flex flex-col gap-2">
                    Número de la Etapa
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        required>
                    <span class="text-red-500 text-sm hidden" id="numeroError">Este campo es obligatorio.</span>
                </label>

                <label for="Tipo" class="font-bold flex flex-col gap-2">
                    Tipo
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        required>
                    <span class="text-red-500 text-sm hidden" id="tipoError">Este campo es obligatorio.</span>
                </label>

                <label for="Descripcion"  class="font-bold flex flex-col gap-2">
                    Descripción
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 h-[200px] focus:border-naranja-industrial-400"
                        required>
                    <span class="text-red-500 text-sm hidden" id="descripcionError">Este campo es obligatorio.</span>
                </label>

                <label for="imageUpload" class="flex hover:cursor-pointer items-center">
                    <div class="flex flex-col justify-center items-center gap-2">
                        <span class="font-bold">Foto</span>
                        <span class="custom-file-upload-text">Seleccione una imagen...</span>
                    </div>
                    <input type="file" name="image" id="imageUpload" accept="image/*" style="display: none;">
                    <img id="imagePreview" src="" class="w-[135px] h-[135px] object-cover border-4 border-black">
                </label>

                <div class="col-span-2 flex justify-evenly w-full">
                    <a href="{{ route('Servicios.index') }}"
                        class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out hover:bg-amarillo-pollo-300">Volver</a>
                    <button type="submit"
                        class="font-bold py-2 px-10 rounded-sm bg-amarillo-pollo-300 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500">Guardar</button>
                </div>
            </form>
        </div>
        <img src="{{ asset('/css/images/CRM1.jpeg') }}" class="row-start-1 border-4 border-black p-5 bg-gray-200 object-cover" style="height: 400px">
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
