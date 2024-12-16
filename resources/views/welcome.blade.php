@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Inicio')
@section('main')

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<section class="mt-10 grid grid-cols-2 gap-5 items-center mx-auto p-3">
    <div>
        <img src="{{asset('/css/images/Venequip2.jpeg')}}" class="w-full h-[500px] object-cover">
    </div>
    <div class="flex flex-col gap-5 items-center p-5">
        <h1 class="text-naranja-industrial-500 text-5xl font-bold drop-shadow-xl ">BIENVENIDOS</h1>
        <p class="text-4xl font-semilight text-center">
            Este es el Sistema de Planificación del Centro de Reconstrucción de Motores (CRM)
            del Consorcio de Cogestión Venequip
        </p>
    </div>
</section>

<section class="flex items-center justify-center bg-gray-200 p-8  shadow-lg max-w-sm mx-auto">
    <div class="flex items-center space-x-6">
        <!-- Imagen del desarrollador -->
        <img class="w-20 h-20 rounded-full border-2 border-gris-input-500" src="{{ asset('css/images/ismael.jpg') }}" alt="Ismael Prado">

        <!-- Información del desarrollador -->
        <div>
            <h1 class="text-sm font-bold">Creado por Pasante</h1>
            <h2 class="text-lg font-semibold text-gray-700">Ismael Prado</h2>
            <p class="text-sm text-naranja-industrial-500"><b>Backend / Frontend</b></p>
        </div>
    </div>
</section>
@endsection
