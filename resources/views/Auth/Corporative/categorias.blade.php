<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cateogorias</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex">
        <div class="w-auto">
            @include('auth.corporative.includes.sidebar')
        </div>
        <div class="w-full">
            <div class="px-9">
                <h1 class="text-center text-3xl font-bold py-7">
                    Listado de productos
                </h1>

                <div class="flex flex-col py-8 px-6">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Nombre
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Fecha de creacion
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($categorias as $categoria)
                                            <tr class="hover:bg-gray-100">
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $categoria->nombre }}
                                                </td>
                                                <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $categoria->created_at }}
                                            </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Botón para abrir el modal -->
    <button id="openModalBtn" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
        Registrar Nueva Categoría
    </button>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full p-6">
            <div class="flex justify-between items-center border-b pb-3">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Registrar Nueva Categoría</h3>
                <button id="closeModalBtn" class="text-gray-400 hover:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form class="mt-5" method="POST" action="{{route('register.category')}}">
                @csrf
                <div class="mb-4">
                    <label for="categoria" class="block text-sm font-medium text-gray-700">Nombre de la
                        Categoría</label>
                    <input type="text" id="categoria" name="categoria"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">
                        Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Obtener los elementos del DOM
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modal = document.getElementById('modal');

        // Función para abrir el modal
        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        // Función para cerrar el modal
        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        // Cerrar el modal si se hace clic fuera de él
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
