@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Ver Bahia')
@section('main')

    <section class="grid grid-cols-2 gap-10 justify-center items-center justify-items-center">
        <div class="col-start-2">
            <h1 class="text-bold font-bold text-4xl text-center mb-10">Bahías</h1>
            <div class="grid grid-cols-2 gap-5 ">
                <label for="Numero" class="font-bold flex flex-col gap-2 col-span-2">Nombre <input type="text" disabled
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name="Nombre"></label>
                {{-- <label for="Tipo" class="font-bold flex flex-col gap-2">Tipo<input type="text" disabled
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400" name='Tipo'></label> --}}
                <label for="Descripcion" class="col-span-2 font-bold flex flex-col gap-2 w-full">Descripción<input
                        type="text" disabled
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name="Descripcion"></label>
                <form action="" class="col-span-2 flex justify-evenly w-full gap-5">
                    <a href="{{ route('Bahias.index') }}"
                        class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out  hover:bg-amarillo-pollo-300">Volver</a>
                    <a href="#"
                        class="font-bold py-2 px-10 rounded-sm bg-amarillo-pollo-300 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500">Editar</a>
                    <button type="submit"
                        class="font-bold py-2 px-10 rounded-sm bg-naranja-claro-400 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-600">Eliminar</button>
                </form>
            </div>
        </div>
        <img src="{{ asset('css/images/CRM3.webp') }}"
            class="row-start-1 border-4 border-black p-5 bg-gray-200 h-[400px] object-cover">
    </section>
@endsection