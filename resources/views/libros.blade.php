<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Gestion de Libros
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex items-center justify-end mb-2">
                <a href="{{ route('libros.create') }}" class="p-2 text-white rounded-md bg-ugreen-500 hover:bg-ugreen-400 active:bg-ugreen-700">
                    Agregar Libro
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:libros-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>