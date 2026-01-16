<div>
    <div class="bg-white w-full sm:w-sm rounded-xl p-4">
        <div class="">
            <h1 class="text-2xl font-bold text-gray-900">Login</h1>
            <p class="mt-1 text-sm text-gray-600">
                Welcome back! Please log in to your account.
            </p>
        </div>
        <form wire:submit="login">
            <div class="mt-4">
                <x-label for="username" class="mt-4" value="Username" />
                <x-input wire:model="username" class="w-full" type="username" placeholder="Enter your username" autofocus />
                @error('username')
                    <x-error message="{{ $message }}" />
                @enderror
            </div>
            <div class="mt-2">
                <x-label for="password" class="mt-4" value="Password" />
                <x-input wire:model="password" class="w-full" type="password" placeholder="Enter your password" />
                @error('password')
                    <x-error message="{{ $message }}" />
                @enderror
            </div>
            <a href="">
                <p class="mt-2 text-xs text-gray-600 cursor-">Forgot your password?</p>
            </a>
            <div class="mt-8">
                <x-button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-50"
                    wire:loading.class.remove='hover:bg-blue-700' class="w-full">
                    <span wire:loading.remove>
                        {{ __('Login') }}
                    </span>
                    <span wire:loading>
                        Loading...
                    </span>
                </x-button>
            </div>
        </form>
    </div>
</div>
