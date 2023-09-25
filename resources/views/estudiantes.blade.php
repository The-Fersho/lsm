<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Gestion de estudiantes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Show a session flash message -->
            @if (session()->has('message'))
                <div

                    x-data="{show: true}"
                    x-init="setTimeout(() => show = false, 3000)"
                    x-show="show"

                    class="p-3 mb-2 font-bold text-center text-white rounded-md bg-ublue-500">
                    {{ session('message') }}
                </div>
            @endif

            <div class="flex items-center justify-end mb-2">
                <a href="{{ route('estudiantes.create') }}"
                   class="p-2 text-white rounded-md bg-ugreen-500 hover:bg-ugreen-400 active:bg-ugreen-700">
                    Agregar estudiante
                </a>
            </div>
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:estudiantes-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
