
<x-dashboard.default-layout>
    <div class="flex flex-col items-center justify-start max-w-2xl gap-4 px-8 py-4 m-4 mx-auto bg-white rounded shadow-md">
        <form action="{{ route('dashboard.maintenance-records.store') }}" method="POST" enctype="multipart/form-data" class="w-full overflow-y-auto">
            @csrf
            <div class="mb-4">
                <h1 class="text-2xl font-bold">Registro de Manutenção</h1>
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

             {{-- mechanic_id --}}
             <div class="mb-4">
                <label for="mechanic_id" class="flex flex-col">
                    <span>Mecânico</span>
                    <select name="mechanic_id" id="mechanic_id" class="rounded" required>
                        <option value="">Selecione um Mecânico</option>
                        @foreach ($mechanics as $mechanic)
                            <option value="{{ $mechanic->id }}" {{ old('mechanic_id') == $mechanic->id ? 'selected' : '' }}>{{ $mechanic->name }}</option>
                        @endforeach
                    </select>
                    @error("mechanic_id")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- description --}}
            <div class="mb-4">
                <label for="description" class="flex flex-col">
                    <span>Descrição</span>
                    <textarea rows="5" name="description" id="description" class="rounded" required>{{ old('description') }}</textarea>
                    @error("description")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- cost --}}
            <div class="mb-4">
                <label for="cost" class="flex flex-col">
                    <span>Custo</span>
                    <input type="text" name="cost" id="cost" class="rounded" value="{{ old('cost') }}" required />
                    @error("cost")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- date --}}
            <div class="mb-4">
                <label for="date" class="flex flex-col">
                    <span>Data da Manutenção</span>
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
