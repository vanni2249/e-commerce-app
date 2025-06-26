<x-layouts.customer>
    <!-- Menu -->
    @livewire('users.welcome.menu')

    <!-- Hero Section -->
    <div class="p-4 md:p-8 lg:p-12 bg-blue-600 rounded-xl">
        <p class="text-sm md:text-base text-gray-100">
            <span class="font-bold text-base md:text-lg lg:text-xl">
                FREE Shipping On Orders Over $50
            </span>
            <br>
            <span class="text-gray-300">
                Shop now and enjoy exclusive deals on our new arrivals.
            </span>
        </p>
        <button class="mt-4 bg-gray-100 text-blue-500 text-sm p-1 px-4 rounded">Get Started</button>
    </div>

    <!-- New items -->
    @livewire('users.welcome.new-items')
    
</x-layouts.customer>