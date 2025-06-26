<div>
    <x-card>
        <header class="mb-4">
            <h2 class="text-lg font-semibold">Shopping Cart</h2>
        </header>
        <div class="space-y-2">
            @forelse ($items ?? [] as $item)
            <div class="bg-gray-50 rounded-xl flex">
                <div class="p-2 md:p-0">
                    <img src="{{ asset('images/'.rand(1, 4).'-512.png') }}"
                        class="w-24 md:w-32 lg:w-40  rounded md:rounded-none md:rounded-l-xl" alt="">
                </div>
                <div class="grow p-2">
                    <header class="md:flex md:justify-between items-start mb-2">
                        <h2 class="text-gray-800 text-sm md:text-base lg:text-lg font-semibold">
                            Lorem ipsum dolor sit amet.
                        </h2>
                        <ul class="md:text-right">
                            <li class="text-blue-500 font-semibold text-sm md:text-base lg:text-lg">
                                $19.99
                            </li>
                            <li class="text-xs text-gray-500 whitespace-nowrap">
                                +$1.99 shipping
                            </li>
                        </ul>
                    </header>
                    <div class="flex">
                        <!-- Quantity Selector -->
                        <select name="quantity" id="quantity"
                            class="bg-blue-100 rounded text-gray-600 px-2 py-1 text-xs">
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <!-- Remove Button -->
                        <button
                            class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded ml-2 hover:bg-blue-300 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7l16 0" />
                                <path d="M10 11l0 6" />
                                <path d="M14 11l0 6" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class=" text-gray-500">
                Your cart is empty.
            </div>
            @endforelse
            @foreach ($items ?? [] as $item)

            @endforeach
            @if ($items)
            <button wire:click="remove"
                class="text-sm text-gray-400 cursor-pointer hover:text-gray-600 transition-colors duration-200">
                Remove All Items
            </button>
            @endif
        </div>
    </x-card>
</div>