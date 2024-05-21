<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Virtual Cliente</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex flex-col py-8 px-6">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden ">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Número de identificación
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Nombres
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Apellido
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Número de telefono
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400" >
                                    Modificar
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($cliente as $cliente)
                                <tr class="hover:bg-gray-100">
                                    
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                        {{ $cliente->identificacion }}
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                        {{ $cliente->nombre }}
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                        {{ $cliente->apellido }}
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                        {{ $cliente->telefono }}
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                        <a href="#" data-modal-toggle="authentication-modal-{{ $cliente->id }}">Modificar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="max-w-2xl mx-auto">
                        @foreach ($cliente as $cliente)
                            <!-- Main modal -->
                            <div id="authentication-modal-{{ $cliente->id }}" aria-hidden="true"
                                class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                                    <!-- Modal content -->
                                    <div class="bg-white rounded-lg shadow relative">
                                        <div class="flex justify-end p-2">
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                data-modal-toggle="authentication-modal-{{ $cliente->id }}">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8"
                                            action="{{ route('update.cliente', $cliente->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <h3 class="text-xl font-medium text-gray-900 ">Modificar información</h3>
                                            <div>
                                                <label for="identificacion"
                                                    class="text-sm font-medium text-gray-900 block mb-2 ">Identificación</label>
                                                <input type="number" name="identificacion" id="identificacion"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    placeholder="258" required value="{{ $cliente->identificacion}}" disabled>
                                            </div>
                                            <div>
                                                <label for="nombre"
                                                    class="text-sm font-medium text-gray-900 block mb-2 ">nombre</label>
                                                <input type="text" name="nombre" id="nombre"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    placeholder="" required value="{{ $cliente->nombre }}">
                                            </div>
                                            <div>
                                                <label for="apellido"
                                                    class="text-sm font-medium text-gray-900 block mb-2">apellido
                                                </label>
                                                <input type="text" name="apellido" id="apellido"
                                                    placeholder=""
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    required value="{{ $cliente->disponibilidad }}">
                                            </div>
                                            <div>
                                                <label for="celular"
                                                    class="text-sm font-medium text-gray-900 block mb-2">celular
                                                </label>
                                                <input type="number" name="celular" id="celular" placeholder=""
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    required value="{{ $cliente->precio }}">
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
