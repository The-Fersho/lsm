@php
    use App\Enums\GradosAcademicosDocentesEnum;
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

    <form wire:submit.prevent='guardar_docente' class="mt-6">
        <div>
            <x-input-label for="nombres" :value="__('Nombres')"/>
            <x-text-input wire:model.defer="docente.nombres" id="nombres" name="nombres" type="text"
                          class="block w-full mt-1"
                          required autofocus/>
            <x-input-error class="mt-2" :messages="$errors->get('docente.nombres')"/>
        </div>

        <div>
            <x-input-label for="apellidos" :value="__('Apellidos')"/>
            <x-text-input wire:model.defer="docente.apellidos" id="apellidos" name="apellidos" type="text"
                          class="block w-full mt-1" required/>
            <x-input-error class="mt-2" :messages="$errors->get('docente.apellidos')"/>
        </div>

        <div>
            <x-input-label for="celular" :value="__('Celular')"/>
            <x-text-input wire:model.defer="docente.celular" id="celular" name="celular" type="text"
                          class="block w-full mt-1" required/>
            <x-input-error class="mt-2" :messages="$errors->get('docente.celular')"/>
        </div>

        <div>
            <x-input-label for="correo" :value="__('Correo')"/>
            <x-text-input wire:model.defer="docente.correo" id="correo" name="correo" type="email"
                          class="block w-full mt-1" required/>
            <x-input-error class="mt-2" :messages="$errors->get('docente.correo')"/>
        </div>


        <!-- Create a select element with a Enums CategoriasLibrosEnum -->
        <div>
            <x-input-label for="especialidad" :value="__('Carrera / profesion')"/>
            <select wire:model.defer="docente.especialidad" id="especialidad" name="especialidad"
                    class="block w-full mt-1"
                    required>
                <option value="">Seleccione una carrera / profesión</option>
                @foreach (\App\Enums\CarrerasEnum::cases() as $key => $cat)
                    <option value="{{ $cat->value }}">{{ self::transform( $cat->name) }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('docente.especialidad')"/>
        </div>

        <div>
            <x-input-label for="grado" :value="__('Grado académico')"/>
            <select wire:model.defer="docente.grado" id="grado" name="grado" class="block w-full mt-1"
                    :value="old('grado', $docente->grado)" required>
                <option value="">Seleccione el grado académico</option>
                @foreach (GradosAcademicosDocentesEnum::cases() as $key => $cat)
                    <option value="{{ $cat->value }}">{{ self::transform( $cat->name) }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('docente.grado')"/>
        </div>

        <div>
            <x-input-label for="grado" :value="__('Grado académico')"/>
            <select wire:model.defer="docente.grado" id="grado" name="grado" class="block w-full mt-1"
                    :value="old('grado', $docente->grado)" required>
                <option value="">Seleccione el grado académico</option>
                @foreach (GradosAcademicosDocentesEnum::cases() as $key => $cat)
                    <option value="{{ $cat->value }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('grado')"/>
        </div>

        <div class="form-footer">
            <x-primary-button>Guardar</x-primary-button>
            <x-secondary-button wire:click="cancelar">Cancelar</x-secondary-button>
        </div>
    </form>
</section>
