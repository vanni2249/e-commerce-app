<div class="space-y-4">
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
    <div>
        <header class="col-span-full flex justify-start items-center mb-4 px-1">
            <h2 class="text-xl font-semibold text-gray-900">
                Choose your user account
            </h2>
        </header>

        <div class="flex flex-row space-x-4 mb-4 overflow-x-auto no-scrollbar">
            @for ($i = 0; $i < 3; $i++)
                <div class="flex-shrink-0 bg-red-500 lg:flex-shrink-1 h-32 w-4/5 rounded-xl lg:w-1/3 p-4">
                </div>
            @endfor

        </div>
    </div>

    <!-- Items -->
    <div class="">
        <header class="col-span-full flex justify-between items-center mb-4 px-1">
            <h2 class="text-xl font-semibold text-gray-900">
                New Arrivals
            </h2>
            <a href="#" class="text-blue-800 font-bold">View all</a>
        </header>
        <div class="flex flex-row space-x-4 mb-4 overflow-x-auto no-scrollbar pb-4">
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

    <!-- Promoted -->
    <div>
        <header class="col-span-full flex justify-start items-center mb-4 px-1">
            <h2 class="text-xl font-semibold text-gray-900">
                Choose your user account
            </h2>
        </header>

        <div class="flex flex-row space-x-4 mb-4 overflow-x-auto no-scrollbar">
            @for ($i = 0; $i < 2; $i++)
                <div class="flex-shrink-0 bg-red-500 lg:flex-shrink-1 h-32 w-4/5 md:w-3/5 rounded-xl lg:w-1/2 p-4">
                </div>
            @endfor

        </div>
    </div>

    <!-- Histories -->
    <div class="">
        <header class="col-span-full flex justify-between items-center mb-4 px-1">
            <h2 class="text-xl font-semibold text-gray-900">
                Recently Viewed
            </h2>
            <a href="#" class="text-blue-800 font-bold">View all</a>
        </header>
        <div class="flex flex-row space-x-4 mb-4 overflow-x-auto no-scrollbar pb-4">
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
