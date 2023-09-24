<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Estudiante;

class EstudiantesTable extends DataTableComponent
{
    protected $model = Estudiante::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombres", "nombres")
                ->sortable(),
            Column::make("Apellidos", "apellidos")
                ->sortable(),
            Column::make("Celular", "celular")
                ->sortable(),
            Column::make("Correo", "correo")
                ->sortable(),
            Column::make("Carrera", "carrera")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
