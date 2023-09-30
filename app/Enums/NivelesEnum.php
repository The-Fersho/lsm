<?php

namespace App\Enums;

enum NivelesEnum: int
{
    case I = 1;
    case II = 2;
    case III = 3;
    case IV = 4;
    case V = 5;

    public static function getName(int $value): string
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return $case->name;
            }
        }

        throw new \InvalidArgumentException('Nivel no encontrado en la lista enumerada');
    }
}
