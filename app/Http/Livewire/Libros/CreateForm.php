<?php

namespace App\Http\Livewire\Libros;

use Livewire\Component;
use App\Models\Libro;

class CreateForm extends Component
{
    public $libro;
    
    public function mount(){
        $this->libro = new Libro();
    }
    
    public function render()
    {
        return view('livewire.libros.create-form');
    }
}
