

<x-dashboard.default-layout>
    <div class="flex flex-col items-center justify-start max-w-2xl gap-4 px-8 py-4 m-4 mx-auto bg-white rounded shadow-md">
        <form action="{{ route('dashboard.mechanics.update', $mechanic->id) }}" method="POST" enctype="multipart/form-data" class="w-full overflow-y-auto">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <h1 class="text-2xl font-bold">Adicionar Mecânico</h1>
            </div>

            {{-- name --}}
            <div class="mb-4">
                <label for="name" class="flex flex-col">
                    <span>Nome</span>
                    <input type="text" name="name" id="name" class="rounded" value="{{ old('name', $mechanic->name) }}" />
                    @error("name")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- email --}}
            <div class="mb-4">
                <label for="email" class="flex flex-col">
                    <span>Email</span>
                    <input type="email" name="email" id="email" class="rounded" value="{{ old('email', $mechanic->email) }}" />
                    @error("email")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            {{-- phone --}}
            <div class="mb-4">
                <label for="phone" class="flex flex-col">
                    <span>Telefone</span>
                    <input x-mask="(99) 99999-9999" type="text" name="phone" id="phone" class="rounded" value="{{ old('phone', $mechanic->phone) }}" />
                    @error("phone")<small class="font-bold text-red-600"> {{ $message }} </small>@enderror
                </label>
            </div>

            <button type="submit" class="bg-indigo-500 text-white px-2.5 py-1.5 rounded hover:bg-indigo-600">
                Salvar
            </button>
        </form>
    </div>
</x-dashboard.default-layout>
