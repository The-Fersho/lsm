@php
    use App\Enums\CarrerasEnum;
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

    <form wire:submit.prevent='guardar_estudiante' class="mt-6">
        <div>
            <x-input-label for="nombres" :value="__('Nombres')"/>
            <x-text-input wire:model.defer="estudiante.nombres" id="nombres" name="nombres" type="text"
                          class="block w-full mt-1"
                          required autofocus/>
            <x-input-error class="mt-2" :messages="$errors->get('estudiante.nombres')"/>
        </div>

        <div>
            <x-input-label for="apellidos" :value="__('Apellidos')"/>
            <x-text-input wire:model.defer="estudiante.apellidos" id="apellidos" name="apellidos" type="text"
                          class="block w-full mt-1" required/>
            <x-input-error class="mt-2" :messages="$errors->get('estudiante.apellidos')"/>
        </div>

        <div>
            <x-input-label for="celular" :value="__('Celular')"/>
            <x-text-input wire:model.defer="estudiante.celular" id="celular" name="celular" type="text"
                          class="block w-full mt-1" required/>
            <x-input-error class="mt-2" :messages="$errors->get('estudiante.celular')"/>
        </div>

        <div>
            <x-input-label for="correo" :value="__('Correo')"/>
            <x-text-input wire:model.defer="estudiante.correo" id="correo" name="correo" type="email"
                          class="block w-full mt-1" required/>
            <x-input-error class="mt-2" :messages="$errors->get('estudiante.correo')"/>
        </div>

        <div>
            <x-input-label for="carnet" :value="__('Carnet')"/>
            <x-text-input wire:model="estudiante.carnet" id="carnet" name="carnet" type="number"
                          class="block w-full mt-1" required/>
            <x-input-error class="mt-2" :messages="$errors->get('estudiante.carnet')"/>
        </div>

        <div>
            <x-input-label for="carrera" :value="__('Carrera')"/>
            <select wire:model.defer="estudiante.carrera" id="carrera" name="carrera" class="block w-full mt-1"
                    required>
                <option value="">Seleccione una carrera</option>
                @foreach (CarrerasEnum::cases() as $key => $cat)
                    <option value="{{ $cat->value }}">{{ self::transform( $cat->name) }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('estudiante.carrera')"/>
        </div>

        <div class="form-footer">
            <x-primary-button>Guardar</x-primary-button>
            <x-secondary-button wire:click="cancelar">Cancelar</x-secondary-button>
        </div>
    </form>
</section>
