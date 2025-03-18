<x-layouts.app title="Explore" class="">
    <h1 class="text-3xl font-playfair font-bold">Jelajahi Buku</h1>
    <flux:separator class="my-6" />
    <section class="flex gap-2 p-5 rounded-lg bg-[#FBFBFB] w-full md:w-fit h-fit mb-4 shadow-lg">
        <div class="relative w-full md:w-80 rounded-sm">
            <label for="Search" class="sr-only"> Search </label>
            <input type="text" id="Search" placeholder="Cari buku kesukaan anda"
                class="w-full rounded-md bg-[#EEEDEF] h-full px-3 shadow-xs sm:text-sm focus:outline-none" />
        </div>
        <flux:button icon="magnifying-glass"
            class="transition! bg-primary! text-white! min-h-full! cursor-pointer! hover:bg-[#51358F]!" />
    </section>
    <section class="px-5 py-6 rounded-lg bg-[#FBFBFB] w-full h-fit shadow-lg">
        <h2 class="font-extrabold text-xl mb-5">Direkomendasikan</h2>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-3 [&>div]:bg-[#E0E0E0]">
            @foreach ($recommended_books as $book)
                <div
                    class="flex flex-col min-h-full rounded-xl shadow-sm hover:shadow-xl transition hover:-translate-y-2 group">
                    <img src="{{ $book['cover_path'] }}"
                        class="w-3/5 mx-auto my-5 shadow-3xl transition group-hover:-translate-y-4 group-hover:scale-110 duration-300 ease-in-out"
                        alt="">

                    <div class="bg-white p-5 rounded-b-xl">
                        <div class="font-medium text-primary flex text-sm items-start gap-3 mb-2">
                            <span>
                                <i class="fa-solid fa-thumbs-up mr-0.5"></i>
                                {{ $book->likedByUsers->count() }}
                                suka
                            </span>
                            <span>
                                <i class="fa-solid fa-heart mr-0.5"></i>
                                {{ $book->favouredUsers->count() }}
                                favorite
                            </span>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-playfair font-bold text-2xl truncate">{{ $book['title'] }}</h4>
                            <p class="font-crimson text-lg">{{ $book['author'] }}</p>
                        </div>
                        <div class="flex gap-1 text-xs">
                            @foreach ($book->categories as $category)
                                <span class="whitespace-nowrap rounded-md font-bold px-2.5 py-1.5"
                                    style="background-color: {{ $category['background_color'] }}; color: {{ $category['text_color'] }}">
                                    {{ $category->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layouts.app>
