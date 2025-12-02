<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'subscriber_id',
        'user_id',
        'weight',
        'appointmentStatus'
    ];


    //Realationship
    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class);
    }

    public function laboratory()
    {
        return $this->hasOne(Laboratory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
