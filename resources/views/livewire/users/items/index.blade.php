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
                    <div class="hidden lg:block bg-gray-200 rounded-full p-1.5 items-center">
                        <span class="pl-2 uppercase text-xs font-bold text-gray-600 leading-tight">Show</span>
                        <select wire:model.live="perPage" class="mx-2 rounded-md text-sm font-bold text-gray-800">
                            <option value="24">24</option>
                            <option value="36">36</option>
                            <option value="48">48</option>
                            <option value="60">60</option>
                        </select>
                    </div>
                    <div class="lg:hidden">
                        <x-icon-button icon="filter" @click="$dispatch('open-modal', 'mobile-filters')" />
                    </div>
                </div>
            </div>
        </x-card>
        <!-- Body -->
        <div class="grid grid-cols-12 gap-2 md:gap-4">
            <!-- Filter -->
            <div class="col-span-full lg:col-span-3 hidden lg:block">
                <x-card>
                    <div class="space-y-6">
                        <header class="flex justify-between items-center">
                            <h2 class="text-md font-bold">Filters</h2>
                        </header>
                        @include('users.items.filter')
                    </div>
                </x-card>
            </div>
            <!-- Results -->
            <div class="col-span-full lg:col-span-9">
                <div class="grid grid-cols-12 gap-4">

                    @forelse ($items as $item)
                        <div class="col-span-6 md:col-span-3 lg:col-span-3">
                            <x-item href="{{ route('items.show', $item) }}" :item="$item" wire:navigate />
                        </div>
                    @empty
                        <div class="col-span-full">
                            <x-card>
                                <div class="text-gray-600 text-center text-sm">
                                    No items found.
                                </div>
                            </x-card>
                        </div>
                    @endforelse
                    <!-- Pagination -->
                    <div class="col-span-full">
                        @if ($items->hasPages())
                            <x-card>
                                {{ $items->links() }}
                            </x-card>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile modal -->
    <x-modal name="mobile-filters" title="Filters" size="sm">
        @include('users.items.filter')
    </x-modal>
</div>
