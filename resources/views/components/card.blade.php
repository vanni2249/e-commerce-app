<div {{ $attributes->class([' p-4 rounded-xl', 'bg-white' => !$attributes->has('class')]) }}>
    {{ $slot }}
</div>
