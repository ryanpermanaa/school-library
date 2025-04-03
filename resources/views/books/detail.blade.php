<x-layouts.app title="Detail Buku" class="">

    <section
        class="relative flex flex-col xl:flex-row items-center gap-8 md:gap-18 p-5 px-6 md:px-19 rounded-lg bg-[#FBFBFB] w-full min-h-full mb-4 shadow-lg overflow-hidden">

        <flux:button href="{{ url()->previous() }}" square tooltip="Back"
            class="absolute! left-3 top-3 bg-primary/20! text-primary!">
            <flux:icon.arrow-left-circle variant="solid" class="size-8" />
        </flux:button>

        <div class="min-h-full relative flex-1 flex justify-center items-center w-full">
            <img class="w-3/4 md:w-xs shadow-3xl z-10" src="{{ $book->cover_path }}" alt="">
            <div class="absolute bg-gray-200 w-full aspect-square rounded-full"></div>
        </div>
        <div class="min-h-full flex-1 flex flex-col justify-center items-center md:items-start z-10">
            <h2 class="text-4xl md:text-4xl font-playfair font-semibold mb-3">{{ $book->title }}</h2>
            <p class="text-lg mb-5">Oleh <span class="capitalize font-semibold">{{ $book->author }}</span></p>

            <p class="font-crimson text-xl font-light max-w-lg mb-5 text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta numquam quisquam pariatur eos. Enim aut
                repellendus, at rem perferendis assumenda nobis officiis officia sequi delectus voluptate. Nulla
                consequatur expedita ullam!
            </p>

            <flux:separator class="mb-5" />

            @livewire('book-detail-action', ['book' => $book])
        </div>

    </section>

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
