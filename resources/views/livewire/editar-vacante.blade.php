<form class="md:w-1/2 space-y-5" wire:submit.prevent="editarVacante">

    <div>
        <x-input-label for="titulo" :value="__('Titulo de la Vacante')" />
        <x-text-input
        id="titulo"
        wire:model="titulo"
        class="block mt-1 w-full"
        type="text" name="titulo"
        :value="old('titulo')"
        placeholder="Titulo de la Vacante"
     />

     @error('titulo')
        <livewire:mostrar-alerta :message="$message">
     @enderror
    </div>


    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select
        wire:model="salario"
        id="salario"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
        <option>-- Seleccione una opción --</option>

        @foreach ($salarios as $salario )
            <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
        @endforeach

        </select>

        @error('salario')
        <livewire:mostrar-alerta :message="$message">
     @enderror
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select
        wire:model="categoria"
        id="categoria"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
        <option>-- Seleccione una opción --</option>

        @foreach ($categorias as $categoria )
            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
        @endforeach
        </select>

        @error('categoria')
        <livewire:mostrar-alerta :message="$message">
     @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input
        id="empresa"
        wire:model="empresa"
        class="block mt-1 w-full"
        type="text" name="titulo"
        :value="old('empresa')"
        placeholder="Empresa: ej. Netflix, Uber, Shopify"
     />
     @error('empresa')
        <livewire:mostrar-alerta :message="$message">
     @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo día para postularse')" />
        <x-text-input
        id="ultimo_dia"
        class="block mt-1 w-full"
        type="date"
        wire:model="ultimo_dia"
        :value="old('ultimo_dia')"
     />
     @error('ultimo_dia')
        <livewire:mostrar-alerta :message="$message">
     @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripción del puesto')" />
        <textarea
            wire:model="descripcion"
            placeholder="Descripción general del puesto, requisitos, etc."
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72"
        ></textarea>
        @error('descripcion')
        <livewire:mostrar-alerta :message="$message">
     @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input
        id="imagen"
        wire:model="imagen_nueva"
        class="block mt-1 w-full"
        type="file"
        name="imagen"
        accept="image/*"
     />


    <div class="my-5 w-80">
        <x-input-label :value="__('Imagen actual')" />

        <img src="{{ asset('storage/vacantes/'.$imagen) }}" alt="{{ 'Imagen de la vacante: '. $titulo }}" />
    </div>

    <div class="my-5 w-80">
        @if ($imagen_nueva)
            Imagen:
            <img src=" {{ $imagen_nueva->temporaryUrl() }} ">
        @endif
    </div>

     @error('imagen_nueva')
        <livewire:mostrar-alerta :message="$message">
     @enderror
    </div>

    <hr>

    <div class="text-center">
        <x-primary-button class="w-1/2 justify-center">
            Guardar Cambios
        </x-primary-button>
    </div>


</form>

