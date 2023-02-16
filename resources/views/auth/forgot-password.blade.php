<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Olvidaste tu contraseña? Escribe tu correo electronico y te enviaremos un enlace para poder restablecer la contraseña.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="my-5 w-full justify-center">
            {{ __('Restablecer contraseña') }}
        </x-primary-button>

        <div class="flex justify-between my-1">
            <x-link
                :href="route('login')"
            >
            Ya tengo cuenta
            </x-link>

            <x-link
                :href="route('register')"
            >
                Crear Cuenta
            </x-link>
        </div>


    </form>
</x-guest-layout>