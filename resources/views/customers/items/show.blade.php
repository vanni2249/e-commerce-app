<x-layouts.customer>
    <div class="grid grid-cols-12 gap-2 md:gap-4">
        <x-card class="col-span-12">
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
                            <ul class="flex flex-row pr-2 lg:flex-col space-x-1 lg:space-x-0 lg:space-y-1 overflow-x-auto lg:overflow-y-auto no-scrollbar ">
                                @for ($i = 0; $i < 6; $i++)
                                    <li class="flex-shrink-0">
                                        <img src="{{ asset('images/'.rand(1,4).'-512.png') }}" class="rounded-xl w-12 lg:w-24" alt="">
                                    </li>
                                @endfor 
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Right Side -->
                <div class="col-span-12 md:col-span-6 lg:col-span-6 space-y-4 md:space-y-6 lg:space-y-8">
                    <!-- Title -->
                    <div>
                        <h2 class="text-2xl font-semibold">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum, eum. Corporis, inventore.
                        </h2>
                        <!-- Rating -->
                        <div class="flex items-center space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon text-amber-400 icon-tabler icons-tabler-outline icon-tabler-star">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 17.75l-5.5 3.25l1.05 -6.1l-4.45 -4.35l6.15 -.9l2.8 -5.65l2.8 5.65l6.15 .9l-4.45 4.35l1.05 6.1z" />
                            </svg>
                            <span class="text-gray-600 text-sm">4.5 (120 reviews)</span>
                        </div>
                    </div>
                    <!-- Price -->
                    <div class="">
                        <div>
                            <span class="text-blue-500 text-4xl font-semibold">$19.99</span>
                            <span class="text-gray-500 line-through ml-2">$29.99</span>
                        </div>
                        <div>
                            <span class="text-gray-500 text-sm">+ $1.99 shipping</span>
                        </div>
                    </div>
                    <!-- Description -->
                    <p class="text-gray-600 text-sm">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad accusantium doloribus at
                        consequatur necessitatibus sapiente saepe deserunt? Quae veniam ab nihil mollitia architecto
                        recusandae.
                    </p>
                    <!-- Variants -->
                    <div class="">
                        <label for="color-{{ $i }}" class="text-gray-600 text-xs">Color:</label>
                        <div>
                            <ul class="flex flex-wrap space-x-2">
                                <li class="bg-blue-50 rounded px-2">
                                    <input type="radio" name="color" id="color-{{ $i }}" value="red"
                                        class="hidden peer">
                                    <label for="color-{{ $i }}" class="text-gray-600 text-sm">Red</label>
                                </li>
                                <li class="bg-blue-50 rounded px-2">
                                    <input type="radio" name="color" id="color-{{ $i }}" value="blue"
                                        class="hidden peer">
                                    <label for="color-{{ $i }}" class="text-gray-600 text-sm">Blue</label>
                                </li>
                                <li class="bg-blue-50 rounded px-2">
                                    <input type="radio" name="color" id="color-{{ $i }}" value="green"
                                        class="hidden peer">
                                    <label for="color-{{ $i }}" class="text-gray-600 text-sm">Green</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Quantity Selector -->
                    <select name="quantity" id="quantity-{{ $i }}"
                        class="bg-blue-100 rounded text-gray-600 px-4 py-2 text-xs">
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    <!-- Buttons -->
                    <div class="flex items-center space-x-2">
                        <button class=" bg-blue-50 text-blue-500 text-sm p-2 px-4 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                            </svg>
                        </button>
                        <button class="grow bg-blue-500 text-blue-100 text-md p-2 px-4 rounded">Add to Cart</button>
                    </div>
                </div>
            </div>
        </x-card>
        @for ($i = 0; $i < 12; $i++)
            <x-item href="{{ route('items.show', ['item' => $i]) }}" />
        @endfor
    </div>
</x-layouts.customer>