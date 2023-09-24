<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
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
            Column::make("Categoria", "categoria")->sortable(),
        ];
    }
}
