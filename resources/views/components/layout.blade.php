<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ strip_tags($heading ?? '') ?? 'Document' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('icons.png') }}" sizes="32x32">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>
<body class="min-h-screen text-gray-900">



    {{-- Barra de navegación --}}
    <nav class="relative bg-gray-800 mt-4">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                {{-- Botón móvil --}}
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button type="button" command="--toggle" commandfor="mobile-menu"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:-outline-offset-1 focus:outline-indigo-500">
                        <span class="sr-only">Abrir menú</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                             class="size-6 in-aria-expanded:hidden">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                             class="size-6 not-in-aria-expanded:hidden">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>

                {{-- Menú principal --}}
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex shrink-0 items-center">
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                             alt="Logo" class="h-8 w-auto" />
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <x-navlink href="{{ route('jobs.listado') }}" :active="Request::is('empleos')">Empleos Disponibles</x-navlink>
                            <x-navlink href="/dashboard" :active="Request::is('dashboard')">Dashboard</x-navlink>
                            <x-navlink href="/aliados" :active="Request::is('aliados')">Aliados</x-navlink>
                            <x-navlink href="/" :active="Request::is('/')">Página principal</x-navlink>
                            <x-navlink href="/contact" :active="Request::is('contact')">Contáctenos</x-navlink>
                        </div>
                    </div>
                </div>

                {{-- Dropdown de usuario --}}
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <el-dropdown class="relative">
                        <button class="flex items-center justify-center rounded-full focus:outline-none">
                            <img src="{{ asset('images/alexander.jpg') }}"
                                 alt="Usuario"
                                 class="w-8 h-8 rounded-full bg-gray-800 outline outline-white/10" />
                        </button>

                        <el-menu anchor="bottom end" popover class="absolute z-50 mt-0 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg outline outline-black/5 transition transition-discrete [--anchor-gap:0px] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                            <x-navlink href="{{ route('jobs.listado') }}" :active="Request::is('empleos')">Empleos Disponibles</x-navlink>
                            <x-navlink href="/dashboard" :active="Request::is('dashboard')">Dashboard</x-navlink>
                            <x-navlink href="/aliados" :active="Request::is('aliados')">Aliados</x-navlink>
                            <x-navlink href="/" :active="Request::is('/')">Página principal</x-navlink>
                            <x-navlink href="/contact" :active="Request::is('contact')">Contáctenos</x-navlink>
                        </el-menu>
                    </el-dropdown>
                </div>
            </div>
        </div>

        {{-- Menú móvil --}}
        <el-disclosure id="mobile-menu" class="block sm:hidden bg-gray-900 text-white">
            <div class="px-4 pt-4 pb-2">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/alexander.jpg') }}"
                         alt="Alexander Valderrama" class="w-9 h-9 rounded-full bg-gray-800 outline outline-white/10" />
                    <div>
                        <p class="text-sm font-semibold leading-tight">Brayan Valderrama</p>
                        <p class="text-xs text-gray-400">Brayan.380171120904@ucaldas.edu.co</p>
                    </div>
                </div>
            </div>

            <div class="mt-3 space-y-1 px-4 pb-4">
                <x-navlink href="{{ route('jobs.listado') }}" :active="Request::is('empleos')">Empleos Disponibles</x-navlink>
                <x-navlink href="/dashboard" :active="Request::is('dashboard')">Dashboard</x-navlink>
                <x-navlink href="/aliados" :active="Request::is('aliados')">Aliados</x-navlink>
                <x-navlink href="/" :active="Request::is('/')">Página principal</x-navlink>
                <x-navlink href="/contact" :active="Request::is('contact')">Contáctenos</x-navlink>
            </div>
        </el-disclosure>
    </nav>

    {{-- Contenido principal --}}
    <main class="p-6">
        @isset($heading)
            {!! $heading !!}
        @endisset

        {{ $slot }}
    </main>

</body>
</html>