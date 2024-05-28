<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('components.nav_admin')

    <div class="container w-4/5 mx-auto mt-5">
        <h1 class="text-3xl font-bold mb-4">Listado de Pedidos</h1>
        <table class="min-w-full bg-white text-gray-700 shadow-md rounded-lg">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">Nombre del Menú</th>
                    <th class="py-3 px-6 text-left">Cantidad</th>
                    <th class="py-3 px-6 text-left">Usuario</th>
                    <th class="py-3 px-6 text-left">Acción</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($pedidos as $pedido)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-300">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $pedido->menu->nombre }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{ $pedido->cantidad }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{ $pedido->user->name }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            @role('Admin')
                            @if($pedido->estado == 'activo')
                                <a href="{{ route('pedido.edit', $pedido->id) }}" class="bg-gray-500 text-white py-1 px-3 rounded hover:bg-gray-700 transition duration-300 ml-2">
                                    Entregar orden
                                </a>
                            @else
                                Producto entregado.
                            @endif
                            @endrole
                            @role('User')
                            @if($pedido->estado == 'activo')
                            <form action="{{ route('pedido.destroy', $pedido->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este anuncio?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-700 transition duration-300">
                                    Eliminar pedido
                                </button>
                            </form>
                            @else
                                Producto entregado.
                            @endif
                            @endrole
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
