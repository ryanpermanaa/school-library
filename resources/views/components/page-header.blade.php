<section @class([
    'flex flex-col lg:flex-row items-center justify-between gap-7 p-5 rounded-lg bg-[#FBFBFB] w-full h-fit mb-3 shadow-lg',
    'justify-center' => $slot == '',
])>
    <h1 class="text-3xl font-playfair font-bold whitespace-nowrap">{{ $title }}</h1>

    {{ $slot }}
</section>
