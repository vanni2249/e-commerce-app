<div class="space-y-4">
    <!-- Widget -->
    <header class="flex justify-between items-center px-1">
        <h2 class="text-lg font-semibold">Dashboard</h2>
        <button class="btn btn-primary">Add Widget</button>
    </header>
    <div class="grid grid-cols-12 gap-4">
        <!-- Left side -->
        <div class="col-span-12 xl:col-span-9 space-y-4">
            <!-- Widgets -->
            <div class="grid grid-cols-12 gap-2">
                @foreach ($this->widgets() as $widget)
                    <x-widget :title="$widget['title']" :value="$widget['value']" :icon="$widget['icon']" :lineColor="$widget['lineColor']"
                        class="col-span-6 md:col-span-6 xl:col-span-3">
                        <x-slot name="right">

                        </x-slot>
                        <x-slot name="footer">
                            <span class="text-xs text-gray-600">
                                {{ $widget['subtitle'] }}
                            </span>
                        </x-slot>
                    </x-widget>
                @endforeach
            </div>
            <!-- Charts -->
            <div class="grid md:grid-cols-2 grid-rows-2 gap-2">
                <!-- Transactions -->
                <div class="row-span-2 bg-white p-4 rounded-xl">
                    <header class="flex justify-between">
                        <h2 class="font-bold">Transactions</h2>
                    </header>
                    <ul class="py-4 overflow-auto">
                        @for ($i = 0; $i < 8; $i++)
                            <li class="flex justify-between items-center border-b border-gray-200 py-2">
                                <div class="flex items-center space-x-2">
                                    <div class="bg-blue-100 p-2 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icon-tabler-shopping-cart">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="6" cy="19" r="2"></circle>
                                            <circle cx="17" cy="19" r="2"></circle>
                                            <path d="M17 17h-11v-14h-2l3.6 7.59m-.6 2.41h13m-4 -6h5l3 6h-8.5">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Order #{{ 1000 + $i }}</p>
                                        <p class="text-sm text-gray-500">Placed on
                                            {{ now()->subDays($i)->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-800">$ {{ 100 + $i * 10 }}</p>
                                    <p class="text-sm text-green-500">+{{ 5 + $i }}%</p>
                                </div>
                            </li>
                        @endfor
                    </ul>
                </div>
                <!-- Revenue -->
                <div class="col-span-1 row-span-1 bg-white p-4 rounded-xl">
                    <header class="flex justify-between">
                        <h2 class="font-bold">Revenue</h2>
                    </header>
                    <div class="py-4">
                        <canvas height="160" id="revenueChart"></canvas>
                    </div>
                </div>
                <!-- Sale Reports -->
                <div class="col-span-1 row-span-1 bg-white p-4 rounded-xl">
                    <header class="flex justify-between">
                        <h2 class="font-bold">Sale Reports</h2>
                    </header>
                    <div class="py-4">
                        <canvas height="160" id="saleReportsChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <!-- Right side -->
        <div class="col-span-12 xl:col-span-3">
            <!-- Performance Widgets -->
            {{-- <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-1 gap-2 h-full"> --}}
            <div class="flex flex-col md:flex-row xl:flex-col gap-2 h-full">

                <div class="bg-white p-4 rounded-xl md:w-1/2 xl:w-full flex flex-col">
                    <header class="flex justify-between">
                        <h2 class="font-bold">Total View Performance</h2>
                    </header>
                    <div class="grow py-4 flex justify-center items-center">
                        <canvas id="totalViewPerformanceChart"></canvas>
                    </div>
                </div>
                <div class="grow bg-white p-4 rounded-xl md:w-1/2 xl:w-full flex flex-col">
                    <header class="flex justify-between">
                        <h2 class="font-bold">Total Search Performance</h2>
                    </header>
                    <div class="grow py-4 flex justify-center items-center">
                        <canvas height="344" id="totalSearchPerformanceChart"></canvas>
                    </div>
                </div>
            </div>
            {{-- </div> --}}

        </div>
    </div>
</div>
@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
    <script>
        const ctx = document.getElementById('revenueChart');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    data: [1200, 1900, 3000, 5000, 2300, 3400, 4200],
                    // label: ['Revenue'],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(29, 78, 216)',
                    ],
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx2 = document.getElementById('saleReportsChart');
        const myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(29, 78, 216)',
                    ],
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const tvpc = document.getElementById('totalViewPerformanceChart');
        const myChart3 = new Chart(tvpc, {
            type: 'doughnut',
            data: {
                labels: ['Guess', 'Users'],
                datasets: [{
                    label: 'Views',
                    data: [6, 59, ],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(29, 78, 216)',
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const tspc = document.getElementById('totalSearchPerformanceChart');
        // tspc.canvas.parentNode.style.height = '600px';
        // alert(tspc.style.height);

        const myChart4 = new Chart(tspc, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept',
                    'Oct', 'Nov', 'Dec'
                ],
                datasets: [{
                    label: 'Searches',
                    data: [28, 48, 40, 19, 86, 27, 90, 34, 65, 23, 87, 21],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(29, 78, 216)',
                    ],
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                indexAxis: 'y',
            }
        });
    </script>
@endscript
