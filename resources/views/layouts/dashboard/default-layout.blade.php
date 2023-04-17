 <x-dashboard.base-layout >
    <x-dashboard.header />
    <x-dashboard.sidebar />
    <main class="md:ml-80">
        {{ $slot }}
    </main>
 </x-dashboard.base-layout>
