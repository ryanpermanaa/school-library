<div class="" x-data="{ deleteModal: false, username: '' }">

    <x-alert model="returnSuccess">

        <x-alert-item type="success" x-show="result === true && !hideAlert">
            <x-slot:title>
                {{ $alertTitle ?? 'Buku berhasil dikembalikan!' }}
            </x-slot:title>
            <x-slot:description>
                {{ $alertDescription ?? 'Buku berhasil dikembalikan ke perpustakaan.' }}
            </x-slot:description>
        </x-alert-item>

        <x-alert-item type="error" x-show="result === false && !hideAlert">
            <x-slot:title>
                {{ $alertTitle ?? 'Buku gagal dikembalikan :(' }}
            </x-slot:title>
            <x-slot:description>
                {{ $alertDescription ?? 'Coba lagi nanti atau hubungi developer.' }}
            </x-slot:description>
        </x-alert-item>

    </x-alert>

    <div x-cloak x-show="deleteModal" x-transition.opacity
        class="fixed md:left-[240px] inset-0 text-white bg-black/20 z-30">
        <div x-show="deleteModal" x-transition
            class="flex h-screen items-center justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg aria-hidden="true" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                fill="none" class="h-6 w-6 text-red-600">
                                <path
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"
                                    stroke-linejoin="round" stroke-linecap="round"></path>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 id="modal-title" class="text-lg font-semibold leading-6 text-gray-900">
                                Penghapusan User
                            </h3>
                            <div class="mt-2">
                                <p class="text-md text-gray-500">
                                    Apakah anda yakin untuk menghapus user dengan nama
                                    "<span class="font-medium whitespace-nowrap" x-text="username"></span>"
                                    dari data? Semua data peminjaman user juga akan dihapus.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button x-on:click="deleteModal = false" wire:click="deleteUser()"
                        class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto cursor-pointer"
                        type="button">
                        Hapus
                    </button>
                    <button x-on:click="deleteModal = false"
                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto cursor-pointer"
                        type="button">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="rounded-md bg-[#f1f1f1] p-3">
        <div class="">
            <div class="flex flex-col md:flex-row w-full gap-3 mt-2">
                <div
                    class="transform flex-1 hover:-translate-y-2 transition rounded-md duration-300 shadow-md hover:shadow-xl bg-white">
                    <div class="p-5">
                        <div class="flex justify-between">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <div class="ml-1 w-full flex-1">
                            <div>
                                <div class="mt-3 text-3xl font-bold leading-8">{{ $bookCount }}</div>

                                <div class="mt-1 text-base text-gray-600">Total Buku</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="transform flex-1 hover:-translate-y-2 transition rounded-md duration-300 shadow-md hover:shadow-xl bg-white">
                    <div class="p-5">
                        <div class="flex justify-between">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        <div class="ml-1 w-full flex-1">
                            <div>
                                <div class="mt-3 text-3xl font-bold leading-8">{{ $userCount }}</div>

                                <div class="mt-1 text-base text-gray-600">Pengguna</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="transform flex-1 hover:-translate-y-2 transition rounded-md duration-300 shadow-md hover:shadow-xl bg-white">
                    <div class="p-5">
                        <div class="flex justify-between">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>

                        </div>
                        <div class="ml-1 w-full flex-1">
                            <div>
                                <div class="mt-3 text-3xl font-bold leading-8">{{ $overdueBooksCount }}</div>

                                <div class="mt-1 text-base text-gray-600">Buku Terlambat</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="transform flex-1 hover:-translate-y-2 transition rounded-md duration-300 shadow-md hover:shadow-xl bg-white">
                    <div class="p-5">
                        <div class="flex justify-between">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                        </div>
                        <div class="ml-1 w-full flex-1">
                            <div>
                                <div class="mt-3 text-3xl font-bold leading-8">{{ $borrowedTodayCount }}</div>

                                <div class="mt-1 text-base text-gray-600">Peminjaman Hari Ini</div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="mt-5 mb-2">
                <div class="grid gap-3 grid-cols-1 lg:grid-cols-2">
                    <div class="bg-white shadow-lg p-4 rounded-xl" id="chartline"></div>
                    <div class="bg-white shadow-lg p-4 min-h-20 flex justify-center items-center rounded-xl"
                        id="chartpie">
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="grid gap-2 grid-cols-1 lg:grid-cols-1" x-data="{ userTab: true, adminTab: false }">
                    <div class="bg-white p-4 shadow-lg rounded-lg">
                        <div>
                            <div class="hidden sm:block">
                                <div class="border-b border-gray-200">
                                    <nav class="-mb-px flex gap-4" aria-label="Tabs">
                                        <button x-on:click="userTab = true; adminTab = false"
                                            class="pb-4 inline-flex shrink-0 items-center gap-2 border-b-2 px-1 text-sm font-bold cursor-pointer transition"
                                            :class="{ 'border-primary text-primary': userTab }" aria-current="page">
                                            <i class="fa-solid fa-users"></i>
                                            User
                                        </button>
                                        <button x-on:click="userTab = false; adminTab = true"
                                            class="inline-flex pb-4 shrink-0 items-center gap-2 border-b-2 px-1 text-sm font-bold cursor-pointer transition"
                                            :class="{ 'border-primary text-primary': adminTab }" aria-current="page">
                                            <i class="fa-solid fa-user-tie"></i>
                                            Admin
                                        </button>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto">
                                    <div class="py-2 align-middle inline-block min-w-full">
                                        <div
                                            class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                            {{-- ? USER --}}
                                            <table x-show="userTab" class="min-w-full divide-y divide-gray-200">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            class="px-6 py-3 w-[3%] bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">ID</span>
                                                            </div>
                                                        </th>
                                                        <th
                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">Username</span>
                                                            </div>
                                                        </th>
                                                        <th
                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">Email Diverifikasi</span>
                                                            </div>
                                                        </th>
                                                        <th
                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 tracking-wider">
                                                            <div class="flex cursor-pointer">
                                                                <flux:tooltip
                                                                    content="Banyak buku yang pernah dipinjam">
                                                                    <span class="mr-2 uppercase">Pernah Dipinjam</span>
                                                                </flux:tooltip>
                                                            </div>
                                                        </th>
                                                        <th
                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 tracking-wider">
                                                            <div class="flex cursor-pointer">
                                                                <flux:tooltip
                                                                    content="Banyak buku yang pernah terlambat dikembalikan">
                                                                    <span class="mr-2 uppercase">Pernah
                                                                        Terlambat</span>
                                                                </flux:tooltip>
                                                            </div>
                                                        </th>
                                                        <th
                                                            class="px-6 py-3 w-[15%] bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">Aksi</span>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">

                                                    @foreach ($regularUsers as $user)
                                                        <tr>
                                                            <td class="px-6 py-4 whitespace-no-wrap text-md leading-5">
                                                                <p>#{{ $user->id }}</p>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-no-wrap text-md leading-5">
                                                                <p>{{ $user->name }}</p>
                                                                <p class="text-xs text-gray-400">{{ $user->email }}
                                                                </p>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                @php
                                                                    $verified = $user->email_verified_at !== null;
                                                                @endphp

                                                                <span @class([
                                                                    'inline-flex items-center space-x-1 px-2.5 py-1 rounded-full',
                                                                    'bg-green-100 text-green-800' => $verified,
                                                                    'bg-red-100 text-red-800' => !$verified,
                                                                ])
                                                                    @click="openTooltip = !openTooltip">
                                                                    <i @class([
                                                                        'text-xs mr-2',
                                                                        'fa-solid fa-check' => $verified,
                                                                        'fa-solid fa-xmark' => !$verified,
                                                                    ])></i>

                                                                    @if ($verified)
                                                                        <flux:tooltip
                                                                            content="Diverifikasi {{ \Carbon\Carbon::parse($user->email_verified_at)->diffForHumans() }}">
                                                                            <p
                                                                                class="text-xs font-semibold whitespace-nowrap">
                                                                                Diverifikasi
                                                                            </p>
                                                                        </flux:tooltip>
                                                                    @else
                                                                        <p
                                                                            class="text-xs font-semibold whitespace-nowrap">
                                                                            Belum Diverifikasi
                                                                        </p>
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                @php
                                                                    $borrowingCount = app\Models\Borrowing::query()
                                                                        ->where('user_id', $user->id)
                                                                        ->count();
                                                                @endphp
                                                                {{ $borrowingCount }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                @php
                                                                    $userOverdueCount = app\Models\Borrowing::query()
                                                                        ->where('user_id', $user->id)
                                                                        ->whereColumn('returned_at', '>', 'due_date')
                                                                        ->count();
                                                                @endphp
                                                                {{ $userOverdueCount }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                <div class="flex gap-1">
                                                                    <flux:button
                                                                        x-on:click="deleteModal = true; username = '{{ $user->name }}'; $wire.selectedUser = {{ $user->id }}"
                                                                        class="p-1! px-3! font-semibold! cursor-pointer hover:bg-red-400! hover:text-white! transition"
                                                                        icon="trash">
                                                                        Hapus User
                                                                    </flux:button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            {{-- ? ADMIN --}}
                                            <table x-show="adminTab" class="min-w-full divide-y divide-gray-200">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            class="px-6 py-3 w-[3%] bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">ID</span>
                                                            </div>
                                                        </th>
                                                        <th
                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">Username</span>
                                                            </div>
                                                        </th>
                                                        <th
                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">Email Diverifikasi</span>
                                                            </div>
                                                        </th>
                                                        <th
                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 tracking-wider">
                                                            <div class="flex cursor-pointer">
                                                                <flux:tooltip
                                                                    content="Banyak buku yang pernah dipinjam">
                                                                    <span class="mr-2 uppercase">Pernah Dipinjam</span>
                                                                </flux:tooltip>
                                                            </div>
                                                        </th>
                                                        <th
                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 tracking-wider">
                                                            <div class="flex cursor-pointer">
                                                                <flux:tooltip
                                                                    content="Banyak buku yang pernah terlambat dikembalikan">
                                                                    <span class="mr-2 uppercase">Pernah
                                                                        Terlambat</span>
                                                                </flux:tooltip>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">

                                                    @foreach ($adminUsers as $admin)
                                                        <tr>
                                                            <td class="px-6 py-4 whitespace-no-wrap text-md leading-5">
                                                                <p>#{{ $admin->id }}</p>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-no-wrap text-md leading-5">
                                                                <p>{{ $admin->name }}</p>
                                                                <p class="text-xs text-gray-400">{{ $admin->email }}
                                                                </p>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                @php
                                                                    $verified = $admin->email_verified_at !== null;
                                                                @endphp

                                                                <span @class([
                                                                    'inline-flex items-center space-x-1 px-2.5 py-1 rounded-full',
                                                                    'bg-green-100 text-green-800' => $verified,
                                                                    'bg-red-100 text-red-800' => !$verified,
                                                                ])
                                                                    @click="openTooltip = !openTooltip">
                                                                    <i @class([
                                                                        'text-xs mr-2',
                                                                        'fa-solid fa-check' => $verified,
                                                                        'fa-solid fa-xmark' => !$verified,
                                                                    ])></i>

                                                                    @if ($verified)
                                                                        <flux:tooltip
                                                                            content="Diverifikasi {{ \Carbon\Carbon::parse($admin->email_verified_at)->diffForHumans() }}">
                                                                            <p
                                                                                class="text-xs font-semibold whitespace-nowrap">
                                                                                Diverifikasi
                                                                            </p>
                                                                        </flux:tooltip>
                                                                    @else
                                                                        <p
                                                                            class="text-xs font-semibold whitespace-nowrap">
                                                                            Belum Diverifikasi
                                                                        </p>
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                @php
                                                                    $borrowingCount = app\Models\Borrowing::query()
                                                                        ->where('user_id', $user->id)
                                                                        ->count();
                                                                @endphp
                                                                {{ $borrowingCount }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                @php
                                                                    $userOverdueCount = app\Models\Borrowing::query()
                                                                        ->where('user_id', $user->id)
                                                                        ->whereColumn('returned_at', '>', 'due_date')
                                                                        ->count();
                                                                @endphp
                                                                {{ $userOverdueCount }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var chart = document.querySelector("#chartline");

            var dates = [];
            var values = @js($borrowingStats);
            var now = new Date();

            let j = 0;
            for (let i = 31; i >= 0; i--) {
                let date = new Date(now);
                date.setDate(now.getDate() - i);

                dates.push({
                    x: date.getTime(),
                    y: values[j]
                });

                j++;
            }

            var options = {
                series: [{
                    name: 'Buku Dipinjam',
                    data: dates
                }],
                chart: {
                    type: 'area',
                    stacked: false,
                    height: 350,
                    zoom: {
                        type: 'x',
                        enabled: true,
                        autoScaleYaxis: true
                    },
                    toolbar: {
                        autoSelected: 'zoom'
                    }
                },
                stroke: {
                    colors: ['#7353ba'],
                    width: 3
                },
                dataLabels: {
                    enabled: false
                },
                markers: {
                    size: 0,
                },
                title: {
                    text: 'Statistik Peminjaman Buku',
                    align: 'left'
                },
                fill: {
                    type: 'gradient',
                    colors: ['#7353ba'],
                    gradient: {
                        shadeIntensity: 1,
                        inverseColors: false,
                        opacityFrom: 0.5,
                        opacityTo: 0,
                        stops: [0, 90, 100]
                    },
                },
                yaxis: {
                    title: {
                        text: 'Jumlah Buku'
                    },
                    stepSize: 1,
                    min: 0,
                    max: 10
                },
                xaxis: {
                    type: 'datetime',
                    stepSize: 1
                },
            };

            var chart = new ApexCharts(chart, options);
            chart.render();


            // CATEGORY PIE CHART

            var chart = document.querySelector('#chartpie')

            var options = {
                series: @js($bookStatusList),
                labels: ['Belum Dipinjam', 'Tersedia', 'Dipinjam', 'Terlambat'],
                colors: ["#3b82f6", "#22c55e", "#6b7280", "#ef4444"],
                chart: {
                    width: '90%',
                    type: 'pie',
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(chart, options);
            chart.render();
        </script>

    </div>
