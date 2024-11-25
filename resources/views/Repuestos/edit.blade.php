@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Editar Repuesto')
@section('main')
    <section class="grid grid-cols-2 gap-10 items-center">
        <div class="col-start-2">
            <h1 class="text-bold font-bold text-4xl text-center mb-10">Editar Repuesto</h1>
            {{-- poner el metodo update en la ruta --}}
            <form action="{{ route('Repuestos.update') }}" method="POST" enctype="multipart/form-data"
                class="grid grid-cols-2 gap-5">
                
                @csrf
                @method('PUT')
                <label for="id" class="flex flex-col gap-2">
                    <span class="font-bold">

                        ID del Repuestos
                    </span>
                    <input type="text" 
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
                <label for="Nombre" class="flex flex-col gap-2">
                    <span class="font-bold">

                        Nombre
                    </span>
                    <input type="text" 
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
                <label for="Proveedor" class="flex flex-col gap-2 w-full">
                    <span class="font-bold">
                        Proveedor
                    </span>
                    <input type="text" 
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
                <label for="Precio" class="flex flex-col gap-2 w-full">
                    <span class="font-bold">
                        Precio
                    </span>
                    <input type="text" 
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
                <label for="FechaSolicitud" class="flex flex-col gap-2 w-full">
                    <span class="font-bold">
                        Fecha Solicitud
                    </span>
                    <input type="text" 
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
                <label for="FechaLLegada" class="flex flex-col gap-2 w-full">
                    <span class="font-bold">
                        Fecha LLegada
                    </span>
                    <input type="text" 
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
                <label for="Motor" class="flex flex-col gap-2 w-full">
                    <span class="font-bold">
                        Motor
                    </span>
                    <input type="text" 
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
                <label for="imageUpload" class="flex hover:cursor-pointer items-center">
                    <div class="flex flex-col justify-center items-center gap-2">
                        <span class="font-bold">Foto</span>
                        <span class="custom-file-upload-text">Seleccione una imagen...</span>
                    </div>

                    <input type="file" name="image" id="imageUpload" accept="image/*" style="display: none;">
                    <img id="imagePreview" src="" class="w-[135px] h-[135px] object-cover border-4 border-black">
                </label>
                <div action="" class="col-span-2 flex justify-evenly w-full">
                    <span class="font-bold">

                    </span>
                    <a href="{{ route('Repuestos.index') }}"
                        class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out  hover:bg-amarillo-pollo-300">Volver</a>
                    <button type="submit"
                        class="font-bold py-2 px-10 rounded-sm bg-naranja-claro-400 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-600">Guardar</button>
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
</script>
