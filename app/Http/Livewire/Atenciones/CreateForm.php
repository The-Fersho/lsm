<?php

namespace App\Http\Livewire\Atenciones;

use Livewire\Component;
use App\Models\Atencion;

class CreateForm extends Component
{
    public $atencion;
    public $tipo_atencion;

    public function mount()
    {
        $this->atencion = new Atencion();
    }

    public function render()
    {
        return view('livewire.atenciones.create-form');
    }

    public function guardar_atencion()
    {
        $this->validate();
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
            'atencion.atencionable_id' => 'required',
            'tipo_atencion' => 'required',
        ];
    }

    //Cancelar la creacion del libro
    public function cancelar()
    {
        return redirect()->route('atenciones');
    }
}
