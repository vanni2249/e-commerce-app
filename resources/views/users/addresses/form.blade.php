<div class="grid grid-cols-3 gap-2">
    <!-- Type -->
    <div class="col-span-full">
        <x-label for="type" value="Type" />
        <x-select id="type" class="w-full" wire:model.defer="type">
            <option value="">Select Type</option>
            <option value="postal">Postal</option>
            <option value="residencial">Residencial</option>
            @if (Auth::user()->business)
                <option value="business">Business</option>
            @endif
        </x-select>
        @error('type')
            <x-error message="{{ $message }}" />
        @enderror
    </div>
    <!-- Name -->
    <div class="col-span-full">
        <x-label for="name" value="Name" />
        <x-input id="name" type="text" class="w-full" wire:model.defer="name" />
        @error('name')
            <x-error message="{{ $message }}" />
        @enderror
    </div>
    <!-- Line 1 -->
    <div class="col-span-full">
        <x-label for="line1" value="Line 1" />
        <x-input id="line1" type="text" class="w-full" wire:model.defer="line1" />
        @error('line1')
            <x-error message="{{ $message }}" />
        @enderror
    </div>
    <!-- Line 2 -->
    <div class="col-span-full">
        <x-label for="line2" value="Line 2" />
        <x-input id="line2" type="text" class="w-full" wire:model.defer="line2" />
        @error('line2')
            <x-error message="{{ $message }}" />
        @enderror
    </div>
    <!-- City -->
    <div class="col-span-2">
        <x-label for="city" value="City" />
        <x-select id="city" class="w-full" wire:model.defer="city_id">
            <option value="">Select City</option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </x-select>
        @error('city_id')
            <x-error message="{{ $message }}" />
        @enderror
    </div>
    <!-- State -->
    <div class="col-span-1">
        <x-label for="state" value="State" />
        <x-input id="state" type="text" class="w-full uppercase" wire:model.defer="state_code" disabled />
        @error('state_code')
            <x-error message="{{ $message }}" />
        @enderror
    </div>
    <!-- Postal Code -->
    <div class="col-span-1">
        <x-label for="postal_code" value="Postal Code" />
        <x-input id="postal_code" type="text" class="w-full" wire:model.defer="postal_code" />
    </div>
    <!-- Phone -->
    <div class="col-span-2">
        <x-label for="phone" value="Phone" />
        <x-input id="phone" type="text" class="w-full" wire:model.defer="phone" />
    </div>
    <div class="col-span-2 space-y-2 flex flex-col">
        @error('postal_code')
            <x-error message="{{ $message }}" />
        @enderror
        @error('phone')
            <x-error message="{{ $message }}" />
        @enderror
    </div>
    <!-- Button -->
    <div class="col-span-full">
        <x-button type="submit" wire:loading.remove value="Save Address" />
        <x-button-loading wire:loading />
    </div>
</div>
