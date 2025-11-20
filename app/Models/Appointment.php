<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'subscriber_id',
        'weight',
        'consultationStatus'
    ];


    //Realationship
    public function subscriber()
    {
        return $this->belongTo(Subscriber::class);
    }
}
