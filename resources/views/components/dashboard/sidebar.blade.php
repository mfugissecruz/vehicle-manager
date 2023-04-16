<aside class="fixed top-0 bottom-0 z-20 w-80 bg-zinc-800 md:block">
    <header class="h-20 px-4 bg-zinc-700 py-1.5">
        <div class="flex items-center justify-center h-full">
            <span class="flex flex-col-reverse items-center gap-1 text-xl font-black text-zinc-200">
                <span>Gerenciador de Veículos</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-9 h-9">
                    <path d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 116 0h3a.75.75 0 00.75-.75V15z" />
                    <path d="M8.25 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zM15.75 6.75a.75.75 0 00-.75.75v11.25c0 .087.015.17.042.248a3 3 0 015.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 00-3.732-10.104 1.837 1.837 0 00-1.47-.725H15.75z" />
                    <path d="M19.5 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                </svg>
            </span>
        </div>
    </header>
    <nav class="py-5">
        <ul class="px-2 space-y-2">
            <li class="flex items-center gap-1.5 w-full hover:bg-zinc-600 px-4 py-2 font-bold text-zinc-200 rounded {{ request()->routeIs('dashboard.vehicles.*') ? 'bg-zinc-600' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 116 0h3a.75.75 0 00.75-.75V15z" />
                    <path d="M8.25 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zM15.75 6.75a.75.75 0 00-.75.75v11.25c0 .087.015.17.042.248a3 3 0 015.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 00-3.732-10.104 1.837 1.837 0 00-1.47-.725H15.75z" />
                    <path d="M19.5 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                </svg>
                <a href="{{ route('dashboard.vehicles.index') }}" class="block w-full">Veículos</a>
            </li>

            <li class="flex items-center gap-1.5 w-full hover:bg-zinc-600 px-4 py-2 font-bold text-zinc-200 rounded {{ request()->routeIs('dashboard.fuel-supply-records.*') ? 'bg-zinc-600' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5" fill="currentColor">
                    <path d="M32 64C32 28.7 60.7 0 96 0H256c35.3 0 64 28.7 64 64V256h8c48.6 0 88 39.4 88 88v32c0 13.3 10.7 24 24 24s24-10.7 24-24V222c-27.6-7.1-48-32.2-48-62V96L384 64c-8.8-8.8-8.8-23.2 0-32s23.2-8.8 32 0l77.3 77.3c12 12 18.7 28.3 18.7 45.3V168v24 32V376c0 39.8-32.2 72-72 72s-72-32.2-72-72V344c0-22.1-17.9-40-40-40h-8V448c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64zM96 80v96c0 8.8 7.2 16 16 16H240c8.8 0 16-7.2 16-16V80c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16z"/>
                </svg>
                <a href="{{ route('dashboard.fuel-supply-records.index') }}" class="block w-full">Registro de Abastecimento</a>
            </li>

            <li class="flex items-center gap-1.5 w-full hover:bg-zinc-600 px-4 py-2 font-bold text-zinc-200 rounded {{ request()->routeIs('dashboard.mileage-records.*') ? 'bg-zinc-600' : '' }}">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2.25C5.787 2.25.75 7.338.75 13.62a11.4 11.4 0 0 0 2.828 7.54c.055.062.105.123.16.178.443.412.578.412.93.412.35 0 .582 0 .934-.416C7.125 19.53 9.469 18.75 12 18.75c2.531 0 4.878.783 6.398 2.584.352.416.578.416.935.416.356 0 .53 0 .929-.412.057-.058.105-.116.16-.177a11.404 11.404 0 0 0 2.828-7.541c0-6.282-5.037-11.37-11.25-11.37Zm-.75 3h1.5v3h-1.5v-3Zm-4.5 9h-3v-1.5h3v1.5Zm1.007-3.932-2.12-2.121 1.06-1.06 2.121 2.12-1.06 1.061Zm5.302 4.091a1.455 1.455 0 0 1-.328.329 1.411 1.411 0 0 1-1.64-2.297L15 10.5l-1.94 3.91Zm2.123-5.152 2.121-2.12 1.06 1.06-2.12 2.121-1.061-1.06Zm5.068 4.993h-3v-1.5h3v1.5Z"></path>
                </svg>
                <a href="{{ route('dashboard.mileage-records.index') }}" class="block w-full">Registro de Quilometragem</a>
            </li>
        </ul>
    </nav>
</aside>

