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
