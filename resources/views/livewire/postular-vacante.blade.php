<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacanter</h3>

    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
            {{session('mensaje')}}
        </div>
    @else
        <form action="" class="w-96 mt-5" wire:submit.prevent="postularme">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum')" />
                <x-text-input
                    id="cv" type="file" accept=".pdf" class="block mt-1 w-full"
                    wire:model="cv"/>
            </div>

            @error('cv')
                <livewire:mostrar-alerta :message="$message">
            @enderror

            <x-primary-button>
                {{ __('Postularme') }}
            </x-primary-button>
        </form>
    @endif


</div>
