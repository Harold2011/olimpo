<header class="text-gray-600 body-font"> 
  @role('Admin')
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
            <a href="{{ route('dashboard') }}" class="mr-5 hover:text-gray-900">Inicio</a>
            <a href="{{ route('anuncio.index') }}" class="mr-5 hover:text-gray-900">Anuncios</a>
            <a href="{{ route('menu.index') }}" class="mr-5 hover:text-gray-900">Menu </a>
            <a href="{{ route('pedido.index') }}" class="mr-5 hover:text-gray-900">pedidos </a>
            <a class="mr-5 hover:text-gray-900" href="{{ route('menuclient.index')}}">Carta</a>
          </nav>
          <a class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
            <img src="{{ asset('storage/img/Olimpo.png')}}" class="h-28"/>
          </a>
          <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
    
              @auth
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="inline-flex items-center bg-yellow-500 border-0 text-white py-1 px-3 focus:outline-none hover:bg-yellow-700 transition duration-300 rounded text-base mt-4 md:mt-0">Cerrar sesión
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
                </button>
            </form>
            @else
            <a href="{{ route('login')}}">
              <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Iniciar sesion
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
              </button>
          </a>
            @endauth
            </a>
      </div>
    </div>
    @endrole
    @role('User')
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
            <a href="{{ route('dashboard') }}" class="mr-5 hover:text-gray-900">Inicio</a>
            <a href="{{ route('pedido.index') }}" class="mr-5 hover:text-gray-900">pedidos </a>
            <a class="mr-5 hover:text-gray-900" href="{{ route('menuclient.index')}}">Carta</a>
          </nav>
          <a class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
            <img src="{{ asset('storage/img/Olimpo.png')}}" class="h-28"/>
          </a>
          <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
    
              @auth
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="inline-flex items-center bg-yellow-500 border-0 text-white py-1 px-3 focus:outline-none hover:bg-yellow-700 transition duration-300 rounded text-base mt-4 md:mt-0">Cerrar sesión
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
                </button>
            </form>
            @else
            <a href="{{ route('login')}}">
              <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Iniciar sesion
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
              </button>
          </a>
            @endauth
            </a>
      </div>
    </div>
    @endrole
  </header>