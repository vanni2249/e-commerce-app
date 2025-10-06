<?php

namespace App\Livewire\Users\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Component;

class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public bool $terms = true;

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'terms' => ['accepted'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        $user->favorites()->create([
            'is_default' => true,
        ]);

        $user->ipAddresses()->create([
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        Auth::login($user);

        $this->redirect(route('welcome', absolute: false), navigate: true);
    }
    public function render()
    {
        return view('livewire.users.auth.register');
    }
}
