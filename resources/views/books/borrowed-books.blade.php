<x-layouts.app title="Buku Dipinjam" class="relative overflow-hidden">

    <div class="flex flex-col h-full">
        <x-page-header title="Buku yang dipinjam">
            <flux:button href="{{ route('book.explore') }}" icon:trailing="arrow-up-right"
                class="bg-primary! text-custom-white!">
                Jalajahi Buku
            </flux:button>
        </x-page-header>

        @livewire('borrowed-book')
    </div>

</x-layouts.app>
