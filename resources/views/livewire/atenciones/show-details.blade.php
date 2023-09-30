@php use Illuminate\Http\Request; @endphp
<section class='grid select-none grid-cols-1 gap-4'>
    <div class='rounded-lg bg-gradient-to-bl from-amber-300 via-amber-300 to-amber-500 p-1'>
        <div class='h-full rounded-lg bg-white bg-opacity-90 p-4 shadow-2xl'>
            <h2 class='border-b-2 border-amber-500 p-4 text-[1.2rem] font-semibold uppercase flex justify-between'>
                <span>Datos generales</span>
                {{--<span>{{ $docente->atenciones->count() }} atencion(es)</span>--}}
            </h2>
            <div class='mt-2  gap-4  grid grid-cols-2'>
                <div>
                    <span class='font-bold text-ugreen-700'>Fecha: </span>
                    <span>{{ $atencion->fecha }}</span>
                </div>

                <div>
                    <span class='font-bold text-ugreen-700'>Hora: </span>
                    <span>{{ $atencion->hora }}</span>
                </div>

                <div>
                    <span class='font-bold text-ugreen-700'>Fecha de devolución: </span>
                    <span>{{ $atencion->fecha_devolucion }}</span>
                </div>

                <div>
                    <span class='font-bold text-ugreen-700'>Asignatura: </span>
                    <span>{{ $atencion->asignatura }}</span>
                </div>

                <div>
                    <span class='font-bold text-ugreen-700'>Año: </span>
                    <span>{{ \App\Enums\NivelesEnum::getName($atencion->nivel) }}</span>
                </div>


                <div>
                    <span class='font-bold text-ugreen-700'>Tipo de atención: </span>
                    <span>{{ \App\Enums\TiposDeAtencionEnum::getName($atencion->tipo_atencion) }}</span>
                </div>

                <div>
                    <span class='font-bold text-ugreen-700'>Motivo: </span>
                    <span>{{ \App\Enums\MotivosEstudiantesEnum::getName($atencion->motivo) }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class='grid grid-cols-1 lg:grid-cols-2 gap-4'>
        <div class='rounded-lg bg-gradient-to-bl from-sky-300 via-sky-300 to-sky-500 p-1'>
            <div class='h-full rounded-lg bg-white bg-opacity-90 p-4 shadow-2xl'>
                <h2 class=' border-b-2 border-sky-500 p-4 text-[1.2rem] font-semibold uppercase flex justify-between'>
                    <span>Libro</span>
                    @svg('typ-book', 'h-8 w-8 text-sky-500')
                </h2>
                <div class='mt-2'>
                    <div>
                        <span class='font-bold text-ugreen-700'>Título: </span>
                        <span>{{ $atencion->libro->titulo }}</span>
                    </div>
                    <div>
                        <span class='font-bold text-ugreen-700'>Autor: </span>
                        <span>{{ $atencion->libro->autor }}</span>
                    </div>
                    <div>
                        <span class='font-bold text-ugreen-700'>Categoría: </span>
                        <span>{{ \App\Enums\CategoriasLibrosEnum::getName($atencion->libro->categoria) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class='rounded-lg bg-gradient-to-bl from-sky-300 via-sky-300 to-sky-500 p-1'>
            <div class='h-full rounded-lg bg-white bg-opacity-90 p-4 shadow-2xl'>
                <h2 class=' border-b-2 border-sky-500 p-4 text-[1.2rem] font-semibold uppercase flex justify-between'>
                    <span>Usuario</span>
                    @svg('typ-user', 'h-8 w-8 text-sky-500')
                </h2>
                <div class='mt-2'>
                    <div>
                        <span class='font-bold text-ugreen-700'>Nombres y apellidos: </span>
                        <span>{{ $atencion->atencionable->fullname }}</span>
                    </div>
                    <div>
                        <span class='font-bold text-ugreen-700'>Correo: </span>
                        <span>{{ $atencion->atencionable->correo }}</span>
                    </div>
                    <div>
                        <span class='font-bold text-ugreen-700'>Celular: </span>
                        <span>{{ $atencion->atencionable->celular }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
