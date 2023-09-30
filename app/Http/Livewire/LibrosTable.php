<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use App\Traits\HasUtilsUML;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class LibrosTable extends DataTableComponent
{
    use HasUtilsUML;

    protected $model = Libro::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function ($row) {
                return route('libros.show', $row);
            })
            ->setTableRowUrlTarget(function ($row) {
                return '_self';
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->sortable(),
            Column::make('Titulo', 'titulo')->sortable(),
            Column::make('Autor', 'autor')->sortable(),

            Column::make('Categoria', 'categoria')
                ->format(function ($value) {
                    return \App\Enums\CategoriasLibrosEnum::getName($value);
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
                        ->location(fn ($row) => route('libros.edit', $row))
                        ->attributes(function ($row) {
                            return self::editBtn();
                        }),
                    LinkColumn::make('Eliminar')
                        ->title(fn ($row) => svg('typ-trash', 'inline-block h-5 w-5'))
                        ->location(fn ($row) => route('libros.delete', $row))
                        ->attributes(function ($row) {
                            return self::deleteBtn();
                        }),
                ]),
        ];
    }
}
