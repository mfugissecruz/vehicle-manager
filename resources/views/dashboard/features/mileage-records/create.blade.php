<x-dashboard.default-layout>
    <div class="flex flex-col items-center justify-start max-w-2xl gap-4 px-8 py-4 m-4 mx-auto bg-white rounded shadow-md">
        <form action="{{ route('dashboard.mileage-records.store') }}" method="POST" enctype="multipart/form-data" class="w-full overflow-y-auto">
            @csrf
            <div class="mb-4">
                <h1 class="text-2xl font-bold">Registro de Quilometragem</h1>
            </div>

            {{-- vehicle_id --}}
            <div class="mb-4">
                <label for="vehicle_id" class="flex flex-col">
                    <span>Veículo</span>
                    <select name="vehicle_id" id="vehicle_id" class="rounded" required>
                        <option value="">Selecione um veículo</option>
                        @foreach ($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }}>{{ $vehicle->model }} - {{ $vehicle->plate_number }}</option>
                        @endforeach
                    </select>
                    @error("vehicle_id")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- mileage --}}
            <div class="mb-4">
                <label for="mileage" class="flex flex-col">
                    <span>Quilometragem</span>
                    <input type="number" min="0" name="mileage" id="mileage" class="rounded" value="{{ old('mileage') }}" />
                    @error("mileage")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- date --}}
            <div class="mb-4">
                <label for="date" class="flex flex-col">
                    <span>Data do Registro</span>
                    <input type="date" name="date" id="date" class="rounded" value="{{ old('date', \Carbon\Carbon::today()->format('Y-m-d')) }}" />
                    @error("date")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            <button type="submit" class="bg-indigo-500 text-white px-2.5 py-1.5 rounded hover:bg-indigo-600">
                Salvar
            </button>
        </form>
    </div>
</x-dashboard.default-layout>
