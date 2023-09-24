<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        "nombres",
        "apellidos",
        "celular",
        "correo",
        "carrera",
    ];

    // Relaciones polimorficas
    public function atenciones()
    {
        return $this->morphMany(Atencion::class, 'atencionable');
    }
}
