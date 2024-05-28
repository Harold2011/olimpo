<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta de Restaurante</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('components.nav_landing')

    <div class="container mx-auto mt-5">
        <h1 class="text-3xl font-bold mb-4">Carta de Restaurante</h1>
        @if (session('success'))
                  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                      <strong class="font-bold">¡Éxito!</strong>
                      <span class="block sm:inline">{{ session('success') }}</span>
                      <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                          <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Cerrar</title><path d="M14.348 14.849a1 1 0 0 1-1.414 0L10 11.414l-2.93 2.435a1 1 0 1 1-1.244-1.562l3.333-2.778a1 1 0 0 1 1.244 0l3.333 2.778a1 1 0 0 1 0 1.562z"/></svg>
                      </span>
                  </div>
              @endif
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($menus as $menu)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset($menu->url) }}" alt="{{ $menu->nombre }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">{{ $menu->nombre }}</h2>
                    <p class="text-gray-600 mb-2">{{ $menu->descripcion }}</p>
                    <p class="text-gray-800 font-bold">${{ $menu->precio }}</p>

                    <form action="{{ route('pedido.store') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                        <div class="flex items-center">
                            @auth
                                <input type="number" name="cantidad" value="1" class="w-20 border border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-yellow-500" required>
                                <button type="submit" class="inline-flex items-center bg-yellow-500 border-0 text-white py-1 px-3 focus:outline-none hover:bg-yellow-700 transition duration-300 rounded text-base mt-4 md:mt-0">Adicionar Pedido</button>
                            @else
                                iniciar sesion
                            @endauth
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
