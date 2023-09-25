<?php

namespace App\Http\Livewire\Docentes;

use Livewire\Component;
use App\Models\Docente;

class EditForm extends Component
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
        return view('livewire.docentes.edit-form');
    }

    public function guardar_docente()
    {
        $this->validate();
        $this->docente->save();
        session()->flash('message', '✅ Docente actualizado correctamente.');

        return redirect()->route('docentes');
    }

    /**
     * Reglas de validacion de los campos
     */
    public function rules(): array
    {
        return [
            'docente.nombres' => 'required',
            'docente.apellidos' => 'required',
            'docente.correo' => 'required',
            'docente.celular' => 'required',
            'docente.especialidad' => 'required',
        ];
    }

    public function cancelar()
    {
        return redirect()->route('docentes');
    }
}
