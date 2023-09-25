<?php

namespace App\Http\Livewire\Libros;

use Livewire\Component;
use App\Models\Libro;

class CreateForm extends Component
{
    public $libro;

    public function mount()
    {
        $this->libro = new Libro();
    }

    public function render()
    {
        return view('livewire.libros.create-form');
    }

    public function guardar_libro()
    {
        $this->validate();
        $this->libro->save();

        session()->flash('message', '✅ Libro creado correctamente.');

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

    //Cancelar la creacion del libro
    public function cancelar()
    {
        return redirect()->route('libros');
    }
}
