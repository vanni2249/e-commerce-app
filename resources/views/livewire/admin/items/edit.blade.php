<div>
    <div class="px-4">
        <x-card>
            <header class="flex justify-between mb-4">
                <h1 class="text-lg font-bold">Edit ITM-08HT748H</h1>
            </header>
            <form action="">
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
                                <x-select class="w-full">
                                    <option value="">Select a business</option>
                                    <option value="1">Business 1</option>
                                    <option value="2">Business 2</option>
                                    <option value="3">Business 3</option>
                                </x-select>
                            </div>
                            <div class="col-span-1">
                                <x-label for="title" value="Seller" />
                                <x-select class="w-full">
                                    <option value="">Select a seller</option>
                                    <option value="1">Seller 1</option>
                                    <option value="2">Seller 2</option>
                                    <option value="3">Seller 3</option>
                                </x-select>
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
                                <x-textarea disabled="" type="text" class="w-full" />
                            </div>
                            <div class="col-span-full lg:col-span-1">
                                <div class="flex justify-between items-center">
                                    <x-label for="title" value="Spanish" />
                                    <span class="text-xs font-bold text-gray-600">100</span>
                                </div>
                                <x-textarea disabled="" type="text" class="w-full" />
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
                    <!-- Titles -->
                    <div class="col-span-full lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2 lg:col-span-1">
                                <div class="flex justify-between items-center">
                                    <x-label for="title" value="English" />
                                    <span class="text-xs font-bold text-gray-600">100</span>
                                </div>
                                <x-textarea disabled="" type="text" class="w-full" />
                            </div>
                            <div class="col-span-2 lg:col-span-1">
                                <div class="flex justify-between items-center">
                                    <x-label for="title" value="Spanish" />
                                    <span class="text-xs font-bold text-gray-600">100</span>
                                </div>
                                <x-textarea disabled="" type="text" class="w-full" />
                            </div>
                        </div>
                    </div>
                    <!-- Space -->
                    <div class="col-span-full py-4"></div>
                    <!-- Short description -->
                    <div class="col-span-full lg:col-span-2">
                        <h2 class="text-md font-bold text-gray-900">Long description</h2>
                        <p class="text-sm text-gray-600 mb-4">
                            A detailed description of the item in different languages.
                        </p>
                    </div>
                    <!-- Titles -->
                    <div class="col-span-full lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <div class="flex justify-between items-center">
                                    <x-label for="title" value="English" />
                                    <span class="text-xs font-bold text-gray-600">172</span>
                                </div>
                                <x-textarea class="w-full" />
                            </div>
                            <div class="col-span-2">
                                <div class="flex justify-between items-center">
                                    <x-label for="title" value="Spanish" />
                                    <span class="text-xs font-bold text-gray-600">172</span>
                                </div>
                                <x-textarea class="w-full" />
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
                    <!-- Titles -->
                    <div class="col-span-full lg:col-span-4">
                        @php
                            $items = [
                                ['label' => 'Condition', 'value' => 'New'],
                                ['label' => 'Brand', 'value' => 'Apple'],
                                ['label' => 'Model', 'value' => 'iPhone 13'],
                                ['label' => 'Storage', 'value' => '128GB'],
                                ['label' => 'Color', 'value' => 'Blue'],
                                ['label' => 'Warranty', 'value' => '1 Year'],
                            ];

                        @endphp
                        <x-label for="title" value="English" class="mb-2" />
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 border border-gray-200 rounded p-4">
                            @foreach ($items as $item)
                                <li class="flex">
                                    <span class="text-gray-600 text-sm w-1/2">{{ $item['label'] }}: </span>
                                    <span class="font-bold text-sm text-gray-800">{{ $item['value'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <x-button type="button" value="Add english Specifics" />
                        <div class="my-4"></div>
                        @php
                            $items = [
                                ['label' => 'Condición', 'value' => 'Nuevo'],
                                ['label' => 'Marca', 'value' => 'Apple'],
                                ['label' => 'Modelo', 'value' => 'iPhone 13'],
                                ['label' => 'Almacenamiento', 'value' => '128GB'],
                                ['label' => 'Color', 'value' => 'Azul'],
                                ['label' => 'Garantía', 'value' => '1 Año'],
                            ];

                        @endphp
                        <x-label for="title" value="Spanish" class="mb-2" />
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 border border-gray-200 rounded p-4">
                            @foreach ($items as $item)
                                <li class="flex">
                                    <span class="text-gray-600 text-sm w-1/2">{{ $item['label'] }}: </span>
                                    <span class="font-bold text-sm text-gray-800">{{ $item['value'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <x-button type="button" value="Add Spanish Specifics" />
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
                    <!-- Info shipping -->
                    <div class="col-span-full lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <x-label for="title" value="Shipping information" />
                                <x-textarea disabled="" type="text" class="w-full" />
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
                    <!-- Return info -->
                    <div class="col-span-full lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <x-label for="title" value="Return information" />
                                <x-textarea disabled="" type="text" class="w-full" />
                            </div>
                        </div>
                    </div>
                    <!-- Space -->
                    <div class="col-span-full py-4"></div>
                    <!-- Is active -->
                    <div class="col-span-full lg:col-span-2">
                        <h2 class="text-md font-bold text-gray-900">Status</h2>
                        <p class="text-sm text-gray-600 mb-4">
                            Set the item's status to active or inactive.
                        </p>
                    </div>
                    <!-- Is active -->
                    <div class="col-span-full lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <x-label for="title" value="Is active?" />
                                <x-select class="w-full">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </x-select>
                            </div>
                        </div>
                    </div>
                    <!-- Space -->
                    <div class="col-span-full py-4"></div>
                    <!-- Post date -->
                    <div class="col-span-full lg:col-span-2">
                        <h2 class="text-md font-bold text-gray-900">Post Date</h2>
                        <p class="text-sm text-gray-600 mb-4">
                            The date when the item was posted.
                        </p>
                    </div>
                    <!-- Post date -->
                    <div class="col-span-full lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2 lg:col-span-1">
                                <x-label for="title" value="Post date" />
                                <x-input disabled="" type="date" class="w-full" />
                            </div>
                            <div class="col-span-2 lg:col-span-1">
                                <x-label for="title" value="Post time" />
                                <x-input disabled="" type="time" class="w-full" />
                            </div>
                        </div>
                    </div>
            </form>
        </x-card>
    </div>
</div>
