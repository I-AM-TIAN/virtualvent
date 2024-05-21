<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    @vite('resources/css/app.css')
</head>

<body>
    <script>
        var res = function() {
            var not = confirm("¿Estás seguro de eliminar?");
            return not;
        }
    </script>
    <div class="flex">
        <div class="w-auto">
            @include('auth.corporative.includes.sidebar')
        </div>
        <div class="w-full">
            <div class="px-9">
                <h1 class="text-center text-3xl font-bold py-7">
                    Listado de productos
                </h1>

                <form class="max-w-md mx-auto" method="POST" action="{{ route('find.producto') }}">
                    @csrf
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default" name="default"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Busca por Nombre o Categoría" required />
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-indigo-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-indigo-600 dark:focus:ring-blue-800">Buscar</button>
                    </div>
                </form>

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
                                                Descripción
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Disponibilidad
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Precio
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Pedido minimo
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Fecha de entrega
                                            </th>

                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Foto
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Categoría
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($productos as $producto)
                                            <tr class="hover:bg-gray-100">
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $producto->nombre }}
                                                </td>
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $producto->descripcion }}
                                                </td>
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $disponible = $producto->disponibilidad }}
                                                </td>
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $producto->precio }}
                                                </td>
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $producto->pedido_minimo }}
                                                </td>
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $producto->fecha_entrega }}
                                                </td>
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    <img class="h-26 w-auto"
                                                        src="{{ asset('uploads/' . $producto->imagen) }}"
                                                        alt="{{ $producto->nombre }}">
                                                </td>
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $producto->nombre_categoria }}
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    <a href="{{ route('producto.delete', $producto->id) }}"
                                                        onclick="return res()" class="text-red-500">Eliminar</a>
                                                    <a href="#"
                                                        class="text-blue-600 dark:text-blue-500 hover:underline"
                                                        data-modal-toggle="authentication-modal-{{ $producto->id }}"">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-center py-12" id="button">
                    <button
                        class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 mx-auto transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-4 sm:px-8 py-2 text-xs sm:text-sm"
                        onclick="modalHandler(true)">Registrar Nuevo</button>
                </div>
                <!-- Modal de registrar usuario corporativo -->
                <form action="{{ route('register.producto') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="py-12 bg-gray-700 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0 h-max"
                        id="modal">
                        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Registro
                                    de productos</h1>
                                <label for="nombre"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Nombre</label>
                                <input id="nombre" name="nombre" type="text"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    placeholder="Azucar" />
                                <label for="descripcion"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Descripción</label>
                                <input id="descripcion" name="descripcion" type="text"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    placeholder="Azucar blanca x500g" />
                                <label for="disponibilidad"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Disponibilidad</label>
                                <input id="disponibilidad" name="disponibilidad" type="number"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    placeholder="10" />
                                <label for="precio"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Precio</label>
                                <input id="precio" name="precio" type="number"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    placeholder="10k" />
                                <label for="pedido_minimo"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Pedido
                                    minimo</label>
                                <input id="pedido_minimo" name="pedido_minimo" type="number"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    placeholder="1" />
                                <label for="fecha_entrega"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Fecha
                                    entrega</label>
                                <input id="fecha_entrega" name="fecha_entrega" type="date"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    placeholder="dia/mes/año" />

                                <label for="images"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Seleccione
                                    fotos</label>
                                <input id="photo" name="photo" type="file"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    accept="image/*" />
                                <label for="id_categoria"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Categoria</label>
                                <select id="id_categoria"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    name="id_categoria" required>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                                <div class="flex items-center justify-start w-full">
                                    <button type="submit"
                                        class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Enviar</button>
                                </div>
                                <a class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                                    onclick="modalHandler(false)" aria-label="close modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
                                        width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                <!--Modal de modificar usuario corporativo-->
                <div class="max-w-2xl mx-auto">
                    @foreach ($productos as $producto)
                        <!-- Main modal -->
                        <div id="authentication-modal-{{ $producto->id }}" aria-hidden="true"
                            class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                            <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="bg-white rounded-lg shadow relative">
                                    <div class="flex justify-end p-2">
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-toggle="authentication-modal-{{$producto->id}}">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8"
                                        action="{{ route('producto.update', $producto->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <h3 class="text-xl font-medium text-gray-900 ">Modificar producto</h3>
                                        <div>
                                            <label for="id"
                                                class="text-sm font-medium text-gray-900 block mb-2 ">Id</label>
                                            <input type="number" name="id" id="id"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                placeholder="258" required value="{{ $producto->id }}" disabled>
                                        </div>
                                        <div>
                                            <label for="descripcion"
                                                class="text-sm font-medium text-gray-900 block mb-2 ">Descripción</label>
                                            <input type="text" name="descripcion" id="descripcion"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                placeholder="" required value="{{ $producto->descripcion }}">
                                        </div>
                                        <div>
                                            <label for="fotos"
                                                class="text-sm font-medium text-gray-900 block mb-2">Foto del producto
                                            </label>
                                            <input type="file" accept="image/*" name="fotos" id="fotos"
                                                placeholder=""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                value="{{ $producto->imagen }}">
                                        </div>
                                        <div>
                                            <label for="disponibilidad"
                                                class="text-sm font-medium text-gray-900 block mb-2">Disponibilidad
                                            </label>
                                            <input type="number" name="disponibilidad" id="disponibilidad"
                                                placeholder=""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                required value="{{ $producto->disponibilidad }}">
                                        </div>
                                        <div>
                                            <label for="precio"
                                                class="text-sm font-medium text-gray-900 block mb-2">Precio
                                            </label>
                                            <input type="number" name="precio" id="precio"
                                                placeholder=""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                required value="{{ $producto->precio }}">
                                        </div>
                                        <div>
                                            <label for="pedido_minimo"
                                                class="text-sm font-medium text-gray-900 block mb-2">Pedido minimo
                                            </label>
                                            <input type="number" name="pedido_minimo" id="pedido_minimo"
                                                placeholder="Marmola"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                required value="{{ $producto->pedido_minimo }}">
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modificar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <script>
                let modal = document.getElementById("modal");

                function modalHandler(val) {
                    if (val) {
                        fadeIn(modal);
                    } else {
                        fadeOut(modal);
                    }
                }

                function fadeOut(el) {
                    el.style.opacity = 1;
                    (function fade() {
                        if ((el.style.opacity -= 0.1) < 0) {
                            el.style.display = "none";
                        } else {
                            requestAnimationFrame(fade);
                        }
                    })();
                }

                function fadeIn(el, display) {
                    el.style.opacity = 0;
                    el.style.display = display || "flex";
                    (function fade() {
                        let val = parseFloat(el.style.opacity);
                        if (!((val += 0.2) > 1)) {
                            el.style.opacity = val;
                            requestAnimationFrame(fade);
                        }
                    })();
                }

                modalHandler(false);
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const modalToggles = document.querySelectorAll('[data-modal-toggle]');
                    modalToggles.forEach(toggle => {
                        toggle.addEventListener('click', function() {
                            const modalId = this.getAttribute('data-modal-toggle');
                            const modal = document.getElementById(modalId);
                            if (modal.classList.contains('hidden')) {
                                modal.classList.remove('hidden');
                                modal.classList.add('flex');
                            } else {
                                modal.classList.add('hidden');
                                modal.classList.remove('flex');
                            }
                        });
                    });
                });
            </script>

</body>

</html>
