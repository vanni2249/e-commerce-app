<div>
    <div class="bg-white w-full md:w-sm rounded-xl p-4">
        <div class="">
            <h1 class="text-lg font-bold text-gray-900">Sign in</h1>
            <p class="mt-1 text-sm text-gray-600">
                Welcome back! Please log in to your account.
            </p>
        </div>
        <form wire:submit="login">
            <div class="mt-4">
                <x-label for="email" class="mt-4" value="Email" />
                <x-input wire:model="email" id="email" class="w-full" type="email" name="email"
                    placeholder="Enter your email" />
                @error('email')
                <x-error message="{{ $message }}" />
                @enderror
            </div>
            <div class="mt-2">
                <x-label for="email" class="mt-4" value="Password" />
                <x-input wire:model="password" id="password" class="w-full" type="password" name="password"
                    placeholder="Enter your password" />
                @error('password')
                <x-error message="{{ $message }}" />
                @enderror
            </div>
            <a href="">
                <p class="mt-2 text-xs text-gray-600">Forgot your password?</p>
            </a>
            <div class="mt-8">
                <x-button type="submit" class="w-full bg-blue-50">
                    {{ __('Login') }}
                </x-button>
            </div>
        </form>

        <div class="mt-6">
            <p class="mt-4 text-xs text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-blue-500">
                    Register
                </a>
            </p>
        </div>
    </div>
</div>