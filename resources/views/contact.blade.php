<x-layout :heading="$subject">
    {{-- Encabezado visual llamativo --}}
    <div class="flex items-center gap-3 mt-6 p-4 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-lg shadow-md text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="text-lg font-semibold tracking-wide">
            ¡Conecta con aliados, empleos y publicaciones que impulsan tu futuro!
        </span>
    </div>

    {{-- Sección de aliados estratégicos --}}
    <section class="mt-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">🤝 Aliados estratégicos</h2>

        @if($partners->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($partners as $partner)
                    <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 border border-gray-200">
                        <h3 class="text-lg font-bold text-indigo-700 mb-2">{{ $partner->name }}</h3>

                        @if(!empty($partner->industry))
                            <p class="text-sm text-gray-600 mb-1">
                                <span class="font-semibold text-gray-700">Industria:</span> {{ ucfirst($partner->industry) }}
                            </p>
                        @endif

                        <p class="text-sm text-gray-600">
                            <span class="font-semibold text-gray-700">Registrado el:</span>
                            {{ \Carbon\Carbon::parse($partner->created_at)->format('d M Y') }}
                        </p>

                        @if(!empty($partner->description))
                            <p class="text-gray-600 text-sm leading-relaxed mt-3">{{ $partner->description }}</p>
                        @endif

                        @if($partner->tags->count())
                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach($partner->tags as $tag)
                                    <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs rounded-full">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-gray-500 mt-4">
                <p>No hay aliados registrados por el momento.</p>
            </div>
        @endif
    </section>

    {{-- Sección de empleos --}}
    <section class="mt-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">💼 Oportunidades laborales</h2>

        @if($jobs->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($jobs as $job)
                    <div class="p-6 bg-white rounded-xl border-l-4 border-indigo-500 shadow-md hover:shadow-lg transition duration-300">
                        <h3 class="text-lg font-bold text-indigo-700 mb-2">{{ $job->title }}</h3>

                        {{-- Empresa: soporta campo plano o relación --}}
                        <p class="text-sm text-gray-600">
                            <span class="font-semibold">Empresa:</span>
                            {{ $job->company ? (is_string($job->company) ? $job->company : $job->company->name) : 'Sin empresa asignada' }}
                        </p>

                        <p class="text-sm text-gray-600 mb-1">
                            <span class="font-semibold text-gray-700">Ubicación:</span> {{ $job->location }}
                        </p>

                        @if(!empty($job->industry))
                            <p class="text-sm text-gray-600 mb-1">
                                <span class="font-semibold text-gray-700">Industria:</span> {{ ucfirst($job->industry) }}
                            </p>
                        @endif

                        <p class="text-sm text-gray-600">
                            <span class="font-semibold text-gray-700">Publicado el:</span>
                            {{ \Carbon\Carbon::parse($job->created_at)->format('d M Y') }}
                        </p>

                        @if($job->tags->count())
                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach($job->tags as $tag)
                                    <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs rounded-full">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-gray-500 mt-4">
                <p>No hay empleos disponibles por el momento.</p>
            </div>
        @endif
    </section>

    {{-- Sección de publicaciones --}}
    <section class="mt-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">📝 Publicaciones destacadas</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($posts as $post)
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 border border-gray-200">
                    <h3 class="text-lg font-bold text-indigo-700 mb-2">{{ $post->title }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed line-clamp-5">{{ $post->content }}</p>

                    @if($post->tags->count())
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach($post->tags as $tag)
                                <span class="px-2 py-1 bg-indigo-100 text-indigo-700 text-xs rounded-full">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            @empty
                <p class="text-gray-500">No hay publicaciones disponibles.</p>
            @endforelse
        </div>
    </section>

    {{-- Formulario para nueva publicación --}}
    <section class="mt-16">
        <h2 class="text-xl font-bold text-gray-800 mb-4">📬 Dejanos tu Comentario</h2>

        <form action="{{ route('posts.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md space-y-4">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="title" id="title" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Contenido</label>
                <textarea name="content" id="content" rows="4" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <div>
                <label for="tags" class="block text-sm font-medium text-gray-700">Etiquetas (separadas por coma)</label>
                <input type="text" name="tags" id="tags"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="tecnología, innovación, desarrollo">
            </div>

            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 transition">
                Publicar
            </button>
        </form>
    </section>
</x-layout>