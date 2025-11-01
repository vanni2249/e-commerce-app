<div>
    <x-card>
        <header class="flex justify-between items-center">
            <h2 class="text-md font-bold">Variants</h2>
            @if ($item->variants->isEmpty() && $item->products->count() === 0)
                <x-icon-button wire:click="handleAttributesModal" icon="plus" />
            @endif
        </header>

        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-full lg:col-span-2">
                <p class="text-sm text-gray-600">
                    Item variants and attributes.
                </p>
            </div>
            <!-- Table -->
            <div class="col-span-full lg:col-span-4">
                @forelse ($item->attributes as $attribute)
                    <div class="w-full">
                        <header class="flex justify-between items-end pt-4 pb-1">
                            <x-label for="{{ $attribute->name }}" value="{{ $attribute->name }}" />
                            <x-button variant="light" wire:click="handleVariantModal({{ $attribute->id }})"
                                size="sm" value="Add {{ $attribute->name }}" />
                        </header>
                        <x-table>
                            <x-slot name="head">
                                <tr>
                                    <th class="p-4 w-64">English<br /> name</th>
                                    <th class="p-4">Spanish<br /> name</th>
                                    <th class="p-4 w-14">Action</th>
                                </tr>
                            </x-slot>
                            <x-slot name="body">
                                @forelse ($item->variants->where('attribute_id', $attribute->id) as $variant)
                                    <tr class="hover:bg-gray-50 border-b border-gray-200">
                                        <td class="p-4">
                                            {{ $variant->getTranslation('name', 'en') }}
                                        </td>
                                        <td class="p-4">
                                            {{ $variant->getTranslation('name', 'es') }}
                                        </td>
                                        <td class="p-4 space-x-1 text-right">
                                            <x-icon-button wire:click="handleEditVariantModal({{ $variant->id }})"
                                                icon="edit" />
                                            @if ($variant->products->count() === 0)
                                                <x-icon-button wire:click="handleDeleteVariantModal({{ $variant->id }})"
                                                    icon="delete" />
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="p-4" colspan="3">
                                            No variants added yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </x-slot>
                        </x-table>
                    </div>
                @empty
                    <p class="text-gray-800">No attributes added.</p>
                @endforelse
            </div>
        </div>
    </x-card>
    <!-- Modal add attributes -->
    <x-modal name="sync-attributes-modal" title="Sync attributes">
        @if ($attrs)
            <form wire:submit="syncAttributes">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 py-4">
                    @foreach ($attrs as $attribute)
                        <div class="bg-gray-100 p-2 rounded flex items-center">
                            <input type="checkbox" wire:model="selectedAttributes" value="{{ $attribute->id }}"
                                id="attribute-{{ $attribute->id }}" class="mr-2">
                            <label for="attribute-{{ $attribute->id }}"
                                class="text-sm">{{ $attribute->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="bg-blue-500 cursor-pointer text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors duration-200">
                        Sync Attributes
                    </button>
                </div>
            </form>
        @endif
    </x-modal>
    <!-- Modal Create Variant -->
    <x-modal name="create-variant-modal" title="Create Variant" size="lg">
        <form wire:submit="storeVariant" class="space-y-4">
            <div>
                <x-label value="English name" />
                <x-input wire:model="en_name" type="text" class="w-full" />
                @error('en_name')
                    <x-error message="{{ $message }}" />
                @enderror
            </div>
            <div>
                <x-label value="Spanish name" />
                <x-input wire:model="es_name" type="text" class="w-full" />
                @error('es_name')
                    <x-error message="{{ $message }}" />
                @enderror
            </div>
            <div>
                <x-button type="submit" label="Save" />
            </div>
        </form>
    </x-modal>

    <!-- Modal Edit Variant -->
    <x-modal name="edit-variant-modal" title="Edit Variant">
        <form wire:submit="updateVariant" class="space-y-4">
            <div>
                <x-label value="Name" />
                <x-input wire:model="en_name" type="text" class="w-full" />
                @error('en_name')
                    <x-error message="{{ $message }}" />
                @enderror
            </div>
            <div>
                <x-label value="Spanish name" />
                <x-input wire:model="es_name" type="text" class="w-full" />
                @error('es_name')
                    <x-error message="{{ $message }}" />
                @enderror
            </div>
            <div>
                <x-button type="submit" label="Save" />
            </div>
        </form>
    </x-modal>

    <!-- Modal Delete Variant -->
    <x-modal name="delete-variant-modal" title="Delete Variant">
        <div class="">
            <p>Are you sure you want to delete this variant?</p>
        </div>
        <div class="flex space-x-2 justify-end">
            <x-button label="Cancel" @click="$dispatch('close-modal', 'delete-variant-modal')" />
            <x-button label="Delete" variant="danger" wire:click="deleteVariant" />
        </div>
    </x-modal>
</div>
