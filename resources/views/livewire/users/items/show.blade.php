<div>
    <div class="grid grid-cols-12 gap-2 md:gap-4">
        <x-card class="col-span-full bg-white">
            <div class="grid grid-cols-12 gap-2">
                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                    <!-- Main box imagens -->
                    <div class="flex flex-col lg:flex-row space-y-2 lg:space-y-0">
                        <!-- Box Imagen -->
                        <div class="w-full rounded-xl">
                            <img src="{{ asset('images/1-512.png') }}" class="rounded-xl" alt="">
                        </div>
                        <!-- Thumbnails -->
                        <div class="lg:order-first flex justify-center">
                            <ul
                                class="flex flex-row pr-2 lg:flex-col space-x-1 lg:space-x-0 lg:space-y-1 overflow-x-auto lg:overflow-y-auto no-scrollbar ">
                                @for ($i = 0; $i < 6; $i++)
                                    <li class="flex-shrink-0">
                                        <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                                            class="rounded-xl w-12 lg:w-24" alt="">
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Right Side -->
                <div class="col-span-12 md:col-span-6 lg:col-span-6 space-y-2 md:space-y-4 lg:space-y-6">
                    <!-- Title -->
                    <div>
                        <h2 class="text-2xl font-semibold line-clamp-2">
                            {{ $item->en_title }}
                        </h2>
                        <!-- Rating -->
                        <div class="flex items-center space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon text-amber-400 icon-tabler icons-tabler-outline icon-tabler-star">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.75l-5.5 3.25l1.05 -6.1l-4.45 -4.35l6.15 -.9l2.8 -5.65l2.8 5.65l6.15 .9l-4.45 4.35l1.05 6.1z" />
                            </svg>
                            <span class="text-gray-600 text-sm">4.5 (120 reviews)</span>
                        </div>
                    </div>
                    <!-- Price -->
                    <div class="">
                        <div>
                            <span class="text-blue-600 text-4xl font-semibold">${{ $price }}</span>
                            <span class="text-gray-500 line-through ml-2">
                                {{-- ${{ $price + rand(10, 20) }} --}}
                            </span>
                        </div>
                        <div>
                            <span class="text-gray-800 text-sm">
                                @if ($shippingCost > 0)
                                    + ${{ $shippingCost }} shipping
                                @else
                                    Free shipping
                                @endif
                            </span>
                        </div>
                    </div>
                    <!-- Description -->
                    <p class="text-gray-600 prose line-clamp-2">
                        {{ $item->en_short_description }}
                    </p>
                    <!-- Variants -->
                    <div class="space-y-2">
                        @forelse ($item->attributes as $i => $attribute)
                            <div>
                                <x-label value="{!! $attribute->name !!}" />
                                <br>
                                <ul class="flex flex-wrap space-x-2">
                                    @foreach ($attribute->variants as $variant)
                                        <li>
                                            <input type="radio" id="variant-{{ $attribute->id }}-{{ $variant->id }}"
                                                name="variants[{{ $i }}]" value="{{ $variant->id }}"
                                                wire:model.live="variants.{{ $i }}" class="hidden peer">
                                            <label for="variant-{{ $attribute->id }}-{{ $variant->id }}"
                                                class="cursor-pointer px-2 py-1 rounded border border-gray-300 text-sm peer-checked:bg-blue-100 peer-checked:text-blue-600">
                                                {{ $variant->en_name }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <!-- Quantity Selector -->
                    <div>
                        @if ($stock > 0)
                            <label for="quantity" class="text-gray-600 text-xs">Quantity:</label>
                            <div>
                                {{ $stock }}
                                <select wire:model.live="quantity"
                                    class="bg-blue-100 rounded text-gray-600 px-4 py-2 text-xs cursor-pointer">
                                    @for ($i = 1; $i <= ($stock > 10 ? 10 : $stock); $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <span class="text-gray-500 text-xs">Available: {{ $stock > 10 ? '+10' : $stock }}</span>
                        @else
                            <span class="text-red-500 text-xs">Out of Stock</span>
                            <br>
                            <span class="text-gray-500 text-xs">Notify me when available</span>
                        @endif
                        <br>
                    </div>
                    <!-- Buttons -->
                    <div class="flex items-center space-x-2">
                        <!-- auth -->
                        @auth
                            <!-- Favorite -->
                            @if ($wishlistAdded)
                            @else
                                <button wire:click="addItemToWishlistModal"
                                    class=" bg-blue-100 text-blue-500 text-sm p-2 px-4 cursor-pointer hover:bg-blue-200 transition-all duration-300 ease-in-out rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                </button>
                            @endif
                            @if ($stock > 0)
                                <!-- Add to cart -->
                                <button
                                    class="bg-blue-600 w-full font-bold text-blue-100 text-md p-2 px-4 rounded cursor-pointer hover:bg-blue-700 transition duration-300 ease-in-out"
                                    wire:loading.attr="disabled" wire:click="addToCart">
                                    Add to Cart
                                </button>
                            @else
                                <!-- Notify me -->
                                <button
                                    class="bg-blue-600 w-full font-bold text-blue-100 text-md p-2 px-4 rounded cursor-pointer hover:bg-blue-700 transition duration-300 ease-in-out"
                                    wire:loading.attr="disabled" wire:click="notifyMe">
                                    Notify Me
                                </button>
                            @endif
                        @endauth
                        <!-- guest -->
                        @guest
                            <!-- Favorite -->
                            <a href="{{ route('login') }}"
                                class=" bg-blue-100 text-blue-500 text-sm p-2 px-4 cursor-pointer hover:bg-blue-200 transition-all duration-300 ease-in-out rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                </svg>
                            </a>
                            <!-- Login -->
                            <a href="{{ route('login') }}"
                                class="bg-blue-600 block text-center w-full font-bold text-blue-100 text-md p-2 px-4 rounded cursor-pointer hover:bg-blue-700 transition duration-300 ease-in-out">
                                @if ($stock > 0)
                                    Add to Cart
                                @else
                                    Notify Me
                                @endif
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </x-card>
        <!-- Description -->
        <x-card class="bg-white col-span-full">
            <header class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold">Description</h2>
            </header>
            <div class="prose max-w-none">
                {!! $item->en_description ?? '...' !!}
            </div>
        </x-card>

        <!-- Specification -->
        <x-card class="bg-white col-span-full">
            <header class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold">Specification</h2>
            </header>

            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2">
                @forelse ($item->en_specifications as $specification)
                    <li class="flex">
                        <span class="w-1/4 text-sm text-gray-600">{{ $specification['label'] }}</span>
                        <span class="font-bold prose">{{ $specification['value'] }}</span>
                    </li>
                @empty
                    ...
                @endforelse
            </ul>
        </x-card>

        <!-- Shipping policy -->
        <x-card class="bg-white col-span-full">
            <header class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold">Shipping Policy</h2>
            </header>
            <div class="prose max-w-none">
                {!! $item->en_shipping_policy ?? ($item->seller->shipping_policy ?? '...') !!}
            </div>
        </x-card>

        <!-- Return policy -->
        <x-card class="bg-white col-span-full">
            <header class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold">Return Policy</h2>
            </header>
            <div class="prose max-w-none">
                {!! $item->en_return_policy ?? ($item->seller->return_policy ?? '...') !!}
            </div>
        </x-card>
    </div>
    <!-- Create wishlist modal -->
    <x-modal name="add-item-wishlist-modal" title="Add to wishlist" size="sm">
        <form wire:submit.prevent="addItemToWishlist">
            <div class="space-y-4">
                <x-label for="wishlist" value="Select a wishlist" />
                @if ($wishlists)
                    <x-select class="w-full" wire:model.live="wishlist_id" id="wishlist">
                        @foreach ($wishlists as $wishlist)
                            <option value="{{ $wishlist->id }}">{{ $wishlist->name }}</option>
                        @endforeach
                    </x-select>
                @endif
                <div class="flex justify-start space-x-2">
                    <x-button type="submit" class="grow" variant="primary" wire:loading.attr="disabled">
                        Add to Wishlist
                    </x-button>
                </div>
            </div>
        </form>
    </x-modal>
</div>
