<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscriber extends Model
{
    use hasFactory;

    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'gender', //enum : homme, femme
        'bloodGroup', //enum : A+,A-,B+,B-,AB+,AB-
        'birthDate',
        'birthTown',
        'affectation',
        'matricule',
        'type', //enum :enfant, mari, femme, employé(e)
        'address',
        'number'
    ];

    //Realationship
    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}
