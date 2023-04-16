<x-dashboard.default-layout>
    <div class="container p-4">
        <div class="shadow-md sm:rounded-lg">
            <div class="flex flex-col md:flex-row items-center justify-between gap-2.5 p-4 bg-white min-w-full">
                <form action="#" method="GET">
                    <div class="flex items-center gap-1.5">
                        <label for="search" class="h-full">
                            <span class="sr-only">Search</span>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input type="text" name="search" value="{{ request('search') }}" id="search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded md:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Pesquisar">
                            </div>
                        </label>
                        <button type="submit" class="p-1.5 text-white bg-indigo-500 rounded">Buscar</button>
                    </div>
                </form>

                <div>
                    <a href="{{ route('dashboard.vehicles.create') }}" class="flex items-center justify-center gap-1 px-4 py-2 text-white bg-indigo-500 rounded hover:bg-indigo-600">
                        <span>Adicionar</span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full overflow-x-auto text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Imagem
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Modelo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Marca
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ano
                            </th>
                            <th scope="col" class="px-6 py-3 sr-only">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($vehicles))
                            @foreach ($vehicles as $key => $vehicle)
                                <tr class="{{ $key % 2 === 0  ? '' : 'bg-gray-50'}}">
                                    <td class="px-6 py-4">
                                        <img src="{{ asset($vehicle->image) }}"  alt="{{ $vehicle->model }}" width="" class="h-auto w-28" />
                                    </td>
                                    <td class="px-6 py-4 text-base">
                                        {{ $vehicle->model }}
                                    </td>
                                    <td class="px-6 py-4 text-base">
                                        {{ $vehicle->make }}
                                    </td>
                                    <td class="px-6 py-4 text-base">
                                        {{ $vehicle->year }}
                                    </td>
                                    <td class="px-6 py-4 space-x-3">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('dashboard.vehicles.show', $vehicle->id) }}" class="font-medium text-blue-600 hover:underline">Ver</a>
                                            <a href="{{ route('dashboard.vehicles.edit', $vehicle->id) }}" class="font-medium text-blue-600 hover:underline">Editar</a>
                                            <button onclick="confirmDelete('{{ route('dashboard.vehicles.destroy', $vehicle->id) }}', '{{ route('dashboard.vehicles.index') }}')" class="font-medium text-red-600 hover:underline">Deletar</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td colspan="6" class="px-6 py-4 text-center">
                                    Nenhum veículo encontrado
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $vehicles->links() }}
            </div>
        </div>
        <x-dashboard.delete-modal />
    </div>
</x-dashboard.default-layout>
