<?php

namespace App\Http\Livewire;

use App\Models\Docente;
use App\Traits\HasUtilsUML;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class DocentesTable extends DataTableComponent
{
    use HasUtilsUML;

    protected $model = Docente::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function ($row) {
                return route('docentes.show', $row);
            })
            ->setTableRowUrlTarget(function ($row) {
                return '_self';
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->sortable(),
            Column::make('Nombres', 'nombres')->searchable(),
            Column::make('Apellidos', 'apellidos')->searchable(),
            /*Column::make('Celular', 'celular')->sortable(),
            Column::make('Correo', 'correo')->sortable(),
            Column::make('Grado', 'grado')
                ->format(function ($value) {
                    return \App\Enums\GradosAcademicosDocentesEnum::getName($value);
                }),*/
            Column::make('Especialidad', 'especialidad')
                ->format(function ($value) {
                    return \App\Enums\CarrerasEnum::getName($value);
                }),
            ButtonGroupColumn::make('Tareas')
                ->unclickable()
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Editar')
                        ->title(fn ($row) => svg('typ-edit', 'inline-block h-5 w-5'))
                        ->location(fn ($row) => route('docentes.edit', $row))
                        ->attributes(function ($row) {
                            return self::editBtn();
                        }),
                    LinkColumn::make('Eliminar')
                        ->title(fn ($row) => svg('typ-trash', 'inline-block h-5 w-5'))
                        ->location(fn ($row) => route('docentes.delete', $row))
                        ->attributes(function ($row) {
                            return self::deleteBtn();
                        }),
                ]),
        ];
    }
}
