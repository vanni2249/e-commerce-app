<div class="space-y-4">
    <header class="px-1">
        <div class="flex justify-between items-center">
            <h2 class="text-md font-bold">{{ $item->number }}</h2>
            <div class="flex gap-2">
                <x-icon-link href="{{ route('sellers.items.edit', ['item' => $item]) }}" variant="outline-light"
                    icon="pencil" wire:navigate />
            </div>
        </div>
    </header>
    <menu class="flex space-x-4 px-1 overflow-x-auto no-scrollbar min-w-0">
        <div class="flex space-x-2 min-w-max">
            @foreach ($menuCollections as $item)
                <li class="flex-shrink-0">
                    <button wire:click="setCollection('{{ $item['slug'] }}')" @class([
                        'block border-b-3 text-xs text-gray-800 font-bold uppercase whitespace-nowrap px-1 cursor-pointer',
                        'hover:border-blue-600' => $collection != $item['slug'],
                        'active:border-blue-600',
                        'border-blue-600' => $collection == $item['slug'],
                        'border-transparent' => $collection != $item['slug'],
                    ])>
                        {{ $item['name'] }}
                    </button>
                </li>
            @endforeach
        </div>
    </menu>
    <x-card></x-card>
</div>
