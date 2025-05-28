<div class="" x-data="{ deleteModal: false, bookTitle: '' }">

    <x-alert model="returnSuccess">

        <x-alert-item type="success" x-show="result === true && !hideAlert">
            <x-slot:title>
                {{ $alertTitle ?? 'Buku berhasil dikembalikan!' }}
            </x-slot:title>
            <x-slot:description>
                {{ $alertDescription ?? 'Buku berhasil dikembalikan ke perpustakaan.' }}
            </x-slot:description>
        </x-alert-item>

        <x-alert-item type="error" x-show="result === false && !hideAlert">
            <x-slot:title>
                {{ $alertTitle ?? 'Buku gagal dikembalikan :(' }}
            </x-slot:title>
            <x-slot:description>
                {{ $alertDescription ?? 'Coba lagi nanti atau hubungi developer.' }}
            </x-slot:description>
        </x-alert-item>

    </x-alert>

    <div x-cloak x-show="deleteModal" x-transition.opacity
        class="fixed md:left-[240px] inset-0 text-white bg-black/20 z-30">
        <div x-show="deleteModal" x-transition
            class="flex h-screen items-center justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg aria-hidden="true" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                fill="none" class="h-6 w-6 text-red-600">
                                <path
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"
                                    stroke-linejoin="round" stroke-linecap="round"></path>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 id="modal-title" class="text-lg font-semibold leading-6 text-gray-900">
                                Penghapusan Buku
                            </h3>
                            <div class="mt-2">
                                <p class="text-md text-gray-500">
                                    Apakah anda yakin untuk menghapus buku dengan judul
                                    "<span class="font-medium whitespace-nowrap" x-text="bookTitle"></span>"
                                    dari data? Semua data peminjaman juga akan dihapus.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button x-on:click="deleteModal = false" wire:click="deleteBook"
                        class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto cursor-pointer"
                        type="button">
                        Hapus
                    </button>
                    <button x-on:click="deleteModal = false"
                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto cursor-pointer"
                        type="button">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <section class="px-5 py-6 rounded-lg bg-[#FBFBFB] w-full h-fit shadow-lg">

        <div class="flex flex-col md:flex-row gap-2 mb-5">
            <div class="flex gap-1 h-full w-full">
                <div class="relative w-full rounded-sm">
                    <label for="Search" class="sr-only"> Search </label>
                    <input type="text" wire:model.change="key" name="key" id="Search" placeholder="Cari buku"
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
            </div>

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
                    <x-select :options="['Tersedia', 'Dipinjam', 'Terlambat']" type="single-select" :entangle="'statusType'" name="statusType"
                        placeholder="Status Buku" />
                </div>
            </div>
        </div>

        <div class="mb-4">
            {{ $books->links(data: ['scrollTo' => false]) }}
        </div>

        <div @class([
            'w-full overflow-x-auto overflow-y-hidden flex-1 shadow-md rounded-md',
            // 'flex justify-center items-center' => $borrowings->isEmpty(),
        ])>
            <table class="table-auto w-full text-base">

                <colgroup>
                    <col>
                    <col class="min-w-[22rem]">
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                </colgroup>

                <thead
                    class="sticky top-0 rounded-lg ltr:text-left rtl:text-right z-10 before:absolute before:inset-0 before:bg-[#F0EBFD] before:rounded-tl-md rounded-tr-md before:-z-10">
                    <tr class="*:font-semibold *:text-primary text-base">
                        <th class="px-3 py-5 whitespace-nowrap pl-4 text-center">ID</th>
                        <th class="px-3 py-5 whitespace-nowrap">Tentang Buku</th>
                        <th class="px-3 py-5 whitespace-nowrap">Status</th>
                        <th class="px-3 py-5 whitespace-nowrap">Dipinjam Oleh</th>
                        <th class="px-3 py-5 whitespace-nowrap">Tgl. Tenggat</th>
                        <th class="px-3 py-5 whitespace-nowrap">Reputasi</th>
                        <th class="px-3 py-5 whitespace-nowrap pr-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 *:even:bg-gray-100">
                    @foreach ($books as $book)
                        <x-manage-book-table-item :$book :is-last="$loop->last" wire:key="manage-book-{{ $book->id }}" />
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>

</div>
