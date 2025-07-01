<div>
    <form wire:submit="sync">
        <h2 class="text-lg font-semibold mb-4">Attach Attributes</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-2 py-4">
            @foreach ($attrs as $attribute)
            <div class="flex items-center mb-2">
                <input type="checkbox" wire:model="selectedAttributes" value="{{ $attribute->id }}" id="attribute-{{ $attribute->id }}"
                class="mr-2">
                <label for="attribute-{{ $attribute->id }}" class="text-sm">{{ $attribute->name }}</label>
            </div>
            @endforeach
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-blue-500 cursor-pointer text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors duration-200">
                Attach Categories
            </button>
        </div>
    </form>
</div>
