<div class=" space-y-4">
    <!-- Shipping Address -->
    <x-card>
        <header class="mb-4 flex items-center justify-between">
            <h2 class="text-lg font-semibold">Shipping address</h2>
            <a href="#" class="text-blue-500 text-sm hover:underline">Change</a>
        </header>
        <x-address />
    </x-card>
    <!-- Checkout Summary -->
    <x-card>
        <header class="mb-4">
            <h2 class="text-lg font-semibold">Checkout summary</h2>
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
            <button wire:click="makePayment"
                class="w-full block text-center bg-blue-500 text-white text-lg py-2 rounded mt-4 hover:bg-blue-600 transition-colors duration-200 cursor-pointer">
                Make Payment
            </button>
        </footer>
    </x-card>
</div>
