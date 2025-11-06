<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'gender',
        'birthDate',
        'birthTown',
        'affectation',
        'matricule',
        'type',
        'address',
        'number'
    ];

}
