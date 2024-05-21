<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex">
        <div class="w-auto">
            @include('auth.superuser.includes.sidebar')
        </div>
        <div class="w-full">
            <div class="px-9">
                <h1 class="text-center text-3xl font-bold py-7">
                    Listado de usuarios corporativos
                </h1>

                <form class="max-w-md mx-auto" method="POST" action="{{ route('find.corporative') }}">
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
                            placeholder="Busca por Razón Social o Nit" required />
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
                                                NIT
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Razon Social
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Email
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Nombre de Usuario
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Telefono
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Direccion
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Estado
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Editar
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($corporativos as $corporativo)
                                            <tr class="hover:bg-gray-100">
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $corporativo->nit }}
                                                </td>
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $corporativo->razon_social }}
                                                </td>
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $corporativo->email }}
                                                </td>
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $corporativo->nombre_usuario }}
                                                </td>
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $corporativo->telefono }}
                                                </td>
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $corporativo->direccion_detalle }}
                                                </td>
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $corporativo->estado }}
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium whitespace-nowrap">
                                                    <a href="#"
                                                        class="text-blue-600 dark:text-blue-500 hover:underline"
                                                        data-modal-toggle="authentication-modal-{{ $corporativo->id }}">Edit</a>
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
                <!--Modal de registrar nuevo usuario corporativo-->
                <form action="{{ route('register.corporative') }}" method="POST">
                    @csrf
                    <div class="py-12 bg-gray-700 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0 h-max"
                        id="modal">
                        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">
                                    Modificar usuario</h1>
                                <label for="nit"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">NIT</label>
                                <input id="nit" name="nit" type="number"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    placeholder="Usuario"
                                    />
                                <label for="razonsocial"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Razon
                                    Social</label>
                                <input id="razonsocial" name="razonsocial" type="text"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    placeholder="Razon Social" />
                                <label for="email"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Email</label>
                                <input id="email" name="email" type="text"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    placeholder="Usuario" />
                                <label for="telefono"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Telefono</label>
                                <input id="telefono" name="telefono" type="number"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    placeholder="Telefono" />
                                <label for="dep"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Departamento</label>
                                <select id="dep"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    name="dep" onchange="getMunicipios()" required>
                                </select>
                                <label for="mun"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Municipio</label>
                                <select id="mun"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    name="mun" required>
                                </select>
                                <label for="direccion"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Direccion</label>
                                <input id="direccion" name="direccion" type="text"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    placeholder="Dirección" />
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
                    @foreach ($corporativos as $corporativo)
                        <!-- Main modal -->
                        <div id="authentication-modal-{{ $corporativo->id }}" aria-hidden="true"
                            class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                            <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="bg-white rounded-lg shadow relative">
                                    <div class="flex justify-end p-2">
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-toggle="authentication-modal-{{ $corporativo->id }}">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8"
                                        action="{{ route('update.corporative', $corporativo->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <h3 class="text-xl font-medium text-gray-900 ">Modificar corporativo</h3>
                                        <div>
                                            <label for="id"
                                                class="text-sm font-medium text-gray-900 block mb-2 ">Id</label>
                                            <input type="number" name="id" id="id"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                placeholder="258" required value="{{ $corporativo->id }}" disabled>
                                        </div>
                                        <div>
                                            <label for="nit"
                                                class="text-sm font-medium text-gray-900 block mb-2 ">NIT</label>
                                            <input type="number" name="nit" id="nit"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                placeholder="" required value="{{ $corporativo->nit }}">
                                        </div>
                                        <div>
                                            <label for="razon_social"
                                                class="text-sm font-medium text-gray-900 block mb-2">Razon Social
                                            </label>
                                            <input type="text" name="razon_social" id="razon_social"
                                                placeholder=""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                required value="{{ $corporativo->razon_social }}">
                                        </div>
                                        <div>
                                            <label for="email"
                                                class="text-sm font-medium text-gray-900 block mb-2">Email
                                            </label>
                                            <input type="email" name="email" id="email" placeholder=""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                required value="{{ $corporativo->email }}">
                                        </div>
                                        <div>
                                            <label for="telefono"
                                                class="text-sm font-medium text-gray-900 block mb-2">Telefono
                                            </label>
                                            <input type="number" name="telefono" id="telefono"
                                                placeholder="Marmola"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                required value="{{ $corporativo->telefono }}">
                                        </div>
                                        <div>
                                            <label for="estado"
                                                class="text-sm font-medium text-gray-900 block mb-2">Estado
                                            </label>
                                            <select id="estado"
                                                class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                                name="estado" required>
                                               <option value="Activo">Activo</option>
                                               <option value="Inactivo">Inactivo</option>
                                            </select>
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
        </div>
    </div>
</body>
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
<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

<script src="{{ url('assets/js/ubicaciones.js') }}"></script>

</html>
