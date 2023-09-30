<?php

namespace App\Http\Livewire\Docentes;

use App\Models\Docente;
use App\Traits\HasUtilsUML;
use Livewire\Component;

class CreateForm extends Component
{
    use HasUtilsUML;

    public $docente;

    public function mount()
    {
        $this->docente = new Docente();
    }

    public function render()
    {
        return view('livewire.docentes.create-form');
    }

    public function guardar_docente()
    {
        $this->validate();
        $this->docente->save();

        session()->flash('message', '✅ Docente creado correctamente.');

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
            'docente.correo' => 'required|ends_with:uml.edu.ni',
            'docente.celular' => 'required',
            'docente.especialidad' => 'required',
            'docente.grado' => 'required',
        ];
    }

    //Cancelar la creacion del libro
    public function cancelar()
    {
        return redirect()->route('docentes');
    }
}
