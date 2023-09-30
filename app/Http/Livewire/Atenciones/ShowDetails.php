<?php

namespace App\Http\Livewire\Atenciones;

use Livewire\Component;

class ShowDetails extends Component
{
    public $atencion_id;
    public $atencion;

    public function mount()
    {
        $this->atencion_id = \Route::current()->parameter('id');
        $this->atencion = \App\Models\Atencion::find($this->atencion_id);
    }
    public function render()
    {
        return view('livewire.atenciones.show-details');
    }
}
