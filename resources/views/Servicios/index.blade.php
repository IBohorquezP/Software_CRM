@extends('layouts.header')
@extends('layouts.footer')
@section('title', 'Servicio')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
@endsection

@section('main')
    <div class="w-full flex justify-between items-center">
        <a href="/Etapas-Servicios" class="px-6 py-2 self-end rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Volver</a>
        <h2 class="font-bold text-[40px]">Etapa</h2>
        <a href="/Motores-Servicios/create" class="px-6 py-2 self-end rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Agregar</a>
    </div>
    <div class="card border-4 border-black p-4">
        <div class="card-body">
            <table id="motores" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Servicio</th>
                        <th>Componente</th>
                        <th>Modelo</th>
                        <th>Serial</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ismael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>ASmel</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>ASmel</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>ASmel</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Asmael</td>
                        <td>Papapu</td>
                        <td>Vue</td>
                        <td>Bugatti chiron</td>
                        <td>1</td>
                        <td>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#f0a21c]/80 bg-[#F0A21C] text-white">Ver
                                </button>
                            <button type="button" class="px-6 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-[#dc3545]/80  bg-[#DC3545] text-white">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>

    <script>
        new DataTable('#motores', {
            responsive: true,
            autoWith: false,
            "language": {
                "lengthMenu": "Mostrar" + `
        <select class="border-2 border-gray-300 p-1.5 rounded-md outline-none focus:border-naranja-industrial-500">
            <option value = '5'>5</option>
            <option value = '10'>10</option>
            <option value = '25'>25</option>
            <option value = '50'>50</option>
            <option value = '100'>100</option>
            <option value = '-1'>Todos</option>
            </select>
        ` +
                    "registros por pagina",
                "zeroRecords": "No se encontro nada - disculpa",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    </script>
@endsection
