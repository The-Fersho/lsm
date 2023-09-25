<?php

namespace App\Enums;

enum EspecialidadesDocenteEnum: int
{
    case INFORMATICA = 1;
    case AGROPECUARIA = 2;
    case IDIOMAS = 3;
    case CIENCIAS_ECONOMICAS = 4;
    case CIENCIAS_ADMINISTRATIVAS = 5;
    case CIENCIAS_DE_LA_SALUD = 6;
    case CIENCIAS_JURIDICAS = 7;
    case CIENCIAS_DE_LA_EDUCACION = 8;

    public static function getName(int $value): string {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return $case->name;
            }
        }
        throw new \InvalidArgumentException("Value not found in the Enum");
    }
}
