<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'subscriberId',
        'symptomPatient',
        'PhysicalExam', //observation clinique
        'vitalSign',
        'labExam', 
        'labResult', 
        'radioExam',
        'radioResult',
        'treatment',
        'specialNote',
        'LabExamStatusEnum', //Status of Labroom
        //'RadioExamStatusEnum' //Status of Labroom
    ];
}
