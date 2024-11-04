@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Editar Bahias')
@section('main')
    <section class="grid grid-cols-2 gap-10 items-center">
        <div class="col-start-2">
            <h1 class="text-bold font-bold text-4xl text-center mb-10">Editar Bahía</h1>
            {{-- poner el metodo update en la ruta --}}
            <form action="{{ route('Bahias.update' , $bahia->id_bahia) }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col gap-5">

                @csrf
                @method('PUT')
                <label for="Nombre" class="flex flex-col gap-2">
                    <span class="font-bold">
                        Nombre
                    </span>
                    <input type="text"
                    value="{{$bahia->nombre}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        required name="nombre">
                    <span class="text-red-500 text-sm hidden" id="nombreError">Este campo es obligatorio.</span>
                </label>
                <label for="Descripcion" class="flex flex-col gap-2">
                    <span class="font-bold">
                        Descripción
                    </span>
                    <input type="text"
                    value="{{$bahia->descripcion}}"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 h-[200px] transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name="descripcion" required>
                    <span class="text-red-500 text-sm hidden" id="descripcionError">Este campo es obligatorio.</span>
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
                    <a href="{{ route('Bahias.index') }}"
                        class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out hover:bg-amarillo-pollo-300">Volver</a>
                    <button type="submit"
                        class="font-bold py-2 px-10 rounded-sm bg-amarillo-pollo-300 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500">Guardar</button>
                </div>
            </form>
        </div>
        <img src="{{ asset($bahia->img) }}" class="justify-self-center row-start-1 border-4 border-black p-5 bg-gray-200 h-[500px] object-cover">
    </section>
@endsection