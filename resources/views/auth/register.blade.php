<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo Electronico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Select Rol -->
        <div class="mt-4">
            <x-input-label for="rol" :value="__('¿Que tipo de cuenta desea crear?')" />

            <select id="rol" name="rol" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                <option>-- Seleccione un Rol --</option>
                <option value="1">Desarrollador - Obtener Empleo</option>
                <option value="2">Reclutador - Publicar Empleos</option>
            </select>
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Repetir Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex justify-between my-5">
            <x-link
                :href="route('login')"
            >
            Ya tengo cuenta
            </x-link>

            <x-link
                :href="route('password.request')"
            >
                Olvidaste tu contraseña?
            </x-link>
        </div>
        <x-primary-button class="w-full justify-center">
            {{ __('Crear Cuenta') }}
        </x-primary-button>
    </form>
</x-guest-layout>