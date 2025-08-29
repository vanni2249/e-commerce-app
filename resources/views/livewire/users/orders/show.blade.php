<div>
    <div class="grid grid-cols-12 gap-4">
        <x-card class="col-span-full">
            <header class="flex items-center justify-between">
                <h1 class="text-lg font-bold">Your Order</h1>
                <p class="text-gray-600">
                    SHP-202510E3456
                </p>
            </header>
        </x-card>
        <div class="col-span-full md:col-span-4 space-y-4">
            <!-- Shipping detail -->
            <x-card>
                <header class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Shipping detail</h2>
                </header>
                <ul class="text text-gray-600 space-y-2">
                    <li class="flex flex-col">
                        <span class="text-sm font-bold">Shipping number</span>
                        <span class="text-gray-500">SHP-202510E3456</span>
                    </li>
                    <li class="flex flex-col">
                        <span class="text-sm font-bold">Shipping date</span>
                        <span class="text-gray-500">12/25/2025</span>
                    </li>
                    <li class="flex flex-col">
                        <span class="text-sm font-bold">Status</span>
                        <span class="text-gray-500">Shipped</span>
                    </li>
                    <li class="flex flex-col">
                        <span class="text-sm font-bold">Shipping company</span>
                        <span class="text-gray-500">USPS</span>
                    </li>
                    <li class="flex flex-col">
                        <span class="text-sm font-bold">Tracking number</span>
                        <span class="text-blue-500">
                            <a href="#">8S79VQ48RV189WE84VGEF8W9R8G4V198</a>
                        </span>
                    </li>
                </ul>
            </x-card>
            <!-- Shipping address -->
            <x-card>
                <header class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Shipping address</h2>
                </header>
                <x-address />
                </ul>
            </x-card>
            <!-- Order summary -->
            <x-card>
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Summary</h2>
                </header>
                <ul class=" text-gray-600 space-y-1">
                    <li class="flex justify-between items-center">
                        <span class="text-sm font-bold">Items in Cart</span>
                        <span class="text-gray-600">2</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="text-sm font-bold">Subtotal</span>
                        <span class="text-gray-600">$49.98</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="text-sm font-bold">Tax</span>
                        <span class="text-gray-600">$0.00</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="text-sm font-bold">Total</span>
                        <span class="font-bold">$49.98</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="text-sm font-bold">Discount</span>
                        <span class="text-red-600">-$5.00</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="text-sm font-bold">Shipping</span>
                        <span class="text-green-600">Free</span>
                    </li>
                    <li class="flex justify-between items-center border-t border-gray-200 font-bold">
                        <span class="text-sm font-bold">Grand Total</span>
                        <span>$49.98</span>
                    </li>
                </ul>
            </x-card>
        </div>

        <div class="col-span-full md:col-span-8">
            <x-card>
                <header class="mb-4">
                    <h2 class="text-lg font-bold">Items in order</h2>
                </header>
                <div class="space-y-2">
                    @foreach ($order->sales as $sale)
                        <div class="bg-gray-100 rounded-xl flex">
                            <div class="p-2">
                                <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                                    class="w-24 md:w-32  rounded-xl" alt="">
                            </div>
                            <div class="grow p-2">
                                <header class="md:flex md:justify-between items-start mb-2">
                                    <h2 class="text-gray-800 text-sm md:text-base lg:text-lg font-semibold">
                                        {{ $sale->product->item->title }}
                                    </h2>
                                    <ul class="md:text-right">
                                        <li class="text-blue-500 font-semibold text-sm md:text-base lg:text-lg">
                                            ${{ $sale->price }}
                                        </li>
                                        <li class="text-xs text-gray-500 whitespace-nowrap">
                                            @if ($sale->shipping_cost > 0)
                                                +${{ $sale->shipping_cost }} shipping
                                            @else
                                                Free shipping
                                            @endif
                                        </li>
                                    </ul>
                                </header>
                                <div class="flex">
                                    <!-- Quantity Selector -->
                                    <span class="bg-blue-100 rounded text-gray-600 px-2 py-1 text-xs">
                                        Quantity: {{ $sale->quantity }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
    </div>
</div>
