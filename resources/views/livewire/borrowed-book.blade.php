<div class="flex gap-2.5">

    <div class="">
        <section
            class="flex flex-col lg:flex-row items-center justify-between gap-7 p-5 rounded-lg bg-[#FBFBFB] w-full h-fit mb-3 shadow-lg">
            <h1 class="text-3xl font-playfair font-bold whitespace-nowrap">Buku yang dipinjam</h1>

            <flux:button href="{{ route('book.explore') }}" icon:trailing="arrow-up-right"
                class="bg-primary! text-custom-white!">
                Jalajahi Buku
            </flux:button>
        </section>

        <section
            class="flex flex-col lg:flex-row items-center justify-between gap-7 p-5 rounded-lg bg-[#FBFBFB] w-full h-fit mb-3 shadow-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y-2 divide-gray-400">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr class="*:font-bold *:text-gray-900">
                            <th class="px-3 py-2 whitespace-nowrap">Name</th>
                            <th class="px-3 py-2 whitespace-nowrap">DoB</th>
                            <th class="px-3 py-2 whitespace-nowrap">Role</th>
                            <th class="px-3 py-2 whitespace-nowrap">Salary</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 *:even:bg-gray-50">
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-nowrap">Nandor the Relentless</td>
                            <td class="px-3 py-2 whitespace-nowrap">04/06/1262</td>
                            <td class="px-3 py-2 whitespace-nowrap">Vampire Warrior</td>
                            <td class="px-3 py-2 whitespace-nowrap">$0</td>
                        </tr>

                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-nowrap">Laszlo Cravensworth</td>
                            <td class="px-3 py-2 whitespace-nowrap">19/10/1678</td>
                            <td class="px-3 py-2 whitespace-nowrap">Vampire Gentleman</td>
                            <td class="px-3 py-2 whitespace-nowrap">$0</td>
                        </tr>

                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-nowrap">Nadja</td>
                            <td class="px-3 py-2 whitespace-nowrap">15/03/1593</td>
                            <td class="px-3 py-2 whitespace-nowrap">Vampire Seductress</td>
                            <td class="px-3 py-2 whitespace-nowrap">$0</td>
                        </tr>

                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-nowrap">Colin Robinson</td>
                            <td class="px-3 py-2 whitespace-nowrap">01/09/1971</td>
                            <td class="px-3 py-2 whitespace-nowrap">Energy Vampire</td>
                            <td class="px-3 py-2 whitespace-nowrap">$53,000</td>
                        </tr>

                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-nowrap">Guillermo de la Cruz</td>
                            <td class="px-3 py-2 whitespace-nowrap">18/11/1991</td>
                            <td class="px-3 py-2 whitespace-nowrap">Familiar/Vampire Hunter</td>
                            <td class="px-3 py-2 whitespace-nowrap">$0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <section
        class="flex flex-col items-center justify-between gap-7 p-5 rounded-lg bg-[#FBFBFB] w-full h-fit mb-3 shadow-lg">
        <h4>Tampilan Buku</h4>
        <div class=""></div>

        <img src="" alt="">

        <flux:button href="" class="bg-primary! text-custom-white!"> Lihat Detail -> </flux:button>

        <div class="flex gap-2 h-9" x-data="{ liked: @js($isLiked), disliked: @js($isDisliked), saved: @js($isSaved) }">

            <flux:tooltip content="Suka">
                <button @click="liked = !liked; $wire.likeBook()"
                    class="bg-primary/15 h-full px-2 flex gap-2 items-center justify-center rounded-md cursor-pointer">
                    <flux:icon.hand-thumb-up x-show="liked" variant="solid" class="text-primary animate-like" />
                    <flux:icon.hand-thumb-up x-show="!liked" variant="outline" class="text-primary" />

                    <p class="text-primary font-semibold">{{ $book->likedByUsers()->count() }}</p>
                </button>
            </flux:tooltip>

            <flux:tooltip content="Tidak Suka">
                <button @click="liked = !liked; $wire.dislikeBook()"
                    class="bg-primary/15 h-full px-2 flex gap-2 items-center justify-center rounded-md cursor-pointer">
                    <flux:icon.hand-thumb-down x-show="disliked" variant="solid" class="text-primary animate-like" />
                    <flux:icon.hand-thumb-down x-show="!disliked" variant="outline" class="text-primary" />
                </button>
            </flux:tooltip>

            <flux:tooltip content="Simpan">
                <button @click="saved = !saved; $wire.saveBook()"
                    class="aspect-square bg-primary/15 h-full flex items-center justify-center rounded-md cursor-pointer">
                    <flux:icon.bookmark x-show="saved" variant="solid" class="text-primary animate-like" />
                    <flux:icon.bookmark x-show="!saved" variant="outline" class="text-primary" />
                </button>
            </flux:tooltip>

        </div>
    </section>

</div>
