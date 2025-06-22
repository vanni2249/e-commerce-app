@props(['color' => 'bg-white', 'title' => '', 'subtitle' => '', 'value' => '', 'border' => 'border-gray-300', 'icon' =>
'circle', 'lineColor' => 'gray'])
<div {{ $attributes->merge(['class' => $color . ' ' . $border . ' p-2 md:p-4 rounded border-l-2 border-'.$lineColor.'-300 flex items-center
    justify-between']) }}>
    <div>
        <header class="flex justify-between items-center">
            <h2 class="text-xs text-gray-600 leading-3 font-bold uppercase">
                {{ $title }}
            </h2>
            <div>
                {{ $subtitle }}
            </div>
        </header>
        <div class="text-xl text-gray-800 font-bold mt-2">{{ $value }}</div>
    </div>

    <div>
        <img src="{{ asset('icons/'.$icon.'.svg') }}" class="w-8" alt="">
    </div>
</div>