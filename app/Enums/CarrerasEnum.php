<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum CarrerasEnum: int
{
    case LICENCIATURA_EN_PEDAGOGIA = 1;
    case LICENCIATURA_EN_CIENCIAS_DE_LA_EDUCACION_CON_MENCION_EN_CIENCIAS_SOCIALES = 2;
    case LICENCIATURA_EN_CIENCIAS_DE_LA_EDUCACION_CON_MENCION_EN_CIENCIAS_NATURALES = 3;
    case LICENCIATURA_EN_CIENCIAS_DE_LA_EDUCACION_CON_MENCION_EN_ESPAÑOL = 4;
    case LICENCIATURA_EN_TEOLOGIA = 5;
    case LICENCIATURA_EN_INGLES = 6;
    case LICENCIATURA_EN_PSICOLOGIA_CLINICA = 7;
    case LICENCIATURA_EN_PERIODISMO = 8;
    case LICENCIATURA_EN_BANCA_Y_FINANZAS = 9;
    case LICENCIATURA_EN_CONTADURIA_PUBLICA_Y_AUDITORIA = 10;
    case LICENCIATURA_EN_AMINISTRACION_DE_EMPRESAS = 11;
    case LICENCIATURA_EN_DERECHO = 12;
    case INGENIERIA_EN_SISTEMAS = 13;
    case LICENCIATURA_EN_COMPUTACION = 14;
    case INGENIERIA_EN_GERENCIA_AGROPECUARIA = 15;
    case LICENCIATURA_EN_FARMACIA = 16;
    case TECNICO_SUPERIOR_EN_ENFERMERIA_GENERAL = 17;
    case LICENCIATURA_EN_ENFERMERIA = 18;
    case TECNICO_SUPERIOR_EN_EDUCACION_FISICA_DEPORTES_Y_RECREACION = 19;

    public static function getName(int $value): string
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return ucfirst(Str::lower(Str::replace('_', ' ', $case->name)));
            }
        }

        throw new \InvalidArgumentException('Value not found in the Enum');
    }
}
