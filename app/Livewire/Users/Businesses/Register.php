<?php

namespace App\Livewire\Users\Businesses;

use App\Models\User;
use Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

class Register extends Component
{
    public $user_register_section = true;

    public $user_register_completed = false;

    public $business_info_section = false;

    public $business_info_completed = false;

    public $business_address_section = false;

    public $business_address_completed = false;

    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public string $business_name = '';

    public $business_category_id = '';

    public $business_category_description = '';

    public $line1 = '';
    public $line2 = ''; 

    public $city_id = '';

    public $state_code = '';

    public $postal_code = '';

    public $phone = '';

    public bool $terms = false;

    public function mount()
    {
        $this->state_code = 'pr';
    }

    public function goToUserRegisterSection()
    {
        $this->user_register_completed = false;
        $this->business_info_completed = false;
        $this->business_address_completed = false;

        $this->user_register_section = true;
        $this->business_info_section = false;
        $this->business_address_section = false;
    }
    public function goToBusinessInfoSection()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $this->user_register_completed = true;

        $this->user_register_section = false;
        $this->business_info_section = true;
        $this->business_address_section = false;
    }

    public function goToBusinessAddressSection()
    {
        $this->validate([
            'business_name' => 'required|string|max:255',
            'business_category_id' => 'required|exists:business_categories,id',
            'business_category_description' => 'required|string|max:255',
        ]);
        $this->business_info_completed = true;

        $this->user_register_section = false;
        $this->business_info_section = false;
        $this->business_address_section = true;
    }

    public function backToUserRegisterSection()
    {
        $this->user_register_section = true;
        $this->business_info_section = false;
        $this->business_address_section = false;
    }

    public function backToBusinessInfoSection()
    {
        $this->validate([
            'business_name' => 'required|string|max:255',
            'business_category_id' => 'required|exists:business_categories,id',
            'business_category_description' => 'required|string|max:255',
        ]);
        $this->user_register_section = false;
        $this->business_info_section = true;
        $this->business_address_section = false;
    }

    public function register()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'business_name' => 'required|string|max:255',
            'business_category_id' => 'required|exists:business_categories,id',
            'business_category_description' => 'required|string|max:255',
            'line1' => 'required|string|max:255',
            'line2' => 'nullable|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'state_code' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'terms' => 'accepted',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        $user->favorites()->create([
            'is_default' => true,
        ]);
        
        // Create the business
        $business = $user->business()->create([
            'name' => $this->business_name,
            'business_category_id' => $this->business_category_id,
            'description' => $this->business_category_description,
        ]);

        $user->address()->create([
            'type' => 'business',
            'name' => $this->business_name,
            'line1' => $this->line1,
            'line2' => $this->line2,
            'city_id' => $this->city_id,
            'state_code' => $this->state_code,
            'postal_code' => $this->postal_code,
            'phone' => $this->phone,
            'is_default' => false,
        ]);
        
        // Log the user in
        Auth::login($user);
        
        // Redirect to a desired page, e.g., business dashboard
        $this->redirect(route('welcome', absolute: false), navigate: true);
        // return redirect()->route('business.dashboard');
    }

    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.users.businesses.register',[
            'categories' => \App\Models\BusinessCategory::all(),
            'states' => \App\Models\State::all(),
            'cities' => \App\Models\City::all(),
        ]);
    }
}
