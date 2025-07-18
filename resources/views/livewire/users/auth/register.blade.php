<div>
    <div class="bg-white w-full sm:w-sm rounded-2xl p-4">
        <div>
            <h1 class="text-lg font-bold text-gray-900">Register</h1>
            <p class="mt-1 text-sm text-gray-600">
                Complete the form below to create a new account.
            </p>
        </div>
        <form wire:submit="register" class="mt-4">
            <div class="mt-4">
                <div>
                    <x-label for="text" class="mt-4" value="Name" />
                    <x-input type="text" wire:model="name" 
                            @class(['w-full', 'border border-red-400' => $errors->has('name')])
                        placeholder="Enter your name" />
                        
                </div>
                <div class="mt-2">
                    <x-label for="email" class="mt-4" value="Email" />
                    <x-input id="email" wire:model="email" @class(['w-full', 'border border-red-400' => $errors->has('email')]) type="email" name="email"
                        placeholder="Enter your email" />
                        @error('email')
                            <x-error message="{{ $message }}"/>
                        @enderror
                </div>
                <div class="mt-2">
                    <x-label for="password" class="mt-4" value="Password" />
                    <x-input type="password" id="password" wire:model="password" 
                        @class(['w-full', 'border border-red-400' => $errors->has('password')])
                        placeholder="Enter your password"/>
                        @error('password')
                            <x-error message="{{ $message }}"/>
                        @enderror
                </div>
                <div class="mt-2">
                    <x-label for="password_confirmation" class="mt-4" value="Confirm password" />
                    <x-input type="password" id="password_confirmation" wire:model="password_confirmation" 
                        @class(['w-full', 'border border-red-400' => $errors->has('password_confirmation')])
                        type="password" name="password_confirmation" placeholder="Confirm your password" />
                </div>
                <div class="mt-2 flex items-center space-x-2">
                    <div class="pt-1">
                        <x-checkbox id="terms" name="terms" value="1" />
                    </div>
                    <a href="#">
                        <x-label for="terms" value="Accept terms and conditions" />
                    </a>
                </div>
                <div class="mt-8">
                    <x-button type="submit" class="w-full">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </div>
        </form>

        <div class="mt-6">
            <p class="mt-4 text-xs text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-500">Sign in</a>
            </p>
        </div>
    </div>
</div>