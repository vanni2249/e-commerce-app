<?php

namespace App\Livewire\Auth\Users;

use App\Models\User;
use App\Traits\UserNumber;
use App\Traits\UserUlid;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    use UserUlid, UserNumber;
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

        $validated['ulid'] = $this->createUserUlid();
        $validated['number'] = $this->createUserNumber();

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        $user->favorites()->create([
            'is_default' => true,
        ]);

        Auth::login($user);

        $this->redirect(route('welcome', absolute: false), navigate: true);
    }
    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.users.auth.register');
    }
}
