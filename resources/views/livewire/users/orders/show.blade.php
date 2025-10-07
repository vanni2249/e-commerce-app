<div>
    <div class="grid grid-cols-12 gap-4">
        <!-- Order header -->
        <x-card class="col-span-full bg-white">
            <header class="flex items-center justify-between">
                <div>
                    <h1 class="text-lg font-bold">{{ $order->number }}</h1>
                    <span class="text-gray-600 text-sm">
                        Placed on: {{ $order->created_at->format('M d, Y') }}
                    </span>
                </div>
                <div class="">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <x-icon-button icon="ellipsis-vertical" />
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="#">
                                View Invoice
                            </x-dropdown-link>
                            <x-dropdown-link href="#">
                                Download Invoice
                            </x-dropdown-link>
                            @if (!$order->claim)
                                <x-dropdown-button wire:click="claimOrderModal">
                                    Claim Order
                                </x-dropdown-button>
                            @endif
                        </x-slot>
                    </x-dropdown>
                </div>
            </header>
        </x-card>

        <!-- Has Claim Order -->
        @if ($order->claim)
            <div class="col-span-full">

                <x-alert variant="warning" title="Order Claim" class="col-span-full">
                    <x-slot name="leftHeader">
                        <x-badge color="warning" class="capitalize" value="{{ $order->claim->status }}" />
                    </x-slot>
                    <div class="flex justify-between items-center">
                        <span class="text-sm">
                            You have submitted a claim for this order.
                        </span>
                        <span class="text-gray-800 text-sm">
                            {{ $order->claim->number }}
                        </span>
                    </div>
                </x-alert>
            </div>
        @endif
        <div class="col-span-full md:col-span-4 space-y-4">
            <!-- Shipping address -->
            <x-card>
                <header class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Shipping address</h2>
                </header>
                <x-address name="{{ $order->address->name }}" line1="{{ $order->address->line1 }}"
                    line2="{{ $order->address->line2 }}" city="{{ $order->address->city->name }}"
                    state="{{ $order->address->state_code }}" code="{{ $order->address->postal_code }}"
                    phone="{{ $order->address->phone }}" />
                </ul>
            </x-card>
            <!-- Order summary -->
            <x-card>
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Summary</h2>
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
            </x-card>
        </div>
        <!-- Order items -->
        <div class="col-span-full md:col-span-8 space-y-4">
            <x-card>
                <header class="flex items-center justify-between">
                    <h2 class="text-lg font-bold">Items in order</h2>
                    <p class="text-gray-600">
                        ({{ $order->sales->count() }} items)
                    </p>
                </header>
            </x-card>
            <!-- Foreach order -->
            <div class="space-y-2">
                @foreach ($order->sales as $sale)
                    <x-card>
                        <div class="flex gap-4">
                            <div class="w-3/4 md:w-3/5 lg:w-1/4">
                                <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                                    class="w-ful h-auto rounded-md" alt="">
                            </div>
                            <div class="grow">
                                <header class="md:flex md:justify-between items-start mb-2">
                                    <h2 class="text-gray-800 text-sm md:text-base lg:text-lg font-semibold">
                                        {{ $sale->product->item->en_title }}
                                    </h2>
                                    <div class="flex items-center space-x-4 mt-2 md:mt-0">
                                        <ul class="md:text-right">
                                            <li class="text-blue-800 font-semibold text-sm md:text-base lg:text-lg">
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

                                    </div>
                                </header>
                                <div class="flex">
                                    <!-- Quantity Selector -->
                                    <span class="bg-blue-100 rounded text-gray-600 px-2 py-1 text-xs">
                                        Quantity: {{ $sale->quantity }}
                                    </span>
                                </div>
                            </div>
                            <div>
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <x-icon-button icon="ellipsis-vertical" />
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link href="{{ route('items.show', $sale->product->item->id) }}">
                                            View Product
                                        </x-dropdown-link>
                                        <x-dropdown-button wire:click="claimSaleModal('{{ $sale->id }}')">
                                            Claim Item
                                        </x-dropdown-button>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
                        <!-- Shipping info -->

                        @if (!$order->claim)
                            {{-- <div class="p-4 bg-gray-100 rounded-md mt-4">
                                <header class="flex justify-between items-center">
                                    <h3 class="font-semibold text-sm text-gray-800">Shipped via USPS</h3>
                                    <x-badge value="Delivered" color="success" />
                                </header>
                                <div>
                                    <button wire:click="shippingInfoModal"
                                        class=" text-gray-600 hover:text-blue-800 cursor-pointer underline decoration-dotted decoration-2 underline-offset-2">
                                        8S79VQ48RV189WE84VG
                                    </button>
                                    <br>
                                    <span class="text-sm text-gray-600">
                                        Delivered on
                                    </span>
                                    <span class="font-semibold text-gray-800">
                                        {{ $sale->updated_at->format('M d, Y') }}
                                    </span>
                                </div>
                            </div> --}}
                        @endif
                        @if ($sale->claim)
                            <x-alert variant="warning" title="Item Claim" class="mt-4">
                                <x-slot name="leftHeader">
                                    <x-badge color="warning" class="capitalize" value="{{ $sale->claim->status }}" />
                                </x-slot>
                                <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                                    <span class="text-sm">
                                        You have submitted a claim for this item.
                                    </span>
                                    <span class="text-gray-800 text-sm">
                                        {{ $sale->claim->number }}
                                    </span>
                                </div>
                            </x-alert>
                        @endif
                    </x-card>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Shipping information modal -->
    <x-modal name="shipping-info-modal" title="Shipping information">
        <p>
            Here is some shipping information...
        </p>
    </x-modal>

    <!-- Claim order modal -->
    <x-modal name="claim-order-modal" title="Claim Order" size="md">
        @if (!$claimCreated)
            <form wire:submit.prevent="claimOrderStore" class="space-y-4">
                <p class="text-gray-600">
                    <span class="font-semibold text-gray-800">
                        Hi, {{ $user->name }}.
                    </span>
                    Please fill out the form below to submit a claim for your order.
                </p>
                <!-- Phone -->
                <div class="">
                    <x-label for="Phone" value="Phone" />
                    <x-input wire:model="phone" id="Phone" class="w-full mt-1" type="text"
                        placeholder="Enter your phone number" disabled />
                    @error('phone')
                        <x-error message="{{ $message }}" />
                    @enderror
                </div>
                <!-- Categories -->
                <div>
                    <x-label for="Category" value="Category" />
                    <x-select wire:model="claim_category_id" id="Category" class="w-full mt-1">
                        <option value="">Select a category</option>
                        @foreach ($claimCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->en_name }}</option>
                        @endforeach
                    </x-select>
                    @error('claim_category_id')
                        <x-error message="{{ $message }}" />
                    @enderror
                </div>
                <!-- Comments -->
                <div class="mb-4">
                    <x-label for="Comments" value="Comments" />
                    <x-textarea wire:model="comments" id="Comments" class="w-full mt-1" rows="3"
                        placeholder="Describe your issue..." />
                    @error('comments')
                        <x-error message="{{ $message }}" />
                    @enderror
                </div>
                <!-- Button -->
                <div class="flex justify-end">
                    <x-button type="submit" class="ml-2">
                        Submit Claim
                    </x-button>
                </div>
            </form>
        @else
            <div class="text-center">
                <h2 class="text-xl font-bold mb-2">Claim Submitted</h2>
                <p class="text-gray-600 mb-4">
                    Thank you, {{ $user->name }}. Your claim has been successfully submitted.
                    We will review your request and get back to you shortly.
                    {{-- Your claim reference number is <span class="font-semibold text-gray-800">#{{ $claimReference }}</span>. --}}
                </p>
                <x-button @click="$dispatch('close-modal','claim-order-modal')" class="mt-4">
                    Close
                </x-button>
            </div>
        @endif
    </x-modal>

    <!-- Claim sale modal -->
    <x-modal name="claim-sale-modal" title="Claim Sale" size="md">
        @if (!$claimCreated)
            <form wire:submit.prevent="claimSaleStore" class="space-y-4">
                <p class="text-gray-600">
                    <span class="font-semibold text-gray-800">
                        Hi, {{ $user->name }}.
                    </span>
                    <br>
                    Please fill out the form below to submit a claim for your sale.
                </p>

                <!-- Display sale -->
                <div class="p-2 bg-gray-100 rounded-xl">
                    <div class="flex gap-4">
                        <div class="">
                            <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                                class="w-24 md:w-32  rounded-xl" alt="">
                        </div>
                        <div class="grow">
                            <header class="md:flex md:justify-between items-start mb-2">
                                <h2 class="text-gray-800 text-sm font-semibold">
                                    {{ $sale->product->item->en_title }}
                                </h2>
                                <div class="flex items-center space-x-4 mt-2 md:mt-0">
                                    <ul class="md:text-right">
                                        <li class="text-blue-800 font-semibold text-sm md:text-base lg:text-lg">
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
                                </div>
                            </header>
                            <div class="flex">
                                <!-- Quantity Selector -->
                                <span class="bg-blue-100 rounded text-gray-600 px-2 py- 1 text-xs">
                                    Quantity: {{ $sale->quantity }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phone -->
                <div class="">
                    <x-label for="Phone" value="Phone" />
                    <x-input wire:model="phone" id="Phone" class="w-full mt-1" type="text"
                        placeholder="Enter your phone number" disabled />
                    @error('phone')
                        <x-error message="{{ $message }}" />
                    @enderror
                </div>
                <!-- Categories -->
                <div>
                    <x-label for="Category" value="Category" />
                    <x-select wire:model="claim_category_id" id="Category" class="w-full mt-1">
                        <option value="">Select a category</option>
                        @foreach ($claimCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->en_name }}</option>
                        @endforeach
                    </x-select>
                    @error('claim_category_id')
                        <x-error message="{{ $message }}" />
                    @enderror
                </div>
                <!-- Comments -->
                <div class="mb-4">
                    <x-label for="Comments" value="Comments" />
                    <x-textarea wire:model="comments" id="Comments" class="w-full mt-1" rows="3"
                        placeholder="Describe your issue..." />
                    @error('comments')
                        <x-error message="{{ $message }}" />
                    @enderror
                </div>
                <!-- Button -->
                <div class="flex justify-end">
                    <x-button type="submit" class="ml-2">
                        Submit Claim
                    </x-button>
                </div>
            </form>
        @else
            <div class="text-center">
                <h2 class="text-xl font-bold mb-2">Claim Submitted</h2>
                <p class="text-gray-600 mb-4">
                    Thank you, {{ $user->name }}. Your claim has been successfully submitted.
                    We will review your request and get back to you shortly.
                    {{-- Your claim reference number is <span class="font-semibold text-gray-800">#{{ $claimReference }}</span>. --}}
                </p>
                <x-button @click="$dispatch('close-modal','claim-sale-modal')" class="mt-4">
                    Close
                </x-button>
            </div>
        @endif
    </x-modal>
</div>
