<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite('resources/css/app.css')
</head>
<body>
  <main class="w-[95%] mx-auto flex flex-col">
    <header class="w-full flex justify-between">
      <div class="flex">
        <img  src="{{asset('/css/images/Logo1.png')}}" class="w-[100px]">
        <div class="flex justify-center items-center space-x-3">
          <h1 class="font-bold text-5xl">Software de Seguimiento</h1>
          <p class="bg-naranja-industrial-500 p-2 text-4xl font-bold">CRM</p>
        </div>
      </div>
      <nav class="w-[40%] flex justify-center items-center">
        <ul class="flex gap-5">
          <li class=" bg-naranja-industrial-500 p-3 border-[3px] border-amarillo-oscuro-950 font-semibold transition-all duration-300 hover:bg-naranja-industrial-600 hover:text-white"><a href="#">Inicio</a></li>
          <li class=" bg-amarillo-industrial-400 p-3 border-[3px] border-amarillo-oscuro-950 font-semibold transition-all duration-300 hover:bg-amarillo-industrial-500 hover:text-white"><a href="#">Planificación</a></li>
          <li class=" bg-amarillo-pollo-300 p-3 border-[3px] border-amarillo-oscuro-950 font-semibold transition-all duration-300 hover:bg-amarillo-pollo-600 hover:text-white"><a href="#">Login </a></li>
        </ul>
      </nav>
    </header>
    <div>
      <span class="h-[12px] w-[35%] bg-naranja-industrial-500 inline-block rounded-full"></span>
      <span class="h-[12px] w-[10%] bg-amarillo-industrial-400 inline-block rounded-full"></span>
    </div>
    @yield('main')
    @yield('footer')
  </main>
</body>
</html>   