<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum TiposDeAtencionEnum: int
{
    case EN_SALA = 1;
    case A_DOMICILIO = 2;

    public static function getName(int $value): string
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return ucfirst(Str::lower(Str::replace('_', ' ', $case->name)));
            }
        }

        throw new \InvalidArgumentException('Tipo no encontrado en la lista enumerada');
    }
}
