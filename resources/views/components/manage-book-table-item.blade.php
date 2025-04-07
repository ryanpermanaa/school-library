@props(['book'])

<tr class="*:text-gray-900">
    <td class="px-3 py-2 whitespace-nowrap pl-4 text-center opacity-40">{{ $book->id }}</td>

    <td class="px-3 py-2 whitespace-nowrap pl-4 flex items-center">
        <div class="flex items-center">
            <img src="{{ $book->cover_path }}" class="w-12 h-fit mr-4 shadow-3xl" alt="">
            <div class="flex flex-col justify-center gap-2">
                <h2 class="text-[22px]/tight font-semibold font-playfair max-w-full sm:max-w-64 whitespace-normal">
                    {{ $book->title }}
                </h2>
                <span class="lowercase whitespace-nowrap rounded-md text-xs w-fit font-semibold px-2 py-1"
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
                $book->borrowings()->latest()->first()?->returned_at,
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

    <td class="px-3 py-2 whitespace-nowrap">

        @if ($currentBorrowing !== null)
            @php
                $user = $book->currentBorrowing->user;
            @endphp

            <div class="flex items-center gap-2">
                <span class="relative flex h-8 aspect-square shrink-0 overflow-hidden rounded-xs">
                    <span
                        class="flex font-bold h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                        {{ auth()->user()->initials() }}
                    </span>
                </span>
                <div class="">
                    <h4 class="text-lg/tight font-semibold">{{ $user->name }}</h4>
                    <p class="text-sm/tight opacity-60">
                        {{ $user->is_admin ? 'Admin' : 'Regular User' }}</p>
                </div>
            </div>
        @else
            &HorizontalLine;
        @endif
    </td>

    <td class="px-3 py-2 whitespace-nowrap">
        @if ($currentBorrowing !== null)
            <flux:tooltip content="{{ \Carbon\Carbon::parse($currentBorrowing->due_date)->diffForHumans() }}">
                <p>{{ \Carbon\Carbon::parse($currentBorrowing->due_date)->translatedFormat('l, j F Y') }}</p>
            </flux:tooltip>
        @else
            &HorizontalLine;
        @endif
    </td>

    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex gap-4 w-fit border-2 px-3 py-2 rounded-md">
            <div class="flex items-center gap-1.5 font-bold text-green-700">
                <flux:icon.hand-thumb-up variant="mini" />
                {{ $book->likedByUsers->count() }}
            </div>
            <div class="flex items-center gap-1.5 font-bold text-red-700">
                <flux:icon.hand-thumb-down variant="mini" />
                {{ $book->dislikedByUsers->count() }}
            </div>
        </div>
    </td>

    <td class="px-3 py-2 whitespace-nowrap pr-4 flex items-center gap-1">[]</td>
</tr>
