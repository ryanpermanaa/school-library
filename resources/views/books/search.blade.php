<x-layouts.app title="Cari Buku" class="">

    <section class="flex justify-center p-4 rounded-lg bg-[#FBFBFB] w-full h-fit mb-4 shadow-lg">
        <h1 class="text-3xl font-playfair font-bold whitespace-nowrap">Pencarian Buku</h1>
    </section>

    <section class="p-4 rounded-lg bg-[#FBFBFB] w-full h-fit mb-4 shadow-lg">
        <div class="flex gap-2">
            <div class="flex flex-1 gap-1 w-full">
                <div class="relative w-full rounded-sm">
                    <label for="Search" class="sr-only"> Search </label>
                    <input type="text" id="Search" placeholder="Cari buku kesukaan anda"
                        class="w-full h-full rounded-md bg-[#EEEDEF] px-3 shadow-xs sm:text-sm focus:outline-none" />
                </div>
                <flux:button icon="magnifying-glass"
                    class="transition! aspect-square! bg-primary! text-white! min-h-full! cursor-pointer! hover:bg-[#51358F]!" />
            </div>
            <div class="w-fit">
                <x-select :options="[
                    0 => 'Teknologi',
                    1 => 'Sains',
                    2 => 'Bisnis',
                    4 => 'Kesehatan',
                    5 => 'Pendidikan',
                    6 => 'Gaya Hidup',
                    7 => 'Hiburan',
                    8 => 'Sejarah',
                    9 => 'Olahraga',
                    10 => 'Perjalanan',
                    11 => 'Spiritualitas',
                ]" type="multi-select" placeholder="Pilih Kategori" name="category" />
            </div>
            <div class="w-fit">
                <x-select :options="[
                    0 => 'Terbaru',
                    1 => 'Terlama',
                    2 => 'Paling Populer',
                    3 => 'Terbanyak Disimpan',
                ]" type="single-select" placeholder="Urutkan Pencarian" name="sortType" />
            </div>
            <div class="w-fit">
                <x-select :options="[
                    0 => 'Dipinjam',
                    1 => 'Tersedia',
                ]" type="single-select" placeholder="Status Buku" name="sortType" />
            </div>
        </div>
    </section>

</x-layouts.app>
