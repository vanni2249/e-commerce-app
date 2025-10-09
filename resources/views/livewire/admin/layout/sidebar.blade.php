<div class=" bg-blue-900 w-full h-full overflow-auto">
    <aside class="">
        <!-- Header -->
        <header class="h-16 border-b border-blue-800 flex items-center text-white px-6">
            <div class="flex justify-between items-center w-full">
                <!-- Name -->
                <div class="inline-flex flex-col">
                    <span class="text-sm font-bold text-gray-200">
                        Zierra
                    </span>
                    <span class="text-xs font-bold text-gray-400">
                        Administration
                    </span>
                </div>
                <!-- Close sidebar mobile button -->
                <button id="closeButtonMobile" class="cursor-pointer lg:hidden">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon icon-tabler text-gray-400 icons-tabler-outline icon-tabler-x">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M18 6l-12 12" />
                        <path d="M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </header>
        <ul class="p-4 text-xs font-bold uppercase space-y-1">
            @foreach ($collection as $item)
                <li>
                    <a href="{{ route($item['route']) }}" @class([
                        'flex justify-between item-center px-4 py-2 text-gray-100 hover:bg-blue-800 hover:text-white rounded-lg',
                        'bg-blue-800' => request()->segment(2) === $item['active'],
                    ]) wire:navigate>
                        <span class="py-1">
                            {{ $item['title'] }}
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
            @endforeach
        </ul>
    </aside>
</div>
