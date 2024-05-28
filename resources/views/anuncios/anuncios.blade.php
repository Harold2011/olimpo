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
            <button onclick="window.location.href='{{ route('anuncio.create') }}'" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-700 transition duration-300">
                Agregar Anuncio
            </button>
        </div>

        <table class="min-w-full bg-white text-gray-700 shadow-md rounded-lg">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">Nombre del anuncio</th>
                    <th class="py-3 px-6 text-left">Acción</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($anuncio as $anuncios)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-300">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $anuncios->nombre }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <form action="{{ route('anuncio.destroy', $anuncios->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este anuncio?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-700 transition duration-300">
                                    Eliminar
                                </button>
                            </form>
                            <a href="{{ route('anuncio.edit', $anuncios->id) }}" class="bg-gray-500 text-white py-1 px-3 rounded hover:bg-gray-700 transition duration-300 ml-2">
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
