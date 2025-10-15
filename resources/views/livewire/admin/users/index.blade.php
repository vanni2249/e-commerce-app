<div>
    <x-card>
        <header class="flex justify-between items-center mb-4">
            <h1 class="text-lg font-bold">Users</h1>
        </header>
        <div class="md:flex md:justify-between space-y-2 md:space-y-0 items-center mb-2">
            <div class="">
                <x-input wire:model.live="search" placeholder="Search" class="w-full" />
            </div>
            <div class="flex space-x-2">
                <div class="bg-gray-200 rounded-md p-1">
                    <span class="pl-2 uppercase text-xs font-bold text-gray-600 leading-tight">Show</span>
                    <select class="mx-2 rounded-md text-sm" wire:model="perPage">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                    </select>
                </div>
                {{-- <div>
                    <x-button variant="light">Filtro</x-button>
                </div> --}}
            </div>
        </div>
        <x-table>
            <x-slot name="head">
                <tr>
                    <th class="p-4">Name</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Created<br>at</th>
                    {{-- <th class="p-4">Last<br>Connection</th> --}}
                    <th class="p-4 w-14">Action</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @foreach ($users as $user)
                    <tr class="border-t border-gray-200">
                        <td class="p-2">
                            <span class="font-bold">{{ $user->number }}</span>
                            <br>
                            <span>
                                {{ $user->name }} <br>
                            </span>
                        </td>
                        <td class="p-2">
                            {{ $user->email }}
                        </td>
                        <td class="p-2">
                            <x-badge
                                color="{{ $user->is_active ? 'success' : 'danger' }}">{{ $user->is_active ? 'Active' : 'Disabled' }}</x-badge>
                        </td>
                        <td class="p-2">
                            {{ $user->created_at->format('m/d/Y h:i A') }}
                        </td>
                        {{-- <td class="p-2">hace {{ rand(1, 7) }} dias</td> --}}
                        <td class="p-2 flex justify-end">
                            <x-icon-link href="{{ route('admin.users.show', ['user' => $user]) }}" icon="eye"
                                wire:navigate />
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </x-card>
</div>
