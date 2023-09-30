<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Gestión de atenciones
            </h2>

            <a href="{{ route('atenciones.create', ['tipo_atencion' => (new \ReflectionClass(\App\Models\Estudiante::class))->getShortName()]) }}"
               class="group rounded-md bg-ugreen-500 p-1 text-white hover:bg-ugreen-400 active:bg-ugreen-700">
                @svg('typ-plus', 'inline w-6 h-6 mr-1')
                Nueva
            </a>
        </div>
    </x-slot>
    <x-body>
        <livewire:atenciones-table />
    </x-body>
</x-app-layout>
