<?php

namespace App\Http\Livewire\Docentes;

use Livewire\Component;
use App\Models\Docente;

class DeleteForm extends Component
{
    public $docente;

    public function mount()
    {
        //Get the id from route
        $id = request()->route()->parameter('id');

        $this->docente = Docente::find($id);
    }

    public function render()
    {
        return view('livewire.docentes.delete-form');
    }

    public function eliminar_docente()
    {

        if ($this->docente->atenciones->count() > 0) {
            session()->flash('message', '❌ No se puede eliminar el docente porque tiene atenciones asociadas.');
        }else{
            $this->docente->delete();
            session()->flash('message', '✅ Docente eliminado correctamente.');
        }

        return redirect()->route('docentes');
    }

    public function cancelar()
    {
        return redirect()->route('docentes');
    }
}
