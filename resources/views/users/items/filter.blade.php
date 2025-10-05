<div class="space-y-6">
    <h3 class="text-xs font-semibold text-gray-800 uppercase">
        Client Type
    </h3>
    @if ($items->count() > 0)
        <div class="space-y-2">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <x-checkbox wire:model.live="filters.is_to_customer" id="filter-is_to_customer" label="Customer" />
                    <span class="text-gray-800">Customer</span>
                </div>
                <div class="text-gray-600 text-sm">
                </div>
            </div>
            <div class="flex justify-between items-center">
                <div class="flex justify-center space-x-2">
                    <x-checkbox wire:model.live="filters.is_to_business" id="filter-is_to_business" label="Business" />
                    <span class="text-gray-800">Business</span>
                </div>
                <div class="text-gray-600 text-sm">
                </div>
            </div>
        </div>
    @else
        <div class="text-gray-600 text-sm">
            No items found.
        </div>
    @endif
    <h3 class="text-xs font-semibold text-gray-800 uppercase">
        Categories
    </h3>

    <div class="space-y-2">
        @forelse ($categories as $category)
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" wire:model.live="filters.categories" name=""
                        value="{{ $category->id }}" id="">
                    <span class="text-gray-800">{{ $category->en_name }}</span>
                </div>
                <div class="text-gray-600 text-sm">
                    {{ $category->items_count }}
                </div>
            </div>
        @empty
            <div class="text-gray-600 text-sm">
                No categories found.
            </div>
        @endforelse
    </div>
</div>
