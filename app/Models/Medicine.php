<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
    use hasFactory;

    protected $fillable = ['nameMedicine', 'category', 'quantity'];
}
