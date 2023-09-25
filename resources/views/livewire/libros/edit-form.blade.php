@php
    use App\Enums\CategoriasLibrosEnum;
@endphp
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Detalles del libro
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Ingresa la información requerida para actualizar el libro
        </p>
    </header>

    <form wire:submit.prevent='guardar_libro' class="mt-6 space-y-6">
        <div>
            <x-input-label for="titulo" :value="__('Titulo')" />
            <x-text-input wire:model="libro.titulo" id="titulo" name="titulo" type="text" class="block w-full mt-1" :value="old('titulo', $libro->titulo)" required autofocus autocomplete="titulo" />
            <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
        </div>

        <div>
            <x-input-label for="autor" :value="__('Autor')" />
            <x-text-input wire:model="libro.autor" id="autor" name="autor" type="text" class="block w-full mt-1" :value="old('autor', $libro->autor)" required autocomplete="autor" />
            <x-input-error class="mt-2" :messages="$errors->get('autor')" />
        </div>

        <!-- Create a select element with a Enums CategoriasLibrosEnum -->
        <div>
            <x-input-label for="categoria" :value="__('Categoria')" />
            <select wire:model.defer="libro.categoria" id="categoria" name="categoria" class="block w-full mt-1"
                    :value="old('categoria', $libro->categoria)" required autocomplete="categoria">
                <option value="">Seleccione una categoria</option>
                @foreach (CategoriasLibrosEnum::cases() as $key => $cat)
                    <option value="{{ $cat->value }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('categoria')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Guardar</x-primary-button>
            <x-secondary-button wire:click="cancelar">Cancelar</x-secondary-button>
        </div>
    </form>
</section>
