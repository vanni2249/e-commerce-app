<div>
    <div class="px-4">
        <x-card class="h-full rounded-xl">
            <header class="flex justify-between items-center mb-4">
                <h1 class="text-lg font-bold">Orders</h1>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <x-button variant="light" size="sm" class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-menu-deep">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 6h16" />
                                <path d="M7 12h13" />
                                <path d="M10 18h10" />
                            </svg>
                        </x-button>
                    </x-slot>
                    <x-slot name="content">
                    </x-slot>
                </x-dropdown>
            </header>
            <div class="md:flex md:justify-between space-y-2 md:space-y-0 items-center mb-2">
                <div class="">
                    <x-input placeholder="Buscar" class="w-full" />
                </div>
                <div class="flex space-x-2">
                    <div class="bg-gray-200 rounded-md p-1">
                        <span class="pl-2 uppercase text-xs font-bold text-gray-600 leading-tight">Mostra</span>
                        <select class="mx-2 rounded-md text-sm">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                        </select>
                    </div>
                    <div>
                        <x-button variant="light">Filtro</x-button>
                    </div>
                </div>
            </div>
            <x-table>
                <x-slot name="head">
                    <tr>
                        <th class="p-2">Numbers</th>
                        <th class="p-2">Date</th>
                        <th class="p-2">Customer</th>
                        <th class="p-2">Address</th>
                        <th class="p-2">Products</th>
                        <th class="p-2">Total</th>
                        <th class="p-2">Status</th>
                        <th class="p-2">Created<br>at</th>
                        <th class="p-2 w-14">Action</th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @for ($i = 0; $i < 25; $i++)
                        <tr class="border-t border-gray-200">
                            <td class="p-2">
                                <a href="{{ route('admin.orders.show', rand(1, 100)) }}"
                                    class="text-blue-600 hover:underline">
                                    {{ rand(100000, 999999) }}
                                </a>
                            </td>
                            <td class="p-2">
                                {{ now()->subDays(rand(1, 30))->format('m/d/Y') }}
                            </td>
                            <td class="p-2">
                                Geovanni Colon Barrios
                            </td>
                            <td class="p-2">
                                Calle 1, No. 123, Santo Domingo
                            </td>
                            <td class="p-2">
                                <span class="text-sm">Product {{ rand(1, 100) }}</span>
                            </td>
                            <td class="p-2">
                                ${{ number_format(rand(1000, 10000) / 100, 2) }}
                            </td>
                            <td class="p-2">
                                <x-badge
                                    color="{{ rand(0, 1) ? 'green' : 'red' }}">{{ rand(0, 1) ? 'Completed' : 'Pending' }}</x-badge>
                            </td>
                            <td class="p-2">
                                {{ now()->subDays(rand(1, 30))->format('m/d/Y') }}
                            </td>
                            <td class="p-2 flex justify-end">
                                <x-icon-link href="{{ route('admin.orders.show', rand(1, 100)) }}" icon="eye"
                                    wire:navigate />
                            </td>
                        </tr>
                    @endfor
                </x-slot>
            </x-table>
        </x-card>
    </div>
</div>
