@props(['title', 'value', 'color' => 'gray', 'subtitle' => ''])
<div class="bg-white shadow-md rounded p-4 border-l-4 border-{{ $color }}-500">
    <h2 class="text-lg font-semibold text-{{ $color }}-600">{{ $title }}</h2>
    <p class="text-3xl font-bold mt-2">{{ $value }}</p>
    <p class="text-sm text-gray-500">{{ $subtitle }}</p>
</div>