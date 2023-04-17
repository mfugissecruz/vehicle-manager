<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Vehicle;
use App\Enums\FuelType;
use App\Models\FuelSupplyRecord;
use App\Http\Requests\FuelSupplyRecord\StoreFuelSupplyRecordRequest;
use App\Http\Requests\FuelSupplyRecord\UpdateFuelSupplyRecordRequest;
use App\Models\Driver;

class FuelSupplyRecordController extends Controller
{
    public function index()
    {
        $fuelSupplyRecords = FuelSupplyRecord::whereBetween('date', [request('start_date') ?? Carbon::now()->firstOfMonth()->format('Y-m-d'), Carbon::today()->format('Y-m-d')])->latest()->with('vehicle');

        if (request('start_date') && request('end_date')) {
            $fuelSupplyRecords->whereBetween('date', [request('start_date'), request('end_date')])->with('vehicle')->latest();
        }

        return view('dashboard.features.fuel-supply-records.index', [
            'fuelSupplyRecords' => $fuelSupplyRecords->paginate(10),
        ]);
    }

    public function create()
    {
        return view('dashboard.features.fuel-supply-records.create')
            ->with([
                'vehicles' => Vehicle::all(),
                'drivers' => Driver::all(),
                'fuel_types' => FuelType::cases(),
            ]);
    }

    public function store(StoreFuelSupplyRecordRequest $request)
    {
        FuelSupplyRecord::create([
            'vehicle_id' => $request->vehicle_id,
            'driver_id' => $request->driver_id,
            'date' => $request->date,
            'fuel_type' => $request->fuel_type,
            'fuel_quantity' => intval(floatval($request->fuel_quantity) * 1000),
            'mileage' => $request->mileage,
        ]);

        session()->flash('success', 'Registro de abastecimento criado com sucesso!');
        return redirect()->route('dashboard.fuel-supply-records.index');
    }

    public function edit(FuelSupplyRecord $fuelSupplyRecord)
    {
        return view('dashboard.features.fuel-supply-records.edit')
            ->with([
                'fuelSupplyRecord' => $fuelSupplyRecord,
                'vehicles' => Vehicle::all(),
                'drivers' => Driver::all(),
                'fuel_types' => FuelType::cases(),
            ]);
    }

    public function update(FuelSupplyRecord $fuelSupplyRecord, UpdateFuelSupplyRecordRequest $request)
    {
        $fuelSupplyRecord->update([
            'vehicle_id' => $request->vehicle_id,
            'driver_id' => $request->driver_id,
            'date' => $request->date,
            'fuel_type' => $request->fuel_type,
            'fuel_quantity' => intval(floatval($request->fuel_quantity) * 1000),
            'mileage' => $request->mileage,
        ]);

        session()->flash('success', 'Registro de abastecimento editado com sucesso!');
        return redirect()->route('dashboard.fuel-supply-records.index');
    }
}
