<?php

namespace App\Http\Livewire\Atenciones;

use App\Models\Atencion;
use Livewire\Component;

class EditForm extends Component
{

    public $atencion;

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

    public function guardar_libro()
    {
        $this->validate();
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
            'atencion.nivel' => 'required',
            'atencion.atencionable_id' => 'required',
            'tipo_atencion' => 'required',
        ];
    }
}
