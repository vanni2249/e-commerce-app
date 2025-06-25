<x-layouts.admin>
    @php
        // $registers = [
        //     ['title' => 'Empleados', 'route' => request()->segment(1) . '.registers.employees.index', 'count' => 10],
        //     ['title' => 'Ciudadanos', 'route' => request()->segment(1) . '.registers.citizens.index', 'count' => 10],
        //     ['title' => 'Comerciantes', 'route' => request()->segment(1) . '.registers.merchants.index', 'count' => 5],
        //     ['title' => 'Contables', 'route' => request()->segment(1) . '.registers.accountants.index', 'count' => 3],
        //     ['title' => 'Contratistas', 'route' => request()->segment(1) . '.registers.contractors.index', 'count' => 2],
        //     ['title' => 'Supplidores', 'route' => request()->segment(1) . '.registers.suppliers.index','count' => 1],
        //     ['title' => 'Personas mayor', 'route' => request()->segment(1) . '.registers.seniors.index', 'count' => 1],
        //     ['title' => 'Personas discapacidad', 'route' => request()->segment(1) . '.registers.disabled-people.index', 'count' => 1],
        // ];
    @endphp
    <div class="grid grid-cols-12 gap-4 px-4">
        <!-- Table -->
        <div class="col-span-full lg:col-span-full">
            <x-card class="h-full rounded-xl">
                <header class="flex justify-between items-center mb-4">
                    <h1 class="text-lg font-bold">Admins</h1> 
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
                            {{-- @foreach ($registers as $register)
                                <x-dropdown-link href="{{ isset($register['route']) ? route($register['route']) : '#' }}">
                                    {{ $register['title'] }}
                                </x-dropdown-link>
                            @endforeach --}}
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
                            <th class="p-4">Name</th>
                            <th class="p-4">Is Technician</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Created<br>at</th>
                            <th class="p-4">Last<br>Connection</th>
                            <th class="p-4 w-14">Action</th>
                        </tr>
                    </x-slot>
                    <x-slot name="body">
                        @for ($i = 0; $i < 25; $i++)
                        <tr class="border-t border-gray-200">
                            <td class="px-4 py-1 w-1/5">
                            <small>{{ rand(100000, 999999) }}</small>
                            <br>
                            <span>
                                Geovanni Colon Barrios
                            </span>
                            </td>
                            <td class="px-4 py-1 w-1/5">
                                {{ rand(0, 1) ? 'Yes' : 'No' }}
                            </td>
                            <td class="px-4 py-1 w-1/5">
                                <x-badge color="{{ rand(0, 1) ? 'green' : 'red' }}">{{ rand(0, 1) ? 'Activo' : 'Inactivo' }}</x-badge>
                            </td>
                            <td class="px-4 py-1 w-1/5">12/23/2025 10:24 PM</td>
                            <td class="px-4 py-1 w-1/5">hace {{ rand(1,7) }} dias</td>
                            <td class="px-4 py-1 flex justify-end">
                                <x-icon-link href="#" icon="eye" />
                            </td>
                        </tr>
                        @endfor
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>
</x-layouts.admin>