@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Crear Cliente')
@section('main')
    <section class="grid grid-cols-2 gap-10 items-center">
        <div>
            <h1 class="text-bold font-bold text-4xl text-center mb-10">Nuevo Cliente</h1>
            {{-- poner el metodo update en la ruta --}}
            <form action="{{ route('Servicios.store') }}" method="POST" enctype="multipart/form-data"
                class="grid grid-col-2 gap-10">
                {{ method_field('PUT') }}
                @csrf

                <label for="Nombre" class="font-bold flex flex-col gap-2">
                    Nombre
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        required name="Nombre">
                    <span class="text-red-500 text-sm hidden" id="nombreError">Este campo es obligatorio.</span>
                </label>
                <label for="Telefono" class="font-bold flex flex-col gap-2">Telefono<input type="text" 
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" name='Telefono'></label>
                <label for="Cedula" class="font-bold flex flex-col gap-2">
                    Cedula
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name="Cedula" required>
                    <span class="text-red-500 text-sm hidden" id="cedulaError">Este campo es obligatorio.</span>
                </label>

                <label for="imageUpload" class="flex hover:cursor-pointer justify-center items-center gap-5">
                  <div class="flex flex-col gap-2 justify-center items-center">
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
        <img src="{{ asset('/css/images/CRM3.webp') }}" class="w-full h-[500px] object-cover">
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
