@props(['variant'=>'primary','title' => '', 'leftHeader' => false])

@php
    $baseClasses = 'p-4 rounded-md';
    $variantClasses = match($variant) {
        'primary' => 'bg-blue-100 border border-blue-400 text-blue-800',
        'success' => 'bg-green-100 border border-green-400 text-green-800',
        'warning' => 'bg-yellow-200 border border-yellow-400 text-yellow-700',
        'danger' => 'bg-red-100 border border-red-400 text-red-800',
        default => 'bg-gray-100 border border-gray-400 text-gray-800',
    };
    $classes = $baseClasses . ' ' . $variantClasses;
@endphp


<div {{ $attributes->merge(['class' => $classes]) }}>
    <header class="flex items-center justify-between">
        <h2 class="text-md font-bold text-black">{{ $title }}</h2>
        @if (!$leftHeader)
            <div class="ml-4">
                {{ $leftHeader }}
            </div>
        @endif
    </header>
    <div class="">
        {{ $slot }}
    </div>
</div>
