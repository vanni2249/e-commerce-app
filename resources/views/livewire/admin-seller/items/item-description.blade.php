<div>
    <x-card>
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-full lg:col-span-2">
                <h2 class="text-md font-bold text-gray-900">Description</h2>
                <p class="text-sm text-gray-600">
                    A detailed description of the item in different languages.
                </p>
            </div>
            <div class="col-span-full lg:col-span-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-full">
                        <x-label for="title" value="English" />
                        <div class="bg-gray-100 p-2 rounded-md">
                            <p class=" text-gray-600">{{ $en_description }}</p>
                        </div>
                    </div>
                    <div class="col-span-full">
                        <x-label for="title" value="Spanish" />
                        <div class="bg-gray-100 p-2 rounded-md">
                            <p class=" text-gray-600">{{ $es_description }}</p>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <x-button variant="light" @click="$dispatch('open-modal', 'edit-description-modal')"
                            type="button">
                            Edit description
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </x-card>

    <!-- Edit description modal -->
    <x-modal name="edit-description-modal" title="Edit description">
        <form wire:submit.prevent='saveDescription'>
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-full">
                    <x-label for="description" value="English" />
                    <x-textarea wire:model='en_description' type="text" class="w-full" />
                </div>
                <div class="col-span-full">
                    <x-label for="description" value="Spanish" />
                    <x-textarea wire:model='es_description' type="text" class="w-full" />
                </div>
            </div>
            <div class="mt-4 flex justify-end space-x-2">
                <x-button type="submit" value="Save Change" />
            </div>
        </form>
    </x-modal>
</div>
