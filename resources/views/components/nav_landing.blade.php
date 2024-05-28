<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
        <a href="{{ route('index') }}" class="mr-5 hover:text-gray-900">Inicio</a>
        <a href="{{ route('menuclient.index') }}"class="mr-5 hover:text-gray-900">Menú</a>
      </nav>
      <a class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
        <img src="{{ asset('storage/img/Olimpo.png')}}" class="h-28"/>
        
      </a>
      @auth
      
        <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
          <a href="{{ route('dashboard') }}">
              <button class="inline-flex items-center bg-yellow-500 border-0 py-1 px-3 focus:outline-none hover:bg-yellow-700 transition duration-300 rounded text-base mt-4 md:mt-0">Ir al panel
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
              </button>
          </a>
        </div>
      @else
      <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
        <a href="{{ route('login') }}">
            <button class="inline-flex items-center bg-yellow-500 border-0 py-1 px-3 focus:outline-none hover:bg-yellow-700 transition duration-300 rounded text-base mt-4 md:mt-0">Iniciar Sesión
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
            </button>
        </a>
      </div>
    @endauth
      
    </div>
  </header>