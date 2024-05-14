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
                                                <td class="py-4 px-6 text-sm font-medium whitespace-nowrap">
                                                    <a href="#"
                                                        class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
                <form action="{{ route('register.corporative') }}" method="POST">
                    @csrf
                    <div class="py-12 bg-gray-700 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0"
                        id="modal">
                        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Registro de usuarios corporativos</h1>
                                <label for="nit"
                                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">NIT</label>
                                <input id="nit" name="nit" type="number"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    placeholder="Usuario" />
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

</html>
