<div>
    <div class="hidden lg:block bg-blue-900">
        <div class="max-w-7xl mx-auto py-2 px-4 grid grid-cols-2 gap-4">
            <div class="flex space-x-1">
                @foreach ($services as $service)
                    <a href=""
                        class="text-blue-100 whitespace-nowrap font-bold hover:text-white cursor-pointer hover:bg-blue-800 px-2 rounded-full py-0.5">
                        {{ $service }}
                    </a>
                @endforeach
            </div>
            <div class="flex justify-end text-white">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <span class="font-semibold cursor-pointer hover:bg-blue-800 px-3 rounded-full py-0.5">
                                Hi,
                                {{ Auth::user()->first_name }}
                            </span>
                        </x-slot>
                        <x-slot name="content">
                            @foreach ($items as $item)
                                <x-dropdown-link href="{{ $item['url'] }}" wire:navigate>{{{ $item['value'] }}}</x-dropdown-link>
                            @endforeach
                        </x-slot>
                    </x-dropdown>
                @endauth
                @guest
                    <span class="flex space-x-1 px-4">
                        <a href="{{ route('register') }}" class="font-bold hover:underline"
                            wire:navigate>{{ __('Register') }}</a>
                        <span>
                            {{ __('or') }}
                        </span>
                        <a href="{{ route('login') }}" class="hover:underline" wire:navigate>{{ __('Login') }}</a>
                    </span>
                @endguest
                @auth
                    <a href="{{ route('favorites') }}" class="font-semibold hover:bg-blue-800 px-3 rounded-full"
                        wire:navigate>{{ __('My favorites') }}</a>
                @endauth
            </div>
        </div>
    </div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
</div>
