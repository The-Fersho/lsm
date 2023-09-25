@php
    use App\Enums\CategoriasLibrosEnum;
@endphp
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Detalles de la atención
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Ingresa la información requerida para la nueva atención
        </p>
    </header>
    <form wire:submit.prevent='guardar_atencion' class="mt-6 space-y-6">
        <!-- Lista de libros -->
        <div>
            <x-input-label for="libro_id" :value="__('Libro')" />
            <select wire:model="atencion.libro_id" id="libro_id" name="libro_id" class="block w-full mt-1"
                :value="old('libro_id', $atencion->categoria)" required>
                <option value="">Seleccione una categoria</option>
                @foreach(\App\Models\Libro::all() as $libro)
                    <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('libro_id')" />
        </div>
        <!-- Elegir entre estudiante o docente -->
        <div>
            <x-input-label for="tipo_atencion" :value="__('Elija el tipo de usuario')" />

            <select wire:model="tipo_atencion" id="tipo_atencion" name="tipo_atencion" class="block w-full mt-1" required>
                <option value="">Seleccione el tipo de usuario</option>
                @foreach([0 => 'Estudiante',1 => 'Docente'] as $key => $item)
                    <option value="{{ $key}}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
        @if ($tipo_atencion == 0)
            <!-- Lista de estudiantes -->
        <div>
            <x-input-label for="atencionable_id" :value="__('Estudiantes')" />
            <select wire:model="atencion.atencionable_id" id="atencionable_id" name="atencionable_id" class="block w-full mt-1"
                required>
                <option value="">Seleccione una estudiante</option>
                @foreach(\App\Models\Estudiante::all() as $estudiante)
                    <option value="{{ $estudiante->id }}">{{ $estudiante->nombres }} {{ $estudiante->apellidos}}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('atencionable_id')" />
        </div>
        @else
        <!-- Lista de docentes -->
        <div>
            <x-input-label for="atencionable_id" :value="__('Docentes')" />
            <select wire:model="atencion.atencionable_id" id="atencionable_id" name="atencionable_id" class="block w-full mt-1"
                required>
                <option value="">Seleccione el docente</option>
                @foreach(\App\Models\Docente::all() as $estudiante)
                    <option value="{{ $estudiante->id }}">{{ $estudiante->nombres }} {{ $estudiante->apellidos}}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('atencionable_id')" />
        </div>

        @endif

{{--
        <div>
            <x-input-label for="titulo" :value="__('Titulo')" />
            <x-text-input wire:model="libro.titulo" id="titulo" name="titulo" type="text" class="block w-full mt-1"
                :value="old('titulo', $libro->titulo)" required autofocus autocomplete="titulo" />
            <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
        </div>
        <div>
            <x-input-label for="autor" :value="__('Autor')" />
            <x-text-input wire:model="libro.autor" id="autor" name="autor" type="text"
                class="block w-full mt-1" :value="old('autor', $libro->autor)" required autocomplete="autor" />
            <x-input-error class="mt-2" :messages="$errors->get('autor')" />
        </div>

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
        </div> --}}

        <div class="flex items-center gap-4">
            <x-primary-button>Guardar</x-primary-button>
            <x-secondary-button wire:click="cancelar">Cancelar</x-secondary-button>
        </div>
    </form>
</section>
