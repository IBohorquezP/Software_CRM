@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Editar Cliente')
<link rel="icon" href="{{ asset('css/images/Logoi.ico') }}" type="image/x-icon">
@section('main')
    <section class="grid grid-cols-2 gap-10 items-center">
        <div class="col-start-2">
            <h1 class="text-bold font-bold text-4xl text-center mb-10">Editar Cliente</h1>
            {{-- poner el metodo update en la ruta --}}
            <form action="{{ route('Clientes.update', $cliente->id_cliente) }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col gap-5">

                @csrf
                @method('PUT')
                <label for="Nombre" class=" flex flex-col gap-2">
                    <span class="font-bold">
                        Nombre
                    </span>
                    <input type="text"
                    value="{{ $cliente->nombre }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        required name="nombre">
                    <span class="text-red-500 text-sm hidden" id="nombreError">Este campo es obligatorio.</span>
                </label>
                <label for="Tipo" class=" flex flex-col gap-2">
                    <span class="font-bold">
                        Tipo
                    </span>
                    <input type="text"
                    value="{{ $cliente->tipo }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name="tipo" required>
                    <span class="text-red-500 text-sm hidden" id="tipoError">Este campo es obligatorio.</span>
                </label>

                <div class="col-span-2 flex justify-evenly w-full">
                    <a href="{{ route('Clientes.index') }}"
                        class="font-bold py-2 px-10 rounded-sm bg-amarillo-pollo-300 transition-all duration-300 ease-in-out hover:bg-amarillo-pollo-400">Volver</a>
                    <button type="submit"
                        class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-600">Guardar</button>
                </div>
            </form>
        </div>
        <img src="{{ asset($cliente->img) }}"
            class="justify-self-center row-start-1 border-4 border-black p-5 bg-gray-200 h-[400px] object-cover">
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