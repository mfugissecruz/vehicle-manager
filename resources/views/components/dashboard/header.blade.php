<header class="w-full h-20 px-10 bg-white">
    <div class="flex items-center justify-end h-full gap-2 text-lg font-extrabold text-zinc-900">
        <button class="flex items-center gap-1.5">
            <span>Olá, {{-- auth()->user()->name --}} Marcelo!</span>
        </button>
        <div class="h-4 border border-zinc-100"></div>
        <div>
            <form action="{{-- route('admin.logout',auth()->user()->name) --}}" method="POST">
                @csrf
                <button type="submit" class="text-red-600">
                    <span>Sair</span>
                </button>
            </form>
        </div>
    </div>
</header>
