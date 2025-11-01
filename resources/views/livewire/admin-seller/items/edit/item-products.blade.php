<div>
    <x-card>
        <header class="flex justify-between items-center mb-1">
            <h2 class="text-md font-bold text-gray-900">Item products</h2>
            @if ($showCreateProductButton)
                <x-icon-button wire:click="handleCreateProductModal" icon="plus" />
            @endif
        </header>

        <!-- Products table -->
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-full lg:col-span-2">
                <p class="text-sm text-gray-600">
                    Item products and stock keeping units (SKUs).
                </p>
            </div>
            <div class="col-span-full lg:col-span-4">
                <div class="space-y-2">
                    <x-table>
                        <x-slot name="head">
                            <tr>
                                <th class="p-4 w-32">Product<br />Number</th>
                                <th class="p-4 w-24">SKU</th>
                                <th class="p-4">Price</th>
                                <th class="p-4">Shipping</th>
                                <th class="p-4">Inventory</th>
                                <th class="p-4">Sales</th>
                                <th class="p-4">Stock</th>
                                <th class="p-4">Variant</th>
                                <th class="p-4 w-14 text-right">Action</th>
                            </tr>
                        </x-slot>
                        <x-slot name="body">
                            @forelse ($item->products as $product)
                                <tr class="hover:bg-gray-50 border-b border-gray-200">
                                    <!-- Number -->
                                    <td class="p-4">
                                        {{ $product->number ?? '...' }}
                                    </td>
                                    <!-- SKU -->
                                    <td class="p-4">
                                        {{ $product->sku ?? '...' }}
                                    </td>
                                    <!-- Price -->
                                    <td class="p-4">
                                        {{ $product->price ?? '...' }}
                                    </td>
                                    <!-- Shipping -->
                                    <td class="p-4">
                                        {{ $product->shipping_cost == 0 ? 'Free' : $product->shipping_cost }}
                                    </td>
                                    <!-- Inventory -->
                                    <td class="p-4">
                                        {{ $product->sumInventories() ?? '...' }}
                                    </td>
                                    <!-- Sales -->
                                    <td class="p-4">
                                        {{ $product->sumSales() ?? '...' }}
                                    </td>
                                    <!-- Stock -->
                                    <td class="p-4">
                                        {{ $product->stock() ?? '...' }}
                                    </td>
                                    <!-- Variant -->
                                    <td class="p-4">
                                        @forelse ($product->variants as $variant)
                                            <span
                                                class="inline-block bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded mr-1">
                                                {{ $variant->attribute->name }}: {{ $variant->name }}
                                            </span>

                                        @empty
                                            ...
                                        @endforelse
                                    </td>
                                    <!-- Inventory -->
                                    <td class="p-4 flex gap-2">
                                        <x-icon-button wire:click="handleProductEditModal({{ $product->id }})"
                                            icon="edit" />
                                        @if ($product->inventories->count() === 0)
                                            <x-icon-button wire:click="handleProductDeleteModal({{ $product->id }})"
                                                icon="delete" />
                                        @endif
                                        <x-icon-link
                                            href="{{ route($admin ? 'admin.products.show' : 'sellers.products.show', ['product' => $product->id]) }}"
                                            icon="eye" />
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-4 text-left text-gray-600">
                                        No products added yet.
                                    </td>
                                </tr>
                            @endforelse
                        </x-slot>
                    </x-table>
                </div>
            </div>
        </div>
        <!-- Create product -->
        <x-modal name="create-item-modal" title="Create product">
            <form wire:submit.prevent="storeProduct">
                <div class="space-y-4">
                    @error('combination')
                        <div class="bg-red-200 p-4 rounded border border-red-300" role="alert">
                            <x-error message="{{ $message }}" />
                        </div>
                    @enderror
                    <div>
                        <x-label value="Sku" />
                        <br>
                        <x-input type="text" wire:model="product_sku" @class(['w-full', 'border-red-300' => $errors->has('product_sku')]) />
                        @error('product_sku')
                            <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                    @if (!empty($item->attributes))
                        @foreach ($item->attributes as $i => $attribute)
                            <div>
                                <x-label value="{!! $attribute->name !!}" />
                                <br>
                                <x-select name="variants[{{ $i }}][name]"
                                    wire:model.defer="product_variants.{{ $i }}.id"
                                    @class([
                                        'w-full',
                                        'border-red-300' => $errors->has('product_variants.' . $i . '.id'),
                                    ])>
                                    <option value="">Select {{ $attribute->name }}</option>
                                    @foreach ($item->variants->where('attribute_id', $attribute->id) as $variant)
                                        <option value="{{ $variant->id }}">
                                            {{ $variant->getTranslations('name')['en'] }} |
                                            {{ $variant->getTranslations('name')['es'] }}</option>
                                    @endforeach
                                </x-select>
                                @error('product_variants.' . $i . '.id')
                                    <x-error message="{{ $message }}" />
                                @enderror
                            </div>
                        @endforeach
                    @endif

                    <div class="flex items-center space-x-4">
                        <div class="w-1/2">
                            <x-label value="Price" />
                            <br>
                            <x-input type="number" wire:model="product_price" step="0.01"
                                @class(['w-full', 'border-red-300' => $errors->has('product_price')]) />
                            @error('product_price')
                                <x-error message="{{ $message }}" />
                            @enderror
                        </div>
                        <div class="w-1/2">
                            <x-label value="Shipping" />
                            <br>
                            <x-input type="number" wire:model="product_shipping_cost" step="0.01"
                                @class([
                                    'w-full',
                                    'border-red-300' => $errors->has('product_shipping'),
                                ]) />
                            @error('product_shipping_cost')
                                <x-error message="{{ $message }}" />
                            @enderror
                        </div>
                    </div>
                    <div>
                        <x-button type="submit" label="Save" />
                    </div>
                </div>
            </form>
        </x-modal>
        <!-- Edit product -->
        <x-modal name="edit-product-modal" title="Edit product">
            <form wire:submit.prevent="updateProduct">
                <div class="space-y-4">
                    @if (session()->has('error'))
                        <div class="bg-red-200 p-4 rounded border border-red-300" role="alert">
                            <x-error message="{{ session('error') }}" />
                        </div>
                    @endif

                    @error('combination')
                        <div class="bg-red-200 p-4 rounded border border-red-300" role="alert">
                            <x-error message="{{ $message }}" />
                        </div>
                    @enderror
                    <div>
                        <x-label value="Sku" />
                        <br>
                        <x-input type="text" wire:model="product_sku" class="w-full" />
                        @error('product_sku')
                            <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                    @if (!empty($item->attributes))
                        @foreach ($item->attributes as $i => $attribute)
                            <div>
                                <x-label value="{!! $attribute->name !!}" />
                                <br>
                                <x-select name="variants[{{ $i }}][name]"
                                    wire:model.defer="product_variants.{{ $i }}.id" class="w-full">
                                    <option value="">Select {{ $attribute->name }}</option>
                                    @foreach ($item->variants->where('attribute_id', $attribute->id) as $variant)
                                        <option value="{{ $variant->id }}">
                                            {{ $variant->getTranslations('name')['en'] }} |
                                            {{ $variant->getTranslations('name')['es'] }}</option>
                                    @endforeach
                                </x-select>
                                @error('product_variants.' . $i . '.id')
                                    <x-error message="{{ $message }}" />
                                @enderror
                            </div>
                        @endforeach
                    @endif

                    <div class="flex items-center space-x-4">
                        <div class="w-1/2">
                            <x-label value="Price" />
                            <br>
                            <x-input type="number" wire:model="product_price" step="0.01" class="w-full" />
                            @error('product_price')
                                <x-error message="{{ $message }}" />
                            @enderror
                        </div>
                        <div class="w-1/2">
                            <x-label value="Shipping" />
                            <br>
                            <x-input type="number" wire:model="product_shipping_cost" step="0.01" class="w-full" />
                            @error('product_shipping_cost')
                                <x-error message="{{ $message }}" />
                            @enderror
                        </div>
                    </div>
                    <div>
                        <x-button type="submit" label="Save" />
                    </div>
                </div>
            </form>
        </x-modal>
        <!-- Remove product -->
        <x-modal name="delete-product-modal" title="Remove product">
            @if (session()->has('error'))
                <p class="text-red-600">
                    {{ session('error') }}
                </p>
                <div class="mt-4 flex items-center space-x-2">
                    <x-button @click="$dispatch('close-modal', 'delete-product-modal')" type="button" value="Cancel" />
                </div>
            @else
                <form wire:submit.prevent="deleteProduct">
                    <p class="text-base text-gray-600 mb-4">
                        Are you sure you want to remove this product? This action cannot be undone.
                    </p>
                    <div class="mt-4 flex items-center space-x-2">
                        <x-button type="submit" value="Yes, remove product" />
                    </div>
                </form>
            @endif
        </x-modal>
    </x-card>
</div>
