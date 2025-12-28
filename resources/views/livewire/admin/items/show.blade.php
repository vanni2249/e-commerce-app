<div class="space-y-2">
    <header class="px-1">
        <div class="flex justify-between items-center">
            <h2 class="text-md font-bold">{{ $item->number }}</h2>
            <div class="flex gap-2">
                <x-link-button href="{{ route('admin.items.edit', ['item' => $item]) }}" label="Edit item"
                    wire:navigate />
            </div>
        </div>
    </header>
    <menu class="flex space-x-4 px-1 overflow-x-auto no-scrollbar min-w-0">
        <div class="flex space-x-2 min-w-max">
            @foreach ($menu as $itemCollection)
                <li class="flex-shrink-0">
                    <a href="{{ $itemCollection['url'] }}" @class([
                        'block text-gray-600 py-1 px-4 rounded-full text-xs font-bold whitespace-nowrap cursor-pointer',
                        'bg-white hover:bg-blue-600 hover:text-white' =>
                            $show != $itemCollection['slug'],
                        'bg-blue-600 text-white' => $show == $itemCollection['slug'],
                    ]) wire:navigate>
                        {{ $itemCollection['name'] }}
                    </a>
                </li>
            @endforeach
            <li>
                <a href="{{ route('admin.items.edit', ['item' => $item->id]) }}" @class([
                    'block text-gray-600 py-1 px-4 rounded-full text-xs font-bold whitespace-nowrap cursor-pointer',
                    'bg-white hover:bg-blue-600 hover:text-white',
                ])>
                    Edit
                </a>
            </li>
        </div>
    </menu>
    @switch($show)
        @case('sales')
            <livewire:admin-seller.items.show.item-sales :item="$item" lazy />
        @break

        @case('inventories')
            <livewire:admin-seller.items.show.item-inventories :item="$item" lazy />
        @break

        @case('products')
            <livewire:admin-seller.items.show.item-products :item="$item" lazy />
        @break

        @default
    @endswitch
</div>
