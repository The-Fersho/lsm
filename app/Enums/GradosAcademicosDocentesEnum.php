<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum GradosAcademicosDocentesEnum: int
{
    case BACHILLER = 1;
    case LICENCIADO = 2;
    case INGENIERO = 3;
    case MASTER = 4;
    case DOCTOR = 5;

    public static function getName(int $value): string
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return ucfirst(Str::lower(Str::replace('_', ' ', $case->name)));
            }
        }

        throw new \InvalidArgumentException('Grado académico no encontrado en la lista enumerada');
    }
}
