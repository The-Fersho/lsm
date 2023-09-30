<?php

namespace App\Http\Livewire\Libros;

use Livewire\Component;

class ShowDetails extends Component
{
    public $libro_id;
    public $libro;

    public function mount()
    {
        $this->libro_id = \Route::current()->parameter('id');
        $this->libro = \App\Models\Libro::find($this->libro_id);
    }
    public function render()
    {
        return view('livewire.libros.show-details');
    }
}
