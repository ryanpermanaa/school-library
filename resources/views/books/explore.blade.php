<x-layouts.app title="Jelajahi" class="">

    <section
        class="flex flex-col lg:flex-row items-center justify-between gap-7 p-5 rounded-lg bg-[#FBFBFB] w-full h-fit mb-4 shadow-lg">
        <h1 class="text-3xl font-playfair font-bold whitespace-nowrap">Jelajahi Buku</h1>

        <div class="flex gap-2 w-full lg:w-fit">
            <div class="relative w-full md:w-70 rounded-sm">
                <label for="Search" class="sr-only"> Search </label>
                <input type="text" id="Search" placeholder="Cari buku kesukaan anda"
                    class="w-full h-full rounded-md bg-[#EEEDEF] px-3 shadow-xs sm:text-sm focus:outline-none" />
            </div>
            <flux:button icon="magnifying-glass"
                class="transition! aspect-square! bg-primary! text-white! min-h-full! cursor-pointer! hover:bg-[#51358F]!" />
        </div>
    </section>
    <section class="px-5 py-6 rounded-lg bg-[#FBFBFB] w-full h-fit shadow-lg mb-4">
        <div class="flex items-center justify-between mb-3">
            <h2 class="font-extrabold text-xl">Buku-buku populer</h2>
            <a href="#" class="text-sm text-primary font-bold flex items-center gap-2 group">
                <span class="group-hover:underline underline-offset-2">Lihat Semua</span>
                <i class="fa-solid fa-arrow-right-long pt-0.5"></i>
            </a>
        </div>

        <flux:separator class="mb-5" />

        <div class="grid grid-cols-1 md:grid-cols-4 gap-3 [&>div]:bg-[#E0E0E0]">
            @foreach ($popular_books as $book)
                <div
                    class="flex flex-col min-h-full rounded-xl shadow-sm hover:shadow-xl transition hover:-translate-y-2 group">

                    <img src="{{ $book['cover_path'] }}"
                        class="w-3/5 flex-1 mx-auto my-5 shadow-3xl transition group-hover:-translate-y-4 group-hover:scale-110 duration-300 ease-in-out"
                        alt="">

                    <div class="bg-white max-h-fit p-5 rounded-b-xl">
                        <div class="font-medium text-primary flex text-sm items-start gap-3 mb-2">
                            <span>
                                <i class="fa-solid fa-thumbs-up mr-0.5"></i>
                                <b>{{ $book->likedByUsers->count() }}</b>
                            </span>
                            <span>
                                <i class="fa-solid fa-bookmark mr-1"></i>
                                <b>{{ $book->savedByUsers->count() }}</b>
                            </span>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-playfair font-bold text-2xl truncate">{{ $book['title'] }}</h4>
                            <p class="font-crimson text-lg truncate">{{ $book['author'] }}</p>
                        </div>
                        <div class="flex gap-1 text-xs truncate">
                            <span class="whitespace-nowrap rounded-md font-bold px-2.5 py-1.5"
                                style="background-color: {{ $book->category->background_color }}; color: {{ $book->category->text_color }}">
                                {{ $book->category->name }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="px-5 py-6 rounded-lg bg-[#FBFBFB] w-full h-fit shadow-lg">
        <div class="flex items-center justify-between mb-3">
            <h2 class="font-extrabold text-xl">Terbaru ditambahkan</h2>
            <a href="#" class="text-sm text-primary font-bold flex items-center gap-2 group">
                <span class="group-hover:underline underline-offset-2">Lihat Semua</span>
                <i class="fa-solid fa-arrow-right-long pt-0.5"></i>
            </a>
        </div>

        <flux:separator class="mb-5" />

        <div class="grid grid-cols-1 md:grid-cols-4 gap-3 [&>div]:bg-[#E0E0E0]">
            @foreach ($latest_books as $book)
                <div
                    class="flex flex-col min-h-full rounded-xl shadow-sm hover:shadow-xl transition hover:-translate-y-2 group">

                    <img src="{{ $book['cover_path'] }}"
                        class="w-3/5 flex-1 mx-auto my-5 shadow-3xl transition group-hover:-translate-y-4 group-hover:scale-110 duration-300 ease-in-out"
                        alt="">

                    <div class="bg-white max-h-fit flex-1 p-5 rounded-b-xl">
                        <div class="font-medium text-primary flex text-sm items-start gap-3 mb-2">
                            <span>
                                <i class="fa-solid fa-thumbs-up mr-0.5"></i>
                                <b>{{ $book->likedByUsers->count() }}</b>
                            </span>
                            <span>
                                <i class="fa-solid fa-bookmark mr-1"></i>
                                <b>{{ $book->savedByUsers->count() }}</b>
                            </span>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-playfair font-bold text-2xl truncate">{{ $book['title'] }}</h4>
                            <p class="font-crimson text-lg truncate">{{ $book['author'] }}</p>
                        </div>
                        <div class="flex gap-1 text-xs">
                            <span class="whitespace-nowrap rounded-md font-bold px-2.5 py-1.5"
                                style="background-color: {{ $book->category->background_color }}; color: {{ $book->category->text_color }}">
                                {{ $book->category->name }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layouts.app>
