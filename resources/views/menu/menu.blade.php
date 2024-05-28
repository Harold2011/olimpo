<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anuncios</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('components.nav_admin')

    <div class="container w-4/5 mx-auto">
        <div class="button-container my-4 flex justify-end">
            <button onclick="window.location.href='{{ route('menu.create') }}'" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-700 transition duration-300">
                Agregar Menu
            </button>
        </div>

        <table class="min-w-full bg-white text-gray-700 shadow-md rounded-lg">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">Nombre del menu</th>
                    <th class="py-3 px-6 text-left">Decripción</th>
                    <th class="py-3 px-6 text-left">Imagen</th>
                    <th class="py-3 px-6 text-left">Precio</th>
                    <th class="py-3 px-6 text-left">Acción</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($menu as $menus)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-300">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $menus->nombre }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $menus->decripcion }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <img src="{{ $menus->url }}" class="h-14" />
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $menus->precio }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <form action="{{ route('menu.destroy', $menus->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este anuncio?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-700 transition duration-300">
                                    Eliminar
                                </button>
                            </form>
                            <a href="{{ route('menu.edit', $menus->id) }}" class="bg-gray-500 text-white py-1 px-3 rounded hover:bg-gray-700 transition duration-300 ml-2">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
