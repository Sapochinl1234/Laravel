@props([
    'href',            // Propiedad: URL del enlace
    'active' => false, // Propiedad: indica si el enlace está activo
    'icon' => null     // Propiedad: clase CSS para ícono opcional
])

<a href="{{ $href }}"
   class="{{ $active ? 'bg-gray-900 text-white border-l-4 border-blue-500' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium flex items-center gap-3"
   {{ $attributes }}>

    
    @if ($active)
        <span class="text-blue-400 text-lg font-bold leading-none">■</span>
    @endif

    
    @if ($icon)
        <i class="{{ $icon }} text-base"></i>
    @endif

    {{ $slot }}
</a>