<?php

namespace App\Http\Livewire\Atenciones;

use App\Models\Atencion;
use App\Traits\HasUtilsUML;
use Livewire\Component;

class EditForm extends Component
{
    use HasUtilsUML;

    public $atencion;
    public $tipo_atencion_model_type;

    public function mount()
    {
        //Get the id from route
        $id = request()->route()->parameter('id');

        $this->atencion = Atencion::find($id);
    }

    public function render()
    {
        return view('livewire.atenciones.edit-form');
    }

    public function guardar_atencion()
    {
        $this->validate();
        $this->atencion->atencionable_type = $this->tipo_atencion_model_type === 'Docente' ? 'App\Models\Docente' : 'App\Models\Estudiante';
        $this->atencion->save();
        session()->flash('message', '✅ Atención actualizada correctamente.');

        return redirect()->route('atenciones');
    }

    /**
     * Reglas de validacion de los campos
     */
    public function rules(): array
    {
        return [
            'atencion.libro_id' => 'required',
            'atencion.fecha' => 'required',
            'atencion.hora' => 'required',
            'atencion.fecha_devolucion' => 'required',
            'atencion.asignatura' => 'required',
            'atencion.motivo' => 'required',
            'atencion.tipo_atencion' => 'required',
            'atencion.nivel' => 'sometimes',
            'atencion.atencionable_id' => 'required',
        ];
    }

    public function cancelar()
    {
        return redirect()->route('atenciones');
    }
}
