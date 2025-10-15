<div>
    <x-card>
        <header class="flex justify-between items-center mb-4">
            <h1 class="text-lg font-bold">Sellers</h1>
        </header>
        <div class="md:flex md:justify-between space-y-2 md:space-y-0 items-center mb-2">
            <div class="">
                <x-input wire:model.live="search" placeholder="Buscar" class="w-full" />
            </div>
            <div class="flex space-x-2">
                <div class="bg-gray-200 rounded-md p-1">
                    <span class="pl-2 uppercase text-xs font-bold text-gray-600 leading-tight">Show</span>
                    <select wire:model="perPage" class="mx-2 rounded-md text-sm">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                    </select>
                </div>
                {{-- <div>
                    <x-button variant="light">Filter</x-button>
                </div> --}}
            </div>
        </div>
        <x-table>
            <x-slot name="head">
                <tr>
                    <th class="p-4">Store<br />Name</th>
                    <th class="p-4">User</th>
                    <th class="p-4">Email<br />Phone</th>
                    <th class="p-4">Active</th>
                    <th class="p-4">Verified</th>
                    <th class="p-4">Vacation<br />Mode</th>
                    <th class="p-4">Created<br>at</th>
                    <th class="p-4 w-14">Action</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @foreach ($sellers as $seller)
                    <tr class="border-t border-gray-200">
                        <td class="p-2">
                            <span class="font-bold">{{ rand(100000, 999999) }}</span>
                            <br>
                            <span>
                                {{ $seller->store_name }} <br>
                            </span>
                        </td>
                        <td class="p-2">
                            {{ $seller->user->name }}<br />

                        </td>
                        <td class="p-2">
                            {{ $seller->user->email }} <br>
                            {{ $seller->phone }}
                        </td>
                        <td class="p-2">
                            @if ($seller->is_active)
                                <x-badge color="success">Yes</x-badge>
                            @else
                                <x-badge color="danger">No</x-badge>
                            @endif
                        </td>
                        <td class="p-2">
                            @if ($seller->is_verified)
                                <x-badge color="success">Yes</x-badge>
                            @else
                                <x-badge color="danger">No</x-badge>
                            @endif
                        </td>
                        <td class="p-2">
                            @if ($seller->vacation_mode)
                                <x-badge color="danger">Yes</x-badge>
                            @else
                                <x-badge color="success">No</x-badge>
                            @endif
                        </td>
                        <td class="p-2">
                            {{ $seller->created_at ? $seller->created_at->format('m/d/Y h:i A') : '...' }}
                        </td>

                        <td class="p-2 flex justify-end">
                            <x-icon-link href="{{ route('admin.sellers.show', ['seller' => $seller]) }}" icon="eye"
                                wire:navigate />
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        <div class="mt-4">
            {{ $sellers->links() }}
        </div>
    </x-card>
</div>
