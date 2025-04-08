<x-layouts.app title="Edit Buku" class="relative overflow-x-hidden">

    <x-page-header title="Form Edit Buku">
        <flux:button as="link" href="{{ route('admin.kelola-buku.index') }}" wire:navigate icon="arrow-left"
            class="bg-primary! text-custom-white!">
            Kelola Buku
        </flux:button>
    </x-page-header>

    @livewire('manage-book-update', ['book' => $book])

</x-layouts.app>
