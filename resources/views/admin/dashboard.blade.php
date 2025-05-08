<x-layouts.app title="Dashboard" class="">

    <x-page-header title="Dashboard">
        <flux:button as="link" href="{{ route('admin.kelola-buku.index') }}" wire:navigate icon="arrow-left"
            class="bg-primary! text-custom-white!">
            Kelola Buku
        </flux:button>
    </x-page-header>

    @livewire('dashboard-action')

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
    </script>
    <script>
        var chart = document.querySelector("#chartline");

        var dates = [];
        var now = new Date();

        for (let i = 0; i < 30; i++) {
            let date = new Date(now);
            date.setDate(now.getDate() - i);

            dates.unshift({
                x: date.getTime(),
                y: Math.floor(Math.random() * 100) //todo: Change to real borrowing value
            });
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
            },
            xaxis: {
                type: 'datetime',
            },
        };

        var chart = new ApexCharts(chart, options);
        chart.render();
    </script>
    <script>
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
</x-layouts.app>
