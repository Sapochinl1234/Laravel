<x-layout>
    <x-slot name="heading">
        <h1 class="text-purple-600 font-bold text-3xl">Dashboard</h1>
    </x-slot>

    {{-- Bienvenida --}}
    <div class="bg-purple-100 border-l-4 border-purple-500 text-purple-900 p-4 mb-6 rounded">
        <p class="font-bold">Bienvenido al dashboard</p>
        <p class="text-sm">Aquí puedes gestionar tus postulaciones, explorar aliados y acceder a herramientas clave.</p>
    </div>

   
    {{-- Últimas postulaciones --}}
    <div class="bg-white rounded shadow-md p-6 mb-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Últimas postulaciones</h2>
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2">Empleo</th>
                    <th class="px-4 py-2">Empresa</th>
                    <th class="px-4 py-2">Fecha</th>
                    <th class="px-4 py-2">Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-2">Desarrollador Backend</td>
                    <td class="px-4 py-2">TechNova</td>
                    <td class="px-4 py-2">28 Oct 2025</td>
                    <td class="px-4 py-2 text-green-600 font-semibold">En revisión</td>
                </tr>
                <tr>
                    <td class="px-4 py-2">Analista de datos</td>
                    <td class="px-4 py-2">DataCorp</td>
                    <td class="px-4 py-2">25 Oct 2025</td>
                    <td class="px-4 py-2 text-yellow-600 font-semibold">Pendiente</td>
                </tr>
                <tr>
                    <td class="px-4 py-2">Diseñador UI/UX</td>
                    <td class="px-4 py-2">Creativa</td>
                    <td class="px-4 py-2">22 Oct 2025</td>
                    <td class="px-4 py-2 text-blue-600 font-semibold">Entrevista</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Estado de cuenta del usuario --}}
    <div class="bg-gray-50 border rounded p-6 mb-6">
        <h2 class="text-lg font-bold text-gray-800 mb-2">Tu perfil profesional</h2>
        <ul class="text-sm text-gray-700 space-y-1">
            <li><strong>Nombre:</strong> Alexander Valderrama</li>
            <li><strong>Rol:</strong> Ingeniero Informatico</li>
            <li><strong>Última actividad:</strong> 2 Nov 2025</li>
            <li><strong>Postulaciones totales:</strong> 8</li>
            <li><strong>Aliados conectados:</strong> 5</li>
        </ul>
    </div>

    {{-- Acciones rápidas --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <a href="{{ route('jobs.listado') }}" class="bg-indigo-50 hover:bg-indigo-100 p-4 rounded text-center border border-indigo-300">
            <span class="font-semibold text-indigo-600">Ver empleos</span>
        </a>
        <a href="{{ route('partners.index') }}" class="bg-green-50 hover:bg-green-100 p-4 rounded text-center border border-green-300">
            <span class="font-semibold text-green-600">Ver aliados</span>
        </a>
        <a href="{{ route('pagina.principal') }}" class="bg-blue-50 hover:bg-blue-100 p-4 rounded text-center border border-blue-300">
            <span class="font-semibold text-blue-600">Página principal</span>
        </a>
        <a href="{{ url('/contact') }}" class="bg-red-50 hover:bg-red-100 p-4 rounded text-center border border-red-300">
            <span class="font-semibold text-red-600">Contáctenos</span>
        </a>
    </div>

    {{-- Botón de reporte --}}
    <div class="text-right">
        <button class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
            Generar reporte PDF
        </button>
    </div>
</x-layout>