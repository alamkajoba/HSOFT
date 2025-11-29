<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'appointment_id',
        'user_id',
        'symptomPatient',
        'PhysicalExam', //observation clinique
        'vitalSign',
        'treatment',
        'specialNote',
    ];

    //Realationship
    public function appointment()
    {
        return $this->belongTo(Appointment::class);
    }

    public function user()
    {
        return $this->belongTo(User::class);
    }
}
