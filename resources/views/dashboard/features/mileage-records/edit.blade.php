<x-dashboard.default-layout>
    <div class="flex flex-col items-center justify-start max-w-2xl gap-4 px-8 py-4 mx-auto mt-5 bg-white rounded shadow-md">
        <form action="{{ route('dashboard.mileage-records.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data" class="w-full">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <h1 class="text-2xl font-bold">Editar Veículo</h1>
            </div>
            {{-- model --}}
            <div class="mb-4">
                <label for="model" class="flex flex-col">
                    <span>Modelo</span>
                    <input type="text" name="model" id="model" class="rounded" value="{{ old('model', $vehicle->model) }}" />
                    @error("model")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- year --}}
            <div class="mb-4">
                <label for="year" class="flex flex-col">
                    <span>Ano</span>
                    <input type="text" name="year" id="year" class="rounded" value="{{ old('year', $vehicle->year) }}" />
                    @error("year")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- make --}}
            <div class="mb-4">
                <label for="make" class="flex flex-col">
                    <span>Marca</span>
                    <input type="text" name="make" id="make" class="rounded" value="{{ old('make', $vehicle->make) }}" />
                    @error("make")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- plate_number --}}
            <div class="mb-4">
                <label for="plate_number" class="flex flex-col">
                    <span>Número da placa</span>
                    <input type="text" name="plate_number" id="plate_number" class="rounded" value="{{ old('plate_number', $vehicle->plate_number) }}" />
                    @error("plate_number")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- chassis_number --}}
            <div class="mb-4">
                <label for="chassis_number" class="flex flex-col">
                    <span>Número do Chassi</span>
                    <input type="text" name="chassis_number" id="chassis_number" class="rounded" value="{{ old('chassis_number', $vehicle->chassis_number) }}" />
                    @error("chassis_number")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- engine_number --}}
            <div class="mb-4">
                <label for="engine_number" class="flex flex-col">
                    <span>Número do motor</span>
                    <input type="text" name="engine_number" id="engine_number" class="rounded" value="{{ old('engine_number', $vehicle->engine_number) }}" />
                    @error("engine_number")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

             {{-- image --}}
             <div class="mb-4">
                <label for="image" class="flex flex-col">
                    <span>Imagem do veículo</span>
                    <input type="file" name="image" id="image" class="cursor-pointer" accept="image/png, image/jpg, image/jpeg" onchange="previewImage()" />
                    <small id="file-message-error" class="font-bold text-zinc-800">O tamanho do arquivo não pode ultrapassar 2MB.</small>
                    @error("image")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>

                <div class="mt-2.5 w-80 h-auto">
                    <img id="image-preview" src="#" alt="Image preview" style="display: none;">
                </div>

            </div>

            <button type="submit" class="bg-indigo-500 text-white px-2.5 py-1.5 rounded hover:bg-indigo-600">
                Salvar
            </button>
        </form>
    </div>
</x-dashboard.default-layout>
