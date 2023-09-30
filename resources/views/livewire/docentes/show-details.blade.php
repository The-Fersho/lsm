@php use Illuminate\Http\Request; @endphp
<section class='grid select-none grid-cols-1 gap-4'>
    <div class='rounded-lg bg-gradient-to-bl from-amber-300 via-amber-300 to-amber-500 p-1'>
        <div class='h-full rounded-lg bg-white bg-opacity-90 p-4 shadow-2xl'>
            <h2 class='border-b-2 border-amber-500 p-4 text-[1.2rem] font-semibold uppercase flex justify-between'>
                <span>Datos generales</span>
                <span>{{ $docente->atenciones->count() }} atencion(es)</span>
            </h2>
            <div class='mt-2  gap-4  grid grid-cols-2'>
                <div>
                    <span class='font-bold text-ugreen-700'>Nombres: </span>
                    <span>{{ $docente->nombres }}</span>
                </div>
                <div>
                    <span class='font-bold text-ugreen-700'>Apellidos: </span>
                    <span>{{ $docente->apellidos }}</span>
                </div>
                <div>
                    <span class='font-bold text-ugreen-700'>Celuar: </span>
                    <span>{{ $docente->celular }}</span>
                </div>
                <div>
                    <span class='font-bold text-ugreen-700'>Correo: </span>
                    <span>{{ $docente->correo }}</span>
                </div><div>
                    <span class='font-bold text-ugreen-700'>Grado: </span>
                    <span>{{ \App\Enums\GradosAcademicosDocentesEnum::getName($docente->grado) }}</span>
                </div>
                <div>
                    <span class='font-bold text-ugreen-700'>Especialidad: </span>
                    <span>{{ \App\Enums\CarrerasEnum::getName($docente->especialidad) }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class='col-span-2 mt-4 rounded-lg bg-white p-4 shadow-2xl'>
        <h2 class='border-b-2 border-ugreen-500 p-4 text-[1.2rem] font-semibold uppercase'>Detalles de las atenciones recibidas</h2>
        @livewire('relaciones.docentes-atenciones-table')
    </div>
</section>
