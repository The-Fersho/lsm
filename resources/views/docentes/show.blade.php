<x-app-layout>
    <x-show-toolbar :route="'docentes'" :text="'Detalles del docente seleccionado'" />
    <x-body>
        @livewire('docentes.show-details')
    </x-body>
</x-app-layout>
