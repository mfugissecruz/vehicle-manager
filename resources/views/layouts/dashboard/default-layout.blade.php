 <x-dashboard.base-layout >
    <div class="relative bg-gray-100">
        <!-- SideBar -->
        <x-dashboard.sidebar />

        <!-- Page Content -->
        <div class="flex flex-col md:w-[calc(100vw-320px)] md:ml-80">
            <x-dashboard.header />
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
 </x-dashboard.base-layout>
