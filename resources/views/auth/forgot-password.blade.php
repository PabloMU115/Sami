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

        <div class="mt-4 text-sm text-gray-600">
            {{ __('¿Olvidó su contraseña? No hay problema! Solo ingrese la dirección de correo electrónico relacionada a la cuenta cuya contraseña desea recuperar y le enviaremos un enlace para que recupere su contraseña.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label class="mt-4" for="email" value="Correo Electrónico" />
                <x-jet-input id="email" class="block py-2 mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    <i class="fas fa-envelope"></i>
                    Enviar correo de recuperación de contraseña.
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">

