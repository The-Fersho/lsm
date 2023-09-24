<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Detalles del nuevo libro
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Ingresa la informacion para el nuevo libro
        </p>
    </header>

    <form wire:submit.prevent='guaradar_libro' class="mt-6 space-y-6">
        <div>
            <x-input-label for="titulo" :value="__('Titulo')" />
            <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" :value="old('titulo', $libro->titulo)" required autofocus autocomplete="titulo" />
            <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
        </div>

        <div>
            <x-input-label for="autor" :value="__('Autor')" />
            <x-text-input id="autor" name="autor" type="email" class="mt-1 block w-full" :value="old('autor', $libro->autor)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('autor')" />
        </div>
        
        <div>
            <x-input-label for="categoria" :value="__('Categoria')" />
            <x-text-input id="categoria" name="categoria" type="email" class="mt-1 block w-full" :value="old('categoria', $libro->categoria)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('categoria')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Guadar</x-primary-button>
        </div>
    </form>

</section>