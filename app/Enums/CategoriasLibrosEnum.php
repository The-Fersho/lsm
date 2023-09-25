<?php

namespace App\Enums;

enum CategoriasLibrosEnum: int
{
    case AVENTURA = 1;
    case CIENCIA_FICCION = 2;
    case COMEDIA = 3;
    case DRAMA = 4;
    case TERROR = 5;
    case SUSPENSO = 6;
    case ROMANCE = 7;
    case FANTASIA = 8;
    case HISTORIA = 9;
    case AUTOAYUDA = 10;
    case INFANTIL = 11;
    case POESIA = 12;
    case ENSAYO = 13;
    case NOVELA = 14;
    case OTROS = 15;

    public static function getName(int $value): string {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return $case->name;
            }
        }
        throw new \InvalidArgumentException("Value not found in the Enum");
    }
}
