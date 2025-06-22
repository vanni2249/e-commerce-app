@props(['color' => 'gray','label' => null, 'value' => null])

{{-- Badge component for displaying colored labels with optional text and value --}}

{{-- Define a mapping of color names to Tailwind CSS classes --}}

@php
    $colors = [
        'gray' => 'bg-gray-300 text-gray-700',
        'red' => 'bg-red-200 text-red-500',
        'green' => 'bg-green-300 text-green-800',
        'blue' => 'bg-blue-300 text-blue-600',
        'yellow' => 'bg-yellow-300 text-gray-600',
    ];
@endphp

<span {{ $attributes->merge(['class' => "px-3 py-0.5 rounded-full text-xs font-semibold " . ($colors[$color] ?? $colors['gray'])]) }}>
    {{ $slot }}
    {{ $label ?? '' }}
    {{ $value ?? '' }}
</span>