@props([
    'bg' => 'bg-white',
    'title' => '',
    'right' => '',
    'value' => '',
    'border' => 'border-gray-300',
    'icon' => 'circle',
    'lineColor' => 'gray',
    'footer' => '',
])

@php
    $classes = $bg . ' p-4 rounded-xl border-l-2 border-' . $lineColor . '-300 ' . $attributes->get('class', '');
@endphp
<div {{ $attributes->merge(['class' => $classes]) }}>
    <header class="flex justify-between items-center">
        <h2 class="text-sm text-gray-950 leading-3 font-bold">
            {{ $title }}
        </h2>
        <div class="">
            {{ $right?? ' ' }}
        </div>
    </header>
    <div class="text-xl text-gray-950 font-bold mt-2">{{ $value }}</div>
    <footer class="">
       {{ $footer ?? '' }}
    </footer>
</div>
