<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Estudiante;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

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
            Column::make("Id", "id")->sortable(),
            Column::make("Nombres", "nombres")->sortable(),
            Column::make("Apellidos", "apellidos")->sortable(),
            Column::make("Celular", "celular")->sortable(),
            Column::make("Correo", "correo")->sortable(),
            Column::make("Carrera", "carrera")
            ->format(function ($value) {
                return \App\Enums\CarrerasEstudiantesEnum::getName($value);
            })
            ->sortable(),
            ButtonGroupColumn::make('Tareas')
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Editar')
                        ->title(fn ($row) => 'Editar')
                        ->location(fn ($row) => route('estudiantes.edit', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'rounded-md px-1 py-3 bg-amber-400 text-white hover:bg-amber-500 active:bg-amber-600',
                            ];
                        }),
                    LinkColumn::make('Eliminar')
                        ->title(fn ($row) => 'Eliminar')
                        ->location(fn ($row) => route('estudiantes.delete', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'rounded-md px-1 py-3 bg-rose-400 text-white hover:bg-rose-500 active:bg-rose-600',
                            ];
                        }),
                ]),

        ];
    }
}
