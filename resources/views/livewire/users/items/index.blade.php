<div>
    <div class="space-y-4">
        <!-- Header -->
        <x-card>
            <div class="flex justify-between items-center">
                <div>
                    @if ($search)
                        <div class="text-gray-800 text-sm">
                            <span class="hidden lg:inline">
                                You searched for: 
                            </span>
                            <span class="lg:hidden">
                                Searched:
                            </span>
                            <strong class="text-gray-950">"{{ $search }}"</strong>
                        </div>
                    @endif
                    <div class="text-gray-800 text-sm">
                        Results for: <strong>{{ $items->total() }}</strong> items found.
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="bg-gray-200 rounded-md p-1 items-center">
                        <span class="pl-2 uppercase text-xs font-bold text-gray-600 leading-tight">Show</span>
                        <select wire:model.live="perPage" class="mx-2 rounded-md text-sm">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                        </select>
                    </div>
                    <div class="lg:hidden">
                        <x-icon-button icon="filter" @click="$dispatch('open-modal', 'mobile-filters')"/>
                    </div>
                </div>
            </div>
        </x-card>
        <!-- Body -->
        <div class="grid grid-cols-12 gap-2 md:gap-4">
            <!-- Filter -->
            <div class="col-span-full lg:col-span-3 hidden lg:block">
                <x-card></x-card>
            </div>
            <!-- Results -->
            <div class="col-span-full lg:col-span-9">
                <di class="grid grid-cols-12 gap-4">

                    @foreach ($items as $item)
                        <div class="col-span-6 md:col-span-3 lg:col-span-3">
                            <x-item href="{{ route('items.show', $item) }}" :item="$item" wire:navigate />
                        </div>
                    @endforeach
                </di v>
            </div>
        </div>
        <!-- Pagination -->
        <x-card class="col-span-full">
            {{ $items->links() }}
        </x-card>
    </div>

    <!-- Mobile modal -->
    <x-modal name="mobile-filters" title="Filters" size="sm">
    </x-modal>
</div>
