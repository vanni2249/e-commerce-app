<div>
    <x-card>
        <div class="grid grid-cols-6 gap-4">
            <!-- Titles -->
            <div class="col-span-full lg:col-span-2">
                <h2 class="text-md font-bold text-gray-900">Titles</h2>
                <p class="text-sm text-gray-600">
                    The titles of the item in different languages.
                </p>
            </div>
            <div class="col-span-full lg:col-span-4 space-y-4">
                <div class="col-span-full lg:col-span-1">
                    <x-label for="title" value="English" />
                    <div class="bg-gray-100 p-2 rounded-md">
                        <p class=" text-gray-600">{{ $en_title }}</p>
                    </div>
                </div>
                <div class="col-span-full lg:col-span-1">
                    <x-label for="title" value="Spanish" />
                    <div class="bg-gray-100 p-2 rounded-md">
                        <p class=" text-gray-600">{{ $es_title }}</p>
                    </div>
                </div>
                <div class="">
                    <x-button variant="light" @click="$dispatch('open-modal', 'edit-title-modal')" type="button">
                        Edit titles
                    </x-button>
                </div>
            </div>
        </div>
    </x-card>

    <!-- Edit title modal -->
    <x-modal name="edit-title-modal" title="Edit title">
        <form wire:submit.prevent='saveTitle'>
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-full">
                    <x-label for="title" value="English" />
                    <x-textarea wire:model='en_title' type="text" class="w-full" />
                </div>
                <div class="col-span-full">
                    <x-label for="title" value="Spanish" />
                    <x-textarea wire:model='es_title' type="text" class="w-full" />
                </div>
            </div>
            <div class="mt-4 flex justify-end space-x-2">
                <x-button type="submit" value="Save Change" />
            </div>
        </form>
    </x-modal>
</div>
