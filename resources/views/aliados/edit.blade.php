<x-layout title="Editar Aliado">
    <div class="max-w-3xl mx-auto px-4 py-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar aliado</h2>

        {{-- Mensajes de error --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulario --}}
        <form action="{{ route('aliados.update', $aliado->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Nombre --}}
            <div>
                <label for="nombre" class="block font-semibold text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $aliado->nombre) }}"
                       class="w-full mt-1 border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            {{-- Descripción --}}
            <div>
                <label for="descripcion" class="block font-semibold text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4"
                          class="w-full mt-1 border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('descripcion', $aliado->descripcion) }}</textarea>
            </div>

            {{-- Tipo --}}
            <div>
                <label for="tipo" class="block font-semibold text-gray-700">Tipo</label>
                <select name="tipo" id="tipo"
                        class="w-full mt-1 border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Selecciona un tipo</option>
                    <option value="educativo" {{ $aliado->tipo === 'educativo' ? 'selected' : '' }}>Educativo</option>
                    <option value="corporativo" {{ $aliado->tipo === 'corporativo' ? 'selected' : '' }}>Corporativo</option>
                    <option value="bienestar" {{ $aliado->tipo === 'bienestar' ? 'selected' : '' }}>Bienestar</option>
                </select>
            </div>

            {{-- Imagen actual --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">Imagen actual</label>
                <img src="{{ asset('images/' . $aliado->imagen) }}"
                     alt="Imagen actual"
                     class="w-full h-48 object-cover rounded border border-gray-300">
            </div>

            {{-- Nueva imagen --}}
            <div>
                <label for="imagen" class="block font-semibold text-gray-700">Cambiar imagen</label>
                <input type="file" name="imagen" id="imagen"
                       class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0 file:text-sm file:font-semibold
                              file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                       accept="image/*" onchange="previewImagen(event)">
                <img id="preview" class="mt-4 w-full h-48 object-cover rounded hidden" />
            </div>

            {{-- Botón de actualizar --}}
            <div class="text-right">
                <button type="submit"
                        class="inline-flex items-center gap-2 bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5 13l4 4L19 7" />
                    </svg>
                    Actualizar
                </button>
            </div>
        </form>
    </div>

    {{-- Script para preview de imagen --}}
    <script>
        function previewImagen(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');
            } else {
                preview.src = '';
                preview.classList.add('hidden');
            }
        }
    </script>
</x-layout>