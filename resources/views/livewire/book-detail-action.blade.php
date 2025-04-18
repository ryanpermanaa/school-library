<div class="h-full">

    <x-alert model="borrowSuccess">

        <x-alert-item type="success" x-show="result === true && !hideAlert">
            <x-slot:title>Buku berhasil dipinjam!</x-slot:title>
            <x-slot:description>Buku bisa dikelola di Buku Dipinjam.</x-slot:description>
        </x-alert-item>

        <x-alert-item type="error" x-show="result === false && !hideAlert">
            <x-slot:title> {{ $alertTitle ?? 'Buku gagal dipinjam :(' }}</x-slot:title>
            <x-slot:description> {{ $alertDescription ?? 'Coba lagi nanti atau hubungi developer.' }} </x-slot:description>
        </x-alert-item>

    </x-alert>

    <section
        class="relative flex flex-col lg:flex-row items-center justify-between p-5 px-6 lg:px-19 rounded-lg bg-[#FBFBFB] w-full min-h-full mb-4 shadow-lg overflow-hidden">

        <flux:button as="link" href="{{ $initialPreviousUrl ?? route('book.explore') }}" wire:navigate square
            tooltip="Back" class="absolute! left-3 top-3 bg-primary/20! text-primary! cursor-pointer">
            <flux:icon.arrow-left-circle variant="solid" class="size-8 z-20" />
        </flux:button>

        <div class="min-h-full relative flex-1 flex justify-center items-center w-full mb-5 lg:mb-0">
            <img class="min-w-40 w-3/4 md:w-xs shadow-3xl z-10 lg:mr-10" src="{{ $book->cover_path }}" alt="">
            <div class="absolute bg-gray-200 w-full max-w-sm aspect-square rounded-full lg:mr-10"></div>
        </div>
        <div class="min-h-full flex-1 flex flex-col justify-center items-center md:items-start z-10">
            <h2 class="text-4xl md:text-4xl font-playfair font-semibold text-center md:text-start mb-3">
                {{ $book->title }}</h2>
            <p class="text-lg mb-5">Oleh <span class="capitalize font-semibold">{{ $book->author }}</span></p>

            <p class="font-crimson text-xl font-light max-w-lg mb-5 text-justify">{{ $book->description }}</p>

            <flux:separator class="mb-5" />

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
                            class="w-fit inline-flex items-center justify-center rounded-full {{ $book->status === 'available' ? 'bg-green-200' : 'bg-gray-200' }} px-2.5 py-0.5 text-black">
                            <i
                                class="{{ $book->status === 'available' ? 'fa-solid fa-circle-dot' : 'fa-solid fa-xmark' }} text-[8px] mr-1.5"></i>
                            <p class="text-sm font-semibold whitespace-nowrap">
                                {{ $book->status === 'available' ? 'Tersedia' : 'Dipinjam' }}
                            </p>
                        </span>
                    </td>

                    <td>Disimpan</td>
                    <td class="font-bold">{{ $book->savedByUsers->count() }}</td>
                </tr>
            </table>

            <div class="flex justify-center md:justify-start gap-3 h-10" x-data="{ borrowed: @js($isCurrentUserBorrowing) }">
                @if (($book->status === 'available' || $isCurrentUserBorrowing) && !$limitReach)
                    <button x-cloak @click="borrowed = !borrowed; runConfetti(borrowed); $wire.borrowBook()"
                        x-bind:disabled="borrowed"
                        class="relative text-primary bg-[#462e7a] w-44 rounded-md transition group">

                        <span
                            class="font-bold text-md cursor-pointer absolute inset-0 flex justify-center items-center rounded-md bg-[#FBFBFB] border-3 border-primary -translate-y-1.5 group-hover:-translate-y-2 transition group-active:translate-y-0"
                            :class="{ 'bg-primary text-custom-white': borrowed }">
                            <a href="{{ route('book.borrow') }}"
                                class="absolute inset-0 flex items-center justify-center z-10" x-show="borrowed">
                                Lihat Inventory ->
                            </a>
                            <span x-show="!borrowed">Pinjam Buku</span>
                        </span>

                    </button>
                @elseif ($book->status === 'borrowed' && !$isCurrentUserBorrowing)
                    <button x-cloak class="relative bg-gray-900 w-44 rounded-md transition group">
                        <span
                            class="font-bold text-md absolute inset-0 flex justify-center items-center rounded-md text-custom-white bg-gray-600 border-3 border-gray-600 cursor-not-allowed -translate-y-1.5 transition group-active:translate-y-0">
                            Buku Dipinjam :(
                        </span>
                    </button>
                @elseif ($limitReach)
                    <flux:tooltip content="Peminjaman buku sudah menyentuh batas maksimal">
                        <button x-cloak class="relative h-full bg-gray-400 w-44 rounded-md transition group">
                            <span
                                class="font-bold text-md absolute inset-0 flex justify-center items-center rounded-md text-gray-500 bg-gray-300 border-3 border-gray-400 cursor-not-allowed -translate-y-1.5 transition group-active:translate-y-0">
                                Limit Tercapai
                            </span>
                        </button>
                    </flux:tooltip>
                @endif
                <div class="flex gap-2" x-data="{ liked: @js($isLiked), saved: @js($isSaved) }">

                    <flux:tooltip content="Suka">
                        <button @click="liked = !liked; $wire.likeBook()" tooltip="Suka"
                            class="aspect-square bg-primary/15 h-full flex items-center justify-center rounded-md cursor-pointer">
                            <flux:icon.hand-thumb-up x-cloak x-show="liked" variant="solid"
                                class="text-primary animate-like" />
                            <flux:icon.hand-thumb-up x-show="!liked" variant="outline" class="text-primary" />
                        </button>
                    </flux:tooltip>

                    <flux:tooltip content="Simpan">
                        <button @click="saved = !saved; $wire.saveBook()" tooltip="Simpan"
                            class="aspect-square bg-primary/15 h-full flex items-center justify-center rounded-md cursor-pointer">
                            <flux:icon.bookmark x-cloak x-show="saved" variant="solid"
                                class="text-primary animate-like" />
                            <flux:icon.bookmark x-show="!saved" variant="outline" class="text-primary" />
                        </button>
                    </flux:tooltip>

                </div>
            </div>
        </div>
    </section>
</div>
