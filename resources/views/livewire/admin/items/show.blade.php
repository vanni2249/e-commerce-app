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
            @foreach ($menuCollections as $itemCollection)
                <li class="flex-shrink-0">
                    <button wire:click="setCollection('{{ $itemCollection['collection'] }}')"
                        @class([
                            'block text-gray-600 py-1 px-4 rounded-full text-xs font-bold whitespace-nowrap cursor-pointer',
                            'bg-white hover:bg-blue-600 hover:text-white' =>
                                $collection != $itemCollection['collection'],
                            'bg-blue-600 text-white' => $collection == $itemCollection['collection'],
                        ])>
                        {{ $itemCollection['name'] }}
                    </button>
                </li>
            @endforeach
            <li>
                <a href="{{ route('admin.items.edit', ['item' => $item->id]) }}" @class([
                    'block text-gray-600 py-1 px-4 rounded-full text-xs font-bold whitespace-nowrap cursor-pointer',
                    'bg-white hover:bg-blue-600 hover:text-white' =>
                        $collection != $itemCollection['collection'],
                    'bg-blue-600 text-white' => $collection == $itemCollection['collection'],
                ])>
                    Edit
                </a>
            </li>
        </div>
    </menu>
    @switch($collection)
        @case('sales')
            <livewire:admin-seller.items.show.item-sales :item="$item" lazy />
        @break

        @case('inventories')
            <livewire:admin-seller.items.show.item-inventories :item="$item" lazy />
        @break

        @case('adjustments')
            <livewire:admin-seller.items.show.item-adjustments :item="$item" lazy />
        @break

        @case('products')
            <livewire:admin-seller.items.show.item-products :item="$item" lazy />
        @break

        @default
    @endswitch
</div>
