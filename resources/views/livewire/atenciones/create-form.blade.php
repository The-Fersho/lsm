@php
    use App\Enums\CategoriasLibrosEnum;
    $section_estudiante = (new \ReflectionClass(\App\Models\Estudiante::class))->getShortName();
    $section_docente = (new \ReflectionClass(\App\Models\Docente::class))->getShortName();
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

    <div class="flex justify-start gap-4">
        <a href="{{ route('atenciones.create', ['tipo_atencion' => $section_estudiante]) }}" @class(["px-4 py-2 text-sm font-medium text-white rounded-md hover:bg-ugreen-500 focus:outline-none focus:bg-blue-500", "bg-ugreen-600" =>  $tipo_atencion_model_type === $section_estudiante,  "bg-gray-600" =>  \request()->get('tipo_atencion') !== $section_estudiante ])>
            <svg xmlns="http://www.w3.org/2000/svg" @class(["inline w-6 h-auto", "hidden" => $section_estudiante !== $tipo_atencion_model_type]) viewBox="0 0 50 50">
                <polyline points="10 25 20 35 40 15" stroke="white" stroke-width="4" fill="none" />
            </svg>


            Estudiante</a>
        <a href="{{ route('atenciones.create', ['tipo_atencion' => $section_docente]) }}" @class(["px-4 py-2 text-sm font-medium text-white rounded-md hover:bg-ugreen-500 focus:outline-none focus:bg-blue-500","bg-ugreen-600" =>  $tipo_atencion_model_type === $section_docente, "bg-gray-600" =>  \request()->get('tipo_atencion') !== $section_docente ])>
            <svg xmlns="http://www.w3.org/2000/svg" @class(["inline w-6 h-auto", "hidden" => $section_docente !== $tipo_atencion_model_type]) viewBox="0 0 50 50">
                <polyline points="10 25 20 35 40 15" stroke="white" stroke-width="4" fill="none" />
            </svg>
            Docente</a>
    </div>

    <form wire:submit.prevent='guardar_atencion' class="mt-6">
        <!-- Lista de libros -->
        <div>
            <x-input-label for="libro_id" :value="__('Libro')" />
            <x-select-search wire:model="atencion.libro_id" placeholder="Selecciona el libro" :data="\App\Models\Libro::all()->pluck('titulo','id')" />
            <x-input-error class="mt-2" :messages="$errors->get('libro_id')" />
        </div>

        @if ($section_estudiante === $tipo_atencion_model_type)
        <div>
            <x-input-label for="atencionable_id" :value="__('Estudiantes')" />
            <x-select-search wire:model="atencion.atencionable_id" placeholder="Selecciona el estudiante" :data="\App\Models\Estudiante::all()->pluck('fullname','id')" />
            <x-input-error class="mt-2" :messages="$errors->get('atencion.atencionable_id')" />
        </div>
        @else
        <div>
            <x-input-label for="atencionable_id" :value="__('Docentes')" />
            <x-select-search wire:model="atencion.atencionable_id" placeholder="Selecciona el docente" :data="\App\Models\Docente::all()->pluck('fullname','id')" />
            <x-input-error class="mt-2" :messages="$errors->get('atencion.atencionable_id')" />
        </div>
        @endif

        <div>
            <x-input-label for="hora" :value="__('Hora')" />
            <x-text-input wire:model.defer="atencion.hora" id="hora" name="hora" type="time" class="block w-full mt-1" required />
            <x-input-error class="mt-2" :messages="$errors->get('hora')" />
        </div>

        <div>
            <x-input-label for="fecha" :value="__('Fecha')" />
            <x-text-input wire:model.defer="atencion.fecha" id="fecha" name="fecha" type="date" class="block w-full mt-1" required />
            <x-input-error class="mt-2" :messages="$errors->get('atencion.fecha')" />
        </div>

        <div>
            <x-input-label for="fecha_devolucion" :value="__('Fecha de devolución')" />
            <x-text-input wire:model.defer="atencion.fecha_devolucion" id="fecha_devolucion" name="fecha_devolucion" type="date" class="block w-full mt-1" required />
            <x-input-error class="mt-2" :messages="$errors->get('atencion.fecha_devolucion')" />
        </div>

        <div>
            <x-input-label for="asignatura" :value="__('Asignatura')" />
            <x-text-input wire:model.defer="atencion.asignatura" id="asignatura" name="asignatura" type="text" class="block w-full mt-1" required />
            <x-input-error class="mt-2" :messages="$errors->get('atencion.asignatura')" />
        </div>

        @if ($section_estudiante === $tipo_atencion_model_type)
        <div>
            <x-input-label for="nivel" :value="__('Año que cursa')"/>
            <select wire:model.defer="atencion.nivel" id="nivel" name="nivel" class="block w-full mt-1" required>
                <option value="">Seleccione el año de la carrera que cursa</option>
                @foreach (\App\Enums\NivelesEnum::cases() as $key => $cat)
                    <option value="{{ $cat->value }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('atencion.nivel')"/>
        </div>
            <div>
                <x-input-label for="motivo" :value="__('Motivo')"/>
                <select wire:model.defer="atencion.motivo" id="motivo" name="motivo" class="block w-full mt-1" required>
                    <option value="">Seleccione el motivo de la atención</option>
                    @foreach (\App\Enums\MotivosEstudiantesEnum::cases() as $key => $cat)
                        <option value="{{ $cat->value }}">{{ self::transform($cat->name) }}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('atencion.motivo')"/>
            </div>
        @else
            <div>
                <x-input-label for="motivo" :value="__('Motivo')"/>
                <select wire:model.defer="atencion.motivo" id="motivo" name="motivo" class="block w-full mt-1" required>
                    <option value="">Seleccione el motivo de la atención</option>
                    @foreach (\App\Enums\MotivosDocentesEnum::cases() as $key => $cat)
                        <option value="{{ $cat->value }}">{{ self::transform($cat->name) }}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('atencion.motivo')"/>
            </div>
        @endif

        <div>
            <x-input-label for="tipo_atencion" :value="__('Tipo de atención')"/>
            <select wire:model.defer="atencion.tipo_atencion" id="tipo_atencion" name="tipo_atencion" class="block w-full mt-1" required>
                <option value="">Seleccione el tipo de la atención</option>
                @foreach (\App\Enums\TiposDeAtencionEnum::cases() as $key => $cat)
                    <option value="{{ $cat->value }}">{{ self::transform($cat->name) }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('atencion.tipo_atencion')"/>
        </div>

        <div class="form-footer">
            <x-primary-button>Guardar</x-primary-button>
            <x-secondary-button wire:click="cancelar">Cancelar</x-secondary-button>
        </div>
    </form>
</section>
