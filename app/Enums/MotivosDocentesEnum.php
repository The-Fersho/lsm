<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum MotivosDocentesEnum: int
{
    case PREPARAR_CLASE = 1;
    case INVESTIGACION = 2;
    case VISITAS_EMPRESAS_Y_COMUNIDADES = 3;
    case OTROS = 4;

    public static function getName(int $value): string
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return ucfirst(Str::lower(Str::replace('_', ' ', $case->name)));
            }
        }

        throw new \InvalidArgumentException('Motivo no encontrado en la lista enumerada');
    }
}
