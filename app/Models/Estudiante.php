<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'carnet',
        'celular',
        'correo',
        'carrera',
    ];

    //Relaciones polimorficas
    public function atenciones()
    {
        return $this->morphMany(Atencion::class, 'atencionable');
    }

    //Define a full_name attribute
    public function getFullnameAttribute()
    {
        return "{$this->nombres} {$this->apellidos}";
    }
}
