<div class="space-y-4">
    <header class="flex items-center justify-between">
        <h2 class="text-lg font-semibold">Detail</h2>
        <x-icon-button wire:click="handleEditItemModal" />
        <!-- Modal -->
        <x-modal name="edit-item-modal" title="Edit item">
            @if ($sections)
                <form wire:submit="update" class="space-y-4">
                    <div>
                        <x-label value="Seller" />
                        <br>
                        <x-select wire:model="seller_id" class="w-full">
                            <option value="">Select a seller</option>
                            @foreach ($sellers as $seller)
                                <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                            @endforeach
                        </x-select>
                        <br>
                        @error('seller_id')
                            <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                    <div>
                        <x-label value="Section" />
                        <br>
                        <x-select wire:model="section_id" class="w-full">
                            <option value="">Select a section</option>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </x-select>
                        <br>
                        @error('section_id')
                            <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                    <div>
                        <x-label value="Item title" />
                        <br>
                        <x-input wire:model="title" type="text" class="w-full" />
                        <br>
                        @error('title')
                            <x-error message="{{ $message }}" />
                        @enderror

                    </div>
                    <div>
                        <x-label value="Item sku" />
                        <br>
                        <x-input wire:model="sku" type="text" class="w-full md:w-1/2" />
                        <br>
                        @error('sku')
                            <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                    <div>
                        <x-label value="Item description" />
                        <br>
                        <x-textarea wire:model="description" class="w-full" />
                        <br>
                        @error('description')
                            <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                    <div>
                        <x-label value="Item specifications" />
                        <div class="w-full text-gray-500 text-sm mt-1 bg-gray-100 p-4 rounded-xl">
                            {{ $item->specification ?? 'N/A' }}
                        </div>
                        <br>
                        @error('specification')
                            <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                    <div class="mt-4">
                        <x-button type="submit" class="">
                            Update Item
                        </x-button>
                    </div>
                </form>
            @endif
        </x-modal>
    </header>

    <!-- List -->
    <div>
        <x-label value="Seller" />
        <div class="w-full md:w-1/2 text-gray-800 text-sm mt-1 bg-gray-100 p-4 rounded-xl">
            {{ $item->seller->name ?? 'N/A' }}
        </div>
    </div>
    <div>
        <x-label value="Section" />
        <div class="w-full md:w-1/2 text-gray-800 text-sm mt-1 bg-gray-100 p-4 rounded-xl">
            {{ $item->section->name ?? 'N/A' }}
        </div>
    </div>
    <div>
        <x-label value="Item title" />
        <div class="text-gray-800 text-sm mt-1 bg-gray-100 p-4 rounded-xl">
            {{ $item->title ?? 'N/A' }}
        </div>
    </div>
    <div>
        <x-label value="Item sku" />
        <div class="w-full md:w-1/2 text-gray-800 text-sm mt-1 bg-gray-100 p-4 rounded-xl">
            {{ $item->sku ?? 'N/A' }}
        </div>
    </div>
    <div>
        <x-label value="Item description" />
        <div class="w-full text-gray-800 text-sm mt-1 bg-gray-100 p-4 rounded-xl">
            {{ $item->description ?? 'N/A' }}
        </div>
    </div>
    <div>
        <x-label value="Item specifications" />
        <div class="w-full text-gray-800 text-sm mt-1 bg-gray-100 p-4 rounded-xl">
            {{ $item->specification ?? 'N/A' }}
        </div>
    </div>
    {{-- Success is as dangerous as failure. --}}
</div>
