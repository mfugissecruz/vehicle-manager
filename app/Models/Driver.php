<?php

namespace App\Models;

use App\Enums\CnhCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'cnh',
        'cnh_category',
        'cnh_expiration_date',
        'phone',
        'email',
        'image'
    ];

    protected $casts = [
        'cnh_category' => CnhCategory::class,
        'cnh_expiration_date' => 'date'
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function mileageRecords()
    {
        return $this->hasMany(MileageRecord::class);
    }

    public function fuelSuppliesRecords()
    {
        return $this->hasMany(FuelSupplyRecord::class);
    }
}
