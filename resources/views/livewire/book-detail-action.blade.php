<div>
    <table class="w-full md:w-80 border-separate border-spacing-y-3 mb-7">
        <tr>
            <td>Kategori</td>
            <td>
                <span class="whitespace-nowrap lowercase text-sm rounded-md font-bold px-2.5 py-1.5"
                    style="background-color: {{ $book->category->background_color }}; color: {{ $book->category->text_color }}">
                    {{ $book->category->name }}
                </span>
            </td>

            <td>Disukai</td>
            <td class="font-bold">{{ $book->likedByUsers->count() }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <span
                    class="w-fit inline-flex items-center justify-center rounded-full {{ $book->is_available ? 'bg-green-200' : 'bg-gray-200' }} px-2.5 py-0.5 text-black">
                    <i
                        class="{{ $book->is_available ? 'fa-solid fa-circle-dot' : 'fa-solid fa-xmark' }} text-[8px] mr-1.5"></i>
                    <p class="text-sm font-semibold whitespace-nowrap">
                        {{ $book->is_available ? 'Tersedia' : 'Dipinjam' }}
                    </p>
                </span>
            </td>

            <td>Disimpan</td>
            <td class="font-bold">{{ $book->savedByUsers->count() }}</td>
        </tr>
    </table>

    <div class="flex justify-center md:justify-start gap-3 h-10" x-data="{ borrowed: @js($isCurrentUserBorrowing) }">
        @if ($book->is_available || $isCurrentUserBorrowing)
            <button @click="borrowed = !borrowed; runConfetti(borrowed); $wire.borrowBook()"
                x-bind:disabled="borrowed" @disabled($isCurrentUserBorrowing)
                class="relative text-primary bg-[#462e7a] w-44 rounded-md transition group">

                <span
                    class="font-bold text-md cursor-pointer absolute inset-0 flex justify-center items-center rounded-md bg-[#FBFBFB] border-3 border-primary -translate-y-1.5 group-hover:-translate-y-2 transition group-active:translate-y-0"
                    :class="{ 'bg-primary text-custom-white': borrowed }">
                    <a href="{{ route('book.search') }}" class="absolute inset-0 flex items-center justify-center z-10"
                        x-show="borrowed">
                        Lihat Inventory ->
                    </a>
                    <span x-show="!borrowed">Pinjam Buku</span>
                </span>

            </button>
        @else
            <button class="relative bg-gray-900 w-44 rounded-md transition group">
                <span
                    class="font-bold text-md absolute inset-0 flex justify-center items-center rounded-md text-custom-white bg-gray-600 border-3 border-gray-600 cursor-not-allowed -translate-y-1.5 transition group-active:translate-y-0">
                    <a>Buku Dipinjam :(</a>
                </span>
            </button>
        @endif

        <div class="flex gap-2" x-data="{ liked: @js($isLiked), saved: @js($isSaved) }">

            <flux:tooltip content="Suka">
                <button @click="liked = !liked; $wire.likeBook()" tooltip="Suka"
                    class="aspect-square bg-primary/15 h-full flex items-center justify-center rounded-md cursor-pointer">
                    <flux:icon.hand-thumb-up x-show="liked" variant="solid" class="text-primary animate-like" />
                    <flux:icon.hand-thumb-up x-show="!liked" variant="outline" class="text-primary" />
                </button>
            </flux:tooltip>

            <flux:tooltip content="Simpan">
                <button @click="saved = !saved; $wire.saveBook()" tooltip="Simpan"
                    class="aspect-square bg-primary/15 h-full flex items-center justify-center rounded-md cursor-pointer">
                    <flux:icon.bookmark x-show="saved" variant="solid" class="text-primary animate-like" />
                    <flux:icon.bookmark x-show="!saved" variant="outline" class="text-primary" />
                </button>
            </flux:tooltip>

        </div>
    </div>
</div>
