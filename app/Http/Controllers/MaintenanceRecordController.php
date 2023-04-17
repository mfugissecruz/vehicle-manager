<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Mechanic;
use App\Models\MaintenanceRecord;
use App\Http\Requests\MaintenanceRecord\StoreMaintenanceRecordRequest;
use App\Http\Requests\MaintenanceRecord\UpdateMaintenanceRecordRequest;

class MaintenanceRecordController extends Controller
{
    public function index()
    {
        $maintenanceRecords = MaintenanceRecord::paginate(10);

        if (request('start_date') && request('end_date')) {
            $maintenanceRecords = MaintenanceRecord::whereBetween('date', [
                request('start_date'),
                request('end_date'),
            ])->with(['vehicle', 'mechanic'])->paginate(10);
        }

        return view('dashboard.features.maintenance-records.index')
            ->with('maintenanceRecords', $maintenanceRecords);
    }

    public function create()
    {
        return view('dashboard.features.maintenance-records.create')
            ->with([
                'vehicles' => Vehicle::all(),
                'mechanics' => Mechanic::all(),
            ]);
    }

    public function store(StoreMaintenanceRecordRequest $request)
    {
        MaintenanceRecord::create([
            'vehicle_id' => $request->vehicle_id,
            'mechanic_id' => $request->mechanic_id,
            'date' => $request->date,
            'description' => $request->description,
            'cost' => intval((floatval($request->cost) * 100)),
        ]);

        session()->flash('success', 'Registro de manutenção criado com sucesso!');
        return redirect()->route('dashboard.maintenance-records.index');
    }

    public function edit(MaintenanceRecord $maintenanceRecord)
    {
        return view('dashboard.features.maintenance-records.edit')
            ->with([
                'maintenanceRecord' => $maintenanceRecord,
                'vehicles' => Vehicle::all(),
                'mechanics' => Mechanic::all(),
            ]);
    }

    public function update(MaintenanceRecord $maintenanceRecord, UpdateMaintenanceRecordRequest $request)
    {
        $maintenanceRecord->update([
            'vehicle_id' => $request->vehicle_id,
            'mechanic_id' => $request->mechanic_id,
            'date' => $request->date,
            'description' => $request->description,
            'cost' => $request->cost,
        ]);

        session()->flash('success', 'Registro de manutenção atualizado com sucesso!');
        return redirect()->route('dashboard.maintenance-records.index');
    }
}
