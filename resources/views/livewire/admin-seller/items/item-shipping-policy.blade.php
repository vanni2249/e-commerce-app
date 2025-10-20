<div>
    <x-card>
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-full lg:col-span-2">
                <h2 class="text-md font-bold text-gray-900">Shipping Policy</h2>
                <p class="text-sm text-gray-600">
                    Details about the item's shipping options.
                    Default shipping information is set in the business settings.
                    If the item is a digital product, shipping information is not required.
                </p>
            </div>
            <div class="col-span-full lg:col-span-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-full">
                        <x-label for="title" value="English" />
                        <div class="bg-gray-100 p-2 rounded-md">
                            <p class=" text-gray-600">{{ $en_shipping_policy }}</p>
                        </div>
                    </div>
                    <div class="col-span-full">
                        <x-label for="title" value="Spanish" />
                        <div class="bg-gray-100 p-2 rounded-md">
                            <p class=" text-gray-600">{{ $es_shipping_policy }}</p>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <x-button variant="light" @click="$dispatch('open-modal', 'edit-shipping-policy-modal')"
                            type="button">
                            Edit shipping policy
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </x-card>

    <!-- Edit shipping policy modal -->
    <x-modal name="edit-shipping-policy-modal" title="Edit shipping policy">
        <form wire:submit.prevent='saveShippingPolicy'>
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-full">
                    <x-label for="shipping_policy" value="English" />
                    <x-textarea wire:model='en_shipping_policy' type="text" class="w-full" />
                </div>
                <div class="col-span-full">
                    <x-label for="shipping_policy" value="Spanish" />
                    <x-textarea wire:model='es_shipping_policy' type="text" class="w-full" />
                </div>
            </div>
            <div class="mt-4 flex justify-end space-x-2">
                <x-button type="submit" value="Save Change" />
            </div>
        </form>
    </x-modal>
</div>
