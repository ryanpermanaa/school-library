<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }} - Jelajahi semua buku</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- ? Playfair Display & Crimson Pro --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200..900;1,200..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite('resources/css/app.css')

    {{-- ? Alpine --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- ? FontAwesome --}}
    <script src="https://kit.fontawesome.com/19cba76c30.js" crossorigin="anonymous"></script>
</head>

<body class="overflow-x-hidden [&_section]:my-20 md:[&_section]:my-0">

    <nav class="fixed w-full top-0 z-[999] bg-custom-black text-custom-white shadow-2xl lg:rounded-b-3xl">
        <div class="mx-auto px-6 py-6 lg:px-10">
            <div class="relative flex items-center justify-between">
                <div class="flex shrink-0 items-center">
                    <h1 class="font-playfair text-2xl font-bold text-secondary tracking-wide">RyanLibrary</h1>
                </div>
                <div class="flex items-center gap-5 font-crimson text-lg font-light">
                    <a href="{{ route('login') }}"
                        class="border-b-4 border-transparent transition-all duration-300 hover:border-primary">
                        Log in
                    </a>

                    <a class="rounded-sm bg-primary px-5 py-1 text-custom-white transition hover:scale-105 hover:shadow-xl"
                        href="{{ route('register') }}">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section class="min-h-screen pt-28 w-full">
        <div
            class="flex flex-wrap md:flex-nowrap justify-center md:justify-between gap-10 w-full px-4 md:px-15 mt-7 mb-16">
            <div class="">
                <h2 class="font-playfair text-start font-bold text-5xl md:text-6xl max-w-lg leading-16">
                    Baca, Temukan, dan <i class="text-primary">Jelajahi</i>.
                </h2>
            </div>
            <div class="flex flex-col justify-center">
                <p class="font-crimson text-justify md:text-right text-xl mb-3 max-w-md xl:max-w-lg">
                    Membaca buku memperkaya wawasan, melatih berpikir kritis, dan meningkatkan konsentrasi serta daya
                    ingat.
                </p>
                <a href="{{ route('register') }}" class="font-crimson md:self-end font-bold text-xl group w-fit">
                    <span class="group-hover:underline">Coba Sekarang</span>
                    <i class="fa-solid fa-arrow-right-long ml-2"></i>
                </a>
            </div>
        </div>
        <div class="">
            <div x-data="{}" x-init="$nextTick(() => {
                let ul = $refs.logos;
                ul.insertAdjacentHTML('afterend', ul.outerHTML);
                ul.nextSibling.setAttribute('aria-hidden', 'true');
            })" class="w-full inline-flex flex-nowrap">
                <ul x-ref="logos"
                    class="flex items-center justify-center md:justify-start [&_li]:mx-3 [&_li]:shadow-3xl [&>li>div]:w-62 [&>li>div]:h-80 [&>li>div]:overflow-hidden [&>li>div>img]:object-cover animate-[infiniteScroll_40s_linear_infinite]">
                    <li>
                        <div>
                            <img
                                src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.0lhZw7B4IUdvekIJNPpMDwHaLF%26pid%3DApi&f=1&ipt=db0b6ef62ce411dd13450f4bad50598906dc654d770274ed37c03116c83f70c0&ipo=images" />
                        </div>
                    </li>
                    <li>
                        <div>
                            <img
                                src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.0lhZw7B4IUdvekIJNPpMDwHaLF%26pid%3DApi&f=1&ipt=db0b6ef62ce411dd13450f4bad50598906dc654d770274ed37c03116c83f70c0&ipo=images" />
                        </div>
                    </li>
                    <li>
                        <div>
                            <img
                                src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.0lhZw7B4IUdvekIJNPpMDwHaLF%26pid%3DApi&f=1&ipt=db0b6ef62ce411dd13450f4bad50598906dc654d770274ed37c03116c83f70c0&ipo=images" />
                        </div>
                    </li>
                    <li>
                        <div>
                            <img
                                src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.0lhZw7B4IUdvekIJNPpMDwHaLF%26pid%3DApi&f=1&ipt=db0b6ef62ce411dd13450f4bad50598906dc654d770274ed37c03116c83f70c0&ipo=images" />
                        </div>
                    </li>
                    <li>
                        <div>
                            <img
                                src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.0lhZw7B4IUdvekIJNPpMDwHaLF%26pid%3DApi&f=1&ipt=db0b6ef62ce411dd13450f4bad50598906dc654d770274ed37c03116c83f70c0&ipo=images" />
                        </div>
                    </li>
                    <li>
                        <div>
                            <img
                                src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.0lhZw7B4IUdvekIJNPpMDwHaLF%26pid%3DApi&f=1&ipt=db0b6ef62ce411dd13450f4bad50598906dc654d770274ed37c03116c83f70c0&ipo=images" />
                        </div>
                    </li>
                    <li>
                        <div>
                            <img
                                src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.0lhZw7B4IUdvekIJNPpMDwHaLF%26pid%3DApi&f=1&ipt=db0b6ef62ce411dd13450f4bad50598906dc654d770274ed37c03116c83f70c0&ipo=images" />
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="relative min-h-screen flex items-center justify-center mx-auto px-6 md:px-15 py-8">
        <div
            class="bg-decoration w-[35rem] h-[36rem] opacity-40 bg-secondary absolute -z-10 left-0 top-0 md:top-auto md:bottom-0">
        </div>

        <div class="grid grid-cols-1 h-full gap-[6rem] md:grid-cols-2 items-center md:gap-12">
            <div class="flex justify-center">
                <img src="{{ asset('img/book-covers-view.png') }}" class="w-[25rem]" alt="" />
            </div>

            <div class="">
                <div class="max-w-lg md:max-w-none">
                    <h3 class="font-playfair font-bold text-5xl max-w-lg leading-14">Temukan Buku Favorit Anda Disini
                    </h3>
                    <p class="font-crimson text-xl my-6 max-w-xl">
                        Temukan koleksi buku paling populer dan direkomendasikan. Dari karya klasik hingga
                        bestseller, bacaan terbaik menanti untuk Anda jelajahi.
                    </p>
                    <div
                        class="flex mb-10 gap-6 [&_span]:font-playfair [&_span]:font-bold [&_span]:text-5xl [&_p]:mt-2 [&_p]:font-crimson [&_p]:text-xl">
                        <div class="">
                            <span>50+</span>
                            <p>Buku tersedia</p>
                        </div>
                        <div class="">
                            <span>1</span>
                            <p>Pengguna Aktif</p>
                        </div>
                        <div class="">
                            <span>0</span>
                            <p>Pembaca Bulanan</p>
                        </div>
                    </div>
                    <a class="group relative inline-flex items-center overflow-hidden border-4 border-current px-7 py-2 text-primary hover:bg-primary"
                        href="#">
                        <span class="absolute -end-full transition-all group-hover:end-4">
                            <i class="fa-solid fa-arrow-right-long group-hover:text-custom-white"></i>
                        </span>

                        <span
                            class="font-crimson font-bold text-xl transition-all group-hover:text-custom-white group-hover:me-4">Coba
                            Sekarang</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
