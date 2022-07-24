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
            {{ __('¡Su registro ha sido completado de forma satisfactoria! Antes de continuar, es necesario que verifique su dirección de correo electrónico con el enlace que le enviamos a su dirección de correo electronico. Si no recibió el correo de verificación, pulse el botón de abajo para recibir otro.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Un nuevo enlace de verificación ha sido enviado a la dirección de correo electrónico que proporcionó.') }}
            </div>
        @endif

        <div id="myDIV" class="mt-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        <i class="fas fa-envelope"></i>
                         Volver a Enviar correo de verificación
                    </x-jet-button>
                </div>
            </form>
        </div>
            <div id="myDIV" class="mt-4">
                <a
                    href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                >
                    Editar Perfil</a>
            </div>
            <div id="myDIV" class="mt-4">
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2">
                        Cerrar Sesion
                    </button>
                </form>
            </div>
        </div>
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
