<div>
    <x-card>
        <header class="flex justify-between items-top">
            <h1 class="text-md font-bold">Categories</h1>
            <x-icon-button wire:click='handleCategoriesModal' icon="plus" />
        </header>

        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-full lg:col-span-2">
                <p class="text-sm text-gray-600">
                    Assign categories to the item for better organization and searchability.
                </p>
            </div>
            <div class="col-span-full lg:col-span-4">
                <div class="flex flex-wrap gap-2">
                    @forelse ($item->categories as $category)
                        <div class="bg-gray-200 w-full px-4 py-2 rounded-xl md:w-auto">
                            <div class="flex whitespace-nowrap items-center justify-between space-x-4">

                                <p class="text-sm text-gray-600">
                                    {{ $category->name }} | {{ $category->getTranslations('name')['es'] }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <span class="text-gray-800">No categories added.</span>
                    @endforelse
                </div>
            </div>
        </div>
    </x-card>
    <x-modal name="sync-categories-modal" title="Add category">
        @if ($categories)
            <form wire:submit="syncCategories">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($categories as $category)
                        <div class="flex items-center bg-gray-100 p-2 rounded">
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
</div>
