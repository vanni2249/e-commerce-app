@props([
    'name' => '...',
    'type' => '',
    'line1' => '...',
    'line2' => '...',
    'city' => '...',
    'state' => '...',
    'code' => '...',
    'phone' => '...',
    'is_approved' => '',
])
<header class="flex justify-between items-center">
    <ul class="text-gray-600">
        <li class="flex flex-col py-1">
            <span class="text-sm font-bold">Name</span>
            <span class=" text-gray-500 text-sm">{{ $name }}</span>
        </li>

    </ul>
    @if ($is_approved)
        @if ($is_approved)
            <x-badge color="success" class="uppercase" value="{{ $type ?? '' }}" />
        @else
            <x-badge color="danger" class="uppercase" value="Not Approved" />
        @endif
    @endif
</header>
<ul class="text-gray-600">
    <li class="flex flex-col py-2">
        <span class="text-sm font-bold">Address</span>
        <span class=" text-gray-500 text-sm">
            {{ $line1 }}
            <br>
            {{ $line2 }}
            <br>
            {{ $city }} <span class="uppercase">{{ $state }}</span>, {{ $code }}
        </span>
    </li>
    <li class="flex flex-col py-1">
        <span class="text-sm font-bold">Phone</span>
        <span class="text-gray-500 text-sm">{{ $phone }}</span>
    </li>
</ul>
