@props(['book', 'borrowment'])

@php
    $isOverdue = \Carbon\Carbon::parse($borrowment->due_date)->lessThan(now());

    if ($isOverdue) {
        $borrowment->update([
            'status' => 'overdue',
        ]);
    }
@endphp

<tr class="*:text-gray-900">
    <td class="px-3 py-2 whitespace-nowrap pl-4 opacity-40">{{ $book->id }}</td>
    <td class="px-3 py-2 whitespace-nowrap font-playfair font-bold flex items-center gap-4" x-data="{ hover: false }">
        <span class="relative group w-fit text-lg" x-on:mouseover="hover = true" x-on:mouseout="hover = false">
            {{ $book->title }}

            <div x-cloak x-show="hover" x-transition
                class="absolute bottom-1/2 translate-y-1/2 -right-36 z-30 w-28 bg-gray-300 p-2 shadow-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="triangle" x="0" y="0" version="1.1"
                    viewBox="0 0 20 20" class="absolute -left-7 top-1/2 -translate-y-1/2 size-12" fill="#d1d5dc">
                    <path d="M14 5v10l-9-5 9-5z"></path>
                </svg>

                <img src="{{ $book->cover_path }}" alt="" class="w-full">
            </div>
        </span>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <span
            class="w-fit inline-flex items-center justify-center rounded-full {{ !$isOverdue ? 'bg-green-200 text-green-800' : 'bg-red-100 text-red-800' }} px-2.5 py-0.5">
            <i
                class="{{ !$isOverdue ? 'fa-solid fa-circle-dot' : 'fa-solid fa-triangle-exclamation' }} text-[8px] mr-1.5"></i>
            <p class="text-sm font-regular whitespace-nowrap font-bold">
                {{ !$isOverdue ? 'Aman' : 'Terlambat' }}
            </p>
        </span>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <flux:tooltip content="{{ \Carbon\Carbon::parse($borrowment->borrowed_at)->diffForHumans() }}">
            <p>
                {{ \Carbon\Carbon::parse($borrowment->borrowed_at)->translatedFormat('l, j F Y') }}
            </p>
        </flux:tooltip>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <flux:tooltip content="{{ \Carbon\Carbon::parse($borrowment->due_date)->diffForHumans() }}">
            <p>
                {{ \Carbon\Carbon::parse($borrowment->due_date)->translatedFormat('l, j F Y') }}
            </p>
        </flux:tooltip>
    </td>
    <td class="px-3 py-2 whitespace-nowrap pr-4 flex items-center gap-1">
        <flux:button href="{{ route('book.details', $book->id) }}" wire:navigate icon="eye"
            class="cursor-pointer transition" size="sm" tooltip="Lihat Detail" :loading="false">
        </flux:button>
        <flux:button
            x-on:click="$wire.set('selectedBook', {{ $book->id }}); $wire.returnBook('{{ $borrowment->id }}'); ratingModal = true;"
            class="cursor-pointer transition hover:bg-primary! hover:text-custom-white!" size="sm"
            :loading="false">
            Kembalikan
        </flux:button>
    </td>
</tr>
