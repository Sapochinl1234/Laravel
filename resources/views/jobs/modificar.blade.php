<x-layout title="Modificar empleo">
    <div class="max-w-3xl mx-auto px-4 py-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Editar empleo</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jobs.actualizar', $job->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="title" placeholder="Título" class="w-full mb-4 border p-2 rounded"
                   value="{{ old('title', $job->title) }}">

            <input type="number" name="Salary" placeholder="Salario" class="w-full mb-4 border p-2 rounded"
                   value="{{ old('Salary', $job->Salary) }}">

            <textarea name="details" placeholder="Descripción" class="w-full mb-4 border p-2 rounded"
                      rows="5">{{ old('details', $job->details) }}</textarea>

            {{-- Etiquetas de empleo --}}
            <label class="block font-semibold mb-2">Etiquetas:</label>
            @foreach($tags as $tag)
                <label class="inline-flex items-center mr-3 mb-2">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                           {{ $job->tags->contains($tag->id) ? 'checked' : '' }}>
                    <span class="ml-1">{{ $tag->name }}</span>
                </label>
            @endforeach

            <div class="text-right mt-6">
                <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                    Actualizar
                </button>
            </div>
        </form>

        <div class="mt-6">
            <a href="{{ route('jobs.listado') }}" class="text-blue-600 hover:underline">
                ← Cancelar y volver al listado
            </a>
        </div>
    </div>
</x-layout>