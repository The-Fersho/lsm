<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        "titulo",
        "autor",
        "categoria"
    ];

    //Relacion uno a muchos
    public function atenciones()
    {
        return $this->hasMany(Atencion::class);
    }
}
