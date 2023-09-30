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
    <!-- Create two anchors for choose Student or Teacher and append the selected value to url -->
    <div class="flex justify-start gap-4">
        <a href="{{ route('atenciones.create', ['tipo_atencion' => $section_estudiante]) }}" @class(["px-4 py-2 text-sm font-medium text-white rounded-md hover:bg-ugreen-500 focus:outline-none focus:bg-blue-500", "bg-ugreen-600" =>  \request()->get('tipo_atencion') === $section_estudiante,  "bg-gray-600" =>  \request()->get('tipo_atencion') !== $section_estudiante ])>
            <!-- Add a svg icon with check symbol -->
            <svg xmlns="http://www.w3.org/2000/svg" @class(["inline w-6 h-auto", "hidden" => $section_estudiante !== \request()->get('tipo_atencion')]) viewBox="0 0 50 50">
                <polyline points="10 25 20 35 40 15" stroke="white" stroke-width="4" fill="none" />
            </svg>


            Estudiante</a>
        <a href="{{ route('atenciones.create', ['tipo_atencion' => $section_docente]) }}" @class(["px-4 py-2 text-sm font-medium text-white rounded-md hover:bg-ugreen-500 focus:outline-none focus:bg-blue-500","bg-ugreen-600" =>  \request()->get('tipo_atencion') === $section_docente, "bg-gray-600" =>  \request()->get('tipo_atencion') !== $section_docente ])>
            <svg xmlns="http://www.w3.org/2000/svg" @class(["inline w-6 h-auto", "hidden" => $section_docente !== \request()->get('tipo_atencion')]) viewBox="0 0 50 50">
                <polyline points="10 25 20 35 40 15" stroke="white" stroke-width="4" fill="none" />
            </svg>
            Docente</a>
    </div>

    <form wire:submit.prevent='guardar_atencion' class="mt-6 space-y-6">
        <!-- Lista de libros -->
        <div>
            <x-input-label for="libro_id" :value="__('Libro')" />
            <select wire:model.defer="atencion.libro_id" id="libro_id" name="libro_id" class="block w-full mt-1"
                :value="old('libro_id', $atencion->categoria)" required>
                <option value="">Seleccione una categoria</option>
                @foreach(\App\Models\Libro::all() as $libro)
                    <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('libro_id')" />
        </div>

        @if ($section_estudiante === \request()->get('tipo_atencion'))
            @php
                $atencion['atencionable_type'] = \App\Models\Estudiante::class;
            @endphp
            <!-- Lista de estudiantes -->
        <div>
            <x-input-label for="atencionable_id" :value="__('Estudiantes')" />
            <select wire:model.defer="atencion.atencionable_id" id="atencionable_id" name="atencionable_id" class="block w-full mt-1"
                required>
                <option value="">Seleccione una estudiante</option>
                @foreach(\App\Models\Estudiante::all() as $estudiante)
                    <option value="{{ $estudiante->id }}">{{ $estudiante->nombres }} {{ $estudiante->apellidos}}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('atencionable_id')" />
        </div>
        @else
            @php
                $atencion['atencionable_type'] = \App\Models\Docente::class;
            @endphp
        <!-- Lista de docentes -->
        <div>
            <x-input-label for="atencionable_id" :value="__('Docentes')" />
            <select wire:model.defer="atencion.atencionable_id" id="atencionable_id" name="atencionable_id" class="block w-full mt-1"
                required>
                <option value="">Seleccione el docente</option>
                @foreach(\App\Models\Docente::all() as $estudiante)
                    <option value="{{ $estudiante->id }}">{{ $estudiante->nombres }} {{ $estudiante->apellidos}}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('atencionable_id')" />
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
            <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
        </div>
        <!--

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
    -->
        <div class="flex items-center gap-4">
            <x-primary-button>Guardar</x-primary-button>
            <x-secondary-button wire:click="cancelar">Cancelar</x-secondary-button>
        </div>
    </form>
</section>
