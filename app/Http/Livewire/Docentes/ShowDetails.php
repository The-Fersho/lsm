<?php

namespace App\Http\Livewire\Docentes;

use Livewire\Component;

class ShowDetails extends Component
{
    public $docente_id;
    public $docente;

    public function mount()
    {
        $this->docente_id = \Route::current()->parameter('id');
        $this->docente = \App\Models\Docente::find($this->docente_id);
    }
    public function render()
    {
        return view('livewire.docentes.show-details');
    }
}
