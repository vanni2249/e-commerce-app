@props(['item' => null])
<a {{ $attributes->merge(['class' => ' block bg-white rounded-lg hover:shadow h-full']) }}>
    <div class=" bg-blue-100 rounded-t-lg">
        <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}" class="w-full h-full rounded-t-lg" alt="">
    </div>
    <div class="flex flex-col p-2 lg:p-2">
        <p class="text-sm font-semibold text-gray-800 line-clamp-1">
            {!! $item->en_title ?? '' !!}
        </p>
        <div class="flex justify-between items-center mt-2">
            <div>
                <span class="text-blue-800 font-semibold text-lg">$19.99</span>
                <span class="text-gray-500 line-through ml-2 text-sm">$29.99</span>
            </div>
        </div>
    </div>
</a>
