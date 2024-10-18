@extends('layouts.header')
@extends('layouts.footer')
@section('title','Etapas')
@section('main')
    <section class="w-full flex items-center justify-evenly ">
        <a href="#" class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-claro-400 hover:bg-naranja-industrial-500">Bahías</a>
        <h1 class="text-[60px] font-bold drop-shadow-xl">Etapas</h1>
        <a href="{{route('Servicios.create')}}" class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-industrial-500 hover:bg-naranja-claro-400 ">Agregar</a>
    </section>
    <section class="grid grid-cols-4 gap-10">
      <a href="#" class="border-4 border-black p-10 flex flex-col items-center gap-5 transition-all ease-in-out duration-300 hover:border-naranja-industrial-500">
          <img src="{{asset('/css/images/planificacion/Motor.png')}}" class="w-[150px]">
          <p class="text-xl text-center font-semibold">Desarme y Evaluación</p>
      </a>
      <img src="{{asset('css/images/etapas/desarme.webp')}}" class="w-full h-full object-cover  row-start-1">
      <a href="#" class="border-4 border-black p-10 flex flex-col items-center  gap-5 transition-all ease-in-out duration-300 hover:border-naranja-industrial-500">
          <img src="{{asset('/css/images/planificacion/Motor.png')}}" class="w-[150px]">
          <p class="text-xl  font-semibold">Armado y Prueba</p>
      </a>
      <img src="{{asset('css/images/etapas/armado.webp')}}" class="w-full h-full object-cover ">
    </section>
@endsection