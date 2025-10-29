{{-- Usa el componente de layout principal y define el título de la página --}}
<x-layout title="Nuevo Aliado">

    {{-- Contenedor principal con ancho máximo y espaciado interno --}}
    <div class="max-w-3xl mx-auto px-4 py-6">

        {{-- Título de la sección --}}
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Agregar nuevo aliado</h2>

        {{-- Muestra los errores de validación si existen --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> {{-- Muestra cada error en una lista --}}
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulario para crear un nuevo aliado --}}
        <form action="{{ route('aliados.store') }}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Token de seguridad obligatorio para formularios POST en Laravel --}}

            {{-- Campo: Nombre del aliado --}}
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            {{-- Campo: Descripción del aliado --}}
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('descripcion') }}</textarea>
            </div>

            {{-- Campo: Tipo de aliado (select con opciones fijas) --}}
            <div class="mb-4">
                <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
                <select name="tipo" id="tipo"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Selecciona un tipo</option>
                    <option value="educativo" {{ old('tipo') === 'educativo' ? 'selected' : '' }}>Educativo</option>
                    <option value="corporativo" {{ old('tipo') === 'corporativo' ? 'selected' : '' }}>Corporativo</option>
                    <option value="bienestar" {{ old('tipo') === 'bienestar' ? 'selected' : '' }}>Bienestar</option>
                </select>
            </div>

            {{-- Campo: Imagen del aliado (con vista previa) --}}
            <div class="mb-4">
                <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
                <input type="file" name="imagen" id="imagen"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                       accept="image/*" onchange="previewImagen(event)">
                {{-- Imagen oculta que se mostrará como vista previa --}}
                <img id="preview" class="mt-4 w-full h-48 object-cover rounded hidden" />
            </div>

            {{-- Botón para enviar el formulario --}}
            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Guardar Aliado
                </button>
            </div>
        </form>
    </div>

    {{-- Script JavaScript para mostrar la imagen seleccionada antes de enviarla --}}
    <script>
        function previewImagen(event) {
            const file = event.target.files[0]; // Obtiene el archivo seleccionado
            const preview = document.getElementById('preview'); // Referencia al <img> oculto
            if (file) {
                preview.src = URL.createObjectURL(file); // Crea una URL temporal para mostrar la imagen
                preview.classList.remove('hidden'); // Muestra la imagen
            } else {
                preview.src = '';
                preview.classList.add('hidden'); // Oculta si no hay imagen
            }
        }
    </script>
</x-layout>