<x-layouts.app title="Kelola Buku" class="relative overflow-x-hidden">

    <x-page-header title="Kelola Buku">
        <flux:button as="link" href="{{ route('admin.kelola-buku.create') }}" wire:navigate icon="plus"
            class="bg-primary! text-custom-white!">Tambah Buku
        </flux:button>
    </x-page-header>

    @livewire('manage-book-index')

</x-layouts.app>
