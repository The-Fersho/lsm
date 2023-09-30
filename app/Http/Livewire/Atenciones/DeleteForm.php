<?php

namespace App\Http\Livewire\Atenciones;

use App\Models\Atencion;
use Livewire\Component;

class DeleteForm extends Component
{
    public $atencion;

    public function mount()
    {
        //Get the id from route
        $id = request()->route()->parameter('id');

        $this->atencion = Atencion::find($id);
    }

    public function render()
    {
        return view('livewire.atenciones.delete-form');
    }

    public function eliminar_atencion()
    {
        $this->atencion->delete();
        session()->flash('message', '✅ Atención eliminada correctamente.');

        return redirect()->route('atenciones');
    }

    public function cancelar()
    {
        return redirect()->route('atenciones');
    }
}
