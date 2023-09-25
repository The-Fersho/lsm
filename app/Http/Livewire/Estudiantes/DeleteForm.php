<?php

namespace App\Http\Livewire\Estudiantes;

use Livewire\Component;
use App\Models\Estudiante;

class DeleteForm extends Component
{
    public $estudiante;

    public function mount()
    {
        //Get the id from route
        $id = request()->route()->parameter('id');

        $this->estudiante = Estudiante::find($id);
    }

    public function render()
    {
        return view('livewire.estudiantes.delete-form');
    }

    public function eliminar_estudiante()
    {

        if ($this->estudiante->atenciones->count() > 0) {
            session()->flash('message', '❌ No se puede eliminar el estudiante porque tiene atenciones asociadas.');
        }else{
            $this->estudiante->delete();
            session()->flash('message', '✅ Estudiante eliminado correctamente.');
        }

        return redirect()->route('estudiantes');
    }

    public function cancelar()
    {
        return redirect()->route('estudiantes');
    }
}
