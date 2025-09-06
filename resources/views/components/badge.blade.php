@props(['color' => 'primary','label' => null, 'value' => null])

{{-- Badge component for displaying colored labels with optional text and value --}}

{{-- Define a mapping of color names to Tailwind CSS classes --}}

@php
    $colors = [
        'primary' => 'bg-indigo-300 text-white',
        'primary-outline' => 'bg-white text-indigo-600 border border-indigo-600',
        'secondary' => 'bg-gray-300 text-gray-700',
        'secondary-outline' => 'bg-white text-gray-700 border border-gray-300',
        'danger' => 'bg-red-200 text-red-500',
        'danger-outline' => 'bg-white text-red-500 border border-red-500',
        'success' => 'bg-green-300 text-green-800',
        'success-outline' => 'bg-white text-green-800 border border-green-800',
        'info' => 'bg-blue-300 text-blue-600',
        'info-outline' => 'bg-white text-blue-600 border border-blue-600',
        'warning' => 'bg-yellow-300 text-gray-600',
        'warning-outline' => 'bg-white text-yellow-600 border border-yellow-600',
    ];
@endphp

<span {{ $attributes->merge(['class' => "px-3 py-0.5 rounded-full text-xs font-semibold " . ($colors[$color] ?? $colors['primary'])]) }}>
    {{ $slot }}
    {{ $label ?? '' }}
    {{ $value ?? '' }}
</span>