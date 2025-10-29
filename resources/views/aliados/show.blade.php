<x-layout title="{{ $aliado->nombre }}">
    <div class="max-w-3xl mx-auto px-4 py-8">
        {{-- Imagen destacada --}}
        <div class="overflow-hidden rounded-xl shadow-md mb-6">
            <img src="{{ asset('images/' . $aliado->imagen) }}"
                 alt="Imagen de {{ $aliado->nombre }}"
                 class="w-full max-h-[400px] object-cover object-center bg-gray-100 transition hover:scale-[1.01]">
        </div>

        {{-- Información principal --}}
        <div class="mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">{{ $aliado->nombre }}</h1>
            <p class="text-base text-gray-700 leading-relaxed">{{ $aliado->descripcion }}</p>
            <p class="text-sm text-gray-500 italic mt-2">Tipo de aliado: <span class="font-medium">{{ ucfirst($aliado->tipo) }}</span></p>
        </div>

        {{-- Botón de retorno --}}
        <div class="mt-8">
            <a href="{{ route('aliados.index') }}"
               class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Volver al listado de aliados
            </a>
        </div>
    </div>
</x-layout>