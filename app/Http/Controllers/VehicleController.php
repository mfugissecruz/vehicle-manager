<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Vehicle\StoreVehicleRequest;
use App\Http\Requests\Vehicle\UpdateVehicleRequest;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $vehicles = Vehicle::paginate(10);

        if (request('search')) {
            $vehicles = Vehicle::where('model', 'like', '%' . request('search') . '%')
                ->orWhere('year', 'like', '%' . request('search') . '%')
                ->orWhere('make', 'like', '%' . request('search') . '%')
                ->orWhere('plate_number', 'like', '%' . request('search') . '%')
                ->orWhere('chassis_number', 'like', '%' . request('search') . '%')
                ->orWhere('engine_number', 'like', '%' . request('search') . '%')
                ->paginate(10);
        }

        return view("dashboard.features.vehicles.index")->with([
            'vehicles' => $vehicles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("dashboard.features.vehicles.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request): RedirectResponse
    {
        Vehicle::create([
            'model' => $request->model,
            'year' => $request->year,
            'make' => $request->make,
            'plate_number' => $request->plate_number,
            'chassis_number' => $request->chassis_number,
            'engine_number' => $request->engine_number,
            'image' => Str::replace('public/', 'storage/', $request->image->store('public/vehicles'))
        ]);

        session()->flash('success', 'Veículo cadastrado com sucesso!');
        return redirect()->route('dashboard.vehicles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle): View
    {
        return view("dashboard.features.vehicles.edit")->with([
            'vehicle' => $vehicle,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle): RedirectResponse
    {
        $vehicle->update([
            'model' => $request->model,
            'year' => $request->year,
            'make' => $request->make,
            'plate_number' => $request->plate_number,
            'chassis_number' => $request->chassis_number,
            'engine_number' => $request->engine_number,
        ]);

        if ($request->hasFile('image')) {
            Storage::delete(Str::replace('storage/', 'public/', $vehicle->image));
            $vehicle->update([
                'image' => Str::replace('public/', 'storage/', $request->image->store('public/vehicles'))
            ]);
        }

        session()->flash('success', 'Veículo atualizado com sucesso!');
        return redirect()->route('dashboard.vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle): void
    {
        Storage::delete(Str::replace('storage/', 'public/', $vehicle->image));
        $vehicle->delete();
        session()->flash('success', 'Veículo excluído com sucesso!');
    }
}
