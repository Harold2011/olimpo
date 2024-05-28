<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Menú</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('components.nav_admin')

    <div class="container w-4/5 mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-6 text-center">Registrar Menu</h2>
        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500" placeholder="Nombre del menú" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">Descripción:</label>
                <textarea name="decripcion" id="descripcion" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500" rows="3" placeholder="Descripción del menú" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="imagen">Imagen:</label>
                <input type="file" name="url" id="imagen" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500" accept="image/*" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500" placeholder="Precio del menú" required>
            </div>
            <div>
                <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-700 transition duration-300">Crear Menú</button>
            </div>
        </form>
    </div>
</body>
</html>
