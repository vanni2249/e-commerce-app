<div>
    <x-card>
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-full lg:col-span-2">
                <h2 class="text-md font-bold text-gray-900">Short description</h2>
                <p class="text-sm text-gray-600">
                    A brief summary of the item in different languages.
                </p>
            </div>
            <div class="col-span-full lg:col-span-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-full">
                        <x-label for="title" value="English" />
                        <div class="bg-gray-100 p-2 rounded-md">
                            <p class=" text-gray-600">{{ $en_short_description }}</p>
                        </div>
                    </div>
                    <div class="col-span-full">
                        <x-label for="title" value="Spanish" />
                        <div class="bg-gray-100 p-2 rounded-md">
                            <p class=" text-gray-600">{{ $es_short_description }}</p>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <x-button variant="light" @click="$dispatch('open-modal', 'edit-short-description-modal')"
                            type="button">
                            Edit short description
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </x-card>

    <!-- Edit short description modal -->
    <x-modal name="edit-short-description-modal" title="Edit short description">
        <form wire:submit.prevent='saveShortDescription'>
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-full">
                    <x-label for="short_description" value="English" />
                    <x-textarea wire:model='en_short_description' type="text" class="w-full" />
                </div>
                <div class="col-span-full">
                    <x-label for="short_description" value="Spanish" />
                    <x-textarea wire:model='es_short_description' type="text" class="w-full" />
                </div>
            </div>
            <div class="mt-4 flex justify-end space-x-2">
                <x-button type="submit" value="Save Change" />
            </div>
        </form>
    </x-modal>
</div>
