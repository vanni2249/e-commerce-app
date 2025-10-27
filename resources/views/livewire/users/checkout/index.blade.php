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
                        <div class="bg-gray-100 rounded-xl grid grid-cols-12 gap-4 p-4">
                            <div class="col-span-3 lg:col-span-2">
                                <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                                    class="w-full h-auto  rounded-md" alt="">
                            </div>
                            <div class="col-span-9 lg:col-span-10 flex flex-col space-y-4">
                                <header class="lg:flex lg:justify-between items-start lg:space-x-2">
                                    <h2 class="text-gray-800 text-base font-semibold line-clamp-2">
                                        {{ $product->item->title }}
                                    </h2>
                                    <ul class="lg:text-right mt-2 lg:mt-0 space-y-1">
                                        <li class="text-blue-800 font-semibold text-sm lg:text-base">
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
                    <a href="{{ route('addresses', ['redirect' => 'checkouts']) }}"
                        class="text-sm text-blue-800 hover:underline" wire:navigate>Change</a>
                    {{-- <button @click="$dispatch('open-modal', 'change-address-modal')"
                        class="text-blue-500 text-sm hover:underline cursor-pointer">Change</button> --}}
                </header>
                <x-address name="{{ $address->name }}" line1="{{ $address->line1 }}" line2="{{ $address->line2 }}"
                    city="{{ $address->city->name }}" state="{{ $address->state_code }}"
                    code="{{ $address->postal_code }}" phone="{{ $address->phone }}" />


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
                    <button @click="$dispatch('open-modal', 'make-payment-modal')"
                        class="w-full block text-center bg-blue-600 text-white text-lg py-2 rounded mt-4 hover:bg-blue-600 transition-colors duration-200 cursor-pointer">
                        Make Payment
                    </button>
                </footer>
            </x-card>
        </div>
    </div>
    <!-- Change address modal -->
    <x-modal name="change-address-modal" title="Change Address" size="md">

        <div class="space-y-4">
            @foreach ($addresses as $addr)
                <div @class([
                    'border p-4 rounded-lg',
                    'border-gray-300' => $address->id !== $addr->id,
                    'border-blue-500' => $address->id === $addr->id,
                ])>
                    <x-address name="{{ $addr->name }}" line1="{{ $addr->line1 }}" line2="{{ $addr->line2 }}"
                        city="{{ $addr->city->name }}" state="{{ $addr->state_code }}"
                        code="{{ $addr->postal_code }}" phone="{{ $addr->phone }}" />
                    @if ($address->id !== $addr->id)
                        <button wire:click="setAddress({{ $addr->id }})"
                            class="mt-2 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition-colors duration-200 cursor-pointer">Ship
                            to this address</button>
                    @else
                        <span class="mt-2 w-full block text-center bg-green-100 text-green-800 py-2 rounded">Current
                            Address</span>
                    @endif
                </div>
            @endforeach
        </div>
    </x-modal>

    <!-- Make a payment modal -->
    <x-modal name="make-payment-modal" title="Make Payment" size="md">
        <div class="space-y-4">
            <!-- Card Holder Name -->
            <div>
                <x-label for="card-holder-name" value="Card Holder Name" />
                <x-input class="w-full" wire:model="name" id="card-holder-name" type="text"
                value="{{ $user->name }}" />
                <small id="card-holder-name-error" class="text-xs text-red-600"></small>
            </div>

            <!-- Stripe Elements Placeholder -->
            <div>
                <div id="card-element" class="bg-gray-100 border border-gray-300 p-3 rounded"></div>
                <small id="card-element-error" class="text-red-500"></small>
            </div>

            <!-- Make Payment Button -->
            <button id="card-button" type="button" wire:loading.target="makePayment" wire:loading.attr="disabled"
                wire:loading.class="opacity-50 cursor-not-allowed"
                class="w-full block text-center bg-green-600 text-white text-lg py-2 rounded mt-4 hover:bg-green-700 transition-colors duration-200 cursor-pointer">
                Make Payment
            </button>
        </div>
    </x-modal>
</div>

@assets
    <script src="https://js.stripe.com/v3/"></script>
@endassets

@script
    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardElementError = document.getElementById('card-element-error');
        const cardHolderNameError = document.getElementById('card-holder-name-error');
        const cardButton = document.getElementById('card-button');

        cardButton.addEventListener('click', async (e) => {

            // Add opacity-50 and disable the button
            cardButton.classList.add('opacity-50', 'cursor-not-allowed');
            cardButton.setAttribute('disabled', 'disabled');

            // Validate that the cardHolderName is not empty
            if (cardHolderName.value.trim() === '') {
                // Send error to id error component
                cardHolderName.classList.add('border-red-600');
                cardHolderNameError.textContent = 'Card holder name is required.';
                // Remove opacity-50 and enable the button
                cardButton.classList.remove('opacity-50', 'cursor-not-allowed');
                cardButton.removeAttribute('disabled');
                return;
            }

            const {
                paymentMethod,
                error
            } = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            );

            if (error) {
                // Remove opacity-50 and enable the button
                cardButton.classList.remove('opacity-50', 'cursor-not-allowed');
                cardButton.removeAttribute('disabled');
                // Display "error.message" to the user in card-element-error
                cardElementError.textContent = error.message;
                const cardElement = document.getElementById('card-element');
                cardElement.classList.add('border-red-600');
                // alert(error.message);
            } else {
                Livewire.dispatch('makePayment', {
                    paymentMethod: paymentMethod.id
                });
            }
        });
    </script>
@endscript
