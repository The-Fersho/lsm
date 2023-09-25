<?php

namespace App\Http\Livewire\Libros;

use Livewire\Component;
use App\Models\Libro;

class DeleteForm extends Component
{
    public $libro;

    public function mount()
    {
        //Get the id from route
        $id = request()->route()->parameter('id');

        $this->libro = Libro::find($id);
    }

    public function render()
    {
        return view('livewire.libros.delete-form');
    }

    public function eliminar_libro()
    {

        if ($this->libro->atenciones->count() > 0) {
            session()->flash('message', '❌ No se puede eliminar el libro porque tiene atenciones asociadas.');
        }else{
            $this->libro->delete();
            session()->flash('message', '✅ Libro eliminado correctamente.');
        }

        return redirect()->route('libros');
    }

    public function cancelar()
    {
        return redirect()->route('libros');
    }
}
