<?php

namespace App\Enums;

enum CarrerasEstudiantesEnum: int
{
    case INGENIERIA_SISTEMAS = 1;
    case INGENIERIA_AGROPECUARIA = 2;
    case INGLES = 3;
    case CONTABILIDAD = 4;
    case ADMINISTRACION = 5;
    case ENFERMERIA = 6;
    case FARMACIA = 7;
    case DERECHO = 8;
    case ADUANAS = 9;
    case EEFF = 10;

    public static function getName(int $value): string {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return $case->name;
            }
        }
        throw new \InvalidArgumentException("Value not found in the Enum");
    }
}
