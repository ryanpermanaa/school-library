<x-layouts.app title="Buku Dipinjam" class="relative overflow-hidden">

    <div class="flex flex-col h-full">
        <section
            class="flex flex-col lg:flex-row items-center justify-between gap-7 p-5 rounded-lg bg-[#FBFBFB] w-full h-fit mb-3 shadow-lg">
            <h1 class="text-3xl font-playfair font-bold whitespace-nowrap">Buku yang dipinjam</h1>

            <flux:button href="{{ route('book.explore') }}" icon:trailing="arrow-up-right"
                class="bg-primary! text-custom-white!">
                Jalajahi Buku
            </flux:button>
        </section>


        @livewire('borrowed-book')
    </div>

</x-layouts.app>
