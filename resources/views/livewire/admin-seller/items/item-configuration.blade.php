<div>
    <x-card>
        <div class="grid grid-cols-6 gap-4">
            <!-- Main information -->
            <div class="col-span-full lg:col-span-2">
                <h2 class="text-md font-bold text-gray-900">Item configuration</h2>
                <p class="text-sm text-gray-600">
                    Configure the section and seller associated with this item.
                </p>
            </div>
            <!-- Information -->
            <div class="col-span-full lg:col-span-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-full md:col-span-1">
                        <x-label for="title" value="Section" />
                        <div class="bg-gray-100 text-gray-600 rounded-md p-2">
                            {{ $item->section->name ?? 'No section assigned' }}
                        </div>
                    </div>
                    <div class="col-span-full md:col-span-1">
                        <x-label for="title" value="Seller" />
                        <div class="bg-gray-100 text-gray-600 rounded-md p-2">
                            {{ $item->seller->user->name ?? 'Zierra LLC' }}
                        </div>
                    </div>
                    <div class="col-span-full">
                        <x-button variant="light" @click="$dispatch('open-modal', 'business-seller-modal')" type="button"
                            value="Edit Configuration" />
                    </div>
                </div>
            </div>
        </div>
    </x-card>

    <!-- Business & Seller Modal -->
    <x-modal name="business-seller-modal" title="Business & Seller" size="lg">
        <form wire:submit.prevent='saveConfiguration'>
            <div class="grid grid-cols-1 gap-4">
                <div class="col-span-1">
                    <x-label for="business" value="Business" />
                    <x-select wire:model.lazy="section_id" class="w-full">
                        <option value="">Select a section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </x-select>
                    @error('section_id')
                        <x-error message="{{ $message }}" />
                    @enderror
                </div>
            </div>
            <div class="mt-4 flex justify-end items-center space-x-2">
                <x-button type="submit" value="Save Changes" />
            </div>
        </form>
    </x-modal>
</div>
