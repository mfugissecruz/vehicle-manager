<x-dashboard.default-layout>
    <div class="py-2.5">
        <div class="shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between p-4 overflow-y-auto bg-white">
                <form action="#" method="GET">
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col items-start">
                            <p>Filtrar por data</p>
                            <div class="flex items-center justify-center gap-2">
                                <label for="search" class="h-full">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span>De: </span>
                                        </div>
                                        <input type="date" name="start_date" value="{{ request('start_date') ?? \Carbon\Carbon::now()->firstOfMonth()->format('Y-m-d') }}" id="search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded md:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Pesquisar">
                                    </div>
                                </label>

                                <label for="search" class="h-full">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span>Até: </span>
                                        </div>
                                        <input type="date" name="end_date" value="{{ request('end_date') ?? \Carbon\Carbon::today()->format('Y-m-d') }}" id="search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded md:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Pesquisar">
                                    </div>
                                </label>
                                <button type="submit" class="p-1.5 text-white bg-indigo-500 rounded">Buscar</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div>
                    <div class="h-6"></div>
                    <a href="{{ route('dashboard.mileage-records.create') }}" class="px-5 text-white bg-indigo-500 hover:bg-indigo-600 py-2.5 rounded-md">
                        Adicionar
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto shadow-md">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Veículo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quilometragem
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Data de Registro
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Data de Preenchimento
                            </th>
                            <th scope="col" class="px-6 py-3 sr-only">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($mileageRecords))
                            @foreach ($mileageRecords as $key => $mileageRecord)
                                <tr class="{{ $key % 2 === 0  ? 'bg-gray-200' : ''}}">
                                    <td class="px-6 py-4 text-base">
                                        {{ $mileageRecord->vehicle->model }}
                                    </td>
                                    <td class="px-6 py-4 text-base">
                                        {{ $mileageRecord->mileage }} KM
                                    </td>
                                    <td class="px-6 py-4 text-base">
                                        {{ \Carbon\Carbon::parse($mileageRecord->date)->format('d/m/Y')}}
                                    </td>

                                    <td class="px-6 py-4 text-base">
                                        {{ \Carbon\Carbon::parse($mileageRecord->created_at)->format('d/m/Y H:i:s') }}
                                    </td>
                                    <td class="px-6 py-4 space-x-3">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('dashboard.mileage-records.show', $mileageRecord->id) }}" class="font-medium text-blue-600 hover:underline">Ver</a>
                                            <a href="{{ route('dashboard.mileage-records.edit', $mileageRecord->id) }}" class="font-medium text-blue-600 hover:underline">Editar</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="bg-white border-b">
                                <td colspan="6" class="px-6 py-4 text-center">
                                    Nenhum registro encontrado
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="my-5">
            {{ $mileageRecords->appends(['start_date' => request('start_date'), 'end_date' => request('end_date')])->links() }}
        </div>
    </div>
</x-dashboard.default-layout>
