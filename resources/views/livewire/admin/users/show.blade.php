<div>
    <x-card>
        <header class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <x-icon-link href="{{ route('admin.users.index') }}" icon="arrow-left" class="text-gray-600 hover:text-gray-800" wire:navigate />
                <div>
                    <h2 class="text-md font-bold">{{ $user->number }}</h2>
                    <div class="flex items-center space-x-2">
                        <p class="text-sm text-gray-600">{{ $user->name }}</p>
                        <x-badge color="{{ $user->is_active ? 'success' : 'danger' }}">{{ $user->is_active ? 'Active' : 'Disabled' }}</x-badge>
                    </div>
                </div>
            </div>
            <div>
                <x-dropdown>
                    <x-slot name="trigger">
                        <x-icon-button icon="ellipsis-vertical" />
                    </x-slot>
                    <x-slot name="content">
                        @if ($user->is_active)
                            <x-dropdown-button
                                @click="$dispatch('open-modal', 'disable-user-modal')">Disable</x-dropdown-button>
                            
                        @else
                            <x-dropdown-button
                                @click="$dispatch('open-modal', 'enable-user-modal')">Enable</x-dropdown-button>
                        @endif
                    </x-slot>
                </x-dropdown>
            </div>
        </header>
    </x-card>

    <!-- Disable User Modal -->
    <x-modal name="disable-user-modal" title="Disable User">
        <p class="mb-2">Are you sure you want to disable this user?</p>
        <x-button @click="$dispatch('close-modal', 'disable-user-modal')">Cancel</x-button>
        <x-button variant="danger" wire:click="disableUser">Disable</x-button>
    </x-modal>

    <!-- Enable User Modal -->
    <x-modal name="enable-user-modal" title="Enable User">
        <p class="mb-2">Are you sure you want to enable this user?</p>
        <x-button @click="$dispatch('close-modal', 'enable-user-modal')">Cancel</x-button>
        <x-button variant="success" wire:click="enableUser">Enable</x-button>
    </x-modal>
</div>
