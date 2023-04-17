<?php

use App\Enums\FuelType;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fuel_supply_records', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Vehicle::class)->constrained();
            $table->foreignIdFor(Driver::class)->constrained();
            $table->date('date');
            $table->integer('fuel_type');
            $table->integer('fuel_quantity');
            $table->integer('mileage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_supply_records');
    }
};
