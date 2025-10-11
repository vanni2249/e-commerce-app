<div>
    <!-- Widget -->
    <div class="grid grid-cols-12 gap-2">
        @foreach ($this->widgets() as $widget)
            <x-widget :title="$widget['title']" :value="$widget['value']" :icon="$widget['icon']" :lineColor="$widget['lineColor']"
                class="col-span-6 md:col-span-4 lg:col-span-3">
                <x-slot name="right">
                    
                </x-slot>
                <x-slot name="footer">
                    <span class="text-sm text-gray-400">
                        Compared to last month
                    </span>
                </x-slot>
            </x-widget>
        @endforeach
    </div>
</div>
