<div>
    <ul
        class="flex flex-col space-y-2 lg:flex-row lg:space-y-0  lg:space-x-2 lg:justify-between lg:items-center mb-4 text-xs text-gray-600">
        <li wire:click="goToUserRegisterSection" @class([
            'cursor-pointer',
            'text-sm font-bold text-gray-900' => $user_register_section,
            'font-bold text-sm' => $user_register_completed,
        ])>
            User Registration
        </li>
        <li wire:click="goToBusinessInfoSection" @class([
            'cursor-pointer',
            'text-sm font-bold text-gray-900' => $business_info_section,
            'font-bold text-sm' => $business_info_completed,
        ])>
            Business Information
        </li>
        <li wire:click="goToBusinessAddressSection" @class([
            'cursor-pointer',
            'text-sm font-bold text-gray-900' => $business_address_section,
            'font-bold text-sm' => $business_address_completed,
        ])>
            Business Address
        </li>
    </ul>
    <div class="bg-white w-full mx-auto md:w-sm rounded-2xl p-4">
        <form wire:submit="register">
            <div class="space-y-4">
                <!-- User register -->
                @if ($user_register_section)
                    <div class="mb-4">
                        <h1 class="text-lg font-bold text-gray-900">User Registration</h1>
                        <p class="mt-1 text-sm text-gray-600">
                            Complete the form below to create a new account.
                        </p>
                    </div>
                    <!-- Name -->
                    <div>
                        <x-label for="text" class="mt-4" value="Name" />
                        <x-input type="text" wire:model="name" @class(['w-full', 'border border-red-400' => $errors->has('name')])
                            placeholder="Enter your name" />

                    </div>
                    <!-- Email Address -->
                    <div class="">
                        <x-label for="email" class="mt-4" value="Email" />
                        <x-input id="email" wire:model="email" @class(['w-full', 'border border-red-400' => $errors->has('email')]) type="email"
                            name="email" placeholder="Enter your email" />
                        @error('email')
                            <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                    <!-- Password -->
                    <div class="">
                        <x-label for="password" class="mt-4" value="Password" />
                        <x-input type="password" id="password" wire:model="password" @class([
                            'w-full',
                            'border border-red-400' => $errors->has('password'),
                        ])
                            placeholder="Enter your password" />
                        @error('password')
                            <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                    <!-- Confirm Password -->
                    <div class="">
                        <x-label for="password_confirmation" class="mt-4" value="Confirm password" />
                        <x-input type="password" id="password_confirmation" wire:model="password_confirmation"
                            @class([
                                'w-full',
                                'border border-red-400' => $errors->has('password_confirmation'),
                            ]) type="password" name="password_confirmation"
                            placeholder="Confirm your password" />
                    </div>
                @endif

                <!-- Business Information -->
                @if ($business_info_section)
                    <!-- Business Information -->
                    <div class="mb-4">
                        <h1 class="text-lg font-bold text-gray-900">Business Information</h1>
                        <p class="mt-1 text-sm text-gray-600">
                            Please provide your business details below.
                        </p>
                    </div>
                    <!-- Business Name -->
                    <div>
                        <x-label for="text" value="Business Name" />
                        <x-input type="text" wire:model="business_name" @class([
                            'w-full',
                            'border border-red-400' => $errors->has('business_name'),
                        ])
                            placeholder="Enter your business name" />
                    </div>
                    <!-- Business Category -->
                    <div>
                        <x-label for="business_category" value="Category" />
                        <x-select wire:model="business_category_id" @class([
                            'w-full',
                            'border border-red-400' => $errors->has('business_category'),
                        ])>
                            <option value="" disabled selected>Select your business category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->en_name }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <!-- Category description -->
                    <div>
                        <x-label for="business_category_description" value="Category Description" />
                        <x-input type="text" wire:model="business_category_description" @class([
                            'w-full',
                            'border border-red-400' => $errors->has('business_category_description'),
                        ])
                            placeholder="Enter your business category description" />
                    </div>
                @endif

                <!-- Business Address -->
                @if ($business_address_section)
                    <!-- Business Information -->
                    <div class="mb-4">
                        <h1 class="text-lg font-bold text-gray-900">Business Address</h1>
                        <p class="mt-1 text-sm text-gray-600">
                            Please provide your business address details below.
                        </p>
                    </div>
                    <!-- Business Address Line 1 -->
                    <div>
                        <x-label for="line1" value="Address Line 1" />
                        <x-input type="text" wire:model="line1" @class(['w-full', 'border border-red-400' => $errors->has('line1')])
                            placeholder="Enter your business address" />
                    </div>

                    <!-- Business Address Line 2 -->
                    <div>
                        <x-label for="line2" value="Address Line 2" />
                        <x-input type="text" wire:model="line2" @class(['w-full', 'border border-red-400' => $errors->has('line2')])
                            placeholder="Enter your business address" />
                    </div>


                    <!-- Business City -->
                    <div>
                        <x-label for="city_id" value="City" />
                        <x-select id="city" @class(['w-full', 'border border-red-400' => $errors->has('city_id')]) wire:model.defer="city_id">
                            <option value="">Select City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Business State -->
                        <div>
                            <x-label for="state_code" value="State" />
                            <x-input type="text" :disabled="true" wire:model="state_code" @class([
                                'w-full uppercase',
                                'border border-red-400' => $errors->has('state_code'),
                            ])
                                placeholder="Enter your business state" />
                        </div>

                        <!-- Business Postal Code -->
                        <div>
                            <x-label for="postal_code" value="Postal Code" />
                            <x-input type="text" wire:model="postal_code" @class([
                                'w-full',
                                'border border-red-400' => $errors->has('postal_code'),
                            ])
                                placeholder="Enter your business postal code" />
                        </div>
                    </div>
                    <!-- Business Phone -->
                    <div>
                        <x-label for="phone" value="Phone" />
                        <x-input type="text" wire:model="phone" @class(['w-full', 'border border-red-400' => $errors->has('phone')])
                            placeholder="Enter your business phone number" />
                    </div>
                    <!-- Terms and Conditions -->
                    <div class=" flex items-center space-x-2">
                        <div class="pt-1">
                            <x-checkbox id="terms" wire:model="terms" name="terms" value="1"
                                @class(['border border-red-400' => $errors->has('terms')]) />
                        </div>
                        <a href="#">
                            <x-label for="terms" value="Accept terms and conditions" />
                        </a>
                    </div>
                    <!-- Submit Button -->
                    <div class="mt-8">
                        <x-button type="submit" class="w-full">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                @endif
            </div>
        </form>
        @if ($user_register_section)
            <div class="w-full mt-6">
                <x-button class="w-full" wire:click="goToBusinessInfoSection">
                    Next
                </x-button>
            </div>
        @endif

        @if ($business_info_section)
            <div class="space-y-2 mt-6">
                <x-button class="w-full" wire:click="goToBusinessAddressSection">
                    Next
                </x-button>
                <x-button variant="light" class="w-full" wire:click="backToUserRegisterSection">
                    Back
                </x-button>
            </div>
        @endif

        @if ($business_address_section)
            <div class=" mt-2">
                <x-button variant="light" class="w-full" wire:click="backToBusinessInfoSection">
                    Back
                </x-button>
            </div>
        @endif
        <div class="mt-6">
            <p class="mt-4 text-xs text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-500" wire:navigate>Sign in</a>
            </p>
        </div>
    </div>
</div>
