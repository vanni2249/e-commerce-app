<div>
    <x-card class="space-y-4">
        <header class="mb-4">
            <h2 class="text-lg font-semibold">Items in Cart</h2>
        </header>
        <div class="space-y-2">
            @foreach ($cart->products ?? [] as $product)
            
                <div class="bg-gray-100 rounded-xl flex">
                    <div class="p-2">
                        <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                            class="w-24 md:w-32 lg:w-40  rounded-xl" alt="">
                    </div>
                    <div class="grow p-2">
                        <header class="md:flex md:justify-between items-start mb-2">
                            <h2 class="text-gray-800 text-sm md:text-base lg:text-lg font-semibold">
                                {{ $product->item->title }}
                            </h2>
                            <ul class="md:text-right">
                                <li class="text-blue-500 font-semibold text-sm md:text-base lg:text-lg">
                                    ${{ $product->price }}
                                </li>
                                <li class="text-xs text-gray-500 whitespace-nowrap">
                                    +${{ $product->shipping_cost }} shipping
                                </li>
                            </ul>
                        </header>
                        <div class="flex">
                            <!-- Quantity Selector -->
                            <span class="bg-blue-100 rounded text-gray-600 px-2 py-1 text-xs">
                                Quantity: {{ $product->pivot->quantity }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</div>
