@props(['title', 'route'])
<x-slot name="header">
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ $title }}
        </h2>
        <a href="{{ route($route . '.create') }}"
            class="group rounded-md bg-ugreen-500 p-1 text-white hover:bg-ugreen-400 active:bg-ugreen-700">
            @svg('typ-plus', 'inline w-6 h-6 mr-1')
            Nuevo
        </a>
    </div>
</x-slot>
