<div class="space-y-8 md:space-y-12">
    <x-card>
        <div class="grid grid-cols-12 gap-4">
            <!--Mobile Top - Desktop Left Side Top -->
            <div class="col-span-12 md:col-span-6">
                <!-- Main box images -->
                <div class="flex flex-col lg:flex-row space-y-2 lg:space-y-0">
                    <!-- Box Imagen -->
                    <div class="w-full rounded-xl">
                        <img src="{{ asset('images/1-512.png') }}" class="rounded-lg" alt="">
                    </div>
                    <!-- Thumbnails -->
                    <div class="lg:order-first flex justify-start">
                        <ul
                            class="flex flex-row pr-2 lg:flex-col space-x-1 lg:space-x-0 lg:space-y-1 overflow-x-auto lg:overflow-y-auto no-scrollbar ">
                            @for ($i = 0; $i < 6; $i++)
                                <li class="flex-shrink-0">
                                    <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                                        class="rounded-md w-12 lg:w-24" alt="">
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>

            </div>
            <!--Mobile Center - Desktop Right Side -->
            <div class="col-span-12 md:col-span-6 md:row-span-2 pt-4 md:pt-0">
                <div class="md:sticky md:top-22 space-y-4 md:space-y-4 lg:space-y-6">
                    <!-- Title -->
                    <div class="space-y-2">
                        <h2 class="text-xl font-semibold text-gray-900 line-clamp-2">
                            {{ $item->title }}
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
                        <div class="flex flex-col space-y-2">
                            <!-- Price -->
                            @if ($stock > 0)
                                <span class="text-green-600 text-sm font-semibold">{{ __('In Stock') }}</span>
                                <span class="text-blue-600 text-4xl font-semibold">${{ $price }}</span>
                            @else
                                <span class="text-red-600 text-sm font-semibold">{{ __("Out of Stock") }}</span>
                            @endif
                            <!-- Before price -->
                            <span class="text-gray-500 line-through ml-2">
                                {{-- ${{ $price + rand(10, 20) }} --}}
                            </span>
                        </div>
                        <div>
                            @if ($stock > 0)

                                <span class="text-gray-800 text-sm">
                                    @if ($shippingCost > 0)
                                        + ${{ $shippingCost }} {{ __('shipping') }}
                                    @else
                                        {{ __("Free shipping") }}
                                    @endif
                                </span>
                            @endif
                        </div>
                    </div>
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
                            <label for="quantity" class="text-gray-800 text-sm block mb-2">{{ __("Quantity") }}</label>
                            <div class="flex items-center space-x-2">
                                <!-- Select quantity -->
                                <div class="flex items-center rounded">
                                    <!-- Decrement Quantity -->
                                    <button @class([
                                        'bg-blue-100 p-2 rounded',
                                        'opacity-50' => $quantity <= 1,
                                        'hover:bg-blue-200 cursor-pointer active:bg-blue-300' => $quantity > 1,
                                    ]) wire:click="decrementQuantity"
                                        wire:loading.attr="disabled" @disabled($quantity <= 1)>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-minus">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l14 0" />
                                        </svg>
                                    </button>
                                    <!-- Show quantity -->
                                    <span class="text-gray-800 text-lg font-semibold w-8 text-center">
                                        {{ $quantity }}
                                    </span>
                                    <!-- Increment Quantity -->
                                    <button @class([
                                        'bg-blue-100 p-2 rounded ',
                                        'opacity-50' => $quantity == $stock ? true : false,
                                        'hover:bg-blue-200 cursor-pointer active:bg-blue-300' =>
                                            $quantity != $stock ? true : false,
                                    ]) wire:click="incrementQuantity"
                                        wire:loading.attr="disabled" @disabled($quantity == $stock ? true : false)>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 5l0 14" />
                                            <path d="M5 12l14 0" />
                                        </svg>
                                    </button>
                                </div>
                                <!-- Stock -->
                                <div class="text-gray-800 text-sm border border-blue-300 p-2 px-4 rounded">
                                    {{ __("Available") }}: <b>{{ $stock > 10 ? '+10' : $stock }}</b>
                                </div>
                            </div>
                        @else
                            <span class="text-green-600 font-bold text-sm">{{ __("Notify me when available") }}</span>
                        @endif
                        <br>
                    </div>
                    <!-- Buttons -->
                    <div class="flex flex-col space-y-2">
                        <!-- auth -->
                        @auth

                            @if ($stock > 0)
                                <!-- Add to cart -->
                                <button @class([
                                    'bg-yellow-400 w-full font-bold text-gray-900 text-lg p-3 px-4 rounded-full',
                                    'cursor-pointer hover:bg-yellow-500 transition duration-300 ease-in-out',
                                ]) wire:loading.attr="disabled"
                                    wire:loading.class="opacity-50" wire:click="addToCart">
                                    <span wire:loading wire:target="addToCart">
                                        {{ __("Loading") }}...
                                    </span>
                                    <span wire:target="addToCart" wire:loading.remove>
                                        {{ __("Add to Cart") }}
                                    </span>
                                </button>
                            @else
                                <!-- Notify me -->
                                <button
                                    class="bg-blue-600 w-full font-bold text-blue-100 text-md p-2 px-4 rounded cursor-pointer hover:bg-blue-700 transition duration-300 ease-in-out"
                                    wire:loading.attr="disabled" wire:click="notifyMe">
                                    {{ __("Notify me when available") }}
                                </button>
                            @endif
                            <!-- Favorite -->
                            @if ($favoriteAdded)
                                <button wire:click="removeItemFromFavoriteModal" @class([
                                    'bg-blue-100 text-blue-800 flex justify-center space-x-2 text-lg p-3 px-4 cursor-pointer hover:bg-blue-200 transition-all',
                                    'duration-300 ease-in-out rounded-full',
                                ])>
                                    <span class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 24 24" fill="currentColor"
                                            class="icon icon-tabler text-red-600 icons-tabler-filled icon-tabler-heart">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M6.979 3.074a6 6 0 0 1 4.988 1.425l.037 .033l.034 -.03a6 6 0 0 1 4.733 -1.44l.246 .036a6 6 0 0 1 3.364 10.008l-.18 .185l-.048 .041l-7.45 7.379a1 1 0 0 1 -1.313 .082l-.094 -.082l-7.493 -7.422a6 6 0 0 1 3.176 -10.215z" />
                                        </svg>
                                    </span>
                                    <span class="font-semibold">
                                        {{ __("Added to Favorite") }}
                                    </span>
                                </button>
                            @else
                                <button wire:click="addItemToFavoriteModal" @class([
                                    'bg-blue-100 text-blue-800 flex justify-center space-x-2 item-center text-lg p-3 px-4 cursor-pointer hover:bg-blue-200 transition-all',
                                    'duration-300 ease-in-out rounded-full',
                                ])>
                                    <span class="flex items-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                        </svg>
                                    </span>
                                    <span class="font-semibold">
                                        {{ __("Add to Favorite") }}
                                    </span>
                                </button>
                            @endif
                        @endauth
                        <!-- guest -->
                        @guest
                            <!-- Favorite -->
                            <a href="{{ route('login') }}"
                                class=" bg-blue-100 text-blue-500 text-sm p-2 px-4 cursor-pointer hover:bg-blue-200 transition-all duration-300 ease-in-out rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                </svg>
                            </a>
                            <!-- Login -->
                            <a href="{{ route('login') }}"
                                class="bg-blue-600 block text-center w-full font-bold text-blue-100 text-md p-2 px-4 rounded cursor-pointer hover:bg-blue-700 transition duration-300 ease-in-out">
                                @if ($stock > 0)
                                    {{ __("Add to Cart") }}
                                @else
                                    {{ __("Notify Me") }}
                                @endif
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
            <!-- Mobile Button - Desktop Left Side Button -->
            <div class="col-span-12 md:col-span-6 space-y-4">
                <!-- Description -->
                <div class="bg-gray-100 p-4 rounded-lg">
                    <header class="flex justify-between items-center">
                        <h2 class="text-lg font-bold">{{ __("Description") }}</h2>
                    </header>
                    <div x-data="{ moreDescription: false }" class="mt-2">
                        <p class="text-gray-700 transition-all cursor-pointer"
                            :class="{ 'line-clamp-3': !moreDescription }" x-html="@js($item->description)"
                            @click="moreDescription = !moreDescription" style="cursor: pointer;">
                        </p>

                        <button type="button" class="text-sm text-blue-600 mt-2 cursor-pointer font-semibold"
                            @click="moreDescription = !moreDescription">
                            <span x-text="moreDescription ? '{{ __("Show less") }}' : '{{ __("Show more") }}'"></span>
                        </button>
                    </div>
                </div>
                <!-- Shipping policy -->
                <div class="bg-gray-100 p-4 rounded-lg">
                    <header class="flex justify-between items-center">
                        <h2 class="text-lg font-bold">{{ __("Shipping policy") }}</h2>
                    </header>
                    <div x-data="{ data: false }" class="mt-2">
                        <p class="text-gray-700 transition-all cursor-pointer" :class="{ 'line-clamp-3': !data }"
                            x-html="@js($item->shipping_policy ?? ($item->seller->shipping_policy ?? '...'))" @click="data = !data" style="cursor: pointer;">
                        </p>

                        <button type="button" class="text-sm text-blue-600 mt-2 cursor-pointer font-semibold"
                            @click="data = !data">
                            <span x-text="data ? '{{ __("Show less") }}' : '{{ __("Show more") }}'"></span>
                        </button>
                    </div>
                </div>
                <!-- Return policy -->
                <div class="bg-gray-100 p-4 rounded-lg">
                    <header class="flex justify-between items-center">
                        <h2 class="text-lg font-bold">{{ __("Return policy") }}</h2>
                    </header>
                    <div x-data="{ data: false }" class="mt-2">
                        <p class="text-gray-700 transition-all cursor-pointer" :class="{ 'line-clamp-3': !data }"
                            x-html="@js($item->return_policy ?? ($item->seller->return_policy ?? '...'))" @click="data = !data" style="cursor: pointer;">
                        </p>

                        <button type="button" class="text-sm text-blue-600 mt-2 cursor-pointer font-semibold"
                            @click="data = !data">
                            <span x-text="data ? '{{ __("Show less") }}' : '{{ __("Show more") }}'"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
    <!-- New Arrivals -->
    <div class="">
        <header class="col-span-full flex justify-between items-center mb-4 px-1">
            <h2 class="text-lg font-semibold text-gray-900">
                {{ __('New Arrivals') }}
            </h2>
            <a href="#" class="text-blue-800 font-bold">{{ __('See all') }}</a>
        </header>
        <div class="flex flex-row space-x-4 mb-4 overflow-x-auto no-scrollbar pb-4">
            @foreach ($newArrivals as $item)
                <div class="flex-shrink-0 lg:flex-shrink-1 w-36 sm:w-40 md:w-44 lg:w-1/6">
                    <x-item href="{{ route('items.show', ['item' => $item->id]) }}" :item="$item" wire:navigate />
                </div>
            @endforeach
        </div>
    </div>
    <!-- Add item to favorites modal -->
    <x-modal name="add-item-favorite-modal" title="Add to favorites" size="sm">
        <form wire:submit.prevent="addItemToFavorites">
            <div class="space-y-4">
                <x-label for="favorite" value="Select a favorite" />
                @if ($favorites)
                    <x-select class="w-full" wire:model.live="favorite_id" id="favorite">
                        @foreach ($favorites as $favorite)
                            <option value="{{ $favorite->id }}">{{ $favorite->name }}</option>
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

    <!-- Remove item from favorites modal -->
    <x-modal name="remove-item-favorite-modal" title="Remove from favorites" size="sm">
        <div class="space-y-4">
            <p>Are you sure you want to remove this item from your favorites?</p>
            <div class="flex justify-start space-x-2">
                <x-button wire:click="removeItemFromFavorites" class="grow" variant="danger"
                    wire:loading.attr="disabled">
                    Remove from Favorites
                </x-button>
                <x-button wire:click="$dispatch('close-modal', 'remove-item-favorite-modal')" class="grow"
                    variant="secondary" wire:loading.attr="disabled">
                    Cancel
                </x-button>
            </div>
        </div>
    </x-modal>
</div>
