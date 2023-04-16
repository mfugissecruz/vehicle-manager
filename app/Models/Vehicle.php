<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'year',
        'make',
        'plate_number',
        'chassis_number',
        'engine_number',
        'image',
    ];
}