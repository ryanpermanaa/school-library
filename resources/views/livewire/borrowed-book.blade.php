<div class="flex-1" x-data="{ ratingModal: false }">

    <x-alert model="returnSuccess">

        <x-alert-item type="success" x-show="result === true && !hideAlert">
            <x-slot:title>Buku berhasil dikembalikan!</x-slot:title>
            <x-slot:description>Buku berhasil dikembalikan ke perpustakaan.</x-slot:description>
        </x-alert-item>

        <x-alert-item type="error" x-show="result === false && !hideAlert">
            <x-slot:title>
                {{ $alertTitle ?? 'Buku gagal dikembalikan :(' }}
            </x-slot:title>
            <x-slot:description>
                Coba lagi nanti atau hubungi developer.
            </x-slot:description>
        </x-alert-item>

    </x-alert>

    <div x-cloak x-show="ratingModal && $wire.selectedBook !== null" x-transition.opacity
        class="fixed inset-0 bg-black/20 bg-opacity-75 transition-opacity z-20"></div>

    <div x-cloak x-show="ratingModal && $wire.selectedBook !== null" x-transition
        class="fixed left-[240px] inset-0 overflow-y-auto z-20">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                @click.away="ratingModal = false">
                <div class="p-4 sm:p-10 text-center overflow-y-auto">
                    <div x-on:click="ratingModal = false"
                        class="absolute right-8 top-8 cursor-pointer hover:text-red-600 transition">
                        <i class="fa-solid fa-xmark text-2xl"></i>
                    </div>

                    <x-svg.reading-book-while-sit class="mb-8 mx-auto" />

                    <h3 class="mb-2 text-2xl font-bold text-gray-800">
                        Beri rating untuk buku ini!
                    </h3>
                    <p class="text-gray-500">
                        Jika kamu sudah membaca buku ini, berikan tanggapan kamu mengenai buku ini.
                    </p>

                    <div class="mt-6 flex justify-center gap-x-3" x-data="{ liked: false, disliked: false }">
                        <div class="text-primary">
                            <flux:tooltip content="Suka">
                                <button id="like-button"
                                    x-on:click="liked = !liked; $wire.likeBook(); setTimeout(() => {ratingModal = false}, 1000);"
                                    tooltip="Suka"
                                    class="bg-primary/15 px-3 py-2 h-full flex gap-2 items-center justify-center rounded-md cursor-pointer">
                                    <flux:icon.hand-thumb-up x-show="liked" variant="solid" class="animate-like" />
                                    <flux:icon.hand-thumb-up x-show="!liked" variant="outline" />
                                    <p class="font-bold">Suka</p>
                                </button>
                            </flux:tooltip>
                        </div>
                        <div class="text-red-500">
                            <flux:tooltip content="Kurang Suka">
                                <button
                                    x-on:click="disliked = !disliked; $wire.dislikeBook(); setTimeout(() => {ratingModal = false}, 1000);"
                                    tooltip="Suka"
                                    class="bg-red-50 px-3 py-2 h-full flex gap-2 items-center justify-center rounded-md cursor-pointer">
                                    <flux:icon.hand-thumb-down x-show="disliked" variant="solid" />
                                    <flux:icon.hand-thumb-down x-show="!disliked" variant="outline" />
                                    <p class="font-bold">Kurang</p>
                                </button>
                            </flux:tooltip>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <section class="flex flex-col min-h-full gap-3 p-5 rounded-lg bg-[#FBFBFB] shadow-lg">

        <div class="">
            {{ $borrowings->links(data: ['scrollTo' => false]) }}
        </div>

        <div @class([
            'w-full overflow-x-auto overflow-y-hidden flex-1',
            'flex justify-center items-center' => $borrowings->isEmpty(),
        ])>

            @if (!$borrowings->isEmpty())
                <table class="table-auto w-full min-w-20 text-base">
                    <thead
                        class="sticky top-0 rounded-lg ltr:text-left rtl:text-right z-10 before:absolute before:inset-0 before:bg-[#E9E0FF] before:rounded-md before:-z-10">
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
                            <x-book-table-item :$borrowment :book="$borrowment->book"
                                wire:key="borrowed-book-{{ $borrowment->id }}" />
                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="mb-8">
                    <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="200" viewBox="0 0 709.78574 788.7365" role="img" artist="Katerina Limpitsouni"
                        source="https://undraw.co/">
                        <circle cx="354.89287" cy="354.89287" r="354.89287" fill="#f2f2f2" />
                        <path
                            d="M311.65049,314.77666s-139.55047,60.75247-45.22219,150.97824,116.48142-91.63607,116.48142-91.63607l-71.25923-59.34217Z"
                            fill="#090814" />
                        <path
                            d="M270.20536,292.07739c0-53.0252,42.93874-96.01072,95.90624-96.01072,52.96786,0,95.9066,42.98552,95.9066,96.01072,0,43.00381-28.24408,79.39916-67.17303,91.62206l-18.54033,122.66305-94.51625-78.84923s20.41837-26.03639,31.36841-55.39388c-25.88049-17.19378-42.95164-46.61655-42.95164-80.042Z"
                            fill="#ed9da0" />
                        <path
                            d="M398.96168,391.82972l-95.69729-4.7684s-.59344,18.82423-71.4482,28.61042c0,0-86.31761,21.77902-86.38054,84.05746l-12.34789,184.70706,449.04114.86698-29.44532-220.21351s-16.83167-42.51477-76.64444-53.7529c0,0-57.31898-.46613-77.07746-19.5071Z"
                            fill="#7353ba" />
                        <path
                            d="M411.95226,658.42678s-64.4638-71.77543-176.2389-99.70297l-22.64565,44.64925,204.69971,86.01453,240.94669-72.19707s-33.01067-33.5736-66.62577-46.32895c0,0-159.07855,41.58251-180.13608,87.56521Z"
                            fill="#e6e6e6" />
                        <path
                            d="M675.21825,606.83694l-43.25807,70.22557-28.58562,46.38795-45.98685,12.7576-151.07451,41.86228c-29.3839,22.94037-46.7661,1.73616-46.7661,1.73616l-99.29994-38.01944-51.46155-19.72165-7.71633-2.94559.19505-3.64782,2.82488-54.87349,3.46807-67.20199,199.205,76.29237c21.70658,16.01525,30.30015-1.71663,30.30015-1.71663l238.15582-61.13531Z"
                            fill="#090814" />
                        <path
                            d="M634.52869,697.24341l-18.20362,28.47414c-1.89824,2.96924-4.65739,5.28698-7.90795,6.64286l-29.92766,12.48344c-7.57894,3.16133-16.33357.55916-20.9445-6.24177-6.70749-9.89326-13.25638-22.83758-13.42725-30.05508-.52616-23.52556,22.05767-43.13017,50.44919-43.77394,8.51022-.20474,20.8635,2.84063,31.57359,6.97791,10.22253,3.94893,14.29471,16.25344,8.38819,25.49244Z"
                            fill="#ed9da0" />
                        <path
                            d="M299.68703,710.41972c-3.89717,17.26374-19.95399,29.18255-39.43987,31.36733-6.42996.74128-13.23098.40969-20.10908-1.15085-13.05496-2.94559-24.00625-9.77308-31.35247-18.5708-1.5975-1.87272-3.02088-3.82343-4.24826-5.85213l-5.95514.38185c-6.87399.44077-12.59546-5.21593-12.24094-12.10237l1.56067-30.31615c.32966-6.40363,5.81385-11.30841,12.20708-10.9174l16.13984.98712c11.34044-7.41267,26.81211-10.31921,42.65389-6.72985,27.70933,6.2617,45.96782,29.94335,40.78428,52.90325Z"
                            fill="#ed9da0" />
                        <path
                            d="M133.08775,684.43625l36.14436,35.01392c6.13422,5.94237,16.4037,1.67023,16.49305-6.87463.24447-23.37937,3.28756-55.3811,18.36405-51.97703l-63.43939-12.24562-7.56207,36.08336Z"
                            fill="#7353ba" />
                        <path
                            d="M340.46221,155.05107c-20.97214-4.04322-43.54644,1.09925-60.70598,13.82896-17.15954,12.7297-28.64413,32.85361-30.88393,54.11648-9.25913,1.47374-14.50051,11.96709-14.60546,21.35214-.10496,9.38506,3.3039,18.45259,4.19066,27.79616.62876,6.62509-.01275,13.3724,1.26243,19.90373,1.27517,6.53134,5.06986,13.17124,11.39217,15.22775-9.99518,4.87833-9.80966,21.1421-.96613,27.8905,8.84354,6.7484,22.18171,4.71912,30.89619-2.19549,8.71448-6.91461,13.58686-17.58675,16.81159-28.24029s5.13842-21.7435,9.4996-31.98354c12.56976-29.5138,46.79905-48.04236,78.35118-42.41205,31.55213,5.63031,57.27819,34.85758,58.8872,66.9015.47724,9.50443-.45914,20.38445,6.29771,27.07832,9.31796,9.23111,25.69165,2.77488,34.2397-7.17492,11.06137-12.87527,15.92224-30.86143,12.85434-47.56355-3.0679-16.70212-14.00219-31.78065-28.91522-39.87446-3.04812-29.47984-20.6426-57.09712-46.0584-72.29583-25.4158-15.19872-58.04689-17.61647-85.42086-6.32913"
                            fill="#090814" />
                    </svg>
                    <p class="mt-10 max-w-sm text-xl text-center font-semibold">
                        Belum ada buku yang dipinjam
                    </p>
                    <p class="mt-2 max-w-sm text-lg text-center font-light">
                        Disini adalah tempat anda mengelola buku yang anda pinjam
                    </p>
                </div>
            @endif
        </div>
    </section>

</div>
