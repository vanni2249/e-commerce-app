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
                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Business & Seller</h2>
                    <p class="mb-4 text-sm text-gray-600">
                        Select the business and seller associated with this item.
                    </p>
                </div>
                <!-- Titles -->
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <x-label for="title" value="Business" />
                            <x-select wire:model.lazy="section_id" class="w-full">
                                <option value="">Select a business</option>
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
                <div class="col-span-full py-4"></div>
                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Titles</h2>
                    <p class="text-sm text-gray-600 mb-4">
                        The titles of the item in different languages.
                    </p>
                </div>
                <!-- Titles -->
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
                            <x-textarea wire:model.lazy='en_short_description' class="w-full" />
                        </div>
                        <div class="col-span-2">
                            <div class="flex justify-between items-center">
                                <x-label for="title" value="Spanish" />
                                <span class="text-xs font-bold text-gray-600">172</span>
                            </div>
                            <x-textarea wire:model.lazy='es_short_description' class="w-full" />
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
                                <x-icon-button icon="ellipsis-vertical"/>
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
                            @forelse ($en_specifications as $i => $specification)
                                <tr class="hover:bg-gray-50 border-b border-gray-200">
                                    <td class="p-4">
                                        {{ $specification['label'] }}
                                    </td>
                                    <td class="p-4">
                                        {{ $specification['value'] }}
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
                                <x-icon-button icon="ellipsis-vertical"/>
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
                            @forelse ($es_specifications as $i => $specification)
                                <tr class="hover:bg-gray-50 border-b border-gray-200">
                                    <td class="p-4">
                                        {{ $specification['label'] }}
                                    </td>
                                    <td class="p-4">
                                        {{ $specification['value'] }}
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

        </x-card>

        <!-- Variants -->
        <x-card>
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Item variants</h2>
                    <p class="text-sm text-gray-600">
                        Item variants and attributes.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <x-label for="color" value="Color" />
                    <div class="flex flex-wrap gap-2">
                        @php
                            $variants = [
                                ['en' => 'Blue', 'es' => 'Azul'],
                                ['en' => 'Red', 'es' => 'Rojo'],
                                ['en' => 'Green', 'es' => 'Verde'],
                            ];
                        @endphp

                        @foreach ($variants as $variant)
                            <x-card class="bg-gray-200 w-full md:w-auto">
                                <div class="flex whitespace-nowrap items-center justify-between space-x-4">

                                    <p class="text-sm text-gray-600">
                                        {{ $variant['en'] }} | {{ $variant['es'] }}
                                    </p>
                                    <div class="flex space-x-1">
                                        <button>
                                            <x-icon icon="pencil" />
                                        </button>
                                        <button>
                                            <x-icon icon="delete" />
                                        </button>
                                        {{-- <x-icon-button />
                                        <x-icon-button icon="delete" /> --}}
                                    </div>
                                </div>
                            </x-card>
                        @endforeach
                    </div>
                </div>

            </div>
        </x-card>

        <!-- Products -->
        <x-card>
            <div class="grid grid-cols-6 gap-4">

                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Item products</h2>
                    <p class="text-sm text-gray-600">
                        Item products and stock keeping units (SKUs).
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    @php
                        $products = [
                            ['sku' => 'SKU123', 'pn' => 'pn-', 'variant' => rand(1, 100)],
                            ['sku' => 'SKU124', 'pn' => 'pn-', 'variant' => rand(1, 100)],
                            ['sku' => 'SKU125', 'pn' => 'pn-', 'variant' => rand(1, 100)],
                            ['sku' => 'SKU126', 'pn' => 'pn-', 'variant' => rand(1, 100)],
                            ['sku' => 'SKU127', 'pn' => 'pn-', 'variant' => rand(1, 100)],
                            ['sku' => 'SKU128', 'pn' => 'pn-', 'variant' => rand(1, 100)],
                            ['sku' => 'SKU129', 'pn' => 'pn-', 'variant' => rand(1, 100)],
                            ['sku' => 'SKU130', 'pn' => 'pn-', 'variant' => rand(1, 100)],
                            ['sku' => 'SKU131', 'pn' => 'pn-', 'variant' => rand(1, 100)],
                            ['sku' => 'SKU132', 'pn' => 'pn-', 'variant' => rand(1, 100)],
                            ['sku' => 'SKU133', 'pn' => 'pn-', 'variant' => rand(1, 100)],
                            ['sku' => 'SKU134', 'pn' => 'pn-', 'variant' => rand(1, 100)],
                        ];
                    @endphp
                    <div class="space-y-2">
                        <x-table>
                            <x-slot name="head">
                                <tr>
                                    <th class="p-4 w-24">SKU</th>
                                    <th class="p-4 w-32">PN</th>
                                    <th class="p-4">Variant</th>
                                    <th class="p-4 w-14">Action</th>
                                </tr>
                            </x-slot>
                            <x-slot name="body">
                                @foreach ($products as $product)
                                    <tr class="hover:bg-gray-50 border-b border-gray-200">
                                        <td class="p-4">
                                            {{ $product['sku'] }}
                                        </td>
                                        <td class="p-4">
                                            {{ $product['pn'] }}{{ $product['variant'] }}
                                        </td>
                                        <td class="p-4">
                                            Variant {{ $product['variant'] }}
                                        </td>
                                        <td class="p-4">
                                            <x-icon-button />
                                        </td>
                                    </tr>
                                @endforeach
                            </x-slot>
                        </x-table>
                    </div>
                </div>
            </div>
        </x-card>

        <!-- Tags -->
        <x-card>
        </x-card>

        <!-- Approve -->
        @if ($admin)
            <x-card>
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-full lg:col-span-2">
                        <h2 class="text-md font-bold text-gray-900">Approve item</h2>
                        <p class="text-sm text-gray-600 mb-4">
                            Approve the item to make it visible to customers.
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
                            @endif
                        </div>
                    </div>
                </div>
            </x-card>
        @endif

        <!-- Available date -->
        @if ($item->approved_at != null)
            <x-card>
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-full lg:col-span-2">
                        <h2 class="text-md font-bold text-gray-900">Available date</h2>
                        <p class="text-sm text-gray-600 mb-4">
                            The date when the item becomes available for purchase.
                        </p>
                    </div>
                    <div class="col-span-full lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2 lg:col-span-1">
                                <x-label for="title" value="Available date" />
                                <x-input wire:model.lazy='available_at' disabled="true" type="datetime"
                                    class="w-full" />
                            </div>
                            <div class="col-span-2 lg:col-span-1">
                                <x-label for="Set date" value="Set date" />
                                <div class="w-full">
                                    <x-button @click="$dispatch('open-modal', 'available-at-modal')" type="button"
                                        value="Set available date" />
                                    <x-modal name="available-at-modal" title="Set available date" size="lg">
                                        <form wire:submit.prevent='setAvailableAt'>
                                            <div class="col-span-1">
                                                <x-label for="available_at" value="Available date" />
                                                <x-input wire:model.lazy='available_at' type="datetime-local"
                                                    class="w-full" />
                                                @error('available_at')
                                                    <x-error message="{{ $message }}" />
                                                @enderror
                                            </div>
                                            <div class="mt-4 flex items-center space-x-2">
                                                <x-button type="submit" value="Set available date" />
                                            </div>
                                        </form>
                                    </x-modal>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-card>
        @endif
    </div>
</div>
