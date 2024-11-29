@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Ver Cliente')
@section('main')
    <section class="grid grid-cols-2 gap-10 items-center">
        <div class="col-start-2">
            <h1 class="text-bold font-bold text-4xl text-center mb-10">Ver Cliente</h1>
            {{-- poner el metodo update en la ruta --}}
            
            <div class="flex flex-col justify-center gap-5">
                <label for="Nombre" class="flex flex-col gap-2 ">
                    <span class="font-bold">
                        Nombre
                    </span>
                    <input type="text" 
                        value="{{ $cliente->nombre }}"
                        class= "p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        required disabled name="nombre">
                    <span class="text-red-500 text-sm hidden" id="nombreError">Este campo es obligatorio.</span>
                </label>
                <label for="tipo" class="flex flex-col gap-2">
                    <span class="font-bold">
                        Tipo
                    </span>
                    <input type="text"
                        value="{{ $cliente->tipo }}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name="tipo" required disabled>
                    <span class="text-red-500 text-sm hidden" id="tipoError">Este campo es obligatorio.</span>
                </label>

                <form action="{{ route('Clientes.destroy', $cliente->id_cliente) }}" method="POST" class="col-span-2 flex justify-evenly w-full gap-5">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('Clientes.index') }}"
                        class="font-bold py-2 px-10 text-center rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out  hover:bg-amarillo-pollo-300">Volver</a>
                        <a href="{{ route('Clientes.edit', $cliente->id_cliente) }}"
                        class="font-bold py-2 px-10 text-center rounded-sm bg-amarillo-pollo-300 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500">Editar</a>
                    <button type="submit"
                        class="font-bold py-2 px-10 rounded-sm bg-naranja-claro-400 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-600">Eliminar</button>
                </form>
            </div>
        </div>
        <img src="{{ asset($cliente->foto) }}" class="justify-self-center row-start-1 border-4 border-black p-5 bg-gray-200 h-[500px] object-content">
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
