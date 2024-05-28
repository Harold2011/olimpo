<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anuncios</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center">
    @include('components.nav_admin')

    <div class="container w-4/5 mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-6 text-center">Registrar Anuncio</h2>
        <form action="{{ route('anuncio.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="nombre" class="block text-gray-700">Nombre del anuncio</label>
                <input type="text" id="nombre" name="nombre" class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>
            <div>
                <label for="url" class="block text-gray-700">Imagen del anuncio</label>
                <input type="file" id="url" name="url" accept="image/*" class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-700 transition duration-300">Registrar</button>
            </div>
        </form>
    </div>
</body>
</html>
