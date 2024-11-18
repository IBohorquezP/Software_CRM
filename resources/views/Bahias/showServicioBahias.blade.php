@extends('layouts.header')
@extends('layouts.footer')
@section('title','Bahias del servicio')
@section('main')
{{-- @foreach ($servicio_bahias as $servicio_bahia)
  
@endforeach --}}
<div class="w-full flex justify-between items-center">
  <a href="/Etapas" class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-claro-400 hover:bg-naranja-industrial-500">Volver</a>
  <a href="/Etapas/show" class="text-[45px] font-bold drop-shadow-xl ">Etapa</a>
  <a href="{{route('Bahias.asignarBahias', $servicio->id_servicio)}}" class="px-8 py-1 border-4 border-black font-semibold transition-all ease-in-out duration-300 bg-naranja-claro-400 hover:bg-naranja-industrial-500">Agregar</a>
</div>
  {{-- {{$servicio_bahias}} --}}

  {{-- {{$servicio}} --}}

  {{$servicio_existente}}
@endsection