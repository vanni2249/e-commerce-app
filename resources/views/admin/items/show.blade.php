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
                @livewire('admin.items.details', ['item' => $item])
                
            </x-card>
        </div>

        <!-- Item categories -->
        <div id="categories" class="pt-4">
            <x-card class="space-y-4">
                @livewire('admin.items.categories', ['item' => $item])
                
            </x-card>
        </div>
        <!-- Variants -->
        <div id="variants" class="pt-4">
            <x-card class="space-y-4">
                @livewire('admin.items.variants', ['item' => $item])
            </x-card>
        </div>

        <!-- Products -->
        <div id="products" class="pt-4">
            <x-card>
                @livewire('admin.items.products', ['item' => $item])
                
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
