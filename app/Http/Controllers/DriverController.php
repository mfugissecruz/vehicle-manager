<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Enums\CnhCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Driver\StoreDriverRequest;
use App\Http\Requests\Driver\UpdateDriverRequest;


class DriverController extends Controller
{
    public function index()
    {
        $driver = Driver::paginate(10);

        if (request('search')) {
            $driver = Driver::where('name', 'like', '%' . request('search') . '%')
                ->orWhere('cpf', 'like', '%' . request('search') . '%')
                ->orWhere('cnh', 'like', '%' . request('search') . '%')
                ->orWhere('phone', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%')
                ->orderBy('name')
                ->paginate(10);
        }

        return view('dashboard.features.drivers.index')->with('drivers', $driver);
    }

    public function create()
    {
        return view('dashboard.features.drivers.create')
            ->with('cnh_categories', CnhCategory::cases());
    }

    public function store(StoreDriverRequest $request)
    {
        Driver::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'cnh' => $request->cnh,
            'cnh_category' => $request->cnh_category,
            'cnh_expiration_date' => $request->cnh_expiration_date,
            'phone' => $request->phone,
            'email' => $request->email,
            'image' => Str::replace('public/', 'storage/', $request->image->store('public/drivers'))
        ]);

        session()->flash('success', 'Motorista cadastrado com sucesso!');
        return redirect()->route('dashboard.drivers.index');
    }

    public function show(Driver $driver)
    {
        return view('drivers.show');
    }

    public function edit(Driver $driver)
    {
        return view('dashboard.features.drivers.edit')
            ->with([
                'driver' => $driver,
                'cnh_categories' => CnhCategory::cases()
            ]);
    }

    public function update(Driver $driver, UpdateDriverRequest $request)
    {
        $driver->update([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'cnh' => $request->cnh,
            'cnh_category' => $request->cnh_category,
            'cnh_expiration_date' => $request->cnh_expiration_date,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        if ($request->hasFile('image')) {
            Storage::delete(Str::replace('storage/', 'public/', $driver->image));
            $driver->update([
                'image' => Str::replace('public/', 'storage/', $request->image->store('public/vehicles'))
            ]);
        }

        session()->flash('success', 'Motorista atualizado com sucesso!');
        return redirect()->route('dashboard.drivers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver): void
    {
        Storage::delete(Str::replace('storage/', 'public/', 'storage/drivers/GsCWKsyLFHEGEBO2WV6nbzD1g64WDIe4F442CaTp.jpg'));
        $driver->delete();
        session()->flash('success', 'Veículo excluído com sucesso!');
    }
}
