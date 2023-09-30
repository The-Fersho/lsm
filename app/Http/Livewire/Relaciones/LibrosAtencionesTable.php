<?php

namespace App\Http\Livewire\Relaciones;

use App\Enums\TiposDeAtencionEnum;
use App\Models\Atencion;
use App\Models\Libro;
use App\Traits\HasUtilsUML;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class LibrosAtencionesTable extends DataTableComponent
{
    use HasUtilsUML;

    protected $model = Atencion::class;

    public $libro_id;

    public function mount()
    {
        $this->libro_id = \Route::current()->parameter('id');
    }

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
            Column::make('Usuario')
                ->searchable()
                ->label(fn ($row) => view('atenciones.user')->withRow(Atencion::findOrFail($row->id))),

            Column::make('Fecha', 'fecha')->searchable(),
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

    public function builder(): Builder
    {
        return Atencion::query()
            ->with('libro')
            ->where('libro_id', $this->libro_id);
    }
}
