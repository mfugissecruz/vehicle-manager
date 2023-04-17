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

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class);
    }

    public function fuelSupplyRecords()
    {
        return $this->hasMany(FuelSupplyRecord::class);
    }

    public function mileageRecords()
    {
        return $this->hasMany(MileageRecord::class);
    }
}
