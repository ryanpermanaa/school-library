<div class="">

    <section class="px-5 py-6 rounded-lg bg-[#FBFBFB] w-full h-fit shadow-lg">

        <div @class([
            'w-full overflow-x-auto overflow-y-hidden flex-1 shadow-md rounded-md',
            // 'flex justify-center items-center' => $borrowings->isEmpty(),
        ])>
            <table class="table-auto w-full text-base">
                <thead
                    class="sticky top-0 rounded-lg ltr:text-left rtl:text-right z-20 before:absolute before:inset-0 before:bg-[#E9E0FF] before:rounded-tl-md rounded-tr-md before:-z-10">
                    <tr class="*:font-semibold *:text-primary text-base">
                        <th class="px-3 py-3 whitespace-nowrap pl-4 text-center">ID</th>
                        <th class="px-3 py-3 whitespace-nowrap">Tentang Buku</th>
                        <th class="px-3 py-3 whitespace-nowrap">Status</th>
                        <th class="px-3 py-3 whitespace-nowrap">Dipinjam Oleh</th>
                        <th class="px-3 py-3 whitespace-nowrap">Tgl. Tenggat</th>
                        <th class="px-3 py-3 whitespace-nowrap">Reputasi</th>
                        <th class="px-3 py-3 whitespace-nowrap pr-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 *:even:bg-gray-100">
                    @foreach ($books as $book)
                        <x-manage-book-table-item :$book wire:key="manage-book-{{ $book->id }}" />
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>

</div>
