<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <x-authentication-card-logo class="mx-auto h-12 w-auto" />
                <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900 dark:text-white">
                    Inicia sesión
                </h2>
                <p class="mt-2 text-center text-sm leading-5 text-gray-600 dark:text-gray-400">
                    O
                    <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400">
                        Registrate
                    </a>
                </p>
            </div>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ session('status') }}
                </div>
            @endif

            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="rounded-md shadow-sm">
                    <div>
                        <x-label for="email" value="{{ __('Correo') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Contraseña') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                    </div>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 block text-sm leading-5 text-gray-900 dark:text-gray-400">
                            {{ __('recordar') }}
                        </span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="font-medium text-sm text-indigo-600 hover:text-indigo-500 dark:text-indigo-400">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div>
                    <x-button class="w-full justify-center">
                        {{ __('Iniciar') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
