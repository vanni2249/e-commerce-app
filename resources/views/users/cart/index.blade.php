<x-layouts.customer>
    <div class="grid grid-cols-12 gap-4">
        <!-- Cart Items -->
        <div class="col-span-12 md:col-span-8">
            @livewire('users.carts.list-items')

        </div>
        <!-- Order Summary -->
        <div class="col-span-12 md:col-span-4">
            <x-card>
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Order Summary</h2>
                </header>
                <ul class="text-sm text-gray-600">
                    <li class="flex justify-between items-center py-1">
                        <span>Items in Cart</span>
                        <span class="font-bold">2</span>
                    </li>
                    <li class="flex justify-between items-center py-1">
                        <span>Subtotal</span>
                        <span>$49.98</span>
                    </li>
                    <li class="flex justify-between items-center py-1">
                        <span>Tax</span>
                        <span>$0.00</span>
                    </li>
                    <li class="flex justify-between items-center py-1">
                        <span>Total</span>
                        <span class="font-bold">$49.98</span>
                    </li>
                    <li class="flex justify-between items-center py-1">
                        <span>Discount</span>
                        <span class="text-red-600">-$5.00</span>
                    </li>
                    <li class="flex justify-between items-center py-1">
                        <span>Shipping</span>
                        <span class="text-green-600">Free</span>
                    </li>
                    <li class="flex justify-between items-center py-1 border-t border-gray-200 font-bold">
                        <span>Grand Total</span>
                        <span>$49.98</span>
                    </li>
                </ul>
                <footer>
                    <a href="{{ route('checkout') }}"
                        class="w-full block text-center bg-blue-500 text-white text-lg py-2 rounded mt-4 hover:bg-blue-600 transition-colors duration-200">
                        Proceed to Checkout
                    </a>
                </footer>
            </x-card>
        </div>
    </div>
</x-layouts.customer>