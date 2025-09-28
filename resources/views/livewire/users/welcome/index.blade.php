<div class="space-y-4">
    <!-- Top Nav Menu -->
    {{-- <div class="flex items-center space-x-2">
        <button
            class="bg-white hidden lg:block hover:bg-blue-100 text-blue-500 flex-auto p-2 rounded-full text-sm mr-2 whitespace-nowrap">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                <path fill-rule="evenodd"
                    d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <ul class="flex flex-row justify-evenly flex-nowrap overflow-x-auto no-scrollbar">
            @foreach ($categories as $category)
                <li class="py-2">
                    <a href="#"
                        class="bg-white hover:bg-blue-100 text-blue-800 flex-auto px-4 py-2 rounded-lg text-sm mr-2 whitespace-nowrap">
                        {{ $category->en_name }}
                    </a>
                </li>
            @endforeach
        </ul>
        <button
            class="bg-white hidden lg:block hover:bg-blue-100 text-blue-500 flex-auto p-2 rounded-full text-sm whitespace-nowrap">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                <path fill-rule="evenodd"
                    d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd" />
            </svg>
        </button>

    </div> --}}

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

    <!-- Items -->
    <div class="">
        <header class="col-span-full mt-8">
            <h2 class="text-xl font-semibold text-gray-900">
                New Arrivals
            </h2>
        </header>
        <div class="flex flex-row space-x-4 mb-4 overflow-x-auto no-scrollbar py-4">
            @foreach ($items as $item)
                @for ($i = 0; $i < 2; $i++)
                    <div class="flex-shrink-0 lg:flex-shrink-1 w-36 sm:w-40 md:w-44 lg:w-1/6">
                        <x-item href="{{ route('items.show', ['item' => $item->id]) }}" :item="$item"
                            wire:navigate />
                    </div>
                @endfor
            @endforeach
        </div>
    </div>
</div>
