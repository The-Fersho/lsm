@php use Illuminate\Http\Request; @endphp
<section class='grid select-none grid-cols-1 gap-4 lg:grid-cols-2'>
    <div class='col-span-1 rounded-lg bg-gradient-to-bl from-amber-300 via-amber-300 to-amber-500 p-1'>
        <div class='h-full rounded-lg bg-white bg-opacity-90 p-4 shadow-2xl'>
            <h2 class='border-b-2 border-amber-500 p-4 text-[1.2rem] font-semibold uppercase'>Datos generales</h2>
            <div class='mt-2 flex flex-col gap-4'>
                <div>
                    <span class='font-bold text-ugreen-700'>Titulo: </span>
                    <span>{{ $libro->titulo }}</span>
                </div>
                <div>
                    <span class='font-bold text-ugreen-700'>Autor: </span>
                    <span>{{ $libro->autor }}</span>
                </div>
                <div>
                    <span class='font-bold text-ugreen-700'>Categoria: </span>
                    <span>{{ \App\Enums\CategoriasLibrosEnum::getName($libro->categoria) }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class='col-span-1 rounded-lg bg-gradient-to-br from-sky-300 via-sky-300 to-sky-500 p-1'>
        <div class='h-full rounded-lg bg-white p-4 opacity-90 shadow-2xl'>
            <h2 class='border-b-2 border-sky-500 p-4 text-[1.2rem] font-semibold uppercase'>Atenciones registradas</h2>
            <div class='mt-2 flex flex-col items-center justify-between gap-2 text-center lg:flex-row'>
                <div class='flex flex-col'>
                    <span class='font-bold text-sky-700'>Total de atenciones</span>
                    <span class='text-[1.8rem] font-bold text-sky-900'>{{ $libro->atenciones->count() }}</span>
                </div>
                <div class='flex flex-col'>
                    <span class='font-bold text-sky-700'>Atenciones a estudiantes</span>
                    <span
                        class='text-[1.8rem] font-bold text-sky-900'>{{ $libro->atenciones->where('atencionable_type', \App\Models\Estudiante::class)->count() }}</span>
                </div>
                <div class='flex flex-col'>
                    <span class='font-bold text-sky-700'>Atenciones a docentes</span>
                    <span
                        class='text-[1.8rem] font-bold text-sky-900'>{{ $libro->atenciones->where('atencionable_type', \App\Models\Docente::class)->count() }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class='col-span-2 mt-4 rounded-lg bg-white p-4 shadow-2xl'>
        <h2 class='border-b-2 border-ugreen-500 p-4 text-[1.2rem] font-semibold uppercase'>Detalles de las atenciones
            donde se utiliza el libro</h2>
        @livewire('relaciones.libros-atenciones-table')
    </div>
</section>
