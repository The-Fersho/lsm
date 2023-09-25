<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Atencion;

class AtencionesTable extends DataTableComponent
{
    protected $model = Atencion::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->sortable(),
            Column::make("Libro", "libro.titulo")->sortable(),

            Column::make('Usuario')
                ->label( fn($row) => view('atenciones.user')->withRow(Atencion::findOrFail($row->id))),

            Column::make("Fecha", "fecha")->sortable(),
            Column::make("Hora", "hora")->sortable(),
            Column::make("Fecha devolucion", "fecha_devolucion")->sortable(),
            Column::make("Asignatura", "asignatura")->sortable(),
            Column::make("Motivo", "motivo")->sortable(),
            Column::make("Tipo atencion", "tipo_atencion")->sortable()
        ];
    }
}
