<?php

namespace App\Http\Livewire\Estudiantes;

use Livewire\Component;

class ShowDetails extends Component
{
    public $docente_id;
    public $docente;

    public function mount()
    {
        $this->estudiante_id = \Route::current()->parameter('id');
        $this->estudiante = \App\Models\Estudiante::find($this->estudiante_id);
    }
    public function render()
    {
        return view('livewire.estudiantes.show-details');
    }
}
