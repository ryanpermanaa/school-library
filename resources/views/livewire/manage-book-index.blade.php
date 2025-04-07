<div class="">

    <section class="px-5 py-6 rounded-lg bg-[#FBFBFB] w-full h-fit shadow-lg">

        <div @class([
            'w-full overflow-x-auto overflow-y-hidden flex-1',
            // 'flex justify-center items-center' => $borrowings->isEmpty(),
        ])>
            <table class="table-auto w-full text-base">
                <thead
                    class="sticky top-0 rounded-lg ltr:text-left rtl:text-right z-20 before:absolute before:inset-0 before:bg-[#E9E0FF] before:rounded-md before:-z-10">
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

                    <tr class="*:text-gray-900">
                        <td class="px-3 py-2 whitespace-nowrap pl-4 text-center opacity-40">1</td>

                        <td class="px-3 py-2 whitespace-nowrap pl-4 flex items-center">
                            <div class="flex items-center">
                                <img src="{{ $book->cover_path }}" class="w-12 h-fit mr-4 shadow-3xl" alt="">
                                <div class="flex flex-col justify-center gap-2">
                                    <p
                                        class="text-[22px]/tight font-semibold font-playfair max-w-full sm:max-w-64 whitespace-normal">
                                        {{ $book->title }}
                                    </p>
                                    <span
                                        class="lowercase whitespace-nowrap rounded-md text-xs w-fit font-semibold px-2 py-1"
                                        style="background-color: {{ $book->category->background_color }}; color: {{ $book->category->text_color }}">
                                        {{ $book->category->name }}
                                    </span>
                                </div>
                            </div>
                        </td>

                        <td class="px-3 py-2 whitespace-nowrap">
                            @php
                                $hasNeverBorrowed = app\Models\Borrowing::where('book_id', $book->id)->doesntExist();
                                $isAvailable = $book->is_available;
                                $isOverdue = \Carbon\Carbon::parse($book->currentBorrowing?->due_date)->lessThan(now());

                                $returnedDate = Carbon\Carbon::parse(
                                    $book->borrowings()->latest()->first()->returned_at,
                                )->translatedFormat('d/m/Y');
                                $currentBorrowing = $book->currentBorrowing;

                                if ($hasNeverBorrowed) {
                                    $status = 'never';
                                } elseif ($isAvailable) {
                                    $status = 'available';
                                } elseif ($isOverdue) {
                                    $status = 'overdue';
                                } elseif (!$isAvailable) {
                                    $status = 'borrowed';
                                }

                                // $status = 'overdue';

                            @endphp

                            <div class="relative w-fit" x-data="{ openTooltip: false }" @click.outside="openTooltip = false">

                                <span @class([
                                    'inline-flex items-center space-x-1 px-2.5 py-1 rounded-full cursor-pointer',
                                    'bg-blue-100 text-blue-800' => $status === 'never',
                                    'bg-green-100 text-green-800' => $status === 'available',
                                    'bg-gray-200 text-gray-800' => $status === 'borrowed',
                                    'bg-red-100 text-red-800' => $status === 'overdue',
                                ]) @click="openTooltip = !openTooltip">
                                    <i @class([
                                        'text-xs mr-2',
                                        'fa-solid fa-book' => $status === 'never',
                                        'fa-solid fa-check' => $status === 'available',
                                        'fa-solid fa-clock' => $status === 'borrowed',
                                        'fa-solid fa-triangle-exclamation' => $status === 'overdue',
                                    ])></i>
                                    <p class="text-sm font-semibold whitespace-nowrap">
                                        @if ($status === 'never')
                                            Belum Dipinjam
                                        @elseif ($status === 'available')
                                            Tersedia
                                        @elseif ($status === 'borrowed')
                                            Dipinjam
                                        @elseif ($status === 'overdue')
                                            Terlambat
                                        @endif
                                    </p>
                                </span>

                                <div x-cloak x-show="openTooltip" x-transition.opacity
                                    class="absolute -top-8 left-1/2 -translate-x-1/2 bg-zinc-800 text-white text-xs py-1.5 px-2 rounded-md whitespace-nowrap">

                                    @if ($status === 'available')
                                        Dikembalikkan <span class="font-semibold">{{ $returnedDate }}</span>
                                    @elseif ($status === 'borrowed')
                                        Dipinjam
                                        <span class="font-semibold">
                                            {{ \Carbon\Carbon::parse($currentBorrowing->borrowed_at)->diffForHumans() }}
                                        </span>
                                    @elseif ($status === 'overdue')
                                        Terlambat dikembalikkan
                                        <span class="font-semibold">
                                            {{ \Carbon\Carbon::parse($currentBorrowing->due_date)->diffForHumans() }}
                                        </span>
                                    @else
                                        Belum ada riwayat pinjam.
                                    @endif
                                </div>
                            </div>

                        </td>

                        <td class="px-3 py-2 whitespace-nowrap">Lorem Ipsum</td>

                        <td class="px-3 py-2 whitespace-nowrap">10/10/2002</td>

                        <td class="px-3 py-2 whitespace-nowrap">-</td>

                        <td class="px-3 py-2 whitespace-nowrap pr-4 flex items-center gap-1">[]</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </section>

</div>
