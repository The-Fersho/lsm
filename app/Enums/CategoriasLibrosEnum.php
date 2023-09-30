<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum CategoriasLibrosEnum: int
{
    case EDUCACION = 1;
    case HUMANIDADES_Y_ARTES = 2;
    case CIENCIAS_SOCIALES_EDUCACION_COMERCIAL_Y_DERECHO = 3;
    case CIENCIAS = 4;
    case AGRICULTURA = 5;
    case SALUD_Y_SERVICIOS_SOCIALES = 6;
    case SERVICIOS = 7;
    case OTROS = 8;

    public static function getName(int $value): string
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return ucfirst(Str::lower(Str::replace('_', ' ', $case->name)));
            }
        }

        throw new \InvalidArgumentException('Categoría no encontrado en la lista enumerada');
    }
}
