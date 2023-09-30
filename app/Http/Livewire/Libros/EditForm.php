<?php

namespace App\Http\Livewire\Libros;

use App\Models\Libro;
use App\Traits\HasUtilsUML;
use Livewire\Component;

class EditForm extends Component
{
    use HasUtilsUML;

    public $libro;

    public function mount()
    {
        //Get the id from route
        $id = request()->route()->parameter('id');

        $this->libro = Libro::find($id);
    }

    public function render()
    {
        return view('livewire.libros.edit-form');
    }

    public function guardar_libro()
    {
        $this->validate();
        $this->libro->save();
        session()->flash('message', '✅ Libro actualizado correctamente.');

        return redirect()->route('libros');
    }

    /**
     * Reglas de validacion de los campos
     */
    public function rules(): array
    {
        return [
            'libro.titulo' => 'required',
            'libro.autor' => 'required',
            'libro.categoria' => 'required',
        ];
    }

    public function cancelar()
    {
        return redirect()->route('libros');
    }
}
