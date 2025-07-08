<div class="space-y-4">
    <header class="flex items-center justify-between">
        <h2 class="text-lg font-semibold">Categories</h2>
        <x-icon-button wire:click="handleCategoriesModal" type="button" bg="light" icon="plus" />
    </header>
    <!-- Modal to sync categories -->
    <x-modal name="sync-categories-modal" title="Sync Categories">
        @if ($categories)
            <form wire:submit="sync">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                    @foreach ($categories as $category)
                        <div class="flex items-center mb-2 bg-gray-100 p-2 rounded">
                            <input type="checkbox" wire:model="selectedCategories" value="{{ $category->id }}"
                                id="category-{{ $category->id }}" class="mr-2">
                            <label for="category-{{ $category->id }}" class="text-sm">{{ $category->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="bg-blue-500 cursor-pointer text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors duration-200">
                        Sync Categories
                    </button>
                </div>
            </form>
        @endif
    </x-modal>
    <ul class="grid grid-cols-12 gap-2">
        @forelse ($item->categories as $category)
            <li
                class="bg-gray-100 col-span-6 md:col-span-4 lg:col-span-3 text-sm p-4 flex justify-between items-center rounded-xl">
                {{ $category->name }}
            </li>
        @empty
            <li class="bg-gray-100 col-span-full text-sm p-4 rounded-xl">
                <span class="text-gray-800">No categories added.</span>
            </li>
        @endforelse
    </ul>
</div>
