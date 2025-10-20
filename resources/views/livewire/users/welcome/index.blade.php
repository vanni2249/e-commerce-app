<div class="space-y-4">
    {{ $sessionId }}
    <!-- Hero Section -->
    <div class="p-8 md:p-12 lg:p-12 bg-blue-800 rounded-xl">
        <p class="text-sm md:text-base text-gray-100">
            <span class="font-bold text-base md:text-lg lg:text-xl">
                FREE Shipping On Orders Over $50
            </span>
            <br>
            <span class="text-gray-300">
                Shop now and enjoy exclusive deals on our new arrivals.
            </span>
        </p>
        <button class="mt-4 bg-gray-100 text-blue-800 text-sm p-1 px-4 rounded">Get Started</button>
    </div>

    <!-- Users -->
    @guest
        <div>
            <header class="col-span-full flex justify-start items-center mb-4 px-1">
                <h2 class="text-xl font-semibold text-gray-900">
                    {{__("Choose your user account")}}
                </h2>
            </header>

            <div class="flex flex-row space-x-4 mb-4 overflow-x-auto no-scrollbar">
                <a href="{{ route('register') }}"
                    class="flex-shrink-0 bg-blue-100 lg:flex-shrink-1 h-32 w-4/5 md:w-2/5 lg:w-1/2 rounded-xl p-4 hover:bg-blue-200 transition"
                    wire:navigate>
                    <header class="flex items-center">
                        <div class="bg-blue-800 text-white p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                            </svg>
                        </div>
                        <div class="grow ml-4">
                            <h2 class="font-bold">{{__("Customers")}}</h2>
                            <p></p>
                        </div>

                    </header>
                    <p class="mt-2 text-sm text-gray-700">
                        All you need to do is add products to your cart and proceed to checkout.
                    </p>
                </a>
                <a href="{{ route('register.business') }}"
                    class="flex-shrink-0 bg-blue-100 lg:flex-shrink-1 h-32 w-4/5 md:w-2/5 lg:w-1/2 rounded-xl p-4 hover:bg-blue-200 transition"
                    wire:navigate>
                    <header class="flex items-center">
                        <div class="bg-blue-800 text-white p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-building-store">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 21l18 0" />
                                <path
                                    d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                                <path d="M5 21l0 -10.15" />
                                <path d="M19 21l0 -10.15" />
                                <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                            </svg>
                        </div>
                        <div class="grow ml-4">
                            <h2 class="font-bold">{{__("Business")}}</h2>
                            <p></p>
                        </div>

                    </header>
                    <p class="mt-2 text-sm text-gray-700">
                        Are you a business owner? Create an account to manage your products and orders.
                    </p>
                </a>
                <a href="#"
                    class="flex-shrink-0 bg-blue-100 lg:flex-shrink-1 h-32 w-4/5 md:w-2/5 lg:w-1/2 rounded-xl p-4 hover:bg-blue-200 transition">
                    <header class="flex items-center">
                        <div class="bg-blue-800 text-white p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-building-warehouse">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 21v-13l9 -4l9 4v13" />
                                <path d="M13 13h4v8h-10v-6h6" />
                                <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3" />
                            </svg>
                        </div>
                        <div class="grow ml-4">
                            <h2 class="font-bold">Sellers</h2>
                            <p></p>
                        </div>

                    </header>
                    <p class="mt-2 text-sm text-gray-700">
                        Join our seller community and reach a wider audience for your products.
                    </p>
                </a>
            </div>
        </div>
    @endguest

    <!-- Promotions -->
    {{-- <div class="flex flex-row space-x-4 mb-4 overflow-x-auto no-scrollbar">
        @for ($i = 0; $i < 5; $i++)
            <div class="flex-shrink-0 bg-white xl:flex-shrink-1 w-4/5 md:w-2/5 lg:w-1/2 rounded-xl">
                <div class="grid grid-cols-1 gap-2 md:gap-4">
                    <div class=" bg-blue-100 h-[384px] rounded-lg relative">
                    </div>
                </div>
            </div>
        @endfor

    </div> --}}
    
    <!-- New Arrivals -->
    <div class="">
        <header class="col-span-full flex justify-between items-center mb-4 px-1">
            <h2 class="text-xl font-semibold text-gray-900">
                {{__("New Arrivals")}}
            </h2>
            <a href="#" class="text-blue-800 font-bold">{{__("See all")}}</a>
        </header>
        <div class="flex flex-row space-x-4 mb-4 overflow-x-auto no-scrollbar pb-4">
            @foreach ($items as $item)
                <div class="flex-shrink-0 lg:flex-shrink-1 w-36 sm:w-40 md:w-44 lg:w-1/6">
                    <x-item href="{{ route('items.show', ['item' => $item->id]) }}" :item="$item" wire:navigate />
                </div>
            @endforeach
        </div>
    </div>

    <!-- Suppliers' Picks -->
    <div>
        <header class="col-span-full flex justify-between items-center mb-4 px-1">
            <h2 class="text-xl font-semibold text-gray-900">
                {{__("Suppliers")}}
            </h2>
            <a href="#" class="text-blue-800 font-bold ml-4">{{__("See all")}}</a>
        </header>

        <div class="flex flex-row space-x-4 pb-4 overflow-x-auto no-scrollbar">
            @for ($i = 0; $i < 5; $i++)
                <a href="#" class="flex-shrink-0 space-y-4 bg-white lg:flex-shrink-1 w-4/5 md:w-2/5 lg:w-1/2 rounded-xl hover:shadow p-4">
                    <header class="flex justify-between items-center">
                        <h2 class="font-bold text-lg text-gray-800">
                            {{__("Suppliers")}}
                        </h2>
                        {{-- <a href="#" class="text-blue-800 text-sm font-bold ml-4">Details</a> --}}
                    </header>
                    <p class="text-sm lg:text-sm line-clamp-2 text-gray-600">
                        Lorem ipsum dolor sit amet ison, consectetur adipiscing elit.
                    </p>
                    <div class="grid grid-cols-2 gap-2">
                        @for ($x = 0; $x < 4; $x++)
                            <div class=" bg-blue-100 rounded-lg">
                                <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                                    class="w-full h-full rounded-lg" alt="">
                            </div>
                        @endfor
                    </div>
                    {{-- <footer class="mt-4">
                        <button class="w-full bg-blue-800 text-white text-sm p-2 rounded hover:bg-blue-900 transition">
                            Shop Now
                        </button>
                    </footer> --}}
                </a>
            @endfor

        </div>
    </div>

    <!-- Histories -->
    <div class="">
        <header class="col-span-full flex justify-between items-center mb-4 px-1">
            <h2 class="text-xl font-semibold text-gray-900">
                {{__("Histories")}}
            </h2>
            <a href="#" class="text-blue-800 font-bold">{{__("See all")}}</a>
        </header>
        <div class="flex flex-row space-x-4 mb-4 overflow-x-auto no-scrollbar pb-4">
            @foreach ($items as $item)
                <div class="flex-shrink-0 lg:flex-shrink-1 w-36 sm:w-40 md:w-44 lg:w-1/6">
                    <x-item href="{{ route('items.show', ['item' => $item->id]) }}" :item="$item" wire:navigate />
                </div>
            @endforeach
        </div>
    </div>
</div>
