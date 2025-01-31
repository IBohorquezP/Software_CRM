<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" href="{{ asset('css/images/Logoi.ico') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('Sistema CRM')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @yield('css')
    @vite('resources/css/app.css')
</head>

<body>
    <main class="w-[95%] mx-auto flex flex-col">
        <header class="w-full flex justify-between">
            <div class="flex">
                <img src="{{ asset('/css/images/Logo1.png') }}" class="w-[100px]">
                <div class="flex justify-center items-center space-x-3">
                    <h1 class="font-bold text-5xl">Sistema de Planificación</h1>
                    <p class="bg-naranja-industrial-500 p-2 text-4xl font-bold">CRM</p>
                </div>
            </div>
            <nav class="w-[40%] flex justify-end items-center">
                <ul class="flex gap-5">
                    <li
                        class=" bg-naranja-industrial-500 p-3 border-[3px] border-amarillo-oscuro-950 font-semibold transition-all duration-300 hover:bg-naranja-industrial-600 hover:text-white">
                        <a href="/dashboard" class="flex space-x-3 gap-2.5">Inicio
                            <img src='{{ asset('/css/images/house.svg') }}' class='w-6 h-6'>
                        </a>
                    </li>
                    <li
                        class=" bg-naranja-claro-400 p-3 border-[3px] border-amarillo-oscuro-950 font-semibold transition-all duration-300 hover:bg-naranja-claro-500 hover:text-white">
                        <a href="/Planificacion" class="flex space-x-3 gap-2.5 relative group:">Planificación
                            <img src='{{ asset('/css/images/pen.svg') }}' class='w-6 h-6'>
                        </a>
                    </li>
                    @if (!auth())
                    <li
                        class=" bg-naranja-industrial-300 p-3 border-[3px] border-amarillo-oscuro-950 font-semibold transition-all duration-300 hover:bg-naranja-industrial-300 hover:text-white">
                        <a href="/login" class="flex space-x-3 gap-2.5">Login
                            <img src='{{ asset('/css/images/user.png') }}' class='w-6 h-6'>
                        </a>
                    </li>
                    @else
                    <li class=" bg-naranja-industrial-300 p-3 border-[3px] border-amarillo-oscuro-950 font-semibold transition-all duration-300 hover:bg-naranja-industrial-300 hover:text-white">
                        <a href="/profile" class="flex space-x-3 gap-2.5">
                            {{auth()->user()->name}}
                            <img src='{{ asset('/css/images/user.png') }}' class='w-6 h-6'>
                        </a>
                    </li>
                    @endif
                    <ul
                        class="relative bg-naranja-claro-200 p-3 border-[3px] border-amarillo-oscuro-950 font-semibold transition-all duration-300 hover:bg-naranja-claro-300 hover:text-white">
                        <li>
                            <img src='{{ asset('/css/images/menu.svg') }}' class='w-6 h-6 cursor-pointer menu-icon' onclick="toggle_menu('header-menu')">
                        </li>
                        <div class="absolute top-[70px] left-[-140px] w-48 bg-white rounded-md shadow-md menu-content hidden" id="header-menu">
                            <li class="transition-all duration-300 ease-in-out rounded-t-md hover:bg-naranja-industrial-500 group "><a href="/Clientes"
                                    class="block py-2 px-4 text-gray-800 group-hover:text-white hover:text-gray-900">Clientes</a></li>
                            <li class="transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500 group "><a href="/Etapas"
                                    class="block py-2 px-4 text-gray-800 group-hover:text-white hover:text-gray-900">Servicios</a></li>
                            <li class="transition-all duration-300 ease-in-out hover:bg-naranja-industrial-500 group "><a href="/Tecnicos"
                                    class="block py-2 px-4 text-gray-800 group-hover:text-white hover:text-gray-900">Técnicos</a></li>
                        </div>
                    </ul>
                </ul>
            </nav>
        </header>
        <div>
            <span class="h-[12px] w-[75%] bg-naranja-industrial-500 inline-block rounded-full"></span>
            <span class="h-[12px] w-[15%] bg-naranja-claro-300 inline-block rounded-full"></span>
        </div>
        <div class="w-4/5 flex flex-col justify-center mx-auto mt-10 gap-10">
            @yield('main')
        </div>
        <div class="w-[90%] flex flex-col justify-center mx-auto mt-10 gap-10">
            @yield('main2')
        </div>
        @yield('footer')
    </main>
</body>
@yield('js')
<script>
    function toggle_menu(menu_id){
        const menus = document.getElementsByClassName('menu-content')
        for (let i = 0; i < menus.length; i++) {
            if (menus[i].id != menu_id) menus[i].classList.add('hidden')
        }
        const menu = document.getElementById(menu_id)
        menu.classList.toggle('hidden')
    }
</script>

</html>