<div>
    <header class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-semibold">Products</h2>
        @if ($showCreateItemButton)
            <x-icon-button icon="plus" wire:click="handleCreateItemModal" class="text-blue-500 hover:text-blue-700"
                title="Create modal" />
        @endif
        <!-- Create product -->
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
                    <div class="flex items-center space-x-4">
                        <div class="w-1/2">
                            <x-label value="Price" />
                            <br>
                            <x-input type="number" wire:model="price" step="0.01" @class(['w-full', 'border-red-300' => $errors->has('price')]) />
                            @error('price')
                                <x-error message="{{ $message }}" />
                            @enderror
                        </div>
                        <div class="w-1/2">
                            <x-label value="Shipping" />
                            <br>
                            <x-input type="number" wire:model="shipping_cost" step="0.01"
                                @class(['w-full', 'border-red-300' => $errors->has('shipping')]) />
                            @error('shipping_cost')
                                <x-error message="{{ $message }}" />
                            @enderror
                        </div>
                    </div>
                    @foreach ($errors->all() as $error)
                        <div class="text-red-500 text-sm">
                            {{ $error }}
                        </div>
                    @endforeach
                    <div>
                        <x-button type="submit" label="Save" />
                    </div>
                </div>
            </form>
        </x-modal>
    </header>
    <!-- Table products -->
    <div>
        <x-table>
            <x-slot name="head">
                <tr>
                    <th class="px-4 py-2">Id</th>
                    <th class="px-4 py-2">Sku</th>
                    <th class="px-4 py-2">Variants</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Shipping</th>
                    <th class="px-4 py-2">Inventories</th>
                    <th class="px-4 py-2">Sales</th>
                    <th class="px-4 py-2">Balance</th>
                    <th class="px-4 py-2 w-14">Actions</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @forelse ($item->products as $product)
                    <tr class="border-b border-gray-200">
                        <td class="p-4">{{ $product->id }}</td>
                        <td class="p-4">{{ $product->sku ?? '...' }}</td>
                        <td class="p-4 flex space-x-2">
                            @if ($product->variants->isNotEmpty())
                                @foreach ($product->variants as $variant)
                                    <div class="bg-blue-50 text-sm px-4 py-1 rounded-xl">
                                        <span class="font-semibold">{{ $variant->attribute->name }}:</span>
                                        {{ $variant->en_name }}
                                    </div>
                                @endforeach
                            @else
                                <span>...</span>
                            @endif
                        </td>
                        <td class="p-4">{{ $product->price }}</td>
                        <td class="p-4">{{ $product->shipping_cost }}</td>
                        <td class="p-4">{{ $product->inventories->sum('quantity') }}</td>
                        <td class="p-4">{{ $product->sales->sum('quantity') }}</td>
                        <td class="p-4">
                            {{ $product->inventories->sum('quantity') + $product->sales->sum('quantity') }}</td>
                        <td class="p-2 w-14 text-right">
                            <x-icon-button type="button" class="text-blue-500 hover:text-blue-700" icon="edit" />
                            <x-icon-button type="button" class="text-blue-500 hover:text-blue-700" icon="eye" />
                            <x-icon-button type="button" class="text-red-500 hover:text-red-700" icon="delete" />
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
    <!-- Edit product modal -->
    <x-modal name="edit-product-modal" title="Edit product" show="true">
        <form wire:submit.prevent="updateProduct">
            <div class="space-y-4">
                <div>
                    <x-label value="Sku" />
                    <br>
                    <x-input type="text" wire:model="sku" @class(['w-full', 'border-red-300' => $errors->has('sku')]) />
                    @error('sku')
                        <x-error message="{{ $message }}" />
                    @enderror
                </div>
                <div class="flex items-center space-x-4">
                    <div class="w-1/2">
                        <x-label value="Price" />
                        <br>
                        <x-input type="number" wire:model="price" step="0.01" @class(['w-full', 'border-red-300' => $errors->has('price')]) />
                        @error('price')
                            <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <x-label value="Shipping" />
                        <br>
                        <x-input type="number" wire:model="shipping_cost" step="0.01"
                            @class(['w-full', 'border-red-300' => $errors->has('shipping')]) />
                        @error('shipping_cost')
                            <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                </div>
                @foreach ($errors->all() as $error)
                    <div class="text-red-500 text-sm">
                        {{ $error }}
                    </div>
                @endforeach
                <div>
                    <x-button type="submit" label="Save" />
                </div>
    </x-modal>
</div>
