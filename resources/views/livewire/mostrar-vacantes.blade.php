<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


        @forelse ($vacantes as $vacante)


        <div class="p-6 text-gray-900 border-b md:flex md:justify-between md:items-center">
            <div class="leading-10">
                <a href="{{ route('vacantes.show', $vacante->id ) }}" class="text-xl font-bold">
                    {{ $vacante->titulo }}
                </a>
                <p class="text-sm text-gray-600 font-bold">
                    {{ $vacante->empresa }}
                </p>
                <p class="text-sm text-gray-500 ">
                    Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}
                </p>
            </div>

            <div class="flex flex-col items-stretch md:flex-row gap-3 text-center mt-5 md:mt-0">
                <a
                    href=" {{ route('candidatos.index', $vacante) }}"
                    class="bg-slate-800 py-2 px-4 rounded text-white text-xs font-bold uppercase"
                > {{ $vacante->candidatos->count() }} Candidatos</a>
                <a
                    href="{{ route('vacantes.edit', $vacante->id) }}"
                    class="bg-blue-800 py-2 px-4 rounded text-white text-xs font-bold uppercase"
                >Editar</a>
                <a
                    href="#"
                    class="bg-red-600 py-2 px-4 rounded text-white text-xs font-bold uppercase"
                >Eliminar</a>
            </div>
        </div>

        @empty
            <p class="p-3 text-center text-gray-600">No hay vacantes para mostrar</p>
        @endforelse
    </div>
</div>

<div class="mt-10">
    {{ $vacantes->links() }}
</div>
