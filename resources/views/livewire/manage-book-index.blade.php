<div class="">

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

    <section class="px-5 py-6 rounded-lg bg-[#FBFBFB] w-full h-fit shadow-lg">

        <div class="mb-4">
            {{ $books->links(data: ['scrollTo' => false]) }}
        </div>

        <div @class([
            'w-full overflow-x-auto overflow-y-hidden flex-1 shadow-md rounded-md',
            // 'flex justify-center items-center' => $borrowings->isEmpty(),
        ])>
            <table class="table-auto w-full text-base">
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
