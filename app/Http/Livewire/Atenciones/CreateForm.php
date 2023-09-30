<?php

namespace App\Http\Livewire\Atenciones;

use App\Models\Atencion;
use App\Traits\HasUtilsUML;
use Livewire\Component;

class CreateForm extends Component
{
    use HasUtilsUML;

    public $atencion;
    public $tipo_atencion_model_type;

    public function mount()
    {
        //Get the current url parameter via get named 'tipo_atencion'
        $this->tipo_atencion_model_type = request()->get('tipo_atencion');

        $this->atencion = new Atencion();
    }

    public function render()
    {
        return view('livewire.atenciones.create-form');
    }

    public function guardar_atencion()
    {
        $this->validate();
        $this->atencion->atencionable_type = $this->tipo_atencion_model_type === 'Docente' ? 'App\Models\Docente' : 'App\Models\Estudiante';
        $this->atencion->save();
        session()->flash('message', '✅ Atención creada correctamente.');

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
            'tipo_atencion_model_type' => 'required',
        ];
    }

    public function cancelar()
    {
        return redirect()->route('atenciones');
    }
}
