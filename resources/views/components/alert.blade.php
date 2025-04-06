<div {{ $attributes->merge(['class' => 'absolute right-5 top-5 z-30']) }}
    x-transition:enter="transform transition ease-out duration-300" x-transition:enter-start="translate-x-full opacity-0"
    x-transition:enter-end="translate-x-0 opacity-100" x-transition:leave="transform transition ease-in duration-300"
    x-transition:leave-start="translate-x-0 opacity-100" x-transition:leave-end="translate-x-full opacity-0" x-cloak>

    <div class="flex flex-col gap-2 w-fit text-[10px] sm:text-base z-50">
        <div class="error-alert flex items-center justify-between p-3 rounded-lg bg-custom-black">
            <div class="flex gap-2 mr-10">
                @if ($type == 'success')
                    <div class="text-green-300 square h-fit backdrop-blur-xl p-0.5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                    </div>
                @elseif ($type == 'error')
                    <div class="text-red-400 square h-fit backdrop-blur-xl p-0.5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z">
                            </path>
                        </svg>
                    </div>
                @endif

                <div>
                    <p class="text-white mb-1">{{ $title }}</p>
                    <p class="text-white/70">{{ $description }}</p>
                </div>
            </div>

            <button x-on:click="$wire.resetAlert()"
                class="text-gray-300 hover:bg-white/10 p-1 rounded-md transition-colors ease-linear cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

</div>
