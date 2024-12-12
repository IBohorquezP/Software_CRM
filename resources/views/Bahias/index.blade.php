@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Bahias')
@section('main')
<section class="w-full flex flex-col items-center justify-evenly gap-2.5">
    <div>
        <h1 class="text-[60px] font-bold drop-shadow-xl">Bahías</h1>
    </div>
    <div class="w-full flex justify-between items-center">
        <a href="{{route('Etapas.index')}}"
            class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-claro-400 hover:bg-naranja-industrial-500">Volver</a>
        <!-- <a href="{{route('Etapas.index')}}"
                class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-claro-400 hover:bg-naranja-industrial-500">Etapas</a> -->
        @can('Bahias.create')
        <a href="{{ route('Bahias.create') }}"
            class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-industrial-500 hover:bg-naranja-claro-400 ">Agregar</a>
        @endcan
    </div>
</section>
<section class="grid grid-cols-4 gap-10">
    @foreach ($bahias as $bahia)
    <a href="{{ route('Bahias.show', $bahia->id_bahia) }}"
        class="border-4 border-black p-10 flex flex-col items-center gap-5 transition-all ease-in-out duration-300 hover:shadow-lg hover:shadow-naranja-industrial-600 hover:border-naranja-industrial-500 hover:scale-105">
        <img src="{{ asset($bahia->foto) }}" class="w-[300px] h-[220px] object-cover " alt="Foto de {{ $bahia->img }}">
        <p class="text-lg text-center font-bold">{{ $bahia->nombre }}</p>
    </a>
    @endforeach
</section>
@endsection