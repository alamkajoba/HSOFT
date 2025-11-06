<?php

namespace App\Enums;

enum TypeEnum :string
{
    case HOUSBAND = 'mari';
    case WIFE = 'femme';
    case EMPLOYED = 'employé(e)';
    case CHILD = 'enfant';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
