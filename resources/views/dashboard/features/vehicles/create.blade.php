<x-dashboard.default-layout>
    <div class="flex flex-col items-center justify-start max-w-2xl gap-4 px-8 py-4 m-4 mx-auto bg-white rounded shadow-md">
        <form action="{{ route('dashboard.vehicles.store') }}" method="POST" enctype="multipart/form-data" class="w-full overflow-y-auto">
            @csrf
            <div class="mb-4">
                <h1 class="text-2xl font-bold">Adicionar Veículo</h1>
            </div>

            {{-- model --}}
            <div class="mb-4">
                <label for="model" class="flex flex-col">
                    <span>Modelo</span>
                    <input type="text" name="model" id="model" class="rounded" value="{{ old('model') }}" />
                    @error("model")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- year --}}
            <div class="mb-4">
                <label for="year" class="flex flex-col">
                    <span>Ano</span>
                    <input type="text" name="year" id="year" class="rounded" value="{{ old('year') }}" />
                    @error("year")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- make --}}
            <div class="mb-4">
                <label for="make" class="flex flex-col">
                    <span>Marca</span>
                    <input type="text" name="make" id="make" class="rounded" value="{{ old('make') }}" />
                    @error("make")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- plate_number --}}
            <div class="mb-4">
                <label for="plate_number" class="flex flex-col">
                    <span>Número da placa</span>
                    <input type="text" name="plate_number" id="plate_number" class="rounded" value="{{ old('plate_number') }}" />
                    @error("plate_number")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- chassis_number --}}
            <div class="mb-4">
                <label for="chassis_number" class="flex flex-col">
                    <span>Número do Chassi</span>
                    <input type="text" name="chassis_number" id="chassis_number" class="rounded" value="{{ old('chassis_number') }}" />
                    @error("chassis_number")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- engine_number --}}
            <div class="mb-4">
                <label for="engine_number" class="flex flex-col">
                    <span>Número do motor</span>
                    <input type="text" name="engine_number" id="engine_number" class="rounded" value="{{ old('engine_number') }}" />
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

    @push('scripts')
        <script>
            function previewImage() {
                const preview = document.querySelector('#image-preview');
                const messageError = document.querySelector('#file-message-error');
                const file = document.querySelector('#image').files[0];
                const reader = new FileReader();

                messageError.classList.add('text-zinc-800');
                console.log(file);

                if (file && file.size > 2000000) {
                    messageError.classList.remove('text-zinc-800');
                    messageError.classList.add('text-red-600');
                    return;
                }

                reader.addEventListener('load', function() {
                    preview.src = reader.result;
                    preview.style.display = 'block';
                });

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        </script>
    @endpush
</x-dashboard.default-layout>
