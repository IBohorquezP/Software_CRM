@extends('layouts.header')
@extends('layouts.footer')
@section('title','Repuestos')
@section('main')
    <section class="w-full flex items-center justify-evenly ">
        <a href="/planificacion" class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-claro-400 hover:bg-naranja-industrial-500">Volver</a>
        <h1 class="text-[60px] font-bold drop-shadow-xl">Repuestos</h1>
        <a href="{{route('Repuestos.create')}}" class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-industrial-500 hover:bg-naranja-claro-400 ">Agregar</a>
    </section>
    <section class="grid grid-cols-4 gap-10">
        <a href="#"
            class="border-4 border-black p-10 flex flex-col items-center gap-5 transition-all ease-in-out duration-300 hover:shadow-lg hover:shadow-naranja-industrial-600 hover:border-naranja-industrial-500 hover:scale-105">
            <img src="{{ asset('/css/images/planificacion/Motor.png') }}" class="w-[150px]">
            <p class="text-xl text-center font-semibold">Desarme y Evaluación</p>
        </a>
        <a href="#"
            class="border-4 border-black p-10 flex flex-col items-center gap-5 transition-all ease-in-out duration-300 hover:shadow-lg hover:shadow-naranja-industrial-600 hover:border-naranja-industrial-500 hover:scale-105">
            <img src="{{ asset('/css/images/planificacion/Motor.png') }}" class="w-[150px]">
            <p class="text-xl text-center font-semibold">Desarme y Evaluación</p>
        </a>
        <a href="#"
            class="border-4 border-black p-10 flex flex-col items-center gap-5 transition-all ease-in-out duration-300 hover:shadow-lg hover:shadow-naranja-industrial-600 hover:border-naranja-industrial-500 hover:scale-105">
            <img src="{{ asset('/css/images/planificacion/Motor.png') }}" class="w-[150px]">
            <p class="text-xl text-center font-semibold">Desarme y Evaluación</p>
        </a>
        <a href="#"
            class="border-4 border-black p-10 flex flex-col items-center gap-5 transition-all ease-in-out duration-300 hover:shadow-lg hover:shadow-naranja-industrial-600 hover:border-naranja-industrial-500 hover:scale-105">
            <img src="{{ asset('/css/images/planificacion/Motor.png') }}" class="w-[150px]">
            <p class="text-xl text-center font-semibold">Desarme y Evaluación</p>
        </a>
        <a href="#"
            class="border-4 border-black p-10 flex flex-col items-center gap-5 transition-all ease-in-out duration-300 hover:shadow-lg hover:shadow-naranja-industrial-600 hover:border-naranja-industrial-500 hover:scale-105">
            <img src="{{ asset('/css/images/planificacion/Motor.png') }}" class="w-[150px]">
            <p class="text-xl text-center font-semibold">Desarme y Evaluación</p>
        </a>
        <a href="#"
            class="border-4 border-black p-10 flex flex-col items-center gap-5 transition-all ease-in-out duration-300 hover:shadow-lg hover:shadow-naranja-industrial-600 hover:border-naranja-industrial-500 hover:scale-105">
            <img src="{{ asset('/css/images/planificacion/Motor.png') }}" class="w-[150px]">
            <p class="text-xl text-center font-semibold">Desarme y Evaluación</p>
        </a>
        <a href="#"
            class="border-4 border-black p-10 flex flex-col items-center gap-5 transition-all ease-in-out duration-300 hover:shadow-lg hover:shadow-naranja-industrial-600 hover:border-naranja-industrial-500 hover:scale-105">
            <img src="{{ asset('/css/images/planificacion/Motor.png') }}" class="w-[150px]">
            <p class="text-xl text-center font-semibold">Desarme y Evaluación</p>
        </a>
        <a href="#"
            class="border-4 border-black p-10 flex flex-col items-center gap-5 transition-all ease-in-out duration-300 hover:shadow-lg hover:shadow-naranja-industrial-600 hover:border-naranja-industrial-500 hover:scale-105">
            <img src="{{ asset('/css/images/planificacion/Motor.png') }}" class="w-[150px]">
            <p class="text-xl text-center font-semibold">Desarme y Evaluación</p>
        </a>
    </section>
@endsection