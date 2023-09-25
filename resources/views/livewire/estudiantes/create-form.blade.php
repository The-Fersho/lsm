@php
    use App\Enums\CarrerasEstudiantesEnum;
@endphp
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Detalles del nuevo estudiante
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Ingresa la información requerida para el nuevo estudiante
        </p>
    </header>

    <form wire:submit.prevent='guardar_estudiante' class="mt-6 space-y-6">
        <div>
            <x-input-label for="nombres" :value="__('Nombres')" />
            <x-text-input wire:model="estudiante.nombres" id="nombres" name="nombres" type="text" class="block w-full mt-1"
                :value="old('nombres', $estudiante->nombres)" required autofocus autocomplete="nombres" />
            <x-input-error class="mt-2" :messages="$errors->get('nombres')" />
        </div>

        <div>
            <x-input-label for="apellidos" :value="__('Apellidos')" />
            <x-text-input wire:model="estudiante.apellidos" id="apellidos" name="apellidos" type="text"
                class="block w-full mt-1" :value="old('apellidos', $estudiante->apellidos)" required autocomplete="apellidos" />
            <x-input-error class="mt-2" :messages="$errors->get('apellidos')" />
        </div>

        <div>
            <x-input-label for="celular" :value="__('Celular')" />
            <x-text-input wire:model="estudiante.celular" id="celular" name="celular" type="text"
                          class="block w-full mt-1" :value="old('celular', $estudiante->celular)" required autocomplete="celular" />
            <x-input-error class="mt-2" :messages="$errors->get('celular')" />
        </div>

        <div>
            <x-input-label for="correo" :value="__('Correo')" />
            <x-text-input wire:model="estudiante.correo" id="correo" name="correo" type="email"
                          class="block w-full mt-1" :value="old('correo', $estudiante->email)" required autocomplete="correo" />
            <x-input-error class="mt-2" :messages="$errors->get('correo')" />
        </div>


        <!-- Create a select element with a Enums CategoriasLibrosEnum -->
        <div>
            <x-input-label for="carrera" :value="__('Carrera')" />
            <select wire:model.defer="estudiante.carrera" id="carrera" name="carrera" class="block w-full mt-1"
                :value="old('carrera', $estudiante->carrera)" required>
                <option value="">Seleccione una carrera</option>
                @foreach (CarrerasEstudiantesEnum::cases() as $key => $cat)
                    <option value="{{ $cat->value }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('carrera')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Guardar</x-primary-button>
            <x-secondary-button wire:click="cancelar">Cancelar</x-secondary-button>
        </div>
    </form>
</section>
