<?php

namespace App\Http\Livewire;

use App\Enums\TiposDeAtencionEnum;
use App\Models\Atencion;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Traits\HasUtilsUML;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class AtencionesTable extends DataTableComponent
{
    use HasUtilsUML;

    protected $model = Atencion::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function ($row) {
                return route('atenciones.show', $row);
            })
            ->setTableRowUrlTarget(function ($row) {
                return '_self';
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->sortable(),
            Column::make('Libro', 'libro.titulo')->searchable(),

            Column::make('Usuario')
                ->searchable()
                ->label(fn ($row) => view('atenciones.user')->withRow(Atencion::findOrFail($row->id))),

            Column::make('Fecha', 'fecha')->searchable(),
            //Column::make('Hora', 'hora')->searchable(),
            //Column::make('Fecha devolucion', 'fecha_devolucion')->sortable(),
            //Column::make('Asignatura', 'asignatura')->sortable(),
            //Column::make('Motivo', 'motivo')->sortable(),
            Column::make('Tipo de atención', 'tipo_atencion')
                ->format(function ($value) {
                    return TiposDeAtencionEnum::getName($value);
                })
                ->sortable(),

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
                        ->location(fn ($row) => route('atenciones.edit', $row))
                        ->attributes(function ($row) {
                            return self::editBtn();
                        }),
                    LinkColumn::make('Eliminar')
                        ->title(fn ($row) => svg('typ-trash', 'inline-block h-5 w-5'))
                        ->location(fn ($row) => route('atenciones.delete', $row))
                        ->attributes(function ($row) {
                            return self::deleteBtn();
                        }),
                ]),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Tipo de atención')
                ->options([
                    '' => 'Todas',
                    'sala' => 'En sala',
                    'casa' => 'A domicilio',
                ])->filter(function (Builder $builder, string $value) {
                    if ($value === 'sala') {
                        $builder->where('tipo_atencion', 1);
                    } elseif ($value === 'casa') {
                        $builder->where('tipo_atencion', 2);
                    }
                }),

            DateFilter::make('Fecha de inicio ')
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereDate('fecha', '>=', $value);
                }),

            DateFilter::make('Fecha de fin ')
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereDate('fecha', '<=', $value);
                }),


            SelectFilter::make('Tipo de Usuario')
                ->options([
                    '' => 'Todos',
                    'est' => 'Estudiante',
                    'doc' => 'Docente',
                ])->filter(function (Builder $builder, string $value) {
                    if ($value === 'est') {
                        $builder->whereHasMorph('atencionable', Estudiante::class);
                    } elseif ($value === 'doc') {
                        $builder->whereHasMorph('atencionable', Docente::class);
                    }
                }),
        ];
    }
}
