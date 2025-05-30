{{-- blade-formatter-disable --}}
<!-- Entire file content -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-[#DED8E0] dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="bg-custom-black text-custom-white dark:border-zinc-700 dark:bg-zinc-900 shadow-3xl z-50!">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('book.explore') }}" class="mr-5 flex items-center space-x-2" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist>
            @can('dashboard-access')
                <flux:navlist.group :heading="__('Admin')" class="grid">
                    <flux:navlist.item icon="chart-pie" :href="route('admin.dashboard')" :current="request()->routeIs('admin.dashboard')"
                        wire:navigate class="mb-2 text-custom-white! hover:text-white/80! data-current:bg-custom-white/10! border-none!">
                        {{ __('Dashboard') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="document-text" :href="route('admin.kelola-buku.index')" :current="request()->routeIs('admin.kelola-buku.index')"
                        wire:navigate class="mb-2 text-custom-white! hover:text-white/80! data-current:bg-custom-white/10! border-none!">
                        {{ __('Kelola Buku') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            @endcan

            <flux:navlist.group :heading="__('Navigasi')" class="grid">
                <flux:navlist.item icon="home" :href="route('book.explore')" :current="request()->routeIs('book.explore')"
                    wire:navigate class="mb-2 text-custom-white! hover:text-white/80! data-current:bg-custom-white/10! border-none!">
                    {{ __('Jelajahi') }}
                </flux:navlist.item>
                <flux:navlist.item icon="magnifying-glass" :href="route('book.search')" :current="request()->routeIs('book.search')"
                    wire:navigate class="mb-2 text-custom-white! hover:text-white/80! data-current:bg-custom-white/10! border-none!">
                    {{ __('Cari Buku') }}
                </flux:navlist.item>
                <flux:navlist.item icon="book-open" :href="route('book.borrow')" :current="request()->routeIs('book.borrow')"
                    wire:navigate class="mb-2 text-custom-white! hover:text-white/80! data-current:bg-custom-white/10! border-none!">
                    {{ __('Buku Dipinjam') }}
                </flux:navlist.item>
                <flux:navlist.item icon="bookmark" :href="route('book.saved')" :current="request()->routeIs('book.saved')"
                    wire:navigate class="mb-2 text-custom-white! hover:text-white/80! data-current:bg-custom-white/10! border-none!">
                    {{ __('Disimpan') }}
                </flux:navlist.item>
                {{-- <flux:navlist.item icon="bell"
                    wire:navigate class="mb-2 text-custom-white! hover:text-white/80! data-current:bg-custom-white/10! border-none!">
                    {{ __('Notifikasi') }}
                </flux:navlist.item> --}}
        </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        <flux:navlist>
            <flux:navlist.item class="text-custom-white! hover:text-white/80!" icon="folder-git-2" href="https://github.com/ryanpermanaa/school-library"
                target="_blank">
                {{ __('Github Repository') }}
            </flux:navlist.item>
        </flux:navlist>

        <!-- Desktop User Menu -->
        <flux:dropdown position="bottom" align="start">
            <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                icon-trailing="chevrons-up-down" class="text-custom-white! [&_span]:text-current! [&_span]:hover:text-current/80! [&_svg]:text-current/50! [&_svg]:hover:text-current/30! [&_div:first-child_div]:text-black [&_div:first-child_div]:dark:text-white [&_div:first-child_div]:font-extrabold cursor-pointer" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-left text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>
                        {{ __('Pengaturan') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Keluar Akun') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden text-black!" icon="bars-3-bottom-left" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-left text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>

    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>

</html>
