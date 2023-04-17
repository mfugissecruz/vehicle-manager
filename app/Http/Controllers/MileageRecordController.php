<?php

namespace App\Http\Controllers;

use App\Http\Requests\MileageRecord\StoreMileageRecordRequest;
use App\Http\Requests\MileageRecord\UpdateMileageRecordRequest;
use App\Models\Driver;
use App\Models\MileageRecord;
use App\Models\Vehicle;
use Carbon\Carbon;

class MileageRecordController extends Controller
{
    public function index()
    {
        $mileageRecords = MileageRecord::whereBetween('date', [request('start_date') ?? Carbon::now()->firstOfMonth()->format('Y-m-d'), Carbon::today()->format('Y-m-d')])->latest()->with('vehicle');

        if (request('start_date') && request('end_date')) {
            $mileageRecords->whereBetween('date', [request('start_date'), request('end_date')])->with('vehicle')->latest();
        }

        return view('dashboard.features.mileage-records.index')
            ->with('mileageRecords', $mileageRecords->paginate(10));
    }

    public function create()
    {
        return view('dashboard.features.mileage-records.create')
            ->with([
                'vehicles' =>    Vehicle::orderBy('model')->get(),
                'drivers' => Driver::all(),
            ]);
    }

    public function store(StoreMileageRecordRequest $request)
    {
        MileageRecord::create([
            'vehicle_id' => $request->vehicle_id,
            'driver_id' => $request->driver_id,
            'date' => $request->date,
            'mileage' => $request->mileage,
        ]);

        session()->flash('success', 'Registro de Quilometragem criado com sucesso.');
        return redirect()->route('dashboard.mileage-records.index');
    }

    public function edit(MileageRecord $mileageRecord)
    {
        return view('dashboard.features.mileage-records.edit')
            ->with([
                'mileageRecord' => $mileageRecord,
                'vehicles' => Vehicle::orderBy('model')->get(),
                'drivers' => Driver::all(),
            ]);
    }

    public function update(MileageRecord $mileageRecord, UpdateMileageRecordRequest $request)
    {
        $mileageRecord->update([
            'vehicle_id' => $request->vehicle_id,
            'driver_id' => $request->driver_id,
            'date' => $request->date,
            'mileage' => $request->mileage,
        ]);

        session()->flash('success', 'Registro de Quilometragem atualizado com sucesso.');
        return redirect()->route('dashboard.mileage-records.index');
    }
}
