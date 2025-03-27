<div class="">
    <section class="px-5 py-6 rounded-lg bg-[#FBFBFB] w-full h-fit mb-4 shadow-lg">

        <div class="flex flex-col min-[75rem]:flex-row gap-2 mb-5">
            <form wire:submit="loadBooks" class="flex gap-1 h-full w-full">
                <div class="relative w-full rounded-sm">
                    <label for="Search" class="sr-only"> Search </label>
                    <input type="text" wire:model="key" name="key" id="Search"
                        placeholder="Cari buku kesukaan anda"
                        class="w-full h-full rounded-md bg-[#EEEDEF] px-3 shadow-xs sm:text-sm focus:outline-none" />

                    @if ($key)
                        <button wire:click="resetSearch"
                            class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer group">
                            <i class="fa-solid fa-xmark group-hover:text-primary"></i>
                        </button>
                    @endif
                </div>
                <flux:button type="submit" icon="magnifying-glass"
                    class="transition! aspect-square! bg-primary! text-white! min-h-full! cursor-pointer! hover:bg-[#51358F]!" />
            </form>

            <div class="flex flex-col md:flex-row gap-1">
                <div class="flex-1 lg:w-44">
                    <x-select :options="$categories" type="multi-select" :entangle="'selectedCategories'" placeholder="Pilih Kategori"
                        name="category" />
                </div>
                <div class="flex-1 lg:w-50">
                    <x-select :options="['Terbaru', 'Terlama', 'Paling Populer', 'Terbanyak Disimpan']" type="single-select" :entangle="'sortType'" name="sortType"
                        placeholder="Urutkan Pencarian" />
                </div>
                <div class="flex-1 lg:w-44">
                    <x-select :options="['Tersedia', 'Dipinjam']" type="single-select" :entangle="'statusType'" name="statusType"
                        placeholder="Status Buku" />
                </div>
            </div>
        </div>

        <flux:separator class="mb-5" />

        @if ($books == [])
            <p class="text-center italic">
                Tidak ada buku ditemukkan...
            </p>
        @else
            <div class="mb-3">
                {{ $books->links(data: ['scrollTo' => false]) }}
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 w-full gap-3 [&>div]:bg-[#E0E0E0]">
                @foreach ($books as $book)
                    <x-book-display :$book />
                @endforeach
            </div>
        @endif

    </section>
</div>
