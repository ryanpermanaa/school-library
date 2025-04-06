<div class="flex-1">

    <section class="flex flex-col min-h-full gap-3 p-5 rounded-lg bg-[#FBFBFB] shadow-lg">

        <div class="">
            {{ $borrowings->links(data: ['scrollTo' => false]) }}
        </div>

        <div class="w-full overflow-x-auto overflow-y-hidden flex-1">
            <table class="table-auto w-full min-w-20 text-base">
                <thead
                    class="sticky top-0 rounded-lg ltr:text-left rtl:text-right z-20 before:absolute before:inset-0 before:bg-[#E9E0FF] before:rounded-md before:-z-10">
                    <tr class="*:font-semibold *:text-primary">
                        <th class="px-3 py-3 whitespace-nowrap pl-4">ID</th>
                        <th class="px-3 py-3 whitespace-nowrap">Judul Buku</th>
                        <th class="px-3 py-3 whitespace-nowrap">Status</th>
                        <th class="px-3 py-3 whitespace-nowrap">Tgl. Dipinjam</th>
                        <th class="px-3 py-3 whitespace-nowrap">Tgl. Tenggat</th>
                        <th class="px-3 py-3 whitespace-nowrap pr-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 *:even:bg-gray-100">

                    @foreach ($borrowings as $borrowment)
                        <x-book-table :$borrowment :book="$borrowment->book" wire:key="borrowed-book-{{ $borrowment->id }}" />
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>

</div>
