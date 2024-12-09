@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Ver Etapa')
<link rel="icon" href="{{ asset('css/images/Logoi.ico') }}" type="image/x-icon">
@section('main')
<section class="grid grid-cols-2 gap-10 justify-center items-center justify-items-center">
    <div>
        <h1 class="text-bold font-bold text-4xl text-center mb-10">Etapa</h1>
        <div class="grid grid-cols-2 gap-5 ">
            <label for="nombre" class="flex flex-col gap-2">
                <span class="font-bold">
                    Nombre de la Etapa
                </span>
                <input type="text" disabled
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
            <label for="descripcion" class="col-span-2 flex flex-col gap-2 w-full">
                <span class="font-bold">
                    Descripción
                </span>
                <input type="text"
                    disabled
                    class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"></label>
            <form action="" class="col-span-2 flex justify-evenly w-full">
                <a href="{{ route('Etapas.index') }}"
                    class="font-bold py-2 px-10 rounded-sm bg-naranja-industrial-500 transition-all duration-300 ease-in-out  hover:bg-amarillo-pollo-300">Volver</a>
                <a href="#"
                    class="font-bold py-2 px-10 rounded-sm bg-amarillo-pollo-300 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500">Editar</a>
                <button type="submit" class="font-bold py-2 px-10 rounded-sm bg-naranja-claro-400 transition-all duration-300 ease-in-out hover:bg-naranja-industrial-600">Eliminar</button>
            </form>
        </div>

    </div>
    <img src="{{asset('css/images/CRM1.jpeg')}}" class="justify-self-center row-start-1 border-4 border-black p-5 bg-gray-200 h-[500px] object-cover">
</section>
@endsection