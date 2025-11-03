<x-layout>
    <x-slot name="heading">
        <h1 class="text-blue-600 font-bold flex items-center gap-2 text-3xl">
            {{ $greeting }}
        </h1>
    </x-slot>

    {{-- Bienvenida destacada --}}
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white p-6 rounded-lg shadow-md mb-6">
        <h2 class="text-2xl font-bold">Bienvenido, {{ $name }} 👋</h2>
        <p class="mt-2 text-lg">Explora oportunidades laborales, aliados estratégicos y recursos pensados para tu crecimiento profesional.</p>
    </div>

    {{-- Panel de navegación rápido --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <a href="{{ route('jobs.listado') }}" class="bg-white border hover:shadow-md p-4 rounded text-center">
            <span class="font-semibold text-blue-600">Empleos Disponibles</span>
        </a>
        <a href="{{ route('partners.index') }}" class="bg-white border hover:shadow-md p-4 rounded text-center">
            <span class="font-semibold text-green-600">Aliados Estratégicos</span>
        </a>
        <a href="{{ route('dashboard') }}" class="bg-white border hover:shadow-md p-4 rounded text-center">
            <span class="font-semibold text-purple-600">Dashboard</span>
        </a>
        <a href="{{ route('condiciones') }}" class="bg-white border hover:shadow-md p-4 rounded text-center">
            <span class="font-semibold text-red-600">Condiciones</span>
        </a>
    </div>

    {{-- Novedades o anuncios --}}
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-900 p-4 mb-6" role="alert">
        <p class="font-bold">📌 Novedades</p>
        <p>Ya puedes postularte a empleos directamente desde tu perfil. ¡Explora las nuevas funciones en el Dashboard!</p>
    </div>

    {{-- Oportunidades laborales destacadas --}}
    <div class="bg-white p-6 rounded shadow-md">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Oportunidades laborales destacadas</h2>
        @foreach($jobs->take(3) as $job)
            <div class="mb-4 border-b pb-2">
                <h3 class="text-lg font-semibold text-indigo-600">{{ $job->title }}</h3>
                <p><strong>Empresa:</strong> {{ $job->companyRelation->name ?? 'Sin empresa asignada' }}</p>
                <p><strong>Ubicación:</strong> {{ $job->location ?? 'No especificada' }}</p>
                <p><strong>Publicado:</strong> {{ $job->created_at->format('d M Y') }}</p>
            </div>
        @endforeach
        <a href="{{ route('jobs.listado') }}" class="text-blue-600 hover:underline">Ver todos los empleos →</a>
    </div>

    {{-- Frase motivacional --}}
    <div class="mt-6 text-center text-gray-600 italic">
        “Tu talento es el puente entre la universidad y el mundo profesional. ¡Construye tu futuro desde hoy!”
    </div>
</x-layout>