<div>
    <nav>
        <div class="p-4 bg-blue-800">
            <div class="max-w-7xl mx-auto grid grid-cols-2 gap-4">
                <div class="flex items-center">
                    <!-- Logo -->
                    <div class="flex items-center space-x-3">
                        <div class="md:hidden flex">
                            <x-dropdown align="left" width="48">
                                <x-slot name="trigger">
                                    <button class=" text-blue-100 cursor-pointer md:hidden">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-menu-2">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="4" y1="6" x2="20" y2="6" />
                                            <line x1="4" y1="12" x2="20" y2="12" />
                                            <line x1="4" y1="18" x2="20" y2="18" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="border-b border-gray-200 pb-2">
                                        <header class="p-2 border-b border-gray-200 mb-4">
                                            <p class="mt-1 px-2 text-sm text-gray-600">
                                                Welcome
                                            </p>
                                        </header>
                                        @guest
                                            <span class="flex space-x-1 px-4 mb-3">
                                                <a href="{{ route('register') }}"
                                                    class="font-bold hover:underline">Register</a>
                                                <span>
                                                    or
                                                </span>
                                                <a href="{{ route('login') }}" class="hover:underline">Login</a>
                                            </span>
                                        @endguest
                                        @auth
                                            <p class="px-4 mb-3 font-semibold">Hi, {{ Auth::user()->first_name }}</p>
                                            @foreach ($items as $item)
                                                <x-dropdown-link href="{{ $item['url'] }}" wire:navigate>
                                                    {{ $item['value'] }}
                                                </x-dropdown-link>
                                            @endforeach
                                        @endauth
                                    </div>
                                    <div class=" py-2">
                                        @foreach ($services as $service)
                                            <x-dropdown-link href="">
                                                {{ $service }}
                                            </x-dropdown-link>
                                        @endforeach
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </div>
                        <a href="/" class="text-blue-100 font-semibold text-2xl" wire:navigate>Zierra</a>
                    </div>
                    <!-- Search (Desktop) -->
                    <div class="hidden md:flex flex-grow">
                        <form wire:submit.prevent="send" class="w-full">
                            <div class="w-full flex relative">

                                <input type="text" wire:model='search' @class([
                                    'ml-4 w-full p-2 rounded-l-full border bg-white border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500',
                                    'border-red-400' => $errors->has('search'),
                                ])
                                    placeholder="Search..." />
                                <button type="submit"
                                    class="bg-white hover:bg-blue-100 cursor-pointer text-white p-1 rounded-r-full border border-l-0 border-slate-300 px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-800">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                </button>
                            </div>
                            <div @class([
                                'absolute bg-white p-4 font-bold rounded-xl w-full shadow',
                                'hidden' => $hiddenBoxMore,
                                'block' => $showBoxMore,
                            ])>ssss</div>
                        </form>
                    </div>
                </div>
                <!-- Button Mobile Search, Address & Cart -->
                <div class="flex justify-end items-center space-x-2">
                    <!-- Search -->
                    <button @click="$dispatch('open-modal', 'search-modal')"
                        class="bg-blue-900 text-blue-100 rounded-full p-1.5 cursor-pointer md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M21 21l-6 -6" />
                        </svg>
                    </button>
                    <!-- Address -->
                    <a href="{{ route('addresses') }}"
                        class="bg-blue-900 hover:bg-blue-950 text-blue-100 rounded-full p-1.5 cursor-pointer flex space-x-1 items-center"
                        wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-map-pin">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3 3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364 3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" />
                        </svg>
                        @auth
                            <span class="text-xs font-semibold hidden md:inline md:pr-2">
                                {{ $user->address->city->name ?? '' }}
                            </span>
                        @endauth
                    </a>
                    <!-- Cart -->
                    <div class="relative">
                        <a href="{{ route('cart') }}"
                            class="bg-blue-900 hover:bg-blue-950 block text-blue-100 rounded-full p-1.5 cursor-pointer"
                            wire:navigate>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor"
                                class="icon icon-tabler icons-tabler-filled icon-tabler-shopping-cart">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M6 2a1 1 0 0 1 .993 .883l.007 .117v1.068l13.071 .935a1 1 0 0 1 .929 1.024l-.01 .114l-1 7a1 1 0 0 1 -.877 .853l-.113 .006h-12v2h10a3 3 0 1 1 -2.995 3.176l-.005 -.176l.005 -.176c.017 -.288 .074 -.564 .166 -.824h-5.342a3 3 0 1 1 -5.824 1.176l-.005 -.176l.005 -.176a3.002 3.002 0 0 1 1.995 -2.654v-12.17h-1a1 1 0 0 1 -.993 -.883l-.007 -.117a1 1 0 0 1 .883 -.993l.117 -.007h2zm0 16a1 1 0 1 0 0 2a1 1 0 0 0 0 -2zm11 0a1 1 0 1 0 0 2a1 1 0 0 0 0 -2z" />
                            </svg>
                        </a>
                        @if ($count > 0)
                            <span
                                class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-semibold rounded-full p-2.5">
                                @if ($count > 9)
                                    <div class="relative">
                                        <span
                                            class="absolute top-0 left-0 transform -translate-x-1/2 -translate-y-1/2">
                                            9+
                                        </span>
                                    </div>
                                @else
                                    <div class="relative">
                                        <span
                                            class="absolute top-0 left-0 transform -translate-x-1/2 -translate-y-1/2">
                                            {{ $count }}
                                        </span>
                                    </div>
                                @endif

                            </span>
                        @endif
                    </div>
                    <!-- Search Modal -->
                    <x-modal name="search-modal" title="Search Products">
                        <form wire:submit.prevent="send" class="w-full">
                            <div class="w-full flex relative">

                                <input type="text" wire:model='search' @class([
                                    'w-full p-2 rounded-l-full border bg-white border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500',
                                    'border-red-400' => $errors->has('search'),
                                ])
                                    placeholder="Search..." />
                                <button type="submit"
                                    class="bg-white hover:bg-blue-100 cursor-pointer text-white p-1 rounded-r-full border border-l-0 border-slate-300 px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-800">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                </button>
                            </div>
                            <div @class([
                                'absolute bg-white p-4 font-bold rounded-xl w-full shadow',
                                'hidden' => $hiddenBoxMore,
                                'block' => $showBoxMore,
                            ])>ssss</div>
                        </form>
                    </x-modal>
                </div>
            </div>
        </div>
        <div class="hidden lg:block py-2 bg-blue-900">
            <div class="max-w-7xl mx-auto grid grid-cols-2 gap-4">
                <div class="flex space-x-1">
                    @foreach ($services as $service)
                        <a href=""
                            class="text-blue-100 font-bold hover:text-white cursor-pointer hover:bg-blue-800 px-2 rounded-full py-0.5">
                            {{ $service }}
                        </a>
                    @endforeach
                </div>
                <div class="flex justify-end text-white">
                    @auth
                        <x-dropdown>
                            <x-slot name="trigger">
                                <span class="font-semibold cursor-pointer hover:bg-blue-800 px-3 rounded-full py-0.5">
                                    Hi,
                                    {{ Auth::user()->first_name }}
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="{{ route('orders.index') }}" wire:navigate>Orders</x-dropdown-link>
                                <x-dropdown-link href="{{ route('favorites') }}" wire:navigate>Favorites
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('addresses') }}" wire:navigate>Addresses
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('profile') }}" wire:navigate>Profile</x-dropdown-link>
                                <x-dropdown-link href="{{ route('logout') }}" wire:navigate>Logout</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    @endauth
                    @guest
                        <span class="flex space-x-1 px-4">
                            <a href="{{ route('register') }}" class="font-bold hover:underline">Register</a>
                            <span>
                                or
                            </span>
                            <a href="{{ route('login') }}" class="hover:underline">Login</a>
                        </span>
                    @endguest
                    <a href="{{ route('favorites') }}" class="font-semibold hover:bg-blue-800 px-3 rounded-full">My
                        favorites</a>
                    <a href="" class="font-semibold hover:bg-blue-800 px-3 rounded-full">Help & FAQs</a>
                </div>
            </div>
        </div>
    </nav>
</div>
