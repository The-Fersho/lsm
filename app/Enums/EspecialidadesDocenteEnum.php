<?php

namespace App\Enums;

enum EspecialidadesDocenteEnum: int
{
    case BACHILLER = 1;
    case LICENCIADO = 2;
    case INGENIERO = 3;
    case MASTER = 4;
    case DOCTOR = 5;

    public static function getName(int $value): string {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return $case->name;
            }
        }
        throw new \InvalidArgumentException("Value not found in the Enum");
    }
}
