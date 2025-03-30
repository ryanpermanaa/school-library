<x-layouts.app title="Detail Buku" class="">

    <section
        class="flex flex-col xl:flex-row items-center gap-8 md:gap-18 p-5 px-6 md:px-19 rounded-lg bg-[#FBFBFB] w-full min-h-full mb-4 shadow-lg overflow-hidden">

        <div class="min-h-full relative flex-1 flex justify-center items-center w-full">
            <img class="w-3/4 md:w-xs shadow-3xl z-10" src="{{ $book->cover_path }}" alt="">
            <div class="absolute bg-gray-200 w-full aspect-square rounded-full"></div>
        </div>
        <div class="min-h-full flex-1 flex flex-col justify-center items-center md:items-start z-10">
            <h2 class="text-4xl md:text-5xl font-playfair font-semibold mb-3">{{ $book->title }}</h2>
            <p class="text-lg mb-5">Oleh <span class="capitalize font-semibold">{{ $book->author }}</span></p>

            <p class="font-crimson text-xl font-light max-w-lg mb-5 text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta numquam quisquam pariatur eos. Enim aut
                repellendus, at rem perferendis assumenda nobis officiis officia sequi delectus voluptate. Nulla
                consequatur expedita ullam!
            </p>

            <flux:separator class="mb-5" />

            <table class="w-full md:w-80 border-separate border-spacing-y-3 mb-7">
                <tr>
                    <td>Kategori</td>
                    <td>
                        <span class="whitespace-nowrap lowercase text-sm rounded-md font-bold px-2.5 py-1.5"
                            style="background-color: {{ $book->category->background_color }}; color: {{ $book->category->text_color }}">
                            {{ $book->category->name }}
                        </span>
                    </td>

                    <td>Disukai</td>
                    <td class="font-bold">{{ $book->likedByUsers->count() }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <span
                            class="w-fit inline-flex items-center justify-center rounded-full {{ $book->is_available ? 'bg-green-200' : 'bg-gray-200' }} px-2.5 py-0.5 text-black">
                            <i
                                class="{{ $book->is_available ? 'fa-solid fa-circle-dot' : 'fa-solid fa-xmark' }} text-[8px] mr-1.5"></i>
                            <p class="text-sm font-semibold whitespace-nowrap">
                                {{ $book->is_available ? 'Tersedia' : 'Dipinjam' }}
                            </p>
                        </span>
                    </td>

                    <td>Disimpan</td>
                    <td class="font-bold">{{ $book->savedByUsers->count() }}</td>
                </tr>
            </table>

            <div class="flex justify-center md:justify-start gap-3">
                <button x-data="{ borrowed: false }" x-on:click="borrowed = !borrowed; runConfetti(borrowed)"
                    class="relative text-primary bg-[#462e7a] w-44 rounded-md cursor-pointer transition group">
                    <span
                        class="font-bold text-md absolute inset-0 flex justify-center items-center rounded-md bg-[#FBFBFB] border-3 border-primary -translate-y-1.5 group-hover:-translate-y-2 transition group-active:translate-y-0"
                        :class="{ 'bg-primary text-custom-white': borrowed }">
                        <span x-show="borrowed">Lihat Buku -></span>
                        <span x-show="!borrowed">Pinjam Buku</span>
                    </span>
                </button>

                <div class="">
                    <flux:button square tooltip="Suka" class="bg-primary/15! cursor-pointer border-none! shadow-none">
                        <flux:icon.hand-thumb-up variant="outline" class="text-primary size-6 border-none" />
                    </flux:button>
                    <flux:button square tooltip="Simpan" class="bg-primary/15! cursor-pointer border-none! shadow-none">
                        <flux:icon.bookmark variant="outline" class="text-primary size-6 border-none" />
                    </flux:button>
                </div>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/@tsparticles/confetti@3.0.3/tsparticles.confetti.bundle.min.js"></script>
    <script>
        function runConfetti(borrowed) {
            if (!borrowed) return;

            const duration = 2000,
                animationEnd = Date.now() + duration,
                defaults = {
                    startVelocity: 30,
                    spread: 360,
                    ticks: 60,
                    zIndex: 0
                };

            function randomInRange(min, max) {
                return Math.random() * (max - min) + min;
            }

            const interval = setInterval(function() {
                const timeLeft = animationEnd - Date.now();

                if (timeLeft <= 0) {
                    return clearInterval(interval);
                }

                const particleCount = 50 * (timeLeft / duration);

                // since particles fall down, start a bit higher than random
                confetti(
                    Object.assign({}, defaults, {
                        particleCount,
                        origin: {
                            x: randomInRange(0.1, 0.3),
                            y: Math.random() - 0.2
                        },
                    })
                );
                confetti(
                    Object.assign({}, defaults, {
                        particleCount,
                        origin: {
                            x: randomInRange(0.7, 0.9),
                            y: Math.random() - 0.2
                        },
                    })
                );
            }, 250);
        }
    </script>

</x-layouts.app>
