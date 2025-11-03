<x-layout title="Nuevo empleo">
    <div class="max-w-3xl mx-auto px-4 py-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Agregar nuevo empleo</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jobs.guardar') }}" method="POST">
            @csrf

            <input type="text" name="title" placeholder="Título" class="w-full mb-4 border p-2 rounded" value="{{ old('title') }}">
            <input type="number" name="salary" placeholder="Salario" class="w-full mb-4 border p-2 rounded" value="{{ old('salary') }}">
            <textarea name="details" placeholder="Descripción" class="w-full mb-4 border p-2 rounded">{{ old('details') }}</textarea>

            {{-- Etiquetas de empleo --}}
            <label class="block font-semibold mb-2">Etiquetas:</label>
            @foreach($tags as $tag)
                <label class="inline-flex items-center mr-3 mb-2">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                    <span class="ml-1">{{ $tag->name }}</span>
                </label>
            @endforeach

            <div class="text-right mt-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
            </div>
        </form>

        <div class="mt-6">
            <a href="{{ route('jobs.listado') }}" class="text-gray-600 hover:underline">← Volver sin guardar</a>
        </div>
    </div>
</x-layout>