<div class="space-y-4">
    <header class="flex items-center justify-between">
        <h2 class="text-lg font-semibold">Variants</h2>
        @if ($item->variants->isEmpty() && $item->products->isEmpty())
            <x-icon-link wire:click="handleAttributesModal" icon="plus" class="text-blue-500 hover:text-blue-700" />
        @endif
    </header>

    <!-- Modal add attributes -->
    <x-modal name="sync-attributes-modal" title="Sync attributes">
        @if ($attrs)
            <form wire:submit="syncAttributes">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 py-4">
                    @foreach ($attrs as $attribute)
                        <div class="bg-gray-100 p-2 rounded flex items-center">
                            <input type="checkbox" wire:model="selectedAttributes" value="{{ $attribute->id }}"
                                id="attribute-{{ $attribute->id }}" class="mr-2">
                            <label for="attribute-{{ $attribute->id }}" class="text-sm">{{ $attribute->name }}</label>
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

    <!-- List attributes -->
    <ul class="space-y-2">

        @forelse ($item->attributes as $attribute)
            <div class="bg-gray-100 rounded-xl">
                <li class="bg-gray-100 text-sm rounded-xl flex justify-between items-center">
                    <div class=" flex justify-between items-center">
                        <!-- Attribute name -->
                        <span class="pt-2 w-32 px-4 rounded-l-xl font-semibold">
                            {{ $attribute->name }}
                        </span>
                    </div>
                </li>
                <!-- Variant name -->
                <ul class="flex flex-wrap gap-1 items-center bg-gray-100 py-2 rounded-xl space-x-1 px-2">
                    @foreach ($attribute->variants as $variant)
                        <li class="inline-block bg-gray-200 text-sm px-2 py-1 rounded">
                            <div class="flex justify-between">
                                <span>
                                    {{ $variant->en_name }}
                                </span>
                                <div class="flex space-x-1 pl-2">
                                    <!-- Edit button variant -->
                                    <button class="text-blue-500 cursor-pointer hover:text-blue-700"
                                        wire:click="handleEditVariantModal({{ $variant->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                            class="size-4">
                                            <path
                                                d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                                            <path
                                                d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
                                        </svg>
                                    </button>
                                    <!-- Delete button variant -->
                                    @if ($item->products->count() < 0)
                                        <button class="text-red-500 cursor-pointer hover:text-red-700"
                                            wire:click="deleteVariant({{ $variant->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd"
                                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm2.78-4.22a.75.75 0 0 1-1.06 0L8 9.06l-1.72 1.72a.75.75 0 1 1-1.06-1.06L6.94 8 5.22 6.28a.75.75 0 0 1 1.06-1.06L8 6.94l1.72-1.72a.75.75 0 1 1 1.06 1.06L9.06 8l1.72 1.72a.75.75 0 0 1 0 1.06Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                    @if ($item->products->isEmpty())
                        <li>
                            <span class="text-sm text-blue-500 px-2 py-1 cursor-pointer hover:text-blue-700"
                                wire:click="handleVariantModal({{ $attribute->id }})">Add {{ $attribute->name }}</span>
                        </li>
                    @endif
                </ul>
            </div>
        @empty
            <li class="bg-gray-100 text-sm p-4 rounded-xl">
                <span class="text-gray-800">No attributes added.</span>
            </li>
        @endforelse
    </ul>

    <!-- Modal Create Variant -->
    <x-modal name="create-variant-modal" title="Create Variant">
        <form wire:submit="storeVariant" class="space-y-4">
            <div>
                <x-label value="Name" />
                <x-input wire:model="en_name" type="text" class="w-full" />
                @error('en_name')
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
                <x-button type="submit" label="Save" />
            </div>
        </form>
    </x-modal>
</div>
