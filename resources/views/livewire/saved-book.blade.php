<div>

    <section
        class="flex flex-col lg:flex-row items-center justify-between gap-7 p-5 rounded-lg bg-[#FBFBFB] w-full h-fit mb-3 shadow-lg">
        <h1 class="text-3xl font-playfair font-bold whitespace-nowrap">Buku yang disimpan</h1>

        <div class="relative flex bg-[#EEEDEF] border rounded-md shadow text-white text-sm" x-data="{ inputValue: '' }">
            <div aria-disabled="true" class="text-black w-10 grid place-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
            </div>

            <input type="text" x-model="inputValue" wire:model.live.debounce.400="search" spellcheck="false"
                name="text"
                class="text-black bg-transparent py-1.5 outline-none placeholder:text-zinc-400 h-9 w-60 transition-all"
                placeholder="Cari buku yang anda simpan..." />

            <button x-show="inputValue.length > 0" x-on:click="inputValue = ''; $wire.resetSearch()"
                class="absolute top-1/2 -translate-y-1/2 right-0 text-gray-800 w-8 h-full grid place-content-center cursor-pointer hover:text-red-700 bg-[#EEEDEF] border-l-2"
                aria-label="Clear input button" tooltip="Delete input" type="reset">
                <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor"
                    fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>

    </section>

    <section class="grid grid-cols-1 xl:grid-cols-2 gap-3 p-5 rounded-lg bg-[#FBFBFB] w-full h-fit mb-3 shadow-lg">

        @forelse ($books as $book)
            <div class="col-span-1 flex flex-col sm:flex-row min-w-50 items-center bg-white shadow-xl rounded-lg p-5 overflow-hidden"
                wire:key="saved-book-{{ $book->id }}">

                <img src="{{ $book->cover_path }}" alt="cover book of {{ $book->title }}"
                    class="shadow-3xl w-full mx-auto sm:w-1/3 mr-6 relative bottom-0 mb-4 sm:mb-auto sm:-bottom-7">

                <div class="">
                    <h4 class="font-playfair text-2xl font-bold mb-1">{{ $book->title }}</h4>
                    <h6 class="mb-5 opacity-40">
                        By <span class="capitalize italic font-semibold">{{ $book->author }}</span>
                    </h6>

                    <p class="mb-5 line-clamp-3 font-crimson text-xl">{{ $book->description }}</p>

                    <div class="flex gap-3 items-center">
                        <flux:button as="link" href="{{ route('book.details', $book->id) }}"
                            class="bg-primary! text-custom-white! px-7! hover:scale-105 transition"
                            :loading="false">
                            Lihat Detail
                        </flux:button>

                        <span
                            class="w-fit inline-flex items-center justify-center rounded-full {{ $book->is_available ? 'text-green-600' : 'text-red-600' }} px-2">
                            <i
                                class="{{ $book->is_available ? 'fa-solid fa-circle-dot' : 'fa-solid fa-xmark text-[10px]' }} text-[8px] mr-1.5"></i>
                            <p class="text-base italic font-semibold whitespace-nowrap">
                                {{ $book->is_available ? 'Tersedia' : 'Dipinjam' }}
                            </p>
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center col-span-2">Tidak ada buku ditemukkan :(</p>
        @endforelse

    </section>

</div>
