<x-layout title="Detalle del empleo">
    <div class="max-w-xl mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-purple-800 mb-4">{{ $job->title }}</h1>

        <p class="mb-2"><strong>Salario:</strong> ${{ number_format($job->Salary) }}</p>
        <p class="mb-2"><strong>Empresa:</strong> {{ $job->company->name ?? 'Sin empresa asignada' }}</p>
        <p class="mb-4"><strong>Descripción:</strong> {{ $job->details }}</p>

        @if($job->tags->count())
            <div class="mb-4">
                <span class="text-sm text-gray-600">Etiquetas:</span>
                @foreach ($job->tags as $tag)
                    <span class="inline-block bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full mr-2">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>
        @endif

        @auth
            <div class="mt-6 flex gap-4">
                <a href="{{ route('jobs.modificar', $job->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar</a>
                <form action="{{ route('jobs.eliminar', $job->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este empleo?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Eliminar</button>
                </form>
            </div>
        @endauth

        @if($relacionadosEmpresa->count())
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">
                    Otros empleos en {{ $job->company->name ?? 'empresa no asignada' }}
                </h3>
                <ul class="list-disc pl-5 text-gray-600">
                    @foreach($relacionadosEmpresa as $rel)
                        <li><a href="{{ route('jobs.detalle', $rel->id) }}" class="text-blue-600 hover:underline">{{ $rel->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($relacionadosEtiqueta->count())
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Empleos con etiquetas similares</h3>
                <ul class="list-disc pl-5 text-gray-600">
                    @foreach($relacionadosEtiqueta as $rel)
                        <li><a href="{{ route('jobs.detalle', $rel->id) }}" class="text-blue-600 hover:underline">{{ $rel->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('jobs.listado') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mt-6 block">
            ← Ver listado de empleos
        </a>
    </div>
</x-layout>