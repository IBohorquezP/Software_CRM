@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Planificacion')
@section('main')
    <section>
        <h1 class="text-[60px] text-center font-bold drop-shadow-xl">Planificación</h1>
    </section>
    <section class="grid grid-cols-5 gap-12 ">
        <a href="{{route('Clientes.index')}}" class="border-4 border-black p-10 text-center items-center flex flex-col gap-5 transition-all ease-in-out duration-300 hover:border-naranja-industrial-500 hover:scale-105">
            <img src="{{asset('/css/images/planificacion/Clientes.png')}}" class="w-[150px]">
            <p class="text-xl  font-bold">Clientes</p>
        </a>
        <a href="{{route('Etapas.index')}}" class="border-4 border-black p-10 text-center items-center flex flex-col gap-5 transition-all ease-in-out duration-300 hover:border-naranja-industrial-500 hover:scale-105">
            <img src="{{asset('/css/images/planificacion/Alquiler-de-equipos-1-150x150.png')}}" class="w-[150px]">
            <p class="text-xl  font-bold">Servicios</p>
        </a>
        <a href="{{route('Tecnicos.index')}}" class="border-4 border-black p-10 text-center items-center flex flex-col gap-5 transition-all ease-in-out duration-300 hover:border-naranja-industrial-500 hover:scale-105">
            <img src="{{asset('/css/images/planificacion/Tecnico.png')}}" class="w-[150px]">
            <p class="text-xl  font-bold">Técnicos</p>
        </a>
        <img src="{{ asset('css/images/Motores1.jpeg') }}" class="w-full h-full object-cover  row-start-1">
        <img src="{{ asset('css/images/Motores2.jpeg') }}" class="w-full h-full object-cover ">
    </section>
@endsection
