<ul class="space-y-3 text-gray-700 text-sm">
    <li>
        <button wire:click="setLastMonth" @class([
            'cursor-pointer hover:underline',
            'font-bold' => $selected == 'last_month',
        ])>
            Last Month
        </button>
    </li>
    <li>
        <button wire:click="setLastThreeMonths" @class([
            'cursor-pointer hover:underline',
            'font-bold' => ($selected == 'last_three_months'),
        ])>Last 3 Months</button>
    </li>
    <li>
        <button wire:click="setLastSixMonths" @class(['cursor-pointer hover:underline', 'font-bold' => ($selected == 'last_six_months')])>Last 6 Months</button>
    </li>
    @forelse ($years as $year)
        <li>
            <button wire:click="setYear({{ $year }})" @class(['cursor-pointer hover:underline'])>
                {{ $year }}
            </button>
        </li>

    @empty
    @endforelse
</ul>
