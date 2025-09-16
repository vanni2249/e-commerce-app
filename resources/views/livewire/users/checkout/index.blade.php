<div>
    <div class="grid grid-cols-12 gap-4">
        <!-- List Items -->
        <div class="col-span-12 md:col-span-8 order-last md:order-first">
            <x-card>
                <!-- Header -->
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Items in Cart</h2>
                </header>
                <!-- List items -->
                <div class="space-y-2">
                    @foreach ($products as $product)
                        <div class="bg-gray-100 rounded-xl flex p-4 space-x-4">
                            <div>
                                <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                                    class="w-24 md:w-32 lg:w-40  rounded-xl" alt="">
                            </div>
                            <div class="grow">
                                <header class="md:flex md:justify-between items-start mb-2">
                                    <h2 class="text-gray-800 text-sm md:text-base lg:text-lg font-semibold">
                                        {{ $product->item->en_title }}
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
        <!-- Order Summary -->
        <div class="col-span-12 md:col-span-4 space-y-4">
            <!-- Shipping Address -->
            <x-card>
                <header class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Shipping address</h2>
                    <button @click="$dispatch('open-modal', 'change-address-modal')"
                        class="text-blue-500 text-sm hover:underline cursor-pointer">Change</button>
                </header>
                <x-address name="{{ $address->name }}" line1="{{ $address->line1 }}" line2="{{ $address->line2 }}"
                    city="{{ $address->city->name }}" state="{{ $address->state_code }}"
                    code="{{ $address->postal_code }}" phone="{{ $address->phone }}" />

                <x-modal name="change-address-modal" title="Change Address" size="md">

                    <div class="space-y-4">
                        @foreach ($addresses as $addr)
                            <div @class([
                                'border p-4 rounded-lg',
                                'border-gray-300' => $address->id !== $addr->id,
                                'border-blue-500' => $address->id === $addr->id,
                            ])>
                                <x-address name="{{ $addr->name }}" line1="{{ $addr->line1 }}"
                                    line2="{{ $addr->line2 }}" city="{{ $addr->city->name }}"
                                    state="{{ $addr->state_code }}" code="{{ $addr->postal_code }}"
                                    phone="{{ $addr->phone }}" />
                                @if ($address->id !== $addr->id)
                                    <button wire:click="setAddress({{ $addr->id }})"
                                        class="mt-2 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition-colors duration-200 cursor-pointer">Ship
                                        to this address</button>
                                @else
                                    <span
                                        class="mt-2 w-full block text-center bg-green-100 text-green-800 py-2 rounded">Current
                                        Address</span>
                                @endif
                            </div>
                        @endforeach
                    </div>

                </x-modal>
            </x-card>
            <!-- Checkout Summary -->
            <x-card>
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Checkout summary</h2>
                </header>
                <ul class="text-sm text-gray-600">
                    @foreach ($summary as $item)
                        <li @class([
                            'flex justify-between items-center py-1',
                            'border-t border-gray-300 font-bold' => $item['label'] === 'Grand Total',
                            'text-red-600' => $item['label'] === 'Discount',
                        ])>
                            <span>{{ $item['label'] }}</span>
                            <span class="font-bold">{{ $item['value'] }}</span>
                        </li>
                    @endforeach
                </ul>
                <footer>
                    <button wire:click="makePayment"
                        class="w-full block text-center bg-blue-600 text-white text-lg py-2 rounded mt-4 hover:bg-blue-600 transition-colors duration-200 cursor-pointer">
                        Make Payment
                    </button>
                </footer>
            </x-card>
        </div>
    </div>
</div>
