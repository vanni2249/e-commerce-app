<?php

namespace App\Livewire\Users\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $user;
    public $name;
    public $email;
    public $phone;
    public $old_password;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function saveData()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user->id,
        ]);

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('message.save-data', 'Updated successfully.');
    }

    public function changePassword()
    {
        $this->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if (!\Hash::check($this->old_password, $this->user->password)) {
            $this->addError('old_password', 'The provided password does not match your current password.');
            return;
        }

        $this->user->update([
            'password' => bcrypt($this->password),
        ]);

        // Clear the password fields
        $this->old_password = '';
        $this->password = '';
        $this->password_confirmation = '';

        session()->flash('message.change-password', 'Password changed successfully.');
    }

    #[Layout('layouts.user')] 
    public function render()
    {
        return view('livewire.users.profile.index');
    }
}
