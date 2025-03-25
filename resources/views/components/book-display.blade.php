@props(['book'])

<div
    {{ $attributes->merge(['class' => 'relative flex flex-col min-h-full rounded-xl shadow-sm hover:shadow-xl transition hover:-translate-y-2 group']) }}>

    @if ($book->created_at >= now()->subWeek())
        <span class="new-badge"></span>
    @endif

    <img src="{{ $book['cover_path'] }}"
        class="w-3/5 flex-1 mx-auto my-5 shadow-3xl transition group-hover:-translate-y-4 group-hover:scale-110 duration-300 ease-in-out"
        alt="">

    <div class="bg-white max-h-fit flex-1 p-5 rounded-b-xl">
        <div class="relative font-medium text-primary flex text-sm items-center gap-3 mb-2">
            <span>
                <i class="fa-solid fa-thumbs-up mr-0.5"></i>
                <b>{{ $book->likedByUsers->count() }}</b>
            </span>
            <span>
                <i class="fa-solid fa-bookmark mr-1"></i>
                <b>{{ $book->savedByUsers->count() }}</b>
            </span>
            <flux:separator vertical />
            <span
                class="w-fit inline-flex items-center justify-center rounded-full {{ $book->is_available ? 'bg-green-200' : 'bg-gray-200' }} px-2.5 py-0.5 text-black">
                <i
                    class="{{ $book->is_available ? 'fa-solid fa-circle-dot' : 'fa-solid fa-xmark' }} text-[8px] mr-1.5"></i>
                <p class="text-sm font-regular whitespace-nowrap">{{ $book->is_available ? 'Tersedia' : 'Dipinjam' }}
                </p>
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
