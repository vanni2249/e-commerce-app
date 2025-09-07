<div>
    <div class="px-4 space-y-4">
        <!-- Header -->
        <x-card>
            <header class="flex justify-between items-center">
                <h1 class="text-md font-bold">{{ $item->number }}</h1>
            </header>
        </x-card>

        <!-- Image -->
        <x-card>

        </x-card>

        <!-- Info -->
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
                    <x-label for="title" value="English" class="mb-2" />
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 border border-gray-200 rounded p-4">
                        @if (count($en_specifications) == 0)
                            <li class="col-span-full text-center text-gray-600">
                                No specifications added yet.
                            </li>
                        @else
                            @foreach ($en_specifications as $i => $specification)
                                <li class="grid grid-cols-1 md:grid-cols-2 items-center">
                                    <div class="text-gray-600 text-sm flex items-center space-x-1">
                                        <x-icon-button wire:click='removeEnglishSpecification({{ $i }})'
                                            icon="delete" size="sm" />
                                        <span>
                                            {{ $specification['label'] }}:
                                        </span>
                                    </div>
                                    <span class="font-bold text-sm text-gray-800">{{ $specification['value'] }}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <x-button @click="$dispatch('open-modal', 'new_en_specification-modal')" type="button"
                        value="Add english Specifics" />
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
                    <x-label for="title" value="Spanish" class="mb-2" />
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 border border-gray-200 rounded p-4">
                        @if (count($es_specifications) == 0)
                            <li class="col-span-full text-center text-gray-600">
                                No specifications added yet.
                            </li>
                        @else
                            @foreach ($es_specifications as $i => $specification)
                                <li class="grid grid-cols-1 md:grid-cols-2 items-center">
                                    <div class="text-gray-600 text-sm flex items-center space-x-1">
                                        <x-icon-button wire:click='removeSpanishSpecification({{ $i }})'
                                            icon="delete" size="sm" />
                                        <span>
                                            {{ $specification['label'] }}:
                                        </span>
                                    </div>
                                    <span class="font-bold text-sm text-gray-800">{{ $specification['value'] }}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <x-button @click="$dispatch('open-modal','new_es_specification-modal')" type="button"
                        value="Add Spanish Specifics" />
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
                            <div class="mt-4 flex justify-end items-center space-x-2">
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
                                    <x-input disabled="true" wire:model='approved_by' type="text" class="w-full" />
                                </div>
                                <div class="col-span-2 lg:col-span-1">
                                    <x-label for="title" value="Approved datetime" />
                                    <x-input disabled="true" wire:model='approved_at' type="datetime" class="w-full" />
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
                                <x-input wire:model.lazy='available_at' disabled="true" type="datetime" class="w-full" />
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
