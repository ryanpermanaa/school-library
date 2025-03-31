@props(['book'])

<div
    {{ $attributes->merge(['class' => 'relative flex flex-col min-h-full rounded-xl shadow-sm hover:shadow-xl transition hover:-translate-y-2 group']) }}>

    @if ($book->created_at >= now()->subWeek())
        <span class="new-badge"></span>
    @endif

    <a href="{{ route('book.details', $book['id']) }}" class="flex-1">
        <img src="{{ $book['cover_path'] }}"
            class="w-3/5 mx-auto my-5 shadow-3xl transition group-hover:-translate-y-4 group-hover:scale-110 duration-300 ease-in-out"
            alt="{{ $book['title'] }} book cover">
    </a>

    <div class="bg-white max-h-fit flex-1 p-5 rounded-b-xl">
        <div class="relative font-medium text-primary flex text-sm items-center gap-2 mb-2">
            <span class="flex items-center gap-0.5">
                <i class="fa-solid fa-thumbs-up mr-0.5"></i>
                <b>{{ $book->likedByUsers->count() }}</b>
            </span>
            <span class="flex items-center gap-0.5">
                <i class="fa-solid fa-bookmark mr-1"></i>
                <b>{{ $book->savedByUsers->count() }}</b>
            </span>
            <flux:separator vertical />
            <span
                class="w-fit inline-flex items-center justify-center rounded-full {{ $book->is_available ? 'bg-green-200' : 'bg-gray-200' }} px-2.5 py-0.5 text-black">
                <i
                    class="{{ $book->is_available ? 'fa-solid fa-circle-dot' : 'fa-solid fa-xmark' }} text-[8px] mr-1.5"></i>
                <p class="text-sm font-regular whitespace-nowrap">
                    {{ $book->is_available ? 'Tersedia' : 'Dipinjam' }}
                </p>
            </span>
        </div>
        <div class="mb-3">
            <h4 class="font-playfair font-bold text-2xl truncate hover:underline">
                <a href="{{ route('book.details', $book['id']) }}">{{ $book['title'] }}</a>
            </h4>
            <p class="font-crimson text-lg truncate">{{ $book['author'] }}</p>
        </div>
        <div class="flex justify-between items-center gap-1 text-xs">
            <span class="lowercase whitespace-nowrap rounded-md font-bold px-2.5 py-1.5"
                style="background-color: {{ $book->category->background_color }}; color: {{ $book->category->text_color }}">
                {{ $book->category->name }}
            </span>

            @if ($book->borrowings->contains(Auth::user()->id))
                <flux:button href="{{ route('book.borrow') }}" tooltip="Kelola Buku"
                    class="h-7! aspect-square p-0! rounded-full! border-none! bg-primary! text-custom-white!">
                    <flux:icon.cog-6-tooth variant="micro" size="6" />
                </flux:button>
            @endif
        </div>
    </div>

</div>
