<div>
    <x-card>
        <div class="flex justify-between">
            <div class="flex items-center space-x-4">
                <x-icon-link href="{{ route('admin.sellers.index') }}" icon="arrow-left"
                    class="text-gray-600 hover:text-gray-800" wire:navigate />
                <div>
                    <h1 class="text-lg font-bold">{{ $seller->store_name }}</h1>
                </div>
            </div>
            <div>
                @if ($seller->is_verified)

                    <x-dropdown>
                        <x-slot name="trigger">
                            <x-icon-button icon="ellipsis-vertical" />
                        </x-slot>
                        <x-slot name="content">
                            @if ($seller->is_active)
                                <x-dropdown-button @click="$dispatch('open-modal', 'disable-seller-modal')">Desactive
                                    seller</x-dropdown-button>
                            @else
                                <x-dropdown-button @click="$dispatch('open-modal', 'enable-seller-modal')">Active
                                    seller</x-dropdown-button>
                            @endif

                        </x-slot>
                    </x-dropdown>
                @else
                    <x-button primary @click="$dispatch('open-modal', 'verify-seller-modal')">Verify Seller</x-button>
                @endif
            </div>
        </div>
    </x-card>

    <!-- Verify Seller Modal -->
    <x-modal name="verify-seller-modal" title="Verify Seller">
        <p class="mb-2">Are you sure you want to verify this seller?</p>
        <x-button variant="danger" @click="$dispatch('close-modal', 'verify-seller-modal')">Cancel</x-button>
        <x-button variant="success" wire:click="verifySeller">Verify</x-button>

    </x-modal>
</div>
