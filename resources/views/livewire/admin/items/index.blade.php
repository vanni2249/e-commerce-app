<div>
    <div class="px-4">
        <x-card>
            <header class="flex justify-between items-center mb-4">
                <h1 class="text-lg font-bold">Items</h1>
                <x-icon-button wire:click="handleCreateItemModal" icon="plus" />
                <x-modal name="create-item-modal" title="Create item" size="md">
                    @if ($sellers)
                        <form wire:submit="store" class="space-y-4">
                            <div>
                                <x-label value="Seller" />
                                <x-select wire:model="seller_id" class="w-full">
                                    <option value="">Select a seller</option>
                                    @foreach ($sellers as $seller)
                                        <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                    @endforeach

                                </x-select>
                                @error('seller_id')
                                    <x-error message="{{ $message }}" />
                                @enderror
                            </div>
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
                            <div>
                                <x-button type="Submit" variant="light" size="sm" label="Create" />
                            </div>
                        </form>
                    @endif
                </x-modal>
            </header>
            @include('admin-sellers.items.table')
        </x-card>
    </div>
</div>
