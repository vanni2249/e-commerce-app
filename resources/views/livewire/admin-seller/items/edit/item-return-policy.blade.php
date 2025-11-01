<div>
    <x-card>
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-full lg:col-span-2">
                <h2 class="text-md font-bold text-gray-900">Return Policy</h2>
                <p class="text-sm text-gray-600">
                    Details about the item's return options.
                    Default return information is set in the business settings.
                    If the item is a digital product, return information is not required.
                </p>
            </div>
            <div class="col-span-full lg:col-span-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-full">
                        <x-label for="title" value="English" />
                        <div class="bg-gray-100 p-2 rounded-md">
                            <p class=" text-gray-600">{{ $en_return_policy }}</p>
                        </div>
                    </div>
                    <div class="col-span-full">
                        <x-label for="title" value="Spanish" />
                        <div class="bg-gray-100 p-2 rounded-md">
                            <p class=" text-gray-600">{{ $es_return_policy }}</p>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <x-button variant="light" @click="$dispatch('open-modal', 'edit-return-policy-modal')"
                            type="button">
                            Edit return policy
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </x-card>

    <!-- Edit return policy modal -->
    <x-modal name="edit-return-policy-modal" title="Edit return policy">
        <form wire:submit.prevent='saveReturnPolicy'>
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-full">
                    <x-label for="return_policy" value="English" />
                    <x-textarea wire:model='en_return_policy' type="text" class="w-full" />
                </div>
                <div class="col-span-full">
                    <x-label for="return_policy" value="Spanish" />
                    <x-textarea wire:model='es_return_policy' type="text" class="w-full" />
                </div>
            </div>
            <div class="mt-4 flex justify-end space-x-2">
                <x-button type="submit" value="Save Change" />
            </div>
        </form>
    </x-modal>
</div>
