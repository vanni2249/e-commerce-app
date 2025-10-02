<div>
    @if (session('error'))
        <div class="mb-4">
            <x-alert variant="danger" title="Warning!">
                <p>{{ session('error') }}</p>
            </x-alert>
        </div>
    @endif
    <!-- Add New Address Card -->
    <x-card>
        <header class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">Addresses</h2>
            <x-icon-button @click="$dispatch('open-modal', 'create-address-modal')" icon="plus" />
        </header>

    </x-card>

    <!-- Addresses Grid -->
    <div class="grid grid-cols-12 gap-4 mt-4">
        @forelse ($addresses as $addr)
            <div @class([
                'col-span-12 md:col-span-6 lg:col-span-4',
                'border border-green-300 rounded-xl' => session('message'),
            ])>
                <x-card class="h-full bg-white">
                    <x-address name="{{ $addr->name }}" type="{{ $addr->type }}" line1="{{ $addr->line1 }}"
                        line2="{{ $addr->line2 }}" city="{{ $addr->city->name }}" state="{{ $addr->state_code }}"
                        code="{{ $addr->postal_code }}" phone="{{ $addr->phone }}"
                        is_approved="{{ $addr->is_approved }}" />
                    @if (!$addr->is_default)
                        <footer class="mt-4">
                            <x-button wire:click="updateAddressModal({{ $addr->id }})"
                                variant="light">Edit</x-button>
                            <x-button wire:click="removeAddressModal({{ $addr->id }})"
                                variant="light">Delete</x-button>
                            @if ($addr->is_approved)
                                <x-button wire:click="setDefaultAddressModal({{ $addr->id }})" variant="light">Set
                                    as
                                    Default</x-button>
                            @endif
                        </footer>
                    @else
                        <footer class="mt-4">
                            <span
                                class="mt-2 w-full text-sm block text-center bg-green-100 text-green-800 py-2 rounded">Default
                                Address</span>
                        </footer>
                    @endif
                </x-card>
            </div>
        @empty
            <div class="col-span-full">
                <x-card>
                    <p class="text-center text-gray-500">No addresses found. Please add a new address.</p>
                </x-card>
            </div>
        @endforelse
    </div>
    <!-- Pagination -->


    <!-- Create address modal -->
    <x-modal name="create-address-modal" title="Add New Address" size="md">
        <form wire:submit.prevent="storeAddress">
            @include('users.addresses.form')
        </form>
    </x-modal>

    <!-- Update address modal -->
    <x-modal name="update-address-modal" title="Update Address" size="md">
        <form wire:submit.prevent="updateAddress">
            @include('users.addresses.form')
        </form>
    </x-modal>

    <!-- Set Default address modal -->
    <x-modal name="set-default-address-modal" title="Set Default Address" size="md">
        <form wire:submit.prevent="setDefaultAddress">
            <p>Are you sure you want to set this address as your default address?</p>
            @if ($address)
                <div class="mt-4 p-4 rounded bg-gray-100">
                    <x-address name="{{ $address->name }}" type="{{ $address->type }}" line1="{{ $address->line1 }}"
                        line2="{{ $address->line2 }}" city="{{ $address->city->name }}"
                        state="{{ $address->state_code }}" code="{{ $address->postal_code }}"
                        phone="{{ $address->phone }}" is_approved="{{ $address->is_approved }}" />
                </div>
            @else
                <p class="text-red-500">No address selected.</p>
            @endif
            <div class="mt-4 flex justify-end gap-2">
                {{-- <x-button type="button" variant="light" @click="$dispatch('close')">Cancel</x-button> --}}
                <x-button type="submit">Set as Default</x-button>
            </div>
        </form>
    </x-modal>

    <!-- Remove address modal -->
    <x-modal name="remove-address-modal" title="Remove Address" size="md">
        <form wire:submit.prevent="removeAddress">
            <p>Are you sure you want to remove this address?</p>
            @if ($address)
                <div class="mt-4 p-4 rounded bg-gray-100">
                    <x-address name="{{ $address->name }}" type="{{ $addr->type }}" line1="{{ $address->line1 }}"
                        line2="{{ $address->line2 }}" city="{{ $address->city->name }}"
                        state="{{ $address->state_code }}" code="{{ $address->postal_code }}"
                        phone="{{ $address->phone }}" is_approved="{{ $address->is_approved }}" />
                </div>
            @else
                <p class="text-red-500">No address selected.</p>
            @endif
            <div class="mt-4 flex justify-end gap-2">
                {{-- <x-button wire:ignore type="button" variant="light" @click="$dispatch('close-modal', 'remove-address-modal')">Cancel</x-button> --}}
                <x-button type="submit" variant="danger">Remove</x-button>
            </div>
        </form>
    </x-modal>
</div>
