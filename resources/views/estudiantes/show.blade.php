<x-app-layout>
    <x-show-toolbar :route="'estudiantes'" :text="'Detalles del estudiante seleccionado'" />
    <x-body>
        @livewire('estudiantes.show-details')
    </x-body>
</x-app-layout>
