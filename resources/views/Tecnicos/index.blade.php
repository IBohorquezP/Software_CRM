@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Tecnicos')
@section('main')
    <section class="w-full flex items-center justify-between ">
      <a href="/Planificacion" class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-claro-400 hover:bg-naranja-industrial-500">Volver</a>
        <h1 class="text-[60px] font-bold drop-shadow-xl mx-auto">Técnicos</h1>
        <a href="{{ route('Tecnicos.create') }}"
            class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-industrial-500 hover:bg-naranja-claro-400 ">Agregar</a>
    </section>
    <section class="grid grid-cols-4 gap-10">
    @foreach ($tecnicos as $tecnico)
        <a href="{{ route('Tecnicos.show', $tecnico->id_tecnico) }}"
            class="border-4 border-black p-10 flex flex-col items-center gap-5 transition-all ease-in-out duration-300 hover:shadow-lg hover:shadow-naranja-industrial-600 hover:border-naranja-industrial-500 hover:scale-105">
  <img src="{{ asset($tecnico->foto) }}" class="w-[300px] h-[220px] object-cover" alt="Foto de {{ $tecnico->nombre }}">
            <p class="text-lg text-center font-bold">{{ $tecnico->nombre }} {{$tecnico->apellido}}</p>
            <p class="text-lg text-center text-gray-600">{{ $tecnico->cargo }}</p>
        </a>
    @endforeach
    </section>
@endsection
