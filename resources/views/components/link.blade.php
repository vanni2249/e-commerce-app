@props(['label' => null, 'value' => null])

{{-- Link component for displaying styled links with optional text and value --}}

{{-- Define a mapping of link colors to Tailwind CSS classes --}}
{{-- The classes are defined based on the color attribute passed to the component --}}
<a {{ $attributes->merge(['class' => 'text-blue-700 text-xs font-bold uppercase']) }}>
    {{ $slot }}
    {{ $label ?? '' }}
    {{ $value ?? '' }}
</a>