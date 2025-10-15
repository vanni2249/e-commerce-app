<div class="space-y-4">
    <!-- Widget -->
    <header class="flex justify-between items-center px-1">
        <h2 class="text-lg font-semibold">Dashboard</h2>
        <x-dropdown class="-z-10">
            <x-slot name="trigger">
                <x-button>
                    <div class="flex space-x-0.5">
                        <span class="hidden md:inline-block">
                            Filter By
                        </span>
                        <span>
                            @if ($this->filter)
                                {{ ucfirst($this->filter) }}:
                            @endif
                        </span>
                        @switch($this->filter)
                            @case('day')
                                {{-- Format day/month/year --}}
                                {{ \Carbon\Carbon::parse($this->value)->format('M d, Y') }}
                            @break

                            @case('month')
                                {{-- Format month/year --}}
                                {{ \Carbon\Carbon::parse($this->value)->format('M Y') }}
                            @break

                            @case('year')
                                {{-- Format year --}}
                                {{ \Carbon\Carbon::parse($this->value)->format('Y') }}
                            @break

                            @default
                        @endswitch
                        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </x-button>
            </x-slot>
            <x-slot name="content">
                <div class="text-xs font-bold uppercase px-4 py-2">Days</div>
                <x-dropdown-link
                    href="{{ route('admin.dashboard.filters', ['filter' => 'day', 'value' => now()->format('Y-m-d')]) }}"
                    wire:navigate>Today</x-dropdown-link>
                <x-dropdown-link
                    href="{{ route('admin.dashboard.filters', ['filter' => 'day', 'value' => now()->subDay()->format('Y-m-d')]) }}"
                    wire:navigate>Yesterday</x-dropdown-link>
                <div class="text-xs font-bold uppercase px-4 py-2">Months</div>
                <x-dropdown-link
                    href="{{ route('admin.dashboard.filters', ['filter' => 'month', 'value' => now()->startOfMonth()->format('Y-m-d')]) }}"
                    wire:navigate>This Month</x-dropdown-link>
                <x-dropdown-link
                    href="{{ route('admin.dashboard.filters', ['filter' => 'month', 'value' => now()->subMonth()->startOfMonth()->format('Y-m-d')]) }}"
                    wire:navigate>Past Month</x-dropdown-link>
                <div class="text-xs font-bold uppercase px-4 py-2">Months</div>
                <x-dropdown-link
                    href="{{ route('admin.dashboard.filters', ['filter' => 'year', 'value' => now()->startOfYear()->format('Y-m-d')]) }}"
                    wire:navigate>This year</x-dropdown-link>
                <x-dropdown-link
                    href="{{ route('admin.dashboard.filters', ['filter' => 'year', 'value' => now()->subYear()->startOfYear()->format('Y-m-d')]) }}"
                    wire:navigate>Past year</x-dropdown-link>
            </x-slot>
        </x-dropdown>
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
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <!-- Transactions -->
                <div class="col-span-1 md:col-span-2 bg-white p-4 rounded-xl">
                    <header class="flex justify-between">
                        <h2 class="font-bold">Revenues</h2>
                    </header>
                    <div class="py-4">
                        <canvas style="position: relative; height:50vh; width:80vw" id="revenuesChart"></canvas>
                    </div>

                </div>
                <!-- Revenue -->
                <div class="col-span-1 md:col-span-1 bg-white p-4 rounded-xl">
                    <header class="flex justify-between">
                        <h2 class="font-bold">Transactions</h2>
                    </header>
                    <div class="py-4">
                        <canvas style="position: relative; height:50vh; width:40vmax" id="transactionsChart"></canvas>
                    </div>
                </div>
                <!-- Sale Reports -->
                <div class="col-span-1 md:col-span-1 bg-white p-4 rounded-xl">
                    <header class="flex justify-between">
                        <h2 class="font-bold">Sale Reports</h2>
                    </header>
                    <div class="py-4">
                        <canvas style="position: relative; height:50vh; width:40vmax" id="saleReportsChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <!-- Right side -->
        <div class="col-span-12 xl:col-span-3">
            <!-- Performance Widgets -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-1 gap-2 h-full">

                <div class="bg-white p-4 rounded-xl flex flex-col">
                    <header class="flex justify-between">
                        <h2 class="font-bold">Total Visitors</h2>
                    </header>
                    <div class="grow py-4 flex justify-center items-center">
                        <canvas style="position: relative; height:150px; width:150px"
                            id="totalViewPerformanceChart"></canvas>
                    </div>
                </div>
                <div class="grow bg-white p-4 rounded-xl flex flex-col">
                    <header class="flex justify-between">
                        <h2 class="font-bold">Total Search</h2>
                    </header>
                    <div class="grow py-4 flex justify-center items-center">
                        <canvas style="position: relative; height:150px; width:150px"
                            id="totalSearchPerformanceChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <!-- Center side -->
        <div class="col-span-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-2">
                <!-- Transactions -->
                <div class="bg-white p-4 rounded-xl">
                    <header class="flex justify-between">
                        <h2 class="font-bold">Recent Transactions</h2>
                    </header>
                    <ul class="py-4">
                        @for ($i = 0; $i < 5; $i++)
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
                                        <p class="font-semibold text-gray-800">Transaction #{{ 1000 + $i }}</p>
                                        <p class="text-sm text-gray-500 line-clamp-1">Placed on
                                            {{ now()->subDays($i)->format('M d, Y H:i') }}</p>
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
                <!-- Orders -->
                <div class="bg-white p-4 rounded-xl">
                    <header class="flex justify-between">
                        <h2 class="font-bold">Recent Orders</h2>
                    </header>
                    <ul class="py-4">
                        @for ($i = 0; $i < 5; $i++)
                            <li class="flex justify-between items-center border-b border-gray-200 py-2">
                                <div class="flex items-center space-x-2">
                                    <div class="bg-blue-100 p-2 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
                                        <p class="text-sm text-gray-500 line-clamp-1">Placed on
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
                <!-- Sales -->
                <div class="bg-white p-4 rounded-xl">
                    <header class="flex justify-between">
                        <h2 class="font-bold">Recent Sales</h2>
                    </header>
                    <ul class="py-4">
                        @for ($i = 0; $i < 5; $i++)
                            <li class="flex justify-between items-center border-b border-gray-200 py-2">
                                <div class="flex items-center space-x-2">
                                    <div class="bg-blue-100 p-2 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icon-tabler-shopping-cart">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="6" cy="19" r="2"></circle>
                                            <circle cx="17" cy="19" r="2"></circle>
                                            <path d="M17 17h-11v-14h-2l3.6 7.59m-.6 2.41h13m-4 -6h5l3 6h-8.5">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Sale #{{ 1000 + $i }}</p>
                                        <p class="text-sm text-gray-500 line-clamp-1">Placed on
                                            {{ now()->subDays($i)->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-800">{{ 1 + $i * 10 }}</p>
                                    {{-- <p class="text-sm text-green-500">+{{ 5 + $i }}%</p> --}}
                                </div>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
    <script>
        const revenuesCtx = document.getElementById('revenuesChart');
        const revenuesChart = new Chart(revenuesCtx, {
            type: 'bar',
            data: {
                labels: $wire.labels,
                datasets: [{
                    data: $wire.chartData,
                    backgroundColor: [
                        'rgb(29, 78, 216)',
                        'rgb(248, 113, 113)',

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

        const ctx = document.getElementById('transactionsChart');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: $wire.labels,
                datasets: [{
                    data: $wire.chartData,
                    backgroundColor: [
                        'rgb(29, 78, 216)',
                        'rgb(248, 113, 113)',

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

        // Sale Reports Chart
        const ctx2 = document.getElementById('saleReportsChart');
        const myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: $wire.labels,
                datasets: [{
                    label: '# of Votes',
                    data: $wire.chartData,
                    backgroundColor: [
                        'rgb(29, 78, 216)',
                        'rgb(248, 113, 113)',

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

        // Total View Performance Chart
        const tvpc = document.getElementById('totalViewPerformanceChart');
        const myChart3 = new Chart(tvpc, {
            type: 'bar',
            data: {
                labels: $wire.labels,
                datasets: [{
                    data: $wire.chartData,
                    backgroundColor: [
                        'rgb(29, 78, 216)',
                        'rgb(248, 113, 113)',
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

        // Total Search Performance Chart
        const tspc = document.getElementById('totalSearchPerformanceChart');
        const myChart4 = new Chart(tspc, {
            type: 'bar',
            data: {
                labels: $wire.labels,
                datasets: [{
                    data: $wire.chartData,
                    backgroundColor: [
                        'rgb(29, 78, 216)',
                        'rgb(248, 113, 113)',
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
