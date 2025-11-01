<div class="space-y-4">
    <!-- Header -->
    <header class="flex justify-between items-center px-1">
        <h1 class="text-md font-bold">{{ $item->number }}</h1>
    </header>

    <!-- Item images -->
    <livewire:admin-seller.items.edit.item-images :item="$item" />

    <!-- Item configuration -->
    <livewire:admin-seller.items.edit.item-configuration :item="$item" />

    <!-- Item title -->
    <livewire:admin-seller.items.edit.item-title :item="$item" />

    <!-- Description -->
    <livewire:admin-seller.items.edit.item-description :item="$item" />

    <!-- Shipping policy -->
    <livewire:admin-seller.items.edit.item-shipping-policy :item="$item" />

    <!-- Return policy -->
    <livewire:admin-seller.items.edit.item-return-policy :item="$item" />

    {{-- <x-card>
        <div class="grid grid-cols-6 gap-4">
            <!-- Specifics -->
            <div class="col-span-full lg:col-span-2">
                <h2 class="text-md font-bold text-gray-900">Specifics</h2>
                <p class="text-sm text-gray-600 mb-4">
                    Additional details about the item.
                </p>
            </div>
            <div class="col-span-full lg:col-span-4">
                <header class="flex justify-between items-end mb-1">
                    <x-label for="title" value="English" class="mb-2" />
                    <x-dropdown>
                        <x-slot name="trigger">
                            <x-icon-button icon="ellipsis-vertical" />
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link @click="$dispatch('open-modal', 'new_en_specification-modal')">
                                Add English Specification
                            </x-dropdown-link>
                            <x-dropdown-link>
                                Add specification from template
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </header>
                <x-table>
                    <x-slot name="head">
                        <tr>
                            <th class="p-4 w-1/4">Label</th>
                            <th class="p-4">Value</th>
                            <th class="p-4 w-14">Action</th>
                        </tr>
                    </x-slot>
                    <x-slot name="body">
                        @forelse ((array) $en_specifications as $i => $specification)
                            <tr class="hover:bg-gray-50 border-b border-gray-200">
                                <td class="p-4">
                                    {{ $specification['label'] ?? '...' }}
                                </td>
                                <td class="p-4">
                                    {{ $specification['value'] ?? '...' }}
                                </td>
                                <td class="p-4 text-right">
                                    <x-icon-button wire:click='removeEnglishSpecification({{ $i }})'
                                        icon="delete" size="sm" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-4 text-center text-gray-600">
                                    No specifications added yet.
                                </td>
                            </tr>
                        @endforelse
                    </x-slot>
                </x-table>
                <x-modal name="new_en_specification-modal" title="Add english specification" size="lg">
                    <form wire:submit.prevent='addEnglishSpecification'>
                        <div class="grid grid-cols-1 gap-4">
                            <div class="col-span-1">
                                <x-label for="label" value="Label" />
                                <x-input wire:model.lazy='new_en_specification.label' type="text" class="w-full" />
                                @error('new_en_specification.label')
                                    <x-error message="{{ $message }}" />
                                @enderror
                            </div>
                            <div class="col-span-1">
                                <x-label for="value" value="Value" />
                                <x-input wire:model.lazy='new_en_specification.value' type="text" class="w-full" />
                                @error('new_en_specification.value')
                                    <x-error message="{{ $message }}" />
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end items-center space-x-2">
                            <x-button type="submit" value="Add Specification" />
                        </div>
                    </form>
                </x-modal>
                <div class="my-4"></div>
                <header class="flex justify-between items-end mb-1">
                    <x-label for="title" value="Spanish" class="mb-2" />
                    <x-dropdown>
                        <x-slot name="trigger">
                            <x-icon-button icon="ellipsis-vertical" />
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link @click="$dispatch('open-modal', 'new_es_specification-modal')">
                                Add Spanish Specification
                            </x-dropdown-link>
                            <x-dropdown-link>
                                Add specification from template
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </header>
                <x-table>
                    <x-slot name="head">
                        <tr>
                            <th class="p-4 w-1/4">Label</th>
                            <th class="p-4">Value</th>
                            <th class="p-4 w-14">Action</th>
                        </tr>
                    </x-slot>
                    <x-slot name="body">
                        @forelse ((array)$es_specifications as $i => $specification)
                            <tr class="hover:bg-gray-50 border-b border-gray-200">
                                <td class="p-4">
                                    {{ $specification['label'] ?? '...' }}
                                </td>
                                <td class="p-4">
                                    {{ $specification['value'] ?? '...' }}
                                </td>
                                <td class="p-4 text-right">
                                    <x-icon-button wire:click='removeEnglishSpecification({{ $i }})'
                                        icon="delete" size="sm" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-4 text-center text-gray-600">
                                    No specifications added yet.
                                </td>
                            </tr>
                        @endforelse
                    </x-slot>
                </x-table>
                <x-modal name="new_es_specification-modal" title="Add spanish specification" size="lg">
                    <form wire:submit.prevent='addSpanishSpecification'>
                        <div class="grid grid-cols-1 gap-4">
                            <div class="col-span-1">
                                <x-label for="label" value="Label" />
                                <x-input wire:model.lazy='new_es_specification.label' type="text" class="w-full" />
                                @error('new_es_specification.label')
                                    <x-error message="{{ $message }}" />
                                @enderror
                            </div>
                            <div class="col-span-1">
                                <x-label for="value" value="Value" />
                                <x-input wire:model.lazy='new_es_specification.value' type="text" class="w-full" />
                                @error('new_es_specification.value')
                                    <x-error message="{{ $message }}" />
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 flex justify-start items-center space-x-2">
                            <x-button type="submit" value="Add Specification" />
                        </div>
                    </form>
                </x-modal>
            </div>
        </div>
    </x-card> --}}

    <!-- Categories -->
    <livewire:admin-seller.items.edit.item-categories :item="$item" />

    <!-- Attributes & Variants -->
    <livewire:admin-seller.items.edit.item-attributes-variants :item="$item" />


    <!-- Products -->
    <livewire:admin-seller.items.edit.item-products :item="$item" />


    <!-- Approve and post -->
    {{-- @if (($item->products()->count() > 0) & $admin)
        <x-card>
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Approve item</h2>
                    <p class="text-sm text-gray-600 mb-4">
                        Approve and post date of the item to make it visible to customers.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-2 gap-4">
                        @if ($item->approved_at == null)
                            <div class="col-span-2 lg:col-span-1">
                                <x-label for="title" value="Approved datetime" />
                                <div class="w-full">
                                    <x-button @click="$dispatch('open-modal', 'approved-modal')" type="button"
                                        value="Approve item" />
                                </div>
                                <x-modal name="approved-modal" title="Approve item">
                                    <form wire:submit.prevent='approveItem'>
                                        <p class="text-base text-gray-600 mb-4">
                                            Are you sure you want to approve this item? This action cannot be
                                            undone.
                                        </p>
                                        <div class="col-span-1">
                                            <x-label for="available_at" value="Available date" />
                                            <x-input wire:model.lazy='available_at' type="datetime-local"
                                                class="w-full" />
                                            @error('available_at')
                                                <x-error message="{{ $message }}" />
                                            @enderror
                                        </div>
                                        <div class="mt-4 flex items-center space-x-2">
                                            <x-button type="submit" value="Yes, approve item" />
                                        </div>
                                    </form>
                                </x-modal>
                            </div>
                        @else
                            <div class="col-span-2 lg:col-span-1">
                                <x-label for="title" value="Approved by" />
                                <x-input disabled="true" wire:model='approved_by' type="text" class="w-full" />
                            </div>
                            <div class="col-span-2 lg:col-span-1">
                                <x-label for="title" value="Approved datetime" />
                                <x-input disabled="true" wire:model='approved_at' type="datetime" class="w-full" />
                            </div>
                            <div class="col-span-2 lg:col-span-1">
                                <x-label for="title" value="Available datetime" />
                                <x-input disabled="true" wire:model='available_at' type="datetime" class="w-full" />
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </x-card>
    @endif --}}
</div>
