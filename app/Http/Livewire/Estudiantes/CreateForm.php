<?php

namespace App\Http\Livewire\Estudiantes;

use App\Models\Estudiante;
use App\Traits\HasUtilsUML;
use Livewire\Component;

class CreateForm extends Component
{
    use HasUtilsUML;

    public $docente;

    public function mount()
    {
        $this->estudiante = new Estudiante();
    }

    public function render()
    {
        return view('livewire.estudiantes.create-form');
    }

    public function guardar_estudiante()
    {
        $this->validate();
        $this->estudiante->save();

        session()->flash('message', '✅ Libro creado correctamente.');

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
            'estudiante.correo' => 'required|ends_with:uml.edu.ni',
            'estudiante.celular' => 'required',
            'estudiante.carrera' => 'required',
            'estudiante.carnet' => 'required',
        ];
    }

    //Cancelar la creacion del libro
    public function cancelar()
    {
        return redirect()->route('estudiantes');
    }
}
