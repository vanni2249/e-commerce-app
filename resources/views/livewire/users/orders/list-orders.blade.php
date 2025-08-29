<div class="space-y-2">
    @foreach ($orders as $order)
        <a href="{{ route('orders.show', $order) }}" class=" bg-blue-50 hover:bg-blue-100 block p-4 rounded-lg">
            <div class="flex space-x-4 items-start">
                {{-- <div class="bg-blue-200 flex flex-col justify-center items-center p-2 rounded">
                    <span class="text-xs font-bold text-gray-600">Items</span>
                    <span class="text-blue-800 font-bold">
                        {{ $order->sales->count() }}
                    </span>
                </div> --}}
                <ul class="grow">
                    <li class="text-sm">Order #{{ $order->id }}</li>
                    <li class="text-gray-600">Placed on January 1, 2023</li>
                    <li class="font-bold">${{ $order->sales->sum('price') }}</li>
                </ul>
                <div class="bg-blue-200 text-blue-800 px-3 py-1 rounded-full text-xs font-medium">
                    Shipped
                </div>
            </div>
        </a>
    @endforeach
</div>
