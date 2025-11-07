<?php

namespace App\Enums;

enum BloodGroupEnum :string
{
    case APLUS = 'A +';
    case AMOINS = 'A -';
    case BPLUS = 'B +';
    case BMOINS = 'B -';
    case OPLUS = 'O +';
    case OMOINS = 'O -';
    case ABPLUS = 'AB +';
    case ABMOINS = 'AB -';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
