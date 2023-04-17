<header class="w-full h-20 px-5 bg-white">
    <div class="flex items-center justify-between h-full gap-2 text-lg font-extrabold md:justify-end text-zinc-900">
        <div class="md:hidden">
            <button x-on:click="menuVisibility=true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-1.5">
                <span>Olá, {{ auth()->user()->name }}!</span>
            </button>
            <div class="h-4 border border-zinc-100"></div>
            <div>
                <form action="{{ route('logout', auth()->user()->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="text-red-600">
                        <span>Sair</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
