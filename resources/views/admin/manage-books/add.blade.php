<x-layouts.app title="Tambah Buku" class="relative overflow-x-hidden">

    <x-page-header title="Form Tambah Buku">
        <flux:button as="link" href="{{ route('admin.kelola-buku.index') }}" wire:navigate icon="arrow-left"
            class="bg-primary! text-custom-white!">
            Kelola Buku
        </flux:button>
    </x-page-header>

    @livewire('manage-book-create')

</x-layouts.app>
