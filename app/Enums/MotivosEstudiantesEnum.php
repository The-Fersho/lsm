<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum MotivosEstudiantesEnum: int
{
    case PREPARAR_EXPOSICION = 1;
    case INVESTIGACION = 2;
    case TRABAJO_DE_CAMPO = 3;
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
