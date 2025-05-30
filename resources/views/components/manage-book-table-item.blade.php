@props(['book', 'isLast' => false])

@php
    $hasNeverBorrowed = $book->borrowings->isEmpty();
    $isAvailable = $book->status === 'available';
    $isOverdue = $book->status === 'overdue';

    $returnedDate = Carbon\Carbon::parse($book->borrowings->first()?->returned_at)->translatedFormat('d/m/Y');
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

<tr class="*:text-gray-900">
    <td class="px-3 py-2 whitespace-nowrap pl-4 text-center opacity-40">{{ $book->id }}</td>

    {{-- ? Book Description --}}
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

    {{-- ? Book Status --}}
    <td class="px-3 py-2 whitespace-nowrap">

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
                <p class="text-xs font-semibold whitespace-nowrap">
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
                class="absolute z-10 -top-8 left-1/2 -translate-x-1/2 bg-zinc-800 text-white text-xs py-1.5 px-2 rounded-md whitespace-nowrap">

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

    {{-- ? Book Borrower --}}
    <td class="px-3 py-2 whitespace-nowrap">
        @if ($currentBorrowing !== null)
            <div class="flex items-center gap-2">
                <div class="">
                    <h4 class="text-base/tight font-semibold">{{ $book->currentBorrowing->user->name }}</h4>
                    <p class="text-xs/tight opacity-70">
                        {{ $book->currentBorrowing->user->is_admin ? 'Admin' : 'Regular User' }}</p>
                </div>
            </div>
        @else
            -
        @endif
    </td>

    {{-- ? Due Date --}}
    <td class="px-3 py-2 whitespace-nowrap">
        @if ($currentBorrowing !== null)
            <flux:tooltip content="{{ \Carbon\Carbon::parse($currentBorrowing->due_date)->diffForHumans() }}">
                <p>{{ \Carbon\Carbon::parse($currentBorrowing->due_date)->translatedFormat('j F Y') }}</p>
            </flux:tooltip>
        @else
            -
        @endif
    </td>

    {{-- ? Reputation --}}
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex gap-4 w-fit text-sm border-2 px-3 py-2 rounded-md">
            <div class="flex items-center gap-1.5 font-bold text-green-700">
                <flux:icon.hand-thumb-up variant="micro" />
                {{ $book->likedByUsers->count() }}
            </div>
            <div class="flex items-center gap-1.5 font-bold text-red-700">
                <flux:icon.hand-thumb-down variant="micro" />
                {{ $book->dislikedByUsers->count() }}
            </div>
        </div>
    </td>

    {{-- ? Book Action --}}
    <td class="px-3 py-2 whitespace-nowrap pr-4 gap-1">
        <div class="flex items-center gap-2">
            <flux:button as="link" href="{{ route('book.details', $book->id) }}" wire:navigate>
                Lihat Detail
            </flux:button>

            <div class="relative" x-data="{ actionOpen: false }">
                <flux:button icon="ellipsis-horizontal" class="cursor-pointer" x-on:click="actionOpen = !actionOpen" />

                <div x-cloak x-show="actionOpen" x-transition @click.outside="actionOpen = false"
                    @class([
                        'absolute right-0 bg-gray-50 py-2 rounded-lg z-10 shadow-lg',
                        'top-12' => !$isLast,
                        'bottom-12' => $isLast,
                    ])>
                    <ul class="[&_li]:hover:bg-gray-100 [&_li]:px-4 [&_li]:py-1 min-w-52">
                        @if (in_array($status, ['borrowed', 'overdue']))
                            <li>
                                <button class="cursor-pointer w-full text-start"
                                    x-on:click="$wire.markAsReturned({{ $book->id }})">
                                    <i class="fa-regular fa-circle-check mr-2"></i>
                                    Tandai sudah dikembalikan
                                </button>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('admin.kelola-buku.edit', $book->id) }}" wire:navigate
                                class="block cursor-pointer w-full text-start">
                                <i class="fa-regular fa-pen-to-square mr-2"></i>
                                Edit buku
                            </a>
                        </li>
                        <li>
                            <button x-on:click="deleteModal = true; bookTitle = '{{ $book->title }}'"
                                wire:click="$set('selectedBook', {{ $book->id }})"
                                class="cursor-pointer w-full text-red-600 text-start">
                                <i class="fa-regular fa-trash-can mr-2.5"></i>
                                Hapus buku
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </td>
</tr>
