<x-layout title="Aliados">
    <div class="max-w-7xl mx-auto px-4 py-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Nuestros Aliados</h2>

        {{-- Mensaje de éxito --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Botón para crear nuevo aliado --}}
        <div class="mb-6 text-right">
            <a href="{{ route('aliados.create') }}"
               class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Nuevo Aliado
            </a>
        </div>

        {{-- Grid de aliados --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($aliados as $aliado)
                @php
                    $icon = match($aliado->tipo) {
                        'educativo' => '🎓',
                        'corporativo' => '💼',
                        'bienestar' => '💚',
                        default => '🤝',
                    };
                @endphp

                <div class="bg-white rounded-lg shadow p-4 hover:shadow-lg transition-transform transform hover:-translate-y-1 flex flex-col h-full">
                    <a href="{{ route('aliados.show', $aliado->id) }}">
                        <img src="{{ asset('images/' . $aliado->imagen) }}"
                             alt="{{ $aliado->nombre }}"
                             class="w-full h-48 object-cover object-center rounded-lg bg-gray-100 shadow-sm transition hover:scale-[1.02]">
                    </a>

                    <div class="flex-grow text-center">
                        <h3 class="text-lg font-semibold text-gray-700">{{ $icon }} {{ $aliado->nombre }}</h3>
                        <p class="text-sm text-gray-500 mt-2 line-clamp-3">{{ $aliado->descripcion }}</p>
                        <p class="text-xs text-gray-400 italic mt-1">Tipo: {{ ucfirst($aliado->tipo) }}</p>
                    </div>

                    {{-- Acciones --}}
                    <div class="mt-4 flex justify-between items-center text-sm">
                        <a href="{{ route('aliados.edit', $aliado->id) }}"
                           class="inline-flex items-center gap-1 text-indigo-600 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M11 5h6m2 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4" />
                            </svg>
                            Editar
                        </a>

                        <form action="{{ route('aliados.destroy', $aliado->id) }}" method="POST"
                              onsubmit="return confirm('¿Estás seguro de eliminar este aliado?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center gap-1 text-red-600 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-3">No hay aliados registrados aún.</p>
            @endforelse
        </div>

        {{-- Paginación --}}
        <div class="mt-6">
            {{ $aliados->links() }}
        </div>
    </div>
</x-layout>