<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    @vite('resources/css/app.css')
</head>
<body>
    <body>
        <header class="header sticky top-0 bg-white shadow-md flex items-center justify-between px-8 py-02">
            <!-- logo -->
            <h1 class="w-3/12">
                <a href="">
                  <svg viewBox="0 0 248 31" class="h-6 w-auto hover:text-green-500 duration-200"><path d="M25.517 0C18.712 0 14.46 3.382 12.758 10.146c2.552-3.382 5.529-4.65 8.931-3.805 1.941.482 3.329 1.882 4.864 3.432 2.502 2.524 5.398 5.445 11.722 5.445 6.804 0 11.057-3.382 12.758-10.145-2.551 3.382-5.528 4.65-8.93 3.804-1.942-.482-3.33-1.882-4.865-3.431C34.736 2.92 31.841 0 25.517 0zM12.758 15.218C5.954 15.218 1.701 18.6 0 25.364c2.552-3.382 5.529-4.65 8.93-3.805 1.942.482 3.33 1.882 4.865 3.432 2.502 2.524 5.397 5.445 11.722 5.445 6.804 0 11.057-3.381 12.758-10.145-2.552 3.382-5.529 4.65-8.931 3.805-1.941-.483-3.329-1.883-4.864-3.432-2.502-2.524-5.398-5.446-11.722-5.446z" fill="#22C55E"></path>
                </a>
            </h1>
        
            <!-- navigation -->
            <nav class="nav font-semibold text-lg">
                <ul class="flex items-center">
                    <li class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer active">
                      <a href="">Inicio</a>
                    </li>
                    <li class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer">
                      <a href="">Punto de entrega</a>
                    </li>
                    <li class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer">
                      <a href="">Quiénes somos</a>
                    </li>
                </ul>
            </nav>
        
            <!-- buttons --->
            <div class="w-3/12 flex justify-end">
                <a href="">
                    <svg class="h-8 p-1 hover:text-green-500 duration-200" aria-hidden="true" focusable="false" data-prefix="far" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16 fa-9x"><path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z" class=""></path></svg>
                </a>
                <a href="">
                    <svg class="h-8 p-1 hover:text-green-500 duration-200" aria-hidden="true" focusable="false" data-prefix="far" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-shopping-cart fa-w-18 fa-7x"><path fill="currentColor" d="M551.991 64H144.28l-8.726-44.608C133.35 8.128 123.478 0 112 0H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h80.24l69.594 355.701C150.796 415.201 144 430.802 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-18.136-7.556-34.496-19.676-46.142l1.035-4.757c3.254-14.96-8.142-29.101-23.452-29.101H203.76l-9.39-48h312.405c11.29 0 21.054-7.869 23.452-18.902l45.216-208C578.695 78.139 567.299 64 551.991 64zM208 472c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm256 0c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm23.438-200H184.98l-31.31-160h368.548l-34.78 160z" class=""></path></svg>
                </a>
                <a href="">
                    <a href="/login">
                        <svg class="h-8 p-1 hover:text-green-500 duration-200" aria-hidden="true" focusable="false" data-prefix="far" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-user fa-w-14 fa-7x"><path fill="currentColor" d="M313.6 304h-16.7c-22.4 10.9-47.1 17-73.5 17s-51.1-6.1-73.5-17h-16.7C60.8 304 0 364.8 0 440v24c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-24c0-75.2-60.8-136-134.4-136zM224 272c70.7 0 128-57.3 128-128S294.7 16 224 16 96 73.3 96 144s57.3 128 128 128z" class=""></path></svg>
                    </a>
                </a>
                <a href="">
                    <a href="/cliente">
                        <svg class="h-8 p-1 hover:text-green-500 duration-200" aria-hidden="true" focusable="false" data-prefix="far" data-icon="cog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-cog fa-w-16 fa-2x">
                            <path fill="currentColor" d="M487.4 315.7l-42.8-24.7c1.8-9.3 2.7-18.9 2.7-28.7s-0.9-19.5-2.7-28.7l42.8-24.7c7.6-4.4 10.1-14.2 5.7-21.8l-45.9-79.5c-4.4-7.6-14.2-10.1-21.8-5.7l-42.8 24.7c-7.3-6.3-15.2-11.9-23.7-16.7V56.4c0-8.4-6.8-15.2-15.2-15.2h-91.8c-8.4 0-15.2 6.8-15.2 15.2v49.4c-8.5 4.8-16.4 10.4-23.7 16.7l-42.8-24.7c-7.6-4.4-17.4-1.9-21.8 5.7l-45.9 79.5c-4.4 7.6-1.9 17.4 5.7 21.8l42.8 24.7c-1.8 9.3-2.7 18.9-2.7 28.7s0.9 19.5 2.7 28.7l-42.8 24.7c-7.6 4.4-10.1 14.2-5.7 21.8l45.9 79.5c4.4 7.6 14.2 10.1 21.8 5.7l42.8-24.7c7.3 6.3 15.2 11.9 23.7 16.7v49.4c0 8.4 6.8 15.2 15.2 15.2h91.8c8.4 0 15.2-6.8 15.2-15.2v-49.4c8.5-4.8 16.4-10.4 23.7-16.7l42.8 24.7c7.6 4.4 17.4 1.9 21.8-5.7l45.9-79.5c4.4-7.6 1.9-17.4-5.7-21.8zm-231.4 56.3c-53 0-96-43-96-96s43-96 96-96 96 43 96 96-43 96-96 96z"></path>
                        </svg>
                    </a>
                </a>
                
            </div>
        </header>
    
        <div class="w-full flex">
            <div class="w-auto">
                <aside class="w-full p-6 sm:w-60 dark:bg-gray-50 dark:text-gray-800">
                    <nav class="space-y-8 text-sm">
                        <div class="space-y-2">
                            <h2 class="text-sm font-semibold tracking-widest uppercase dark:text-gray-600">Categoria</h2>
                            <div class="flex flex-col space-y-1">
                                <a rel="noopener noreferrer" href="#">Installation</a>
                                <a rel="noopener noreferrer" href="#">Plugins</a>
                                <a rel="noopener noreferrer" href="#">Migrations</a>
                                <a rel="noopener noreferrer" href="#">Appearance</a>
                                <a rel="noopener noreferrer" href="#">Mamba UI</a>
                            </div>
                        </div>
                        
                    </nav>
                </aside>
            </div>
            <div class="w-auto">
                <div class="bg-white">
                    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>
                
                        @foreach ($productos as $producto)
                            <div class="mt-0 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                                <div class="group relative">
                                    <div
                                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                                            alt="Front of men&#039;s Basic Tee in black."
                                            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                    </div>
                                    <div class="mt-4 flex justify-between">
                                        <div>
                                            <h3 class="text-sm text-gray-700">
                                                <a href="#">
                                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                                    Basic Tee
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500">Black</p>
                                        </div>
                                        <p class="text-sm font-medium text-gray-900">$35</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
</body>
</html>