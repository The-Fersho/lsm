<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;

    protected $table = "atenciones";

    protected $fillable = [
        "libro_id",
        "atencionable_type",
        "atencionable_id",
        "fecha",
        "hora",
        "fecha_devolucion",
        "asignatura",
        "motivo",
        "tipo_atencion"
    ];

    //Relaciones polimorficas
    public function atencionable()
    {
        return $this->morphTo();
    }

    //Relacion uno a muchos inversa
    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
}
