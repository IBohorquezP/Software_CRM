@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Etapas')
@section('main')
    <section class="w-full flex flex-col items-center justify-evenly gap-2.5">
        <div>
            <h1 class="text-[60px] font-bold drop-shadow-xl">Etapas</h1>
        </div>
        <div class="w-full flex justify-between items-center">
            <a href="/planificacion"
                class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-claro-400 hover:bg-naranja-industrial-500">Volver</a>
                <!-- <a href="{{ route('Etapas.create') }}"
                    class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-industrial-500 hover:bg-naranja-claro-400 ">Agregar</a> -->
            <a href="{{route('Bahias.index')}}"
                class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-industrial-500 hover:bg-naranja-claro-400 ">Bahías</a>
        </div>
    </section>
    <section class="grid grid-cols-5 gap-10">
    @foreach ($etapas as $etapa)  
        <a href="{{ route('Servicios.index', $etapa->id_etapa)}}"
            class="border-4 border-black p-10 text-center items-center flex flex-col gap-5 transition-all ease-in-out duration-300 hover:border-naranja-industrial-500 hover:scale-105">
            <img src="{{ asset($etapa->foto) }}" class="w-[150px] h-[100px]">
            <p class="text-xl text-center font-bold">{{ $etapa->nombre }}</p>
        </a>
    @endforeach 
        <img src="{{ asset('css/images/etapas/desarme.webp') }}" class="w-full h-full object-cover  row-start-1">
        <img src="{{ asset('css/images/etapas/armado.webp') }}" class="w-full h-full object-cover ">
    </section>
@endsection
