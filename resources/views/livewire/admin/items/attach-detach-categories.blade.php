<div>
    <form wire:submit="sync">
        <h2 class="text-lg font-semibold mb-4">Attach Categories</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-2 py-4">
            @foreach ($categories as $category)
            <div class="flex items-center mb-2">
                <input type="checkbox" wire:model="selectedCategories" value="{{ $category->id }}" id="category-{{ $category->id }}"
                class="mr-2">
                <label for="category-{{ $category->id }}" class="text-sm">{{ $category->name }}</label>
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
