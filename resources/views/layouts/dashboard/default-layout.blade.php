 <x-dashboard.base-layout >
    <div class="relative bg-gray-100">
        <aside class="fixed top-0 z-20 min-h-screen w-80 bg-zinc-800 md:block">
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
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 116 0h3a.75.75 0 00.75-.75V15z" />
                            <path d="M8.25 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zM15.75 6.75a.75.75 0 00-.75.75v11.25c0 .087.015.17.042.248a3 3 0 015.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 00-3.732-10.104 1.837 1.837 0 00-1.47-.725H15.75z" />
                            <path d="M19.5 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                        </svg>
                        <a href="{{ route('dashboard.vehicles.index') }}" class="block w-full">Veículos</a>
                    </li>

                    <li class="flex items-center gap-1.5 w-full hover:bg-zinc-600 px-4 py-2 font-bold text-zinc-200 rounded {{ request()->routeIs('dashboard.vehicles.*') ? 'bg-zinc-600' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 116 0h3a.75.75 0 00.75-.75V15z" />
                            <path d="M8.25 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zM15.75 6.75a.75.75 0 00-.75.75v11.25c0 .087.015.17.042.248a3 3 0 015.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 00-3.732-10.104 1.837 1.837 0 00-1.47-.725H15.75z" />
                            <path d="M19.5 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                        </svg>
                        <a href="{{ route('dashboard.vehicles.index') }}" class="block w-full">Registro de Quilometragem</a>
                    </li>
                </ul>
            </nav>
        </aside>
        <!-- Page Content -->
        <main class="relative flex-1 md:ml-80">

            <x-dashboard.header />

            @if (session()->has('success')) <x-dashboard.flash-messages.success :message="session('success')" /> @endif

            @if (session()->has('warning')) <x-dashboard.flash-messages.warning :message="session('warning')" /> @endif

            @if (session()->has('failed')) <x-dashboard.flash-messages.failed :message="session('failed')" />  @endif

            {{ $slot }}
        </main>
    </div>
 </x-dashboard.base-layout>
