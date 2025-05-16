<x-layouts.app title="Dashboard" class="">

    <x-page-header title="Dashboard">
        <flux:button as="link" href="{{ route('admin.kelola-buku.index') }}" wire:navigate icon="arrow-left"
            class="bg-primary! text-custom-white!">
            Kelola Buku
        </flux:button>
    </x-page-header>

    @livewire('dashboard-action')
</x-layouts.app>
