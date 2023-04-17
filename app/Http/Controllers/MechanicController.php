<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Mechanic\StoreMechanicRequest;
use App\Http\Requests\Mechanic\UpdateMechanicRequest;

class MechanicController extends Controller
{
    public function index(): View
    {
        $mechanics = Mechanic::paginate(10);

        if (request('search')) {
            $mechanics = Mechanic::where('name', 'like', '%' . request('search') . '%')
                ->orWhere('phone', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%')
                ->paginate(10);
        }

        return view('dashboard.features.mechanics.index')
            ->with('mechanics', $mechanics);
    }

    public function create(): View
    {
        return view('dashboard.features.mechanics.create');
    }

    public function store(StoreMechanicRequest $request): RedirectResponse
    {
        Mechanic::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        session()->flash('success', 'Mecânico cadastrado com sucesso!');
        return redirect()->route('dashboard.mechanics.index');
    }

    public function edit(Mechanic $mechanic): View
    {
        return view('dashboard.features.mechanics.edit')
            ->with('mechanic', $mechanic);
    }

    public function update(Mechanic $mechanic, UpdateMechanicRequest $request): RedirectResponse
    {
        $mechanic->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        session()->flash('success', 'Mecânico atualizado com sucesso!');
        return redirect()->route('dashboard.mechanics.index');
    }

    public function destroy(Mechanic $mechanic): void
    {
        $mechanic->delete();
        session()->flash('success', 'Mecânico excluído com sucesso!');
    }
}
