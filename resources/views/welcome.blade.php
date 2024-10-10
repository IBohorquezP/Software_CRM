@extends('layouts.header')
@extends('layouts.footer')
@section('main')
    <section class="mt-10 grid grid-cols-2 gap-5 w-4/5 items-center mx-auto p-5">
        <div>
            <img src="{{asset('/css/images/CRM1.jpeg')}}" class="w-full h-[500px] object-cover">
        </div>
        <div class="flex flex-col gap-5 items-center p-5">   
            <h1 class="text-naranja-industrial-500 text-5xl font-bold drop-shadow-xl ">BIENVENIDOS</h1>
            <p class="text-4xl font-semilight text-center">
                Este es el Software de Seguimiento del Centro de Reconstrucción de Motores (CRM)
                del Consorcio de Cogestión Venequip
            </p>
        </div>
        <img src="{{asset('/css/images/Logo2.png')}}" class="col-start-2 justify-self-end">
    </section>
@endsection