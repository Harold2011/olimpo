<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('components.nav_admin')

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Panel de administración</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Bienvenido al panel de administracion, el el puedes administrar pedidos, menu y anuncios.</p>
          </div>
          <div class="flex flex-wrap -m-4">
            @role('Admin')
            <div class="lg:w-1/3 sm:w-1/2 p-4">
                <a href="{{ route('anuncio.index') }}">
                    <div class="flex relative">
                        <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="{{ asset('storage/img/Anuncios.png') }}">
                        <div class="px-8 py-10 relative h-72 z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                        <h2 class="tracking-widest text-sm title-font font-medium text-yellow-500 mb-1">Anuncios</h2>
                        <p class="leading-relaxed">Administrar los anuncios del sitio.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="lg:w-1/3 sm:w-1/2 p-4">
              <a href="{{ route('pedido.index') }}">
                <div class="flex relative">
                  <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="{{ asset('storage/img/Pedidos.png') }}">
                  <div class="px-8 py-10 relative h-72 z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                    <h2 class="tracking-widest text-sm title-font font-medium text-yellow-500 mb-1">Pedidos</h2>
                    <p class="leading-relaxed">Administrar los pedidos del sitio.</p>
                  </div>
                </div>
              </a>
              </div>
              <div class="lg:w-1/3 sm:w-1/2 p-4">
                <a href="{{ route('menu.index') }}">
                  <div class="flex relative">
                    <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="{{ asset('storage/img/Menu.png') }}">
                    <div class="px-8 py-10 relative h-72 z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                      <h2 class="tracking-widest text-sm title-font font-medium text-yellow-500 mb-1">Menu</h2>
                      <p class="leading-relaxed">Administrar los menu del sitio.</p>
                    </div>
                  </div>
                </a>
              </div>
            @endrole
            @role('User')
            <div class="lg:w-1/3 sm:w-1/2 p-4">
              <a href="{{ route('pedido.index') }}">
                <div class="flex relative">
                  <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="{{ asset('storage/img/Pedidos.png') }}">
                  <div class="px-8 py-10 relative h-72 z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                    <h2 class="tracking-widest text-sm title-font font-medium text-yellow-500 mb-1">Pedidos</h2>
                    <p class="leading-relaxed">Administrar los pedidos del sitio.</p>
                  </div>
                </div>
              </a>
              </div>
            @endrole
          </div>
        </div>
      </section>
</body>
</html>