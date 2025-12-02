<?php

namespace App\Enums;

enum CategoryMedicineEnum :string
{
    case Analgesiques = 'Analgesiques & Antipyretiques';
    case Anti_inflamatoires = 'Anti-inflamatoires';
    case Antibiotiques = 'Antibiotiques';
    case Antipaludiques = 'Antipaludiques';
    case OPLUAntiparasitairesS = 'Antiparasitaires';
    case Antifongiques = 'Antifongiques';
    case Antiviraux = 'Antiviraux';
    case Antitussifs = 'Antitussifs & Expectorants';
    case Antihistaminiques = 'Antihistaminiques & Antiallergiques';
    case Gastro = 'Gastro-intestinaux';
    case Cardiologie = 'Cardiologie & Hypertension';
    case Antibacteriques = 'Antibacteriques';
    case ORL = 'ORL';
    case Ophtalmiques = 'Ophtalmiques';
    case Gynecologie = 'Gynecologie & Obsetrique';
    case Pediatrie = 'Pediatrie';
    case Anesthesiques = 'Anesthesiques';
    case Solutions = 'Solutions & Injectables';
    case Materiels = 'Materiels Medicaux & Consommables';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
