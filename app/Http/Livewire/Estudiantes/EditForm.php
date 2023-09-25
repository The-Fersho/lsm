<?php

namespace App\Http\Livewire\Estudiantes;

use Livewire\Component;
use App\Models\Estudiante;

class EditForm extends Component
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
        return view('livewire.estudiantes.edit-form');
    }

    public function guardar_estudiante()
    {
        $this->validate();
        $this->estudiante->save();
        session()->flash('message', '✅ Estudiante actualizado correctamente.');

        return redirect()->route('estudiantes');
    }

    /**
     * Reglas de validacion de los campos
     */
    public function rules(): array
    {
        return [
            'estudiante.nombres' => 'required',
            'estudiante.apellidos' => 'required',
            'estudiante.correo' => 'required',
            'estudiante.celular' => 'required',
            'estudiante.carrera' => 'required',
        ];
    }

    public function cancelar()
    {
        return redirect()->route('estudiantes');
    }
}
