<div>
   <div class="grid grid-cols-12 gap-4">
    @foreach ($items as $item)
        <x-item href="{{ route('items.show', ['item' => $item->id]) }}" :item="$item" />
    @endforeach
    </div>
</div>
