<div class="bg-white p-4">
    <div class="grid grid-cols-12 gap-2">
        <!-- Left Side -->
        <div class="col-span-6">
            <div class="flex justify-start space-x-2 items-center">
                <!-- Sidebar toggle button -->
                <button id="toggleButton"
                    class=" cursor-pointer bg-blue-600 hover:bg-blue-800 text-white p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 0 1 2.75 4h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75ZM2 10a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 10Zm0 5.25a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <!-- Logo -->
                <a href="{{ route('sellers.dashboard') }}" class="lg:hidden text-lg font-semibold text-gray-700">
                    Zierra
                </a>
                <!-- Search (Desktop) -->
                <div class="hidden lg:flex flex-grow">
                    <form wire:submit.prevent="send" class="w-full">
                        <div class="w-full flex relative">

                            <input type="text" wire:model='search' @class([
                                'ml-4 w-full p-2 rounded-l-full border bg-white border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500',
                                'border-red-400' => $errors->has('search'),
                            ])
                                placeholder="Search..." />
                            <button type="submit"
                                class="bg-white hover:bg-blue-100 cursor-pointer text-white p-1 rounded-r-full border border-l-0 border-slate-300 px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-800">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </button>
                        </div>
                        {{-- <div @class([
                            'absolute bg-white p-4 font-bold rounded-xl w-full shadow',
                            'hidden' => $hiddenBoxMore,
                            'block' => $showBoxMore,
                        ])>ssss</div> --}}
                    </form>
                </div>
            </div>
        </div>
        <!-- Right side -->
        <div class="col-span-6">
            <div class="flex space-x-2 justify-end items-center">
                <!-- Search mobile btn -->
                <button @click="$dispatch('open-modal', 'search-modal')"
                    class="cursor-pointer bg-blue-600 hover:bg-blue-800 text-white p-2 rounded-full lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>

                </button>
                <!-- User dropdown btn -->
                <x-dropdown width="48">
                    <x-slot:trigger>
                        <button class="cursor-pointer bg-blue-600 hover:bg-blue-800 text-white p-2 rounded-full">
                            {{ $initialName }}
                        </button>
                    </x-slot:trigger>
                    <x-slot:content>
                        <div class="px-4 pb-1 text-gray-700 text-sm border-b border-gray-200">
                            <span class="text-xs font-bold">Welcome</span>
                            <br>
                            <span>
                                {{ $user->name }}
                            </span>
                        </div>
                        <x-dropdown-link href="">Profile</x-dropdown-link>
                        <x-dropdown-link href="{{ route('logout',['redirectRoute'=>'sellers.login']) }}">Logout</x-dropdown-link>
                    </x-slot:content>
                </x-dropdown>
            </div>
        </div>
    </div>
    <!-- Search modal -->
    <x-modal name="search-modal" title="Search" size="lg">
        <div>
            <x-input placeholder="Search..." class="w-full" />
        </div>
    </x-modal>
</div>

@script
    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const toggleButton = document.getElementById('toggleButton');
        const closeButtonMobile = document.getElementById('closeButtonMobile');

        toggleButton.addEventListener('click', function() {
            // Check if is lg screen
            if (window.innerWidth >= 1024) {
                sidebar.classList.toggle('lg:w-64');
                mainContent.classList.toggle('lg:ml-64');
            } else {
                sidebar.classList.toggle('w-0');
                sidebar.classList.toggle('w-64');
                mainContent.classList.toggle('lg:ml-0');
            }
        });

        closeButtonMobile.addEventListener('click', function() {
            if (window.innerWidth < 1024) {
                sidebar.classList.add('w-0');
                sidebar.classList.remove('w-64');
                mainContent.classList.add('lg:ml-0');
                mainContent.classList.remove('lg:ml-64');
            }
        });

        // When Screen is < 1024px and click outside close sidebar
        document.addEventListener('click', function(event) {
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnToggleButton = toggleButton.contains(event.target);

            if (!isClickInsideSidebar && !isClickOnToggleButton && window.innerWidth < 1024 && sidebar.classList
                .contains('w-64')) {
                sidebar.classList.add('w-0');
                sidebar.classList.remove('w-64');
                mainContent.classList.add('lg:ml-0');
                mainContent.classList.remove('lg:ml-64');
            }
        });
    </script>
@endscript
