<x-layouts.customer>
    <div class="grid grid-cols-12 gap-4">
        <!-- List Items -->
        <div class="col-span-12 md:col-span-8 order-last md:order-first">
            @livewire('users.checkout.list-items')
            
        </div>
        <!-- Order Summary -->
        <div class="col-span-12 md:col-span-4 space-y-4">
            @livewire('users.checkout.make-payment')
            
        </div>
    </div>
</x-layouts.customer>