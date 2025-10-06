<ul class="space-y-4 text-gray-700 text-sm">
    <li>
        <button wire:click="setLastMonth" @class([
            'cursor-pointer hover:underline',
            'font-bold' => $filter == '',
        ])>
            Last Month
        </button>
    </li>
    <li>
        <button wire:click="setLastThreeMonths" @class([
            'cursor-pointer hover:underline',
            'font-bold' => $filter == 'last-three-months',
        ])>Last 3 Months</button>
    </li>
    <li>
        <button wire:click="setLastSixMonths" @class([
            'cursor-pointer hover:underline',
            'font-bold' => $filter == 'last-six-months',
        ])>Last 6 Months</button>
    </li>
    @forelse ($years as $year)
        <li>
            <button wire:click="setYear({{ $year }})" @class([
                'cursor-pointer hover:underline',
                'font-bold' => $filter == $year,
            ])>
                {{ $year }}
            </button>
        </li>

    @empty
    @endforelse
</ul>
