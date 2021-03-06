<x-guest-layout>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <x-jet-authentication-card>
        <div class="flex items-center justify mt-4">
            <form action="/">
                <x-jet-button class="">
                    <i class="fas fa-arrow-left"></i>
                    Volver al Inicio
                </x-jet-button>
            </form>
        </div>
        
        <x-slot name="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="mt-4">
            @csrf

            <div>
                <x-jet-label for="email" value="Correo Electrónico" />
                <x-jet-input id="email" class="block mt-1 py-2 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="Contraseña" />
                <x-jet-input id="password" class="block mt-1 py-2 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">Mantener Sesión Iniciada</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-jet-button class="">
                    {{ __('Iniciar Sesión') }}
                </x-jet-button>
            </div>
            
            <div id="myDIV" class="mt-4">
                <div>
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('¿Olvidó su contraseña?') }}
                </a>
                @endif
                </div>
                <div>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/register">
                        {{ __('¿No se encuentra registrado?') }}
                    </a>
                </div>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
<style>
    #myDIV {
  background-color:#FFFFFF;
  display: flex;
  justify-content: space-evenly;
}
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
