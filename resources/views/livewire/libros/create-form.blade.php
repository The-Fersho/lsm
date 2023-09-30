@php
    use App\Enums\CategoriasLibrosEnum;
@endphp
<section>
    <x-section-header :title="'Detalles del nuevo libro'" :description="' Ingresa la información requerida para el nuevo libro'" />

    <form wire:submit.prevent='guardar_libro' class="mt-6">
        <div>
            <x-input-label for="titulo" :value="__('Titulo')" />
            <x-text-input wire:model.defer="libro.titulo" id="titulo" name="titulo" type="text"
                class="mt-1 block w-full" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('libro.titulo')" />
        </div>

        <div>
            <x-input-label for="autor" :value="__('Autor')" />
            <x-text-input wire:model.defer="libro.autor" id="autor" name="autor" type="text"
                class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('libro.autor')" />
        </div>

        <div>
            <x-input-label for="categoria" :value="__('Categoria')" />
            <select wire:model.defer="libro.categoria" id="categoria" name="categoria" class="mt-1 block w-full"
                required>
                <option value="">Seleccione una categoria</option>
                @foreach (CategoriasLibrosEnum::cases() as $key => $cat)
                    <option value="{{ $cat->value }}">{{ self::transform($cat->name) }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('libro.categoria')" />
        </div>

        <div class="form-footer">
            <x-primary-button>Guardar</x-primary-button>
            <x-secondary-button wire:click="cancelar">Cancelar</x-secondary-button>
        </div>
    </form>
</section>
