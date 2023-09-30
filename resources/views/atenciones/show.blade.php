<x-app-layout>
    <x-show-toolbar :route="'atenciones'" :text="'Detalles de la atención seleccionada'" />
    <x-body>
        @livewire('atenciones.show-details')
    </x-body>
</x-app-layout>
