<?php

namespace App\Http\Livewire\Inicio;

use Livewire\Component;

class Indicadores extends Component
{
    public $chart;
    public $items = [
        '\App\Models\Libro' => [
            'label' => 'Libros',
            'color' => 'bg-blue-500',
            'icon' => 'typ-book',
        ],
        'App\Models\Estudiante' => [
            'label' => 'Estudiantes',
            'color' => 'bg-green-500',
            'icon' => 'typ-mortar-board',
        ],
        'App\Models\Docente' => [
            'label' => 'Docentes',
            'color' => 'bg-yellow-500',
            'icon' => 'typ-group',
        ],
        'App\Models\Atencion' => [
            'label' => 'Atenciones',
            'color' => 'bg-red-500',
            'icon' => 'typ-tags',
        ],
    ];

    public function mount(){

    }

    public function render()
    {
        return view('livewire.inicio.indicadores');
    }
}
