<div>
    <x-card>
        <div class="grid grid-cols-6 gap-4">
            <!-- Images -->
            <div class="col-span-full lg:col-span-2">
                <h3 class="text-m font-bold text-gray-800">
                    Item Images
                </h3>
                <p class="text-sm text-gray-600">
                    Add, remove or update item images.
                </p>
            </div>
            <div class="col-span-full lg:col-span-4 space-y-4">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="flex flex-col border border-gray-300 rounded-md p-2 space-y-2">
                            <div class="bg-gray-200 h-32 rounded-md"></div>
                            <div class="flex items-center space-x-2">
                                <x-icon-button icon="delete" class="p-1" />
                                <x-button variant="light" size="sm" value="Set default" class="grow" />
                            </div>
                        </div>
                    @endfor

                    <button @click="$dispatch('open-modal', 'image-modal')" type="button"
                        class="bg-gray-200 h-full border border-dashed border-gray-400 rounded-xl cursor-pointer">
                        <div class="flex flex-col justify-center items-center h-full p-4 space-y-2">
                            <span class="text-sm text-gray-600">Add Image</span>
                        </div>
                    </button>
                    <x-modal name="image-modal" title="Add image" size="lg">
                        <form wire:submit.prevent=''>
                            <div class="grid grid-cols-1 gap-4">
                                <div class="col-span-1">
                                    <x-label for="image" value="Image" />
                                    <x-input wire:model.lazy='' type="file" class="w-full" />
                                    @error('')
                                        <x-error message="{{ $message }}" />
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4 flex justify-end items-center space-x-2">
                                <x-button type="submit" value="Add Image" />
                            </div>
                        </form>
                    </x-modal>
                </div>

            </div>
        </div>
    </x-card>
</div>
