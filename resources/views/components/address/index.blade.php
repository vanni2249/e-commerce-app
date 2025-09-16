@props(['name' => '...', 'line1' => '...', 'line2' => '...', 'city' => '...', 'state' => '...', 'code' => '...', 'phone' => '...'])
<ul class="text-gray-600">
    <li class="flex flex-col py-1">
        <span class="text-sm font-bold">Name</span>
        <span class=" text-gray-500 text-sm">{{ $name }}</span>
    </li>
    <li class="flex flex-col py-2">
        <span class="text-sm font-bold">Address</span>
        <span class=" text-gray-500 text-sm">
            {{ $line1 }},
            <br>
            {{ $line2 }},
            <br>
            {{ $city }} {{ $state }}, {{ $code }}
        </span>
    </li>
    <li class="flex flex-col py-1">
        <span class="text-sm font-bold">Phone</span>
        <span class="text-gray-500 text-sm">{{ $phone }}</span>
    </li>
</ul>