<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use App\Models\Libro;

class LibrosTable extends DataTableComponent
{
    protected $model = Libro::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->sortable(),
            Column::make("Titulo", "titulo")->sortable(),
            Column::make("Autor", "autor")->sortable(),

            Column::make("Categoria", "categoria")
            ->format(function ($value) {
                return \App\Enums\CategoriasLibrosEnum::getName($value);
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
                        ->location(fn ($row) => route('libros.edit', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'rounded-md px-1 py-3 bg-amber-400 text-white hover:bg-amber-500 active:bg-amber-600',
                            ];
                        }),
                    LinkColumn::make('Eliminar')
                        ->title(fn ($row) => 'Eliminar')
                        ->location(fn ($row) => route('libros.delete', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'rounded-md px-1 py-3 bg-rose-400 text-white hover:bg-rose-500 active:bg-rose-600',
                            ];
                        }),
                ]),
        ];
    }
}
