@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Asignar bahia')

@section('main')
{{-- copia --}}
    {{-- <div id="form3" class="hidden grid-cols-2 gap-5">
        <p class="text-[30px] font-semibold text-center col-span-2">Informacion de Bahia</p>
        <label for="bahia" class=" col-span-2 flex flex-col gap-2">

            <span class="font-bold">
                Seleccione una bahia
            </span>
            <select aria-placeholder="Seleccione una Bahía"
                class="w-full col-span-2 p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">

            </select>
        </label>
        <label for="fecha_estimada" class=" flex flex-col gap-2">
            <span class="font-bold">

                Fecha Estimada
            </span>
            <input type="text"
                class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                name=fecha_estimada>
            <span class="text-red-500 text-sm hidden" id="fechaEstimadaError">Este campo es
                obligatorio.</span>
        </label>
        <label for="fecha_real" class=" flex flex-col gap-2">
            <span class="font-bold">

                Fecha Real
            </span>
            <input type="text"
                class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                name=fecha__real>
            <span class="text-red-500 text-sm hidden" id="fechaRealError">Este campo es
                obligatorio.</span>
        </label>
        <label for="requerimento" class=" flex flex-col gap-2">
            <span class="font-bold">

                Requerimentos del Trabajo
            </span>
            <input type="text"
                class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                name=requerimento>
            <span class="text-red-500 text-sm hidden" id="requerimentosTrabajoError">Este campo es
                obligatorio.</span>
        </label>
        <label for="Herramienta" class=" flex flex-col gap-2">
            <span class="font-bold">

                Herramienta
            </span>
            <input type="text"
                class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                name=herramienta>
            <span class="text-red-500 text-sm hidden" id="herramientaError">Este campo es obligatorio.</span>
        </label>
        <label for="documentacion" class=" flex flex-col gap-2">
            <span class="font-bold">

                Documentación
            </span>
            <input type="text"
                class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                name=documentacion>
            <span class="text-red-500 text-sm hidden" id="documentacionError">Este campo es
                obligatorio.</span>
        </label>
        <label for="alcance" class=" flex flex-col gap-2">

            <span class="font-bold">
                Alcance
            </span>
            <input type="text"
                class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                name=alcance>
            <span class="text-red-500 text-sm hidden" id="alcanceError">Este campo es obligatorio.</span>
        </label>

        <span id="backform2"
            class="px-10 py-2 bg-naranja-claro-400 border-2 border-black transition-all ease-in-out duration-300 text-center cursor-pointer hover:bg-naranja-industrial-500 hover:text-white">Anterior</span>

    </div> --}}

    <div class="grid grid-cols-2 gap-5">
        <div class="flex flex-col">
            <p class="text-[30px] mb-10 font-semibold text-center col-span-2">Informacion de Bahia</p>
            <div class="grid grid-cols-2 gap-5">
                <label for="bahia" class=" col-span-2 flex flex-col gap-2">
        
                    <span class="font-bold">
                        Seleccione una bahia
                    </span>
                    <select aria-placeholder="Seleccione una Bahía"
                        class="w-full col-span-2 p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400">
        
                    </select>
                </label>
                <label for="fecha_estimada" class=" flex flex-col gap-2">
                    <span class="font-bold">
        
                        Fecha Estimada
                    </span>
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=fecha_estimada>
                    <span class="text-red-500 text-sm hidden" id="fechaEstimadaError">Este campo es
                        obligatorio.</span>
                </label>
                <label for="fecha_real" class=" flex flex-col gap-2">
                    <span class="font-bold">
        
                        Fecha Real
                    </span>
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=fecha__real>
                    <span class="text-red-500 text-sm hidden" id="fechaRealError">Este campo es
                        obligatorio.</span>
                </label>
                <label for="requerimento" class=" flex flex-col gap-2">
                    <span class="font-bold">
        
                        Requerimentos del Trabajo
                    </span>
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=requerimento>
                    <span class="text-red-500 text-sm hidden" id="requerimentosTrabajoError">Este campo es
                        obligatorio.</span>
                </label>
                <label for="Herramienta" class=" flex flex-col gap-2">
                    <span class="font-bold">
        
                        Herramienta
                    </span>
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=herramienta>
                    <span class="text-red-500 text-sm hidden" id="herramientaError">Este campo es obligatorio.</span>
                </label>
                <label for="documentacion" class=" flex flex-col gap-2">
                    <span class="font-bold">
        
                        Documentación
                    </span>
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=documentacion>
                    <span class="text-red-500 text-sm hidden" id="documentacionError">Este campo es
                        obligatorio.</span>
                </label>
                <label for="alcance" class=" flex flex-col gap-2">
        
                    <span class="font-bold">
                        Alcance
                    </span>
                    <input type="text"
                        class="p-2 bg-gray-100 border-4 border-black outline-0 transition-all ease-in-out duration-300 focus:border-naranja-industrial-400"
                        name=alcance>
                    <span class="text-red-500 text-sm hidden" id="alcanceError">Este campo es obligatorio.</span>
                </label>
            </div>
        </div>
        <img src="{{ asset('/css/images/CRM1.jpeg') }}"
            class="justify-self-center border-4 border-black p-5 bg-gray-200 h-[500px] object-cover">
        {{-- <span id="backform2"
      class="px-10 py-2 bg-naranja-claro-400 border-2 border-black transition-all ease-in-out duration-300 text-center cursor-pointer hover:bg-naranja-industrial-500 hover:text-white">Anterior</span> --}}
    
    </div>
@endsection
