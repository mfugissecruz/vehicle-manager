<x-dashboard.default-layout>
    <div class="flex flex-col items-center justify-start max-w-2xl gap-4 px-8 py-4 m-4 mx-auto bg-white rounded shadow-md">
        <form action="{{ route('dashboard.fuel-supply-records.update', $fuelSupplyRecord->id) }}" method="POST" enctype="multipart/form-data" class="w-full overflow-y-auto">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <h1 class="text-2xl font-bold">Editar Registro de Abastecimento</h1>
            </div>

            {{-- vehicle_id --}}
            <div class="mb-4">
                <label for="vehicle_id" class="flex flex-col">
                    <span>Veículo</span>
                    <select name="vehicle_id" id="vehicle_id" class="rounded" required>
                        <option value="">Selecione um veículo</option>
                        @foreach ($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" {{ old('vehicle_id', $fuelSupplyRecord->vehicle_id) == $vehicle->id ? 'selected' : '' }}>{{ $vehicle->model }} - {{ $vehicle->plate_number }}</option>
                        @endforeach
                    </select>
                    @error("vehicle_id")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- date --}}
            <div class="mb-4">
                <label for="date" class="flex flex-col">
                    <span>Data de abastecimento</span>
                    <input type="date" name="date" id="date" class="rounded" value="{{ old('date', $fuelSupplyRecord->date) }}" />
                    @error("date")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

             {{-- fuel_type --}}
             <div class="mb-4">
                <label for="fuel_type" class="flex flex-col">
                    <span>Veículo</span>
                    <select name="fuel_type" id="fuel_type" class="rounded" required>
                        <option value="">Selecione um tipo de combustível</option>
                        @foreach ($fuel_types as $fuel_type)
                            <option value="{{ $fuel_type->value }}" {{ old('fuel_type', $fuelSupplyRecord->fuel_type->value) == $fuel_type->value ? 'selected' : '' }}>{{ ucfirst($fuel_type->name) }}</option>
                        @endforeach
                    </select>
                    @error("fuel_type")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- fuel_quantity --}}
            <div class="mb-4">
                <label for="fuel_quantity" class="flex flex-col">
                    <span>Quantidade</span>
                    <input type="text" name="fuel_quantity" id="fuel_quantity" class="rounded" value="{{ old('fuel_quantity', $fuelSupplyRecord->fuel_quantity / 1000) }}" />
                    @error("fuel_quantity")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- mileage --}}
            <div class="mb-4">
                <label for="mileage" class="flex flex-col">
                    <span>Quilometragem</span>
                    <input type="number" min="0" name="mileage" id="mileage" class="rounded" value="{{ old('mileage', $fuelSupplyRecord->mileage) }}" />
                    @error("mileage")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>


            <button type="submit" class="bg-indigo-500 text-white px-2.5 py-1.5 rounded hover:bg-indigo-600">
                Salvar
            </button>
        </form>
    </div>
</x-dashboard.default-layout>
