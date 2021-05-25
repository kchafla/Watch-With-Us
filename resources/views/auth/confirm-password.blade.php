<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
    
        </x-slot>

        <a href="{{ url('/') }}">
                    <!--<x-application-logo class="w-20 h-20 fill-current text-gray-500" />-->
                    <center><img src="{{ asset('images/web/logo.png') }}" height="200" width="200" alt="logotip de l'empresa, está basat en un mussol amb el nom de l'empresa Watch With Us" /></center>
                </a>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Esta es un área segura de la aplicación. Confirme su contraseña antes de continuar.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Contraseña')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirmar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
