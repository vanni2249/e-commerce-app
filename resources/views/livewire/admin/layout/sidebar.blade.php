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
                @if (isset($item['route']))
                    <li>
                        <a href="{{ url($item['route']) }}" @class([
                            'flex justify-between item-center px-4 py-2 text-gray-100 hover:bg-blue-800 hover:text-white rounded-lg',
                            'bg-blue-800' => request()->segment(2) === $item['active'],
                        ]) wire:navigate>
                            <span class="py-1 text-xs">
                                {{ $item['title'] }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="size-6">
                                <path fill-rule="evenodd"
                                    d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                @else
                    <li>
                        <button id="{{ $item['buttonId'] }}" @class([
                            'w-full flex justify-between item-center px-4 py-2 text-gray-100 hover:bg-blue-800 hover:text-white rounded-t-lg rounded-b-lg cursor-pointer',
                            // 'bg-blue-800' => request()->segment(2) === $item['active'],
                        ])>
                            <span class="py-1 uppercase">
                                {{ $item['title'] }}
                            </span>
                            <span id="{{ $item['arrowRightId'] }}" @class(['transition-all'])>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span id="{{ $item['arrowDownId'] }}" @class(['transition-all hidden'])>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-5">
                                    <path fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </span>
                        </button>
                        <ul id="{{ $item['mainContent'] }}"
                            class="bg-blue-800 rounded-b-lg transition-all px-2 pb-2 hidden space-y-1">
                            @foreach ($item['routes'] as $sub)
                                <li>
                                    <a href="{{ route($sub['route']) }}" @class([
                                        'flex justify-between item-center px-4 py-2 text-gray-100 hover:bg-blue-700 hover:text-white rounded-lg',
                                        'bg-blue-700' => request()->segment(2) === $sub['active'],
                                    ]) wire:navigate>
                                        <span class="py-1 text-xs">
                                            {{ $sub['title'] }}
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="size-6">
                                            <path fill-rule="evenodd"
                                                d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </aside>
</div>

@script
    <script>
        const usersMenuButton = document.getElementById('users-menu-button');
        const usersMenuContent = document.getElementById('users-menu-content');
        const arrowRight = document.getElementById('users-menu-arrow-right');
        const arrowDown = document.getElementById('users-menu-arrow-down');

        if (['users', 'sellers', 'admins'].includes($wire.segment)) {
            usersMenuContent.classList.remove('hidden');
            usersMenuButton.classList.add('bg-blue-800');
            usersMenuButton.classList.remove('rounded-b-lg');
            arrowRight.classList.add('hidden');
            arrowDown.classList.remove('hidden');
        }

        usersMenuButton.addEventListener('click', () => {
            usersMenuContent.classList.toggle('hidden');
            usersMenuButton.classList.toggle('bg-blue-800');
            usersMenuButton.classList.toggle('rounded-b-lg');
            arrowRight.classList.toggle('hidden');
            arrowDown.classList.toggle('hidden');
        });
    </script>
@endscript
