<div>
    <x-card class="col-span-full">
        <header>
            <h3 class="text-lg font-semibold">Details</h3>
            <ul class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6  gap-6 py-4">
                @for ($i = 0; $i < 12; $i++)
                    <li>
                        <span class="text-gray-600 text-xs">Brand</span>
                        <br>
                        <span class="text-sm">Suave</span>
                    </li>
                @endfor
            </ul>
        </header>
    </x-card>
</div>
