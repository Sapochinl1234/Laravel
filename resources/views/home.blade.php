<x-layout>
    <x-slot name="heading">
        <h1 class="text-blue-600 font-bold flex items-center gap-2">
            {{ $greeting }}
        </h1>
    </x-slot>

    <p>{{ $name }}</p>
</x-layout>