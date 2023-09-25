<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Confirmar la eliminación del docente: {{ $docente->nombres }}{{ $docente->apellidos }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Una vez eliminado el docente no se podrá recuperar.
        </p>
    </header>

    <div class="flex gap-4 mt-6">
        <x-danger-button wire:click="eliminar_docente">Aceptar</x-danger-button>
        <x-primary-button wire:click="cancelar">Cancelar</x-primary-button>
    </div>

</section>
