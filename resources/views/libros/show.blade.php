<x-app-layout>
    <x-show-toolbar :route="'libros'" :text="'Detalles del libro seleccionado'" />
    <x-body>
        @livewire('libros.show-details')
    </x-body>
</x-app-layout>
