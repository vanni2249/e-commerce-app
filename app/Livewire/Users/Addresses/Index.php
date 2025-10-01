<?php

namespace App\Livewire\Users\Addresses;

use App\Models\Address;
use App\Models\City;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $user;
    public $address;
    public $type;
    public $name;
    public $line1;
    public $line2;
    public $city_id;
    public $state_code;
    public $postal_code;
    public $is_default;
    public $phone;

    public function mount()
    {
        $this->user = Auth::user();
        $this->type = 'business';
        $this->name = $this->user->name;
        $this->state_code = 'pr';
        $this->phone = $this->user->phone;
        $this->is_default = false;
    }

    public function storeAddress()
    {
        $this->validateFunction();

        if ($this->user->addresses()->count() == 0) {
            $this->is_default = true;
        }

        Address::create([
            'user_id' => $this->user->id,
            'type' => $this->type,
            'name' => $this->name,
            'line1' => $this->line1,
            'line2' => $this->line2,
            'city_id' => $this->city_id,
            'state_code' => $this->state_code,
            'postal_code' => $this->postal_code,
            'is_default' => $this->is_default ? true : false,
            'phone' => $this->phone,
        ]);

        // Reset form fields
        $this->reset(['type', 'name', 'line1', 'line2', 'city_id', 'state_code', 'postal_code', 'is_default', 'phone']);
        $this->type = 'business';
        $this->name = $this->user->name;
        $this->state_code = 'pr';
        $this->phone = $this->user->phone;

        $this->dispatch('close-modal', 'create-address-modal');

        // Send flash message
        session()->flash('notify', 'Address added successfully!');


    }

    public function updateAddressModal($addressId)
    {
        $this->dispatch('open-modal', 'update-address-modal');
        $this->address = Address::findOrFail($addressId);
        $this->type = $this->address->type;
        $this->name = $this->address->name;
        $this->line1 = $this->address->line1;
        $this->line2 = $this->address->line2;
        $this->city_id = $this->address->city_id;
        $this->state_code = $this->address->state_code;
        $this->postal_code = $this->address->postal_code;
        $this->phone = $this->address->phone;
    }

    public function updateAddress()
    {
        $this->validateFunction();

        $this->address->update([
            'type' => $this->type,
            'name' => $this->name,
            'line1' => $this->line1,
            'line2' => $this->line2,
            'city_id' => $this->city_id,
            'state_code' => $this->state_code,
            'postal_code' => $this->postal_code,
            'phone' => $this->phone,
        ]);

        session()->flash('notify', 'Address updated successfully!');

        $this->dispatch('close-modal', 'update-address-modal');
    }

    public function validateFunction()
    {
        return $this->validate([
            'type' => 'required|in:residencial,business',
            'name' => 'required|string|max:255',
            'line1' => 'required|string|max:255',
            'line2' => 'nullable|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'state_code' => 'nullable|string|max:10',
            'postal_code' => 'required|string|max:20',
            'is_default' => 'sometimes|boolean',
            'phone' => 'required|string|max:20',
        ]);
    }

    public function setDefaultAddressModal($addressId)
    {
        $this->dispatch('open-modal', 'set-default-address-modal');
        $this->address = Address::findOrFail($addressId);
    }

    public function setDefaultAddress()
    {
        // Unset previous default address
        Address::where('user_id', $this->user->id)->where('is_default', true)->update(['is_default' => false]);

        // Set new default address
        $this->address->update(['is_default' => true]);

        $this->dispatch('close-modal', 'set-default-address-modal');
    }

    public function removeAddressModal($addressId)
    {
        $this->dispatch('open-modal', 'remove-address-modal');
        $this->address = Address::findOrFail($addressId);
    }

    public function removeAddress()
    {
        if ($this->address->is_default) {
            // If the address being deleted is the default, set another address as default
            $anotherAddress = Address::where('user_id', $this->user->id)
                ->where('id', '!=', $this->address->id)
                ->first();

            if ($anotherAddress) {
                $anotherAddress->update(['is_default' => true]);
            }
        }

        $this->address->delete();

        session()->flash('notify', 'Address removed successfully!');

        $this->dispatch('close-modal', 'remove-address-modal');
    }

    #[Layout('components.layouts.customer')]
    public function render()
    {
        return view('livewire.users.addresses.index', [
            'addresses' => Address::with(['user', 'city', 'state'])
                ->where('user_id', $this->user->id)
                ->get(),
            'cities' => City::all(),
            'states' => State::all()
        ]);
    }
}
