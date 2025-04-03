@props(['book'])

<tr class="*:text-gray-900">
    <td class="px-3 py-2 whitespace-nowrap pl-4 opacity-40">{{ $book->id }}</td>
    <td class="relative px-3 py-2 whitespace-nowrap font-playfair font-bold">
        <span class="group">
            {{ $book->title }}

            <div
                class="hidden group-hover:block absolute top-14 left-0 -right-20 z-20 w-full md:w-3/6 bg-gray-300 p-2 shadow-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                    class="absolute left-1/2 -translate-1/2 top-0 size-12" fill="#d1d5dc">
                    <path
                        d="M182.6 137.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9s16.6 19.8 29.6 19.8l256 0c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z" />
                </svg>

                <img src="{{ $book->cover_path }}" alt="" class="w-full">
            </div>
        </span>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <span
            class="w-fit inline-flex items-center justify-center rounded-full {{ $book->is_available ? 'bg-green-200' : 'bg-gray-200' }} px-2.5 py-0.5 text-black">
            <i class="{{ $book->is_available ? 'fa-solid fa-circle-dot' : 'fa-solid fa-xmark' }} text-[8px] mr-1.5"></i>
            <p class="text-sm font-regular whitespace-nowrap">
                {{ $book->is_available ? 'Tersedia' : 'Dipinjam' }}
            </p>
        </span>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <flux:tooltip content="{{ \Carbon\Carbon::parse($book->borrowings->first()->borrowed_at)->diffForHumans() }}">
            <p>
                {{ \Carbon\Carbon::parse($book->borrowings->first()->borrowed_at)->translatedFormat('l, j F Y') }}
            </p>
        </flux:tooltip>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <flux:tooltip content="{{ \Carbon\Carbon::parse($book->borrowings->first()->due_date)->diffForHumans() }}">
            <p>
                {{ \Carbon\Carbon::parse($book->borrowings->first()->due_date)->translatedFormat('l, j F Y') }}
            </p>
        </flux:tooltip>
    </td>
    <td class="px-3 py-2 whitespace-nowrap pr-4 flex gap-1">
        <flux:button href="{{ route('book.details', $book->id) }}" icon="eye" class="cursor-pointer transition"
            size="sm" tooltip="Lihat Detail">
        </flux:button>
        <flux:button icon="arrow-uturn-left" class="cursor-pointer" size="sm" tooltip="Kembalikan Buku">
        </flux:button>
    </td>
</tr>
