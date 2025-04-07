<x-layouts.app title="Jelajahi" class="">

    <x-page-header title="Jelajahi Buku">
        <form action="{{ route('book.search') }}" method="GET" class="flex gap-2 w-full lg:w-fit">
            <div class="relative w-full md:w-70 rounded-sm">
                <label for="Search" class="sr-only"> Search </label>
                <input type="text" id="Search" name="key" placeholder="Cari buku kesukaan anda"
                    class="w-full h-full rounded-md bg-[#EEEDEF] px-3 shadow-xs sm:text-sm focus:outline-none" />
            </div>
            <flux:button type="submit" icon="magnifying-glass"
                class="transition! aspect-square! bg-primary! text-white! min-h-full! cursor-pointer! hover:bg-[#51358F]!" />
        </form>
    </x-page-header>

    <section class="px-5 py-6 rounded-lg bg-[#FBFBFB] w-full h-fit shadow-lg mb-3">
        <div class="flex items-center justify-between mb-3">
            <h2 class="font-extrabold text-xl">Buku-buku populer</h2>
            <a href="{{ route('book.search') }}?sort=paling+populer"
                class="text-sm text-primary font-bold flex items-center gap-2 group">
                <span class="group-hover:underline underline-offset-2">Lihat Semua</span>
                <i class="fa-solid fa-arrow-right-long pt-0.5"></i>
            </a>
        </div>

        <flux:separator class="mb-5" />

        <div class="grid grid-cols-1 md:grid-cols-4 gap-3 [&>div]:bg-[#E0E0E0]">
            @forelse ($popular_books as $book)
                <x-book-display :$book />
            @empty
                <p>Tidak ada buku ditemukkan</p>
            @endforelse
        </div>
    </section>
    <section class="px-5 py-6 rounded-lg bg-[#FBFBFB] w-full h-fit shadow-lg">
        <div class="flex items-center justify-between mb-3">
            <h2 class="font-extrabold text-xl">Terbaru ditambahkan</h2>
            <a href="{{ route('book.search') }}?sort=terbaru"
                class="text-sm text-primary font-bold flex items-center gap-2 group">
                <span class="group-hover:underline underline-offset-2">Lihat Semua</span>
                <i class="fa-solid fa-arrow-right-long pt-0.5"></i>
            </a>
        </div>

        <flux:separator class="mb-5" />

        <div class="grid grid-cols-1 md:grid-cols-4 gap-3 [&>div]:bg-[#E0E0E0]">
            @foreach ($latest_books as $book)
                <x-book-display :$book />
            @endforeach
        </div>
    </section>

</x-layouts.app>
