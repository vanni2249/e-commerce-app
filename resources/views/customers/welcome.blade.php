<x-layouts.customer>
    @php
    $items = [
    ['name' => 'Electronics', 'link' => '#'],
    ['name' => 'Fashion', 'link' => '#'],
    ['name' => 'Home & Garden', 'link' => '#'],
    ['name' => 'Sports', 'link' => '#'],
    ['name' => 'Toys', 'link' => '#'],
    ['name' => 'Books', 'link' => '#'],
    ['name' => 'Health & Beauty', 'link' => '#'],
    ['name' => 'Automotive', 'link' => '#'],
    ['name' => 'Grocery', 'link' => '#'],
    ['name' => 'Pet Supplies', 'link' => '#'],
    ['name' => 'Music', 'link' => '#'],
    ['name' => 'Movies & TV', 'link' => '#'],
    ['name' => 'Video Games', 'link' => '#'],
    ['name' => 'Tools & Home Improvement', 'link' => '#'],
    ['name' => 'Baby Products', 'link' => '#'],
    ['name' => 'Office Supplies', 'link' => '#'],
    ];
    @endphp
    <!-- Menu -->
    <div class="flex items-center space-x-2">
        <button class="bg-blue-100 hidden lg:block hover:bg-blue-200 text-blue-500 flex-auto p-2 rounded-full text-sm mr-2 whitespace-nowrap">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                <path fill-rule="evenodd"
                    d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <ul class="flex flex-row justify-evenly flex-nowrap overflow-x-auto no-scrollbar">
            @foreach ($items as $item)
            <li class="py-2">
                <a href="{{ $item['link'] }}"
                    class="bg-blue-100 hover:bg-blue-200 text-blue-500 flex-auto px-4 py-2 rounded-lg text-sm mr-2 whitespace-nowrap">{{
                    $item['name'] }}
                </a>
            </li>
            @endforeach
        </ul>
        <button class="bg-blue-100 hidden lg:block hover:bg-blue-200 text-blue-500 flex-auto p-2 rounded-full text-sm whitespace-nowrap">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                <path fill-rule="evenodd"
                    d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd" />
            </svg>
        </button>

    </div>

    <!-- Hero Section -->
    <div class="p-4 md:p-8 lg:p-12 bg-blue-500 rounded-xl">
        <p class="text-sm md:text-base text-gray-100"><span class="font-bold text-base md:text-lg lg:text-xl ">
                Get 50% discounts off your first order</span> <br> <span class="text-gray-300"> off your first order </span>
        </p>
        <button class="mt-4 bg-gray-100 text-blue-500 text-sm p-1 px-4 rounded">Get Started</button>
    </div>
    <!-- More product -->
    <div class="grid grid-cols-12 gap-2 md:gap-4">
        @for ($i = 0; $i< 12; $i++) 
            <x-item href="{{ route('items.show', ['item' => $i]) }}" />
        @endfor
    </div>
</x-layouts.customer>