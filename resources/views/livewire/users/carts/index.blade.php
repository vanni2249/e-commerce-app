<div>
    <div class="grid grid-cols-12 gap-4">
        @if ($products)
            <!-- Cart Items -->
            <div class="col-span-12 md:col-span-8">
                <x-card>
                    <header class="mb-4">
                        <h2 class="text-lg font-semibold">Shopping Cart</h2>
                    </header>
                    <div class="space-y-2">
                        @foreach ($products as $product)
                            <div class="bg-gray-100 rounded-xl flex p-4 space-x-4">
                                <div class="">
                                    <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                                        class="w-24 md:w-32 lg:w-40  rounded-lg" alt="">
                                </div>
                                <div class="grow space-y-4">
                                    <header class="md:flex md:justify-between items-start">
                                        <h2 class="text-gray-800 text-sm md:text-base lg:text-lg font-semibold">
                                            {{ $product->item->en_title }}
                                        </h2>
                                        <ul class="md:text-right">
                                            <li class="text-blue-500 font-semibold text-sm md:text-base lg:text-lg">
                                                ${{ $product->price }}
                                            </li>
                                            <li class="text-sm text-gray-500 whitespace-nowrap">
                                                @if ($product->shipping_cost)
                                                    @if ($product->shipping_cost == 0)
                                                        Free Shipping
                                                    @else
                                                        +${{ $product->shipping_cost }} shipping
                                                    @endif
                                                @endif
                                            </li>
                                        </ul>
                                    </header>
                                    <div class="flex justify-between items-center">
                                        <div class="flex justify-between space-x-2 items-center">
                                            <button wire:click="lessProductQuantity({{ $product->id }})"
                                                class="bg-blue-100 rounded text-gray-600 p-1 text-xs hover:bg-blue-300 transition-colors duration-200 cursor-pointer">
                                                <x-icon icon="minus" />
                                            </button>
                                            <span class="text-gray-800 font-semibold px-2 py-1 text-sm">
                                                {{ $product->pivot->quantity }}
                                            </span>
                                            <button wire:click="sumProductQuantity({{ $product->id }})"
                                                class="bg-blue-100 rounded text-gray-600 p-1 text-xs hover:bg-blue-300 transition-colors duration-200 cursor-pointer">
                                                <x-icon icon="plus" />
                                            </button>
                                        </div>
                                        <!-- Remove Button -->
                                        <button wire:click="removeItem({{ $product->id }})"
                                            class="bg-blue-100 text-blue-800 text-xs p-1 rounded hover:bg-blue-300 transition-colors duration-200 cursor-pointer">
                                            <x-icon icon="trash" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ($cart && $cart->products->count() > 0)
                            <div class="flex justify-end items-center mt-4">
                                <x-button variant="light" size="sm" wire:click="removeCart"
                                    class="text-sm text-gray-500 cursor-pointer hover:text-gray-700 transition-colors duration-200">
                                    Remove all Items
                                </x-button>
                            </div>
                        @endif
                    </div>
                </x-card>
            </div>
            <!-- Order Summary -->
            <div class="col-span-12 md:col-span-4">
                <x-card>
                    <header class="mb-4">
                        <h2 class="text-lg font-semibold">Order Summary</h2>
                    </header>
                    <ul class="text-sm text-gray-600">
                        @foreach ($summary as $item)
                            <li @class([
                                'flex justify-between items-center py-1',
                                'border-t border-gray-200 font-bold' => $item['label'] === 'Grand Total',
                                'text-red-600' => $item['label'] === 'Discount',
                            ])>
                                <span>{{ $item['label'] }}</span>
                                <span class="font-bold">{{ $item['value'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <footer>
                        <a href="{{ route('checkout') }}"
                            class="w-full block text-center bg-blue-500 text-white text-lg py-2 rounded mt-4 hover:bg-blue-600 transition-colors duration-200"
                            wire:navigate>
                            Proceed to Checkout
                        </a>
                    </footer>
                </x-card>
            </div>
        @else
            <div class="col-span-12">
                <x-card>
                    <div class="text-center py-10">
                        <x-icon icon="shopping-cart" class="w-16 h-16 mx-auto text-gray-400" />
                        <h2 class="text-xl font-semibold text-gray-800 mt-4">Your cart is empty</h2>
                        <p class="text-gray-600 mt-2">Looks like you haven't added any items to your cart yet.</p>
                        <a href="{{ route('items.index') }}"
                            class="inline-block mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors duration-200"
                            wire:navigate>
                            Start Shopping
                        </a>
                    </div>
                </x-card>
            </div>
        @endif
    </div>
</div>
