<x-dashboard.default-layout>
    <div class="flex flex-col items-center justify-start max-w-2xl gap-4 px-8 py-4 m-4 mx-auto bg-white rounded shadow-md">
        <form action="{{ route('dashboard.drivers.store') }}" method="POST" enctype="multipart/form-data" class="w-full overflow-y-auto">
            @csrf
            <div class="mb-4">
                <h1 class="text-2xl font-bold">Adicionar Motorista</h1>
            </div>

            {{-- name --}}
            <div class="mb-4">
                <label for="name" class="flex flex-col">
                    <span>Nome</span>
                    <input type="text" name="name" id="name" class="rounded" value="{{ old('name') }}" />
                    @error("name")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- cpf --}}
            <div class="mb-4">
                <label for="cpf" class="flex flex-col">
                    <span>CPF</span>
                    <input x-mask="999.999.999-99" type="text" name="cpf" id="cpf" class="rounded" value="{{ old('cpf') }}" />
                    @error("cpf")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- email --}}
            <div class="mb-4">
                <label for="email" class="flex flex-col">
                    <span>Email</span>
                    <input type="email" name="email" id="email" class="rounded" value="{{ old('email') }}" />
                    @error("email")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- phone --}}
            <div class="mb-4">
                <label for="phone" class="flex flex-col">
                    <span>Telefone</span>
                    <input x-mask="(99) 99999-9999" type="text" name="phone" id="phone" class="rounded" value="{{ old('phone') }}" />
                    @error("phone")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- cnh --}}
            <div class="mb-4">
                <label for="cnh" class="flex flex-col">
                    <span>CNH</span>
                    <input x-mask="99999999999" type="text" name="cnh" id="cnh" class="rounded" value="{{ old('cnh') }}" />
                    @error("cnh")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- cnh_category --}}
            <div class="mb-4">
                <label for="cnh_category" class="flex flex-col">
                    <span>Categoria da CNH</span>
                    <select name="cnh_category" id="cnh_category" class="rounded" required>
                        <option value="">Selecione uma categoria</option>
                        @foreach ($cnh_categories as $cnh_category)
                            <option value="{{ $cnh_category->value }}" {{ old('cnh_category') == $cnh_category->value ? 'selected' : '' }}>{{ $cnh_category->name }}</option>
                        @endforeach
                    </select>
                    @error("cnh_category")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

             {{-- cnh_expiration_date --}}
             <div class="mb-4">
                <label for="cnh_expiration_date" class="flex flex-col">
                    <span>Data de expiração da CNH</span>
                    <input type="date" name="cnh_expiration_date" id="cnh_expiration_date" class="rounded" value="{{ old('cnh_expiration_date') }}" />
                    @error("cnh_expiration_date")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

             {{-- image --}}
             <div class="mb-4">
                <label for="image" class="flex flex-col">
                    <span>Imagem do Motorista</span>
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
