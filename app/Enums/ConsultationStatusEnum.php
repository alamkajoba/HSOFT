<?php

namespace App\Enums;

enum ConsultationStatusEnum :string
{
    case PENDING = 'EN ATTENTE';
    case PROCESSING = 'EN COURS';
    case DONE = 'TERMINEE';
    case CANCELLED = 'ANULEE';
    case NONE = 'VIDE';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
