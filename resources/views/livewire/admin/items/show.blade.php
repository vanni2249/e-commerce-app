<div class="space-y-4">
    <header class="px-1">
        <div class="flex justify-between items-center">
            <h2 class="text-md font-bold">{{ $item->number }}</h2>
            <div class="flex gap-2">
                <x-icon-link href="{{ route('admin.items.edit', ['item' => $item]) }}" variant="outline-info"
                    icon="pencil" wire:navigate />
            </div>
        </div>
    </header>
    <menu class="flex space-x-4 px-1 overflow-x-auto no-scrollbar min-w-0">
        <div class="flex space-x-2 min-w-max">
            @foreach ($menuCollections as $item)
                <li class="flex-shrink-0">
                    {{-- <a href="{{ $item['url'] }}" @class([
                        'block border-b-3 text-xs text-gray-800 font-bold uppercase whitespace-nowrap px-1',
                        'hover:border-blue-600' => $segments[5] != $item['slug'],
                        'active:border-blue-600',
                        'border-blue-600' => $segments[5] == $item['slug'],
                        'border-transparent' => $segments[5] != $item['slug'],
                    ]) wire:navigate>
                        {{ $item['name'] }}
                    </a> --}}
                    <button wire:click="setCollection('{{ $item['slug'] }}')" @class([
                        'block border-b-3 text-xs text-gray-800 font-bold uppercase whitespace-nowrap px-1',
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
