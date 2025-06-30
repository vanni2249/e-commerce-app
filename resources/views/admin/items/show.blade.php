<x-layouts.admin>
    <div class="px-4">
        <!-- Header -->
        <header class="col-span-full flex items-center justify-between px-2">
            <h1 class="text-lg font-bold">Item</h1>
        </header>
        <!-- Photos -->
        <div id="phote" class="pt-4">
            <x-card>
                <header class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold">Photos</h2>
                    <x-icon-button icon="plus" class="text-blue-500 hover:text-blue-700" title="Add Photo" />
                </header>
                <div class="">
                    <div class="grid grid-cols-5 gap-2">
                        <div class="col-span-2 roun row-span-2">
                            <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}" class="rounded-xl"
                                alt="">
                        </div>
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-span-1">
                                <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}" class="rounded-xl"
                                    alt="">
                            </div>
                        @endfor
                    </div>
                </div>
            </x-card>
        </div>

        <!-- Item detail -->
        <div id="detail" class="pt-4">
            <x-card class="space-y-4">
                <header class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Detail</h2>
                    <x-icon-link href="{{ route('admin.items.edit', ['item' => $item->id]) }}" icon="edit"
                        title="Edit detail" />
                </header>
                <div>
                    <x-label value="Section" />
                    <div class="w-full md:w-1/2 text-gray-800 text-sm mt-1 bg-gray-100 p-4 rounded-xl">
                        {{ $item->section->name ?? 'N/A' }}
                    </div>
                </div>
                <div>
                    <x-label value="Seller" />
                    <div class="w-full md:w-1/2 text-gray-800 text-sm mt-1 bg-gray-100 p-4 rounded-xl">
                        {{ $item->seller->name ?? 'N/A' }}
                    </div>
                </div>
                <div>
                    <x-label value="Item title" />
                    <div class="text-gray-800 text-sm mt-1 bg-gray-100 p-4 rounded-xl">
                        {{ $item->title }}
                    </div>
                </div>
                <div>
                    <x-label value="Item sku" />
                    <div class="w-full md:w-1/2 text-gray-800 text-sm mt-1 bg-gray-100 p-4 rounded-xl">
                        {{ $item->sku ?? 'N/A' }}
                    </div>
                </div>
                <div>
                    <x-label value="Item description" />
                    <div class="w-full text-gray-800 text-sm mt-1 bg-gray-100 p-4 rounded-xl">
                        {{ $item->description ?? 'N/A' }}
                    </div>
                </div>
                <div>
                    <x-label value="Item specifications" />
                    <div class="w-full text-gray-800 text-sm mt-1 bg-gray-100 p-4 rounded-xl">
                        {{ $item->specification ?? 'N/A' }}
                    </div>
                </div>
            </x-card>
        </div>

        <!-- Item categories -->
        <div id="categories" class="pt-4">
            <x-card class="space-y-4">
                <header class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Categories</h2>
                    <x-icon-link href="{{ route('admin.items.categories.edit', ['item' => $item->id]) }}" icon="edit"
                        title="Edit categories" />
                </header>
                <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-2">
                    @forelse ($item->categories as $category)
                        <li class="bg-blue-50 text-sm p-2 flex justify-between items-center rounded">
                            {{ $category->name }}
                        </li>
                    @empty
                        <span class="px-2 italic text-gray-600">No data</span>
                    @endforelse
                </ul>
            </x-card>
        </div>
        <!-- Variants -->
        <div id="variants" class="pt-4">
            <x-card>
                <header class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Variants</h2>
                    <x-icon-button icon="plus" class="text-blue-500 hover:text-blue-700" title="Add Photo" />
                </header>
                <ul class="flex space-x-1 flex-wrap">
                    @for ($i = 0; $i < rand(1, 2); $i++)
                        <li class="bg-blue-50 text-sm px-4 py-1 rounded">
                            Category 1
                        </li>
                    @endfor
                </ul>
            </x-card>
        </div>

        <!-- Products -->
        <div id="products" class="pt-4">
            <x-card>
                <header class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold">Products</h2>
                    <x-icon-button icon="plus" class="text-blue-500 hover:text-blue-700" title="Add Photo" />
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
                                <th class="p-4">Price</th>
                                <th class="p-4">Balance</th>
                                <th class="p-4 w-14">Actions</th>
                            </tr>
                        </x-slot>
                        <x-slot name="body">
                            @for ($i = 0; $i < 5; $i++)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="p-4">h7h8ej</td>
                                    <td class="p-4">SKU-12345</td>
                                    <td class="p-4 flex space-x-2">
                                        <div class="bg-blue-50 text-sm px-4 py-1 rounded">
                                            <span class="font-semibold">Color:</span> Red
                                        </div>
                                        <div class="bg-blue-50 text-sm px-4 py-1 rounded">
                                            <span class="font-semibold">Size:</span> Medium
                                        </div>
                                    </td>
                                    <td class="p-4">100</td>
                                    <td class="p-4">50</td>
                                    <td class="p-4">50</td>
                                    <td class="p-4">$10.00</td>
                                    <td class="p-4">$5.00</td>
                                    <td class="p-4 w-14">
                                        <x-icon-button icon="edit" class="text-blue-500 hover:text-blue-700"
                                            title="Edit" />
                                        <x-icon-button icon="eye" class="text-blue-500 hover:text-blue-700"
                                            title="View" />
                                    </td>
                                </tr>
                            @endfor
                        </x-slot>
                    </x-table>
                </div>
            </x-card>
        </div>

        <!-- Shipping -->
        <div id="shipping" class="pt-4">
            <x-card>
                <header class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold">Shipping

                    </h2>
                    <x-icon-button icon="plus" class="text-blue-500 hover:text-blue-700" title="Add shipping" />
                </header>
                <div>
                    <x-table>
                        <x-slot name="head">
                            <tr>
                                <th class="p-4">Id</th>
                                <th class="p-4">State</th>
                                <th class="p-4">Name</th>
                                <th class="p-4">Price</th>
                                <th class="p-4">Actions</th>
                            </tr>
                        </x-slot>
                        <x-slot name="body">
                            @for ($i = 0; $i < 5; $i++)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="p-4">h7h8ej</td>
                                    <td class="p-4">California</td>
                                    <td class="p-4">Standard Shipping</td>
                                    <td class="p-4">$5.00</td>
                                    <td class="p-4 w-14">
                                        <x-icon-button icon="edit" class="text-blue-500 hover:text-blue-700"
                                            title="Edit" />
                                        <x-icon-button icon="eye" class="text-blue-500 hover:text-blue-700"
                                            title="View" />
                                        <x-icon-button icon="delete" class="text-red-500 hover:text-red-700"
                                            title="Delete" />
                                    </td>
                                </tr>
                            @endfor
                        </x-slot>
                    </x-table>

                </div>
            </x-card>
        </div>

        <!-- Post -->
        <div id="post" class="pt-4">
            <x-card>
                <header class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold">
                        Actions
                    </h2>
                    <x-icon-button icon="plus" class="text-blue-500 hover:text-blue-700" title="Add Photo" />
                </header>
                <div>
                    <x-table>
                        <x-slot name="head">
                            <tr>
                                <th class="p-4">Category</th>
                                <th class="p-4">Date<br>Time</th>
                                <th class="p-4">Created by</th>
                                <th class="p-4">Created at</th>
                                <th class="p-4">Updated at</th>
                                <th class="p-4">Actions</th>
                            </tr>
                        </x-slot>
                        <x-slot name="body">
                            <tr>
                                <td class="p-4">Publicated</td>
                                <td class="p-4">2023-01-01 12:00:00</td>
                                <td class="p-4">User 1</td>
                                <td class="p-4">2023-01-01 12:00:00</td>
                                <td class="p-4">2023-01-01 12:00:00</td>
                                <td class="p-4 w-14">
                                    <x-icon-button icon="edit" class="text-blue-500 hover:text-blue-700"
                                        title="Edit" />
                                    <x-icon-button icon="eye" class="text-blue-500 hover:text-blue-700"
                                        title="View" />
                                    <x-icon-button icon="delete" class="text-red-500 hover:text-red-700"
                                        title="Delete" />
                                </td>
                            </tr>
                        </x-slot>
                    </x-table>
                </div>
            </x-card>
        </div>
    </div>
</x-layouts.admin>
