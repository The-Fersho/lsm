<section>
    <x-section-header :title="'Confirmar la eliminación del libro:' . $libro->titulo" :description="'Una vez eliminado el libro no se podrá recuperar'" />

    <div class="mt-6 flex gap-4">
        <x-danger-button wire:click="eliminar_libro">Aceptar</x-danger-button>
        <x-primary-button wire:click="cancelar">Cancelar</x-primary-button>
    </div>

</section>
