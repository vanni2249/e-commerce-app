<div>
    <div class="px-4 space-y-4">
        <x-card>
            <header class="flex justify-between">
                <h2 class="text-md font-bold">ITM-08HT748H</h2>
            </header>
        </x-card>
        <!-- Images card -->
        <x-card>
            <header class="flex justify-between mb-4">
                <h2 class="text-md font-bold">Images</h2>
                <x-icon-button icon="plus" />
            </header>
            <div class="grid grid-cols-6 gap-4">
                <!-- Images -->
                <div class="col-span-full lg:col-span-2">
                    {{-- <h3 class="text-m font-bold text-gray-800">
                        Item Images
                    </h3> --}}
                    <p class="text-sm text-gray-600">
                        Add, remove or update item images.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4 space-y-4">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="flex flex-col border border-gray-200 rounded-md p-2 space-y-2">
                                <div class="bg-gray-200 h-32 rounded-md"></div>
                                <div class="flex items-center space-x-2">
                                    <x-icon-button icon="delete" class="p-1" />
                                    <x-button variant="light" size="sm" value="Set default" class="grow" />
                                </div>
                            </div>
                        @endfor
                    </div>

                </div>
            </div>
        </x-card>

        <!-- Item info -->
        <x-card>
            <header class="flex justify-between items-center">
                <h2 class="text-md font-bold">Item info</h2>
                <x-icon-button icon="edit" />
            </header>
            <!-- Business & Seller -->
            <div class="grid grid-cols-6 gap-4">
                <!-- Business & seller -->
                <div class="col-span-full lg:col-span-2">
                    <p class="text-sm text-gray-600">
                        Business and seller selected.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <x-label for="business" value="Business" />
                            <x-card class="bg-gray-200">
                                <p class="text-sm text-gray-600">My Business</p>
                            </x-card>
                        </div>
                        <div class="space-y-2">
                            <x-label for="seller" value="Seller" />
                            <x-card class="bg-gray-200">
                                <p class="text-sm text-gray-600">Geovanni Colon</p>
                            </x-card>
                        </div>
                    </div>
                </div>
                <!-- Space -->
                <div class="col-span-full py-4"></div>
                <!-- Market -->
                <div class="col-span-full lg:col-span-2">
                    <h3 class="text-md font-bold">Market</h3>
                    <p class="text-sm text-gray-600">
                        Market selected.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <x-label for="market" value="Market" />
                            <x-card class="bg-gray-200">
                                <p class="text-sm text-gray-600">United States</p>
                            </x-card>
                        </div>
                    </div>
                </div>
                <!-- Space -->
                <div class="col-span-full py-4"></div>
                <!-- Title -->
                <div class="col-span-full lg:col-span-2">
                    <h3 class="text-md font-bold">Title</h3>
                    <p class="text-sm text-gray-600">
                        English & Spanish titles for this item.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <x-label for="english" value="English" />
                            <x-card class="bg-gray-200">
                                <p class="text-sm text-gray-600">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate pariatur facere
                                    autem.
                                </p>
                            </x-card>
                        </div>
                        <div class="space-y-2">
                            <x-label for="spanish" value="Spanish" />
                            <x-card class="bg-gray-200">
                                <p class="text-sm text-gray-600">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate pariatur facere
                                    autem.
                                </p>
                            </x-card>
                        </div>
                    </div>
                </div>
                <!-- Space -->
                <div class="col-span-full py-4"></div>
                <!-- Short description -->
                <div class="col-span-full lg:col-span-2">
                    <h3 class="text-md font-bold">Short description</h3>
                    <p class="text-sm text-gray-600">
                        English & Spanish short descriptions for this item.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <x-label for="english" value="English" />
                            <x-card class="bg-gray-200">
                                <p class="text-sm text-gray-600">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
                                </p>
                            </x-card>
                        </div>
                        <div class="space-y-2">
                            <x-label for="spanish" value="Spanish" />
                            <x-card class="bg-gray-200">
                                <p class="text-sm text-gray-600">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
                                </p>
                            </x-card>
                        </div>
                    </div>
                </div>
                <!-- Space -->
                <div class="col-span-full py-4"></div>
                <!-- Long description -->
                <div class="col-span-full lg:col-span-2">
                    <h3 class="text-md font-bold">Long description</h3>
                    <p class="text-sm text-gray-600">
                        English & Spanish long descriptions for this item.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <x-label for="english" value="English" />
                            <x-card class="bg-gray-200">
                                <p class="text-sm text-gray-600">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum
                                    dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit
                                    amet consectetur adipisicing elit. Quisquam, quod.
                                </p>
                            </x-card>
                        </div>
                        <div class="space-y-2">
                            <x-label for="spanish" value="Spanish" />
                            <x-card class="bg-gray-200">
                                <p class="text-sm text-gray-600">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum
                                    dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit
                                    amet consectetur adipisicing elit. Quisquam, quod.
                                </p>
                            </x-card>
                        </div>
                    </div>
                </div>
                <!-- Space -->
                <div class="col-span-full py-4"></div>
                <!-- Specifics -->
                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Specifics</h2>
                    <p class="text-sm text-gray-600 mb-4">
                        Item specifics in English & Spanish.
                    </p>
                </div>
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
                    <x-card class="bg-gray-200 mb-4">
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($items as $item)
                                <li class="flex">
                                    <span class="text-gray-600 text-sm w-1/2">{{ $item['label'] }}: </span>
                                    <span class="font-bold text-sm text-gray-800">{{ $item['value'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </x-card>
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
                    <x-card class="bg-gray-200">

                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($items as $item)
                                <li class="flex">
                                    <span class="text-gray-600 text-sm w-1/2">{{ $item['label'] }}: </span>
                                    <span class="font-bold text-sm text-gray-800">{{ $item['value'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </x-card>
                </div>
                <!-- Space -->
                <div class="col-span-full py-4"></div>
                <!-- Shipping information -->
                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Shipping information</h2>
                    <p class="text-sm text-gray-600">
                        Item shipping information.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <x-label for="english" value="English" />
                            <x-card class="bg-gray-200">
                                <p class="text-sm text-gray-600">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum
                                    dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit
                                    amet consectetur adipisicing elit. Quisquam, quod.
                                </p>
                            </x-card>
                        </div>
                        <div class="space-y-2">
                            <x-label for="spanish" value="Spanish" />
                            <x-card class="bg-gray-200">
                                <p class="text-sm text-gray-600">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum
                                    dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit
                                    amet consectetur adipisicing elit. Quisquam, quod.
                                </p>
                            </x-card>
                        </div>
                    </div>
                </div>
                <!-- Space -->
                <div class="col-span-full py-4"></div>
                <!-- Return policy -->
                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Return policy</h2>
                    <p class="text-sm text-gray-600">
                        Item return policy.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <x-label for="english" value="English" />
                            <x-card class="bg-gray-200">
                                <p class="text-sm text-gray-600">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum
                                    dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit
                                    amet consectetur adipisicing elit. Quisquam, quod.
                                </p>
                            </x-card>
                        </div>
                        <div class="space-y-2">
                            <x-label for="spanish" value="Spanish" />
                            <x-card class="bg-gray-200">
                                <p class="text-sm text-gray-600">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum
                                    dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit
                                    amet consectetur adipisicing elit. Quisquam, quod.
                                </p>
                            </x-card>
                        </div>
                    </div>
                </div>
                <!-- Space -->
                <div class="col-span-full py-4"></div>
                <!-- Item status -->
            </div>
        </x-card>

        <!-- Variants -->
        <x-card>
            <header class="flex justify-between items-center mb-4">
                <h2 class="text-md font-bold">Variants</h2>
            </header>
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
                            $items = [
                                ['en' => 'Blue', 'es' => 'Azul'],
                                ['en' => 'Red', 'es' => 'Rojo'],
                                ['en' => 'Green', 'es' => 'Verde'],
                            ];
                        @endphp

                        @foreach ($items as $item)
                            <x-card class="bg-gray-200 w-full md:w-auto">
                                <div class="flex whitespace-nowrap items-center justify-between space-x-4">

                                    <p class="text-sm text-gray-600">
                                        {{ $item['en'] }} | {{ $item['es'] }}
                                    </p>
                                    <div class="flex space-x-1">
                                        <x-icon-button />
                                        <x-icon-button icon="delete" />
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
            <header class="flex justify-between items-center mb-4">
                <h2 class="text-md font-bold">Products</h2>
            </header>
            <div class="grid grid-cols-6 gap-4">

                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Item products</h2>
                    <p class="text-sm text-gray-600">
                        Item products and stock keeping units (SKUs).
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    @php
                        $items = [
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
                                @foreach ($items as $item)
                                    <tr class="hover:bg-gray-50 border-b border-gray-200">
                                        <td class="p-4">
                                            {{ $item['sku'] }}
                                        </td>
                                        <td class="p-4">
                                            {{ $item['pn'] }}{{ $item['variant'] }}
                                        </td>
                                        <td class="p-4">
                                            Variant {{ $item['variant'] }}
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
        <!-- Item status & post date -->
        <x-card>
            <header class="flex justify-between items-center mb-4">
                <h2 class="text-md font-bold">Item status & post date</h2>
            </header>
            <div class="grid grid-cols-6 gap-4">

                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Item status</h2>
                    <p class="text-sm text-gray-600">
                        Current item status.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <x-card class="bg-gray-200">
                            <p class="text-sm text-gray-600">
                                Active
                            </p>
                        </x-card>
                    </div>
                </div>
                <!-- Space -->
                <div class="col-span-full py-4"></div>
                <!-- Item post date -->
                <div class="col-span-full lg:col-span-2">
                    <h2 class="text-md font-bold text-gray-900">Item post date</h2>
                    <p class="text-sm text-gray-600">
                        Date when the item was posted.
                    </p>
                </div>
                <div class="col-span-full lg:col-span-4">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <x-card class="bg-gray-200">
                            <p class="text-sm text-gray-600">
                                January 1, 2023
                            </p>
                        </x-card>
                    </div>
                </div>
            </div>
        </x-card>
    </div>
</div>
