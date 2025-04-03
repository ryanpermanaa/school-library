<div class="flex-1">

    <section class="flex flex-col min-h-full gap-3 p-5 rounded-lg bg-[#FBFBFB] shadow-lg">

        <div class="">
            {{ $borrowings->links(data: ['scrollTo' => false]) }}
        </div>

        <div class="w-full overflow-x-auto overflow-y-hidden flex-1">
            <table class="table-auto w-full min-w-20 text-base">
                <colgroup>
                    <col span="1" style="width: 5%;">
                </colgroup>

                <thead
                    class="sticky top-0 rounded-lg ltr:text-left rtl:text-right before:absolute before:inset-0 before:bg-primary/10 before:rounded-md">
                    <tr class="*:font-semibold *:text-primary">
                        <th class="px-3 py-3 whitespace-nowrap pl-4">ID</th>
                        <th class="px-3 py-3 whitespace-nowrap">Judul Buku</th>
                        <th class="px-3 py-3 whitespace-nowrap">Status</th>
                        <th class="px-3 py-3 whitespace-nowrap">Tgl. Dipinjam</th>
                        <th class="px-3 py-3 whitespace-nowrap">Tgl. Tenggat</th>
                        <th class="px-3 py-3 whitespace-nowrap pr-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                    @foreach ($borrowings as $borrowment)
                        <x-book-table :book="$borrowment->book" wire:key="borrowed-book-{{ $borrowment->id }}" />
                        <x-book-table :book="$borrowment->book" wire:key="borrowed-book-{{ $borrowment->id }}" />
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>

</div>
