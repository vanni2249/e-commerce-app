<div>
    <x-card>
        <header>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-md font-bold">{{ $item->number }}</h2>
                <div class="flex gap-2">
                    @if ($admin)
                        <x-icon-button icon="eye" />
                        <x-icon-link href="{{ route('admin.items.edit', ['item' => $item]) }}" icon="pencil"
                            wire:navigate />
                    @else
                        <x-icon-button icon="eye" />
                        <x-icon-link href="{{ route('sellers.items.edit', ['item' => $item]) }}" icon="pencil"
                            wire:navigate />
                    @endif
                </div>
            </div>
            <div>
                @if ($item->approved_at == null)
                    <x-badge color="warning" value="Draft" />
                @else
                    @if ($item->is_active)
                        <x-badge color="success" value="Active" />
                    @else
                        <x-badge color="danger" value="Inactive" />
                    @endif
                @endif
            </div>
        </header>
    </x-card>
</div>
