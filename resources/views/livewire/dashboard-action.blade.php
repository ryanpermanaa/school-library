<div class="">

    <div class="mb-4 rounded-md bg-[#f1f1f1] p-3">
        <div class="">
            <div class="flex flex-col md:flex-row w-full gap-3 mt-5">
                <a class="transform flex-1 hover:-translate-y-2 transition rounded-md duration-300 shadow-md hover:shadow-xl bg-white"
                    href="#">
                    <div class="p-5">
                        <div class="flex justify-between">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <div class="ml-2 w-full flex-1">
                            <div>
                                <div class="mt-3 text-3xl font-bold leading-8">{{ $books->count() }}</div>

                                <div class="mt-1 text-base text-gray-600">Total Buku</div>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="transform flex-1 hover:-translate-y-2 transition rounded-md duration-300 shadow-md hover:shadow-xl bg-white"
                    href="#">
                    <div class="p-5">
                        <div class="flex justify-between">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        <div class="ml-2 w-full flex-1">
                            <div>
                                <div class="mt-3 text-3xl font-bold leading-8">{{ $user_count }}</div>

                                <div class="mt-1 text-base text-gray-600">Pengguna</div>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="transform flex-1 hover:-translate-y-2 transition rounded-md duration-300 shadow-md hover:shadow-xl bg-white"
                    href="#">
                    <div class="p-5">
                        <div class="flex justify-between">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>

                        </div>
                        <div class="ml-2 w-full flex-1">
                            <div>
                                <div class="mt-3 text-3xl font-bold leading-8">{{ $overdueBooksCount }}</div>

                                <div class="mt-1 text-base text-gray-600">Buku Terlambat</div>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="transform flex-1 hover:-translate-y-2 transition rounded-md duration-300 shadow-md hover:shadow-xl bg-white"
                    href="#">
                    <div class="p-5">
                        <div class="flex justify-between">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                        </div>
                        <div class="ml-2 w-full flex-1">
                            <div>
                                <div class="mt-3 text-3xl font-bold leading-8">{{ $borrowedTodayCount }}</div>

                                <div class="mt-1 text-base text-gray-600">Peminjaman Hari Ini</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="mt-5">
            <div class="grid gap-3 grid-cols-1 lg:grid-cols-2">
                <div class="bg-white shadow-lg p-4 rounded-xl" id="chartline"></div>
                <div class="bg-white shadow-lg rounded-xl" id="chartpie"></div>
            </div>
        </div>
        <div class="mt-5">
            <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                <div class="bg-white p-4 shadow-lg rounded-lg">
                    <div>
                        <div class="hidden sm:block">
                            <div class="border-b border-gray-200">
                                <nav class="-mb-px flex gap-4" aria-label="Tabs">
                                    <a href="#"
                                        class="inline-flex shrink-0 items-center gap-2 border-b-2 px-1 pb-4 text-sm font-medium {{ request()->routeIs('') }} border-sky-500 text-sky-600"
                                        aria-current="page">
                                        <i class="fa-solid fa-users"></i>
                                        Users
                                    </a>
                                    <a href="#"
                                        class="inline-flex shrink-0 items-center gap-2 border-b-2 border-sky-500 px-1 pb-4 text-sm font-medium text-sky-600"
                                        aria-current="page">
                                        <i class="fa-solid fa-user-tie"></i>
                                        Admins
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto">
                                <div class="py-2 align-middle inline-block min-w-full">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                        <div class="flex cursor-pointer">
                                                            <span class="mr-2">PRODUCT NAME</span>
                                                        </div>
                                                    </th>
                                                    <th
                                                        class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                        <div class="flex cursor-pointer">
                                                            <span class="mr-2">Stock</span>
                                                        </div>
                                                    </th>
                                                    <th
                                                        class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                        <div class="flex cursor-pointer">
                                                            <span class="mr-2">STATUS</span>
                                                        </div>
                                                    </th>
                                                    <th
                                                        class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                        <div class="flex cursor-pointer">
                                                            <span class="mr-2">ACTION</span>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                        <p>Apple MacBook Pro 13</p>
                                                        <p class="text-xs text-gray-400">PC & Laptop
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                        <p>77</p>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                        <div class="flex text-green-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="w-5 h-5 mr-1" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            <p>Active</p>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                        <div class="flex space-x-4">
                                                            <a href="#"
                                                                class="text-blue-500 hover:text-blue-600">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="w-5 h-5 mr-1" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                </svg>
                                                                <p>Edit</p>
                                                            </a>
                                                            <a href="#" class="text-red-500 hover:text-red-600">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="w-5 h-5 mr-1 ml-3" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                                <p>Delete</p>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
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
        function data() {

            return {

                isSideMenuOpen: false,
                toggleSideMenu() {
                    this.isSideMenuOpen = !this.isSideMenuOpen
                },
                closeSideMenu() {
                    this.isSideMenuOpen = false
                },
                isNotificationsMenuOpen: false,
                toggleNotificationsMenu() {
                    this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
                },
                closeNotificationsMenu() {
                    this.isNotificationsMenuOpen = false
                },
                isProfileMenuOpen: false,
                toggleProfileMenu() {
                    this.isProfileMenuOpen = !this.isProfileMenuOpen
                },
                closeProfileMenu() {
                    this.isProfileMenuOpen = false
                },
                isPagesMenuOpen: false,
                togglePagesMenu() {
                    this.isPagesMenuOpen = !this.isPagesMenuOpen
                },

            }
        }


        // BOOK BORROWMENT LINE CHART

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
            series: [44, 55, 67, 83],
            chart: {
                height: 350,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            fontSize: '22px',
                        },
                        value: {
                            fontSize: '16px',
                        },
                        total: {
                            show: true,
                            label: 'Total',
                            formatter: function(w) {
                                // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                return 249
                            }
                        }
                    }
                }
            },
            labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
        };
        var chart = new ApexCharts(chart, options);
        chart.render();
    </script>

</div>
