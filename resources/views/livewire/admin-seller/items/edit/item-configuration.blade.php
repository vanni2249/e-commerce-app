<div>
    <x-card>
        <div class="grid grid-cols-6 gap-4">
            <!-- Main information -->
            <div class="col-span-full lg:col-span-2">
                <h2 class="text-md font-bold text-gray-900">Item configuration</h2>
                <p class="text-sm text-gray-600">
                    Configure the section and seller associated with this item.
                </p>
            </div>
            <!-- Information -->
            <div class="col-span-full lg:col-span-4">
                <div class="grid grid-cols-2 gap-4">
                    <!-- Seller -->
                    <div class="col-span-full md:col-span-1">
                        <x-label for="title" value="Seller" />
                        <div class="bg-gray-100 text-gray-600 rounded-md p-2">
                            {{ $item->seller->user->name ?? 'Zierra LLC' }}
                        </div>
                    </div>
                    
                    <!-- Shop -->
                    <div class="col-span-full md:col-span-1">
                        <x-label for="shop" value="Shop" />
                        <div class="bg-gray-100 text-gray-600 rounded-md p-2">
                            {{ $item->shop->name ?? 'No shop assigned' }}
                        </div>
                    </div>
                    <!-- Fulfillment -->
                    <div class="col-span-full md:col-span-1">
                        <x-label for="fulfillment" value="Fulfillment" />
                        <div class="bg-gray-100 text-gray-600 rounded-md p-2">
                            {{ $item->fulfillment->name ?? 'No fulfillment assigned' }}
                        </div>
                    </div>

                    <div class="col-span-full md:col-span-1">
                        <x-label for="title" value="Section" />
                        <div class="bg-gray-100 text-gray-600 rounded-md p-2">
                            {{ $item->section->name ?? 'No section assigned' }}
                        </div>
                    </div>
                    <div class="col-span-full">
                        <x-button variant="light" wire:click="handelConfigurationModal" type="button"
                            value="Edit Configuration" />
                    </div>
                </div>
            </div>
        </div>
    </x-card>

    <!-- Item Configuration Modal -->
    <x-modal name="item-configuration-modal" title="Item Configuration" size="lg">
        <form wire:submit.prevent='saveConfiguration'>
            <div class="grid grid-cols-1 gap-4">
                <!-- Shops -->
                <div>
                    <x-label value="Shops" />
                    <x-select wire:model="shop_id" @class(['w-full'])>
                        <option value="">Select a shops</option>
                        @foreach ($shops as $shop)
                            <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                        @endforeach
                    </x-select>
                    @error('shop_id')
                        <x-error message="{{ $message }}" />
                    @enderror
                </div>

                <!-- Fulfillment -->
                <div>
                    <x-label value="Fulfillment" />
                    <x-select wire:model="fulfillment_id" class="w-full">
                        <option value="">Select a fulfillment</option>
                        @foreach ($fulfillments as $fulfillment)
                            <option value="{{ $fulfillment->id }}">{{ $fulfillment->name }}</option>
                        @endforeach
                    </x-select>
                    @error('fulfillment_id')
                        <x-error message="{{ $message }}" />
                    @enderror
                </div>

                <!-- Section -->
                <div>
                    <x-label value="Section" />
                    <x-select wire:model="section_id" class="w-full">
                        <option value="">Select a section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </x-select>
                    @error('section_id')
                        <x-error message="{{ $message }}" />
                    @enderror
                </div>
            </div>
            <div class="mt-4 flex justify-end items-center space-x-2">
                <x-button type="submit" value="Save Changes" />
            </div>
        </form>
    </x-modal>
</div>
