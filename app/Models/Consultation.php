<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'subscriberId',
        'reportedSymptoms',
        'clinicFindings', //observation clinique
        'temperature',
        'heart rate', //cardiaque
        'prescribedTreatment',
    ];
}
