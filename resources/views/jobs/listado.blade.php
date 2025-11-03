<x-layout title="Lista de empleos disponibles">
    <div class="max-w-4xl mx-auto px-4 py-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Empleos disponibles</h2>

        {{-- Mensaje flash de éxito --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Filtros --}}
        <form method="GET" class="mb-6 flex flex-wrap gap-4">
            <select name="company" class="border p-2 rounded">
                <option value="">Empresa</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ request('company') == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>

            <select name="tag" class="border p-2 rounded">
                <option value="">Etiqueta</option>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ request('tag') == $tag->id ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>

            <input type="number" name="min_salary" placeholder="Salario mínimo" value="{{ request('min_salary') }}" class="border p-2 rounded">

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filtrar</button>
        </form>

        {{-- Botón para agregar nuevo empleo --}}
        <a href="{{ route('jobs.nuevo') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-6 inline-block">
            + Nuevo empleo
        </a>

        {{-- Listado de empleos --}}
        <ul class="space-y-4">
            @foreach ($jobs as $job)
                <li class="border p-4 rounded shadow-sm">
                    <h3 class="text-lg font-semibold text-purple-700">
                        <a href="{{ route('jobs.detalle', $job->id) }}">{{ $job->title }}</a>
                    </h3>
                    <p><strong>Salario:</strong> ${{ number_format($job->Salary) }}</p>
                    <p><strong>Empresa:</strong>{{ $job->companyRelation ? $job->companyRelation->name : 'Sin empresa asignada' }}</p>

                    @if($job->tags->count())
                        <div class="mt-2">
                            <span class="text-sm text-gray-600">Etiquetas:</span>
                            @foreach ($job->tags as $tag)
                                <span class="inline-block bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full mr-2">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    <div class="mt-4 flex gap-4">
                        {{-- Enlace para editar --}}
                        <a href="{{ route('jobs.modificar', $job->id) }}" class="text-blue-600 hover:underline">Editar</a>

                        {{-- Formulario para eliminar --}}
                        <form action="{{ route('jobs.eliminar', $job->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este empleo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        {{-- Si no hay empleos registrados --}}
        @if($jobs->isEmpty())
            <p class="text-gray-500 mt-6">No hay empleos registrados por el momento.</p>
        @endif
    </div>
</x-layout>