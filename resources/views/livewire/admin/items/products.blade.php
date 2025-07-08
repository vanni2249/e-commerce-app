<div>
    <header class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-semibold">Products</h2>
        <x-icon-button icon="plus" wire:click="handleCreateItemModal" class="text-blue-500 hover:text-blue-700"
            title="Create modal" />
        <x-modal name="create-item-modal" title="Create item">
            <form wire:submit.prevent="storeItem">
                <div class="space-y-4">
                    <div>
                        <x-label value="Sku" />
                        <br>
                        <x-input type="text" wire:model="sku" @class(['w-full', 'border-red-300' => $errors->has('sku')]) />
                        @error('sku')
                            <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                    @forelse ($item->attributes as $i => $attribute)
                        <div>
                            <x-label value="{!! $attribute->name !!}" />
                            <br>
                            <x-select name="variants[{{ $i }}][name]"
                                wire:model="variants.{{ $i }}.name" @class([
                                    'w-full',
                                    'border-red-300' => $errors->has('variants.' . $i . '.name'),
                                ])>
                                <option value="">Select {{ $attribute->name }}</option>
                                @foreach ($attribute->variants as $variant)
                                    <option value="{{ $variant->id }}">{{ $variant->en_name }}</option>
                                @endforeach
                            </x-select>
                            @error('variants.' . $i . '.name')
                                <x-error message="{{ $message }}" />
                            @enderror
                        </div>
                        @empty
                        @endforelse
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    <div>
                        <x-button type="submit" label="Save" />
                    </div>
                </div>
            </form>
        </x-modal>
    </header>
    <div>
        <x-table>
            <x-slot name="head">
                <tr>
                    <th class="p-4">Id's</th>
                    <th class="p-4">SKU</th>
                    <th class="p-4">Variants</th>
                    <th class="p-4">Inventories</th>
                    <th class="p-4">Sales</th>
                    <th class="p-4">Balance</th>
                    <th class="p-4 w-14">Actions</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @forelse ($item->products as $product)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="p-4">{{ $product->id }}</td>
                        <td class="p-4">{{ $product->sku ?? '...' }}</td>
                        <td class="p-4 flex space-x-2">
                            @if ($product->attributes)
                            <div class="bg-blue-50 text-sm px-4 py-1 rounded">
                                <span class="font-semibold">Color:</span> Red
                            </div>
                            <div class="bg-blue-50 text-sm px-4 py-1 rounded">
                                <span class="font-semibold">Size:</span> Medium
                            </div>
                                
                            @else
                                <span>...</span>
                            @endif
                        </td>
                        <td class="p-4">{{ $product->inventories->sum('quantity') }}</td>
                        <td class="p-4">{{ $product->sales->sum('quantity') }}</td>
                        <td class="p-4">{{ $product->inventories->sum('quantity') + $product->sales->sum('quantity') }}</td>
                        <td class="p-4 w-14">
                            <x-icon-button icon="edit" class="text-blue-500 hover:text-blue-700" title="Edit" />
                            <x-icon-button icon="eye" class="text-blue-500 hover:text-blue-700" title="View" />
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center p-4 text-gray-500">No products found.</td>
                </tr>
                @endforelse
            </x-slot>
        </x-table>
    </div>
</div>
