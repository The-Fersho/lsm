@php
    use App\Enums\EspecialidadesDocenteEnum;
@endphp
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Detalles del docente
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Ingresa la información requerida para el docente seleccionado
        </p>
    </header>

    <form wire:submit.prevent='guardar_docente' class="mt-6 space-y-6">
        <div>
            <x-input-label for="nombres" :value="__('Nombres')" />
            <x-text-input wire:model="docente.nombres" id="nombres" name="nombres" type="text" class="block w-full mt-1"
                          :value="old('nombres', $docente->nombres)" required autofocus autocomplete="nombres" />
            <x-input-error class="mt-2" :messages="$errors->get('nombres')" />
        </div>

        <div>
            <x-input-label for="apellidos" :value="__('Apellidos')" />
            <x-text-input wire:model="docente.apellidos" id="apellidos" name="apellidos" type="text"
                          class="block w-full mt-1" :value="old('apellidos', $docente->apellidos)" required autocomplete="apellidos" />
            <x-input-error class="mt-2" :messages="$errors->get('apellidos')" />
        </div>

        <div>
            <x-input-label for="celular" :value="__('Celular')" />
            <x-text-input wire:model="docente.celular" id="celular" name="celular" type="text"
                          class="block w-full mt-1" :value="old('celular', $docente->celular)" required autocomplete="celular" />
            <x-input-error class="mt-2" :messages="$errors->get('celular')" />
        </div>

        <div>
            <x-input-label for="correo" :value="__('Correo')" />
            <x-text-input wire:model="docente.correo" id="correo" name="correo" type="email"
                          class="block w-full mt-1" :value="old('correo', $docente->email)" required autocomplete="correo" />
            <x-input-error class="mt-2" :messages="$errors->get('correo')" />
        </div>


        <!-- Create a select element with a Enums CategoriasLibrosEnum -->
        <div>
            <x-input-label for="especialidad" :value="__('Carrera / profesion')" />
            <select wire:model.defer="docente.especialidad" id="especialidad" name="especialidad" class="block w-full mt-1"
                    :value="old('especialidad', $docente->especialidad)" required>
                <option value="">Seleccione una carrera / profesión</option>
                @foreach (\App\Enums\CarrerasEstudiantesEnum::cases() as $key => $cat)
                    <option value="{{ $cat->value }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('especialidad')" />
        </div>

        <div>
            <x-input-label for="grado" :value="__('Grado académico')" />
            <select wire:model.defer="docente.grado" id="grado" name="grado" class="block w-full mt-1"
                    :value="old('grado', $docente->grado)" required>
                <option value="">Seleccione el grado académico</option>
                @foreach (EspecialidadesDocenteEnum::cases() as $key => $cat)
                    <option value="{{ $cat->value }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('grado')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Guardar</x-primary-button>
            <x-secondary-button wire:click="cancelar">Cancelar</x-secondary-button>
        </div>
    </form>
</section>
