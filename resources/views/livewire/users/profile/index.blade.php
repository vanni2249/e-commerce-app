<div>
    <x-card>
        <div class="grid grid-cols-6 gap-4">
            <!-- Personal information -->
            <div class="col-span-full lg:col-span-2">
                <h2 class="text-lg font-bold">Personal information</h2>
                <p class="text-sm text-gray-600">
                    Update your account's profile information and email address.
                </p>
            </div>
            <div class="col-span-full lg:col-span-4">
                <form wire:submit.prevent="saveData" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Name -->
                    <div class="col-span-full">
                        <x-label for="name" value="Name" />
                        <x-input wire:model="name" type="text" class="w-full" />
                    </div>
                    <!-- Email -->
                    <div class="col-span-full lg:col-span-1 lg:col-start-1">
                        <x-label for="email" value="Email" />
                        <x-input wire:model="email" type="text" class="w-full" />
                    </div>
                    <!-- Button to save -->
                    <div class="col-span-full flex gap-2 items-center">
                        <x-button type="submit">Save data</x-button>
                        @if (session()->has('message.save-data'))
                            <div wire:poll.2000ms class="text-sm text-green-600">
                                {{ session('message.save-data') }}
                            </div>
                        @endif
                    </div>
                    <div>
                    </div>
                </form>
            </div>
            <div class="col-span-full py-4"></div>
            <!-- Change password -->
            <div class="col-span-full lg:col-span-2">
                <h2 class="text-lg font-bold">Change password</h2>
                <p class="text-sm text-gray-600">
                    Ensure your account is using a long, random password to stay secure.
                </p>
            </div>
            <div class="col-span-full lg:col-span-4 ">
                <form wire:submit.prevent="changePassword" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Old password -->
                    <div class="col-span-full lg:col-span-1 lg:col-start-1">
                        <x-label for="old-password" value="Old password" />
                        <x-input wire:model="old_password" type="password" class="w-full" />
                        @error('old_password')
                        <x-error message="{{ $message }}" />
                        @enderror

                    </div>
                    <!-- New password -->
                    <div class="col-span-full lg:col-span-1 lg:col-start-1">
                        <x-label for="new-password" value="New password" />
                        <x-input wire:model="password" type="password" class="w-full" />
                        @error('password')
                        <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                    <!-- New Password Confirmation -->
                    <div class="col-span-full lg:col-span-1">
                        <x-label for="new-password_confirmation" value="Confirm new password" />
                        <x-input wire:model="password_confirmation" type="password" class="w-full" />
                        @error('password_confirmation')
                        <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                    <div class="col-span-full flex gap-2 items-center">
                        <x-button type="submit" value="Save new password" />
                        @if (session()->has('message.change-password'))
                            <div wire:poll.2000ms class="text-sm text-green-600">
                                {{ session('message.change-password') }}
                            </div>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-span-full py-4"></div>
            <!-- Close account -->
            <div class="col-span-full lg:col-span-2">
                <h2 class="text-lg font-bold">Close account</h2>
                <p class="text-sm text-gray-600">
                    Once your account is closed, all of its resources and data will be permanently deleted.
                </p>
            </div>
            <div class="col-span-full lg:col-span-4 flex flex-row items-center">
                <x-button disabled="" class="bg-red-600 hover:bg-red-700">Close account</x-button>
            </div>
        </div>
    </x-card>
</div>
