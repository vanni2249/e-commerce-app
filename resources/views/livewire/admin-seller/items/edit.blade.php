<div>
    <div class="px-4 space-y-4">
        <!-- Header -->
        <x-card>
            <header class="flex justify-between items-center">
                <h1 class="text-md font-bold">{{ $item->number }}</h1>
            </header>
        </x-card>

        <!-- Images card -->
        <x-card>
            <div class="grid grid-cols-6 gap-4">
                <!-- Images -->
                <div class="col-span-full lg:col-span-2">
                    <h3 class="text-m font-bold text-gray-800">
                        Item Images
                    </h3>
                    <p class="text-sm text-gray-600">
                        Add, remove or update item images.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4 space-y-4">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="flex flex-col border border-gray-300 rounded-md p-2 space-y-2">
                                <div class="bg-gray-200 h-32 rounded-md"></div>
                                <div class="flex items-center space-x-2">
                                    <x-icon-button icon="delete" class="p-1" />
                                    <x-button variant="light" size="sm" value="Set default" class="grow" />
                                </div>
                            </div>
                        @endfor

                        <button @click="$dispatch('open-modal', 'image-modal')" type="button"
                            class="bg-gray-200 h-full border border-dashed border-gray-400 rounded-xl cursor-pointer">
                            <div class="flex flex-col justify-center items-center h-full p-4 space-y-2">
                                <span class="text-sm text-gray-600">Add Image</span>
                            </div>
                        </button>
                        <x-modal name="image-modal" title="Add image" size="lg">
                            <form wire:submit.prevent=''>
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="col-span-1">
                                        <x-label for="image" value="Image" />
                                        <x-input wire:model.lazy='' type="file" class="w-full" />
                                        @error('')
                                            <x-error message="{{ $message }}" />
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-4 flex justify-end items-center space-x-2">
                                    <x-button type="submit" value="Add Image" />
                                </div>
                            </form>
                        </x-modal>
                    </div>

                </div>
            </div>
        </x-card>

        <!-- Info card-->
        <x-card>
            <div class="grid grid-cols-6 gap-4">
                <!-- Main information -->
                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Business & Seller</h2>
                    <p class="mb-4 text-sm text-gray-600">
                        Select the business and seller associated with this item.
                    </p>
                </div>
                <!-- Information -->
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <x-label for="title" value="Section" />
                            <x-select wire:model.lazy="section_id" class="w-full">
                                <option value="">Select a section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </x-select>
                            @error('section_id')
                                <x-error message="{{ $message }}" />
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <x-label for="title" value="Seller" />
                            <x-input disabled="true" type="text" class="w-full"
                                value="{{ $item->seller->user->name ?? 'Zierra LLC' }}" />
                        </div>
                    </div>
                </div>
                <!-- Space -->
                <div class="col-span-full py-4"></div>
                <!-- Titles -->
                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Titles</h2>
                    <p class="text-sm text-gray-600 mb-4">
                        The titles of the item in different languages.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-full lg:col-span-1">
                            <div class="flex justify-between items-center">
                                <x-label for="title" value="English" />
                                <span class="text-xs font-bold text-gray-600">100</span>
                            </div>
                            <x-textarea wire:model='en_title' disabled="" type="text" class="w-full" />
                        </div>
                        <div class="col-span-full lg:col-span-1">
                            <div class="flex justify-between items-center">
                                <x-label for="title" value="Spanish" />
                                <span class="text-xs font-bold text-gray-600">100</span>
                            </div>
                            <x-textarea wire:model.lazy='es_title' disabled="" type="text" class="w-full" />
                        </div>
                    </div>
                </div>
                <!-- Space -->
                <div class="col-span-full py-4"></div>
                <!-- Short description -->
                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Short description</h2>
                    <p class="text-sm text-gray-600 mb-4">
                        A brief summary of the item in different languages.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2 lg:col-span-1">
                            <div class="flex justify-between items-center">
                                <x-label for="title" value="English" />
                                <span class="text-xs font-bold text-gray-600">100</span>
                            </div>
                            <x-textarea wire:model.lazy='en_short_description' disabled="" type="text"
                                class="w-full" />
                        </div>
                        <div class="col-span-2 lg:col-span-1">
                            <div class="flex justify-between items-center">
                                <x-label for="title" value="Spanish" />
                                <span class="text-xs font-bold text-gray-600">100</span>
                            </div>
                            <x-textarea wire:model.lazy='es_short_description' disabled="" type="text"
                                class="w-full" />
                        </div>
                    </div>
                </div>
                <!-- Space -->
                <div class="col-span-full py-4"></div>
                <!-- Long description -->
                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Long description</h2>
                    <p class="text-sm text-gray-600 mb-4">
                        A detailed description of the item in different languages.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <div class="flex justify-between items-center">
                                <x-label for="title" value="English" />
                                <span class="text-xs font-bold text-gray-600">172</span>
                            </div>
                            <x-textarea wire:model.lazy='en_description' class="w-full" />
                        </div>
                        <div class="col-span-2">
                            <div class="flex justify-between items-center">
                                <x-label for="title" value="Spanish" />
                                <span class="text-xs font-bold text-gray-600">172</span>
                            </div>
                            <x-textarea wire:model.lazy='es_description' class="w-full" />
                        </div>
                    </div>
                </div>
                <!-- Space -->
                <div class="col-span-full py-4"></div>
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
                                        {{ $specification['label']??'...' }}
                                    </td>
                                    <td class="p-4">
                                        {{ $specification['value']??'...' }}
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
                    {{-- <br> --}}
                    {{-- <x-button @click="$dispatch('open-modal', 'new_en_specification-modal')" type="button"
                        value="Add english Specifics" /> --}}
                    <x-modal name="new_en_specification-modal" title="Add english specification" size="lg">
                        <form wire:submit.prevent='addEnglishSpecification'>
                            <div class="grid grid-cols-1 gap-4">
                                <div class="col-span-1">
                                    <x-label for="label" value="Label" />
                                    <x-input wire:model.lazy='new_en_specification.label' type="text"
                                        class="w-full" />
                                    @error('new_en_specification.label')
                                        <x-error message="{{ $message }}" />
                                    @enderror
                                </div>
                                <div class="col-span-1">
                                    <x-label for="value" value="Value" />
                                    <x-input wire:model.lazy='new_en_specification.value' type="text"
                                        class="w-full" />
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
                                        {{ $specification['label']??'...' }}
                                    </td>
                                    <td class="p-4">
                                        {{ $specification['value']??'...' }}
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
                    {{-- <br>
                    <x-button @click="$dispatch('open-modal','new_es_specification-modal')" type="button"
                        value="Add Spanish Specifics" /> --}}
                    <x-modal name="new_es_specification-modal" title="Add spanish specification" size="lg">
                        <form wire:submit.prevent='addSpanishSpecification'>
                            <div class="grid grid-cols-1 gap-4">
                                <div class="col-span-1">
                                    <x-label for="label" value="Label" />
                                    <x-input wire:model.lazy='new_es_specification.label' type="text"
                                        class="w-full" />
                                    @error('new_es_specification.label')
                                        <x-error message="{{ $message }}" />
                                    @enderror
                                </div>
                                <div class="col-span-1">
                                    <x-label for="value" value="Value" />
                                    <x-input wire:model.lazy='new_es_specification.value' type="text"
                                        class="w-full" />
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
                <!-- Space -->
                <div class="col-span-full py-4"></div>
                <!-- Info shipping -->
                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Shipping Information</h2>
                    <p class="text-sm text-gray-600 mb-4">
                        Details about the item's shipping options.
                        Default shipping information is set in the business settings.
                        If the item is a digital product, shipping information is not required.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <x-label for="title" value="English" />
                            <x-textarea wire:model.lazy='en_shipping_policy' disabled="" type="text"
                                class="w-full" />
                        </div>
                        <div class="col-span-2">
                            <x-label for="title" value="Spanish" />
                            <x-textarea wire:model.lazy='es_shipping_policy' disabled="" type="text"
                                class="w-full" />
                        </div>
                    </div>
                </div>
                <!-- Space -->
                <div class="col-span-full py-4"></div>
                <!-- Return info -->
                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Return Information</h2>
                    <p class="text-sm text-gray-600 mb-4">
                        Details about the item's return policy.
                        Default return information is set in the business settings.
                        If the item is a digital product, return information is not required.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <x-label for="title" value="English" />
                            <x-textarea wire:model.lazy='en_return_policy' disabled="" type="text"
                                class="w-full" />
                        </div>
                        <div class="col-span-2">
                            <x-label for="title" value="Spanish" />
                            <x-textarea wire:model.lazy='es_return_policy' disabled="" type="text"
                                class="w-full" />
                        </div>
                    </div>
                </div>
            </div>
        </x-card>

        <!-- Categories -->
        <x-card>
            <header class="flex justify-between items-top">
                <h1 class="text-md font-bold">Categories</h1>
                <x-icon-button wire:click='handleCategoriesModal' icon="plus" />
            </header>
            <x-modal name="sync-categories-modal" title="Add category">
                @if ($categories)
                    <form wire:submit="syncCategories">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($categories as $category)
                                <div class="flex items-center bg-gray-100 p-2 rounded">
                                    <input type="checkbox" wire:model="selectedCategories"
                                        value="{{ $category->id }}" id="category-{{ $category->id }}"
                                        class="mr-2">
                                    <label for="category-{{ $category->id }}"
                                        class="text-sm">{{ $category->en_name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            <button type="submit"
                                class="bg-blue-500 cursor-pointer text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors duration-200">
                                Sync Categories
                            </button>
                        </div>
                    </form>
                @endif
            </x-modal>
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-full lg:col-span-2">
                    <p class="text-sm text-gray-600">
                        Assign categories to the item for better organization and searchability.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="flex flex-wrap gap-2">
                        @forelse ($item->categories as $category)
                            <x-card class="bg-gray-200 w-full md:w-auto">
                                <div class="flex whitespace-nowrap items-center justify-between space-x-4">

                                    <p class="text-sm text-gray-600">
                                        {{ $category->en_name }} | {{ $category->es_name }}
                                    </p>
                                </div>
                            </x-card>
                        @empty
                            <span class="text-gray-800">No categories added.</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </x-card>

        <!-- Attributes & Variants -->
        <x-card>
            <header class="flex justify-between items-center">
                {{-- {{ $item->products->count() }} Products --}}
                <h2 class="text-md font-bold">Variants</h2>
                @if ($item->variants->isEmpty() && $item->products->count() === 0)
                    <x-icon-button wire:click="handleAttributesModal" icon="plus" />
                @endif
            </header>
            <!-- Modal add attributes -->
            <x-modal name="sync-attributes-modal" title="Sync attributes">
                @if ($attrs)
                    <form wire:submit="syncAttributes">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 py-4">
                            @foreach ($attrs as $attribute)
                                <div class="bg-gray-100 p-2 rounded flex items-center">
                                    <input type="checkbox" wire:model="selectedAttributes"
                                        value="{{ $attribute->id }}" id="attribute-{{ $attribute->id }}"
                                        class="mr-2">
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
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-full lg:col-span-2">
                    <p class="text-sm text-gray-600">
                        Item variants and attributes.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    @forelse ($item->attributes as $attribute)
                        <div class="w-full">
                            <header class="flex justify-between items-end pt-4 pb-1">
                                <x-label for="{{ $attribute->name }}" value="{{ $attribute->name }}" />
                                <x-button wire:click="handleVariantModal({{ $attribute->id }})" variant="primary"
                                    size="sm" value="Add {{ $attribute->name }}" />
                            </header>
                            <x-table>
                                <x-slot name="head">
                                    <tr>
                                        <th class="p-4">English name</th>
                                        <th class="p-4">Spanish name</th>
                                        <th class="p-4 w-14">Action</th>
                                    </tr>
                                </x-slot>
                                <x-slot name="body">
                                    @forelse ($item->variants->where('attribute_id', $attribute->id) as $variant)
                                        <tr class="hover:bg-gray-50 border-b border-gray-200">
                                            <td class="p-4">
                                                {{ $variant->en_name }}
                                            </td>
                                            <td class="">
                                                {{ $variant->es_name }}
                                            </td>
                                            <td class="p-4 text-right">
                                                <x-icon-button
                                                    wire:click="handleEditVariantModal({{ $variant->id }})"
                                                    icon="edit" size="sm" />
                                                @if ($variant->products->count() > 0)
                                                    <x-icon-button wire:click="deleteVariant({{ $variant->id }})"
                                                        icon="delete" size="sm" />
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
            </div>
        </x-card>

        <!-- Products -->
        <x-card>
            <header class="flex justify-between items-center mb-1">
                <h2 class="text-md font-bold text-gray-900">Item products</h2>
                @if ($showCreateProductButton)
                    <x-icon-button wire:click="handleCreateProductModal" icon="plus" />
                @endif
            </header>
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
                                            <option value="{{ $variant->id }}">{{ $variant->en_name }}</option>
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
                                    <th class="p-4">Variant</th>
                                    <th class="p-4 w-14 text-right">Action</th>
                                </tr>
                            </x-slot>
                            <x-slot name="body">
                                @forelse ($item->products as $product)
                                    <tr class="hover:bg-gray-50 border-b border-gray-200">
                                        <td class="p-4">
                                            {{ $product->number ?? '...' }}
                                        </td>
                                        <td class="p-4">
                                            {{ $product->sku ?? '...' }}
                                        </td>
                                        <td class="p-4">
                                            {{ $product->price ?? '...' }}
                                        </td>
                                        <td class="p-4">
                                            {{ $product->shipping ?? 'Free' }}
                                        </td>
                                        <td class="p-4">
                                            @forelse ($product->variants as $variant)
                                                <span
                                                    class="inline-block bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded mr-1">
                                                    {{ $variant->attribute->name }}: {{ $variant->en_name }}
                                                </span>

                                            @empty
                                                ...
                                            @endforelse
                                        </td>
                                        <td class="p-4 flex gap-2">
                                            <x-icon-button wire:click="handleProductEditModal({{ $product->id }})"
                                                icon="edit" />
                                            @if ($product->inventories->count() === 0)
                                                <x-icon-button
                                                    wire:click="handleProductDeleteModal({{ $product->id }})"
                                                    icon="delete" />
                                            @endif
                                            <x-icon-link
                                                href="{{ route($admin ? 'admin.products.show' : 'sellers.products.show', ['product' => $product->id]) }}"
                                                icon="eye" />
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-4 text-center text-gray-600">
                                            No products added yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </x-slot>
                        </x-table>
                    </div>
                </div>
            </div>
            <!-- Edit product -->
            <x-modal name="edit-product-modal" title="Edit product">
                <form wire:submit.prevent="updateProduct">
                    <div class="space-y-4">
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
                                            <option value="{{ $variant->id }}">{{ $variant->en_name }}</option>
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
                                <x-input type="number" wire:model="product_shipping_cost" step="0.01"
                                    class="w-full" />
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
                <form wire:submit.prevent="deleteProduct">
                    <p class="text-base text-gray-600 mb-4">
                        Are you sure you want to remove this product? This action cannot be undone.
                    </p>
                    <div class="mt-4 flex items-center space-x-2">
                        <x-button type="submit" value="Yes, remove product" />
                    </div>
                </form>
            </x-modal>
        </x-card>

        <!-- Approve and post -->
        @if (($item->products()->count() > 0) & $admin)
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
                                    <x-input disabled="true" wire:model='approved_by' type="text"
                                        class="w-full" />
                                </div>
                                <div class="col-span-2 lg:col-span-1">
                                    <x-label for="title" value="Approved datetime" />
                                    <x-input disabled="true" wire:model='approved_at' type="datetime"
                                        class="w-full" />
                                </div>
                                <div class="col-span-2 lg:col-span-1">
                                    <x-label for="title" value="Available datetime" />
                                    <x-input disabled="true" wire:model='available_at' type="datetime"
                                        class="w-full" />
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </x-card>
        @endif
    </div>
</div>
