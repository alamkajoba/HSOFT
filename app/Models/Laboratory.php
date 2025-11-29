<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $fillable = [
        'user_id', 'consultation_id', 'examRequested', 'result', 'specialNote' , 'laboStatus'
    ];

    //Realationship
    public function consultaion()
    {
        return $this->belongTo(Consultation::class);
    }

    public function user()
    {
        return $this->belongTo(User::class);
    }
}
