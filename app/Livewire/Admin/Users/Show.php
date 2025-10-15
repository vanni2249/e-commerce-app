<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public $user;
    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function disableUser()
    {
        $this->user->is_active = false;
        $this->user->save();
        session()->flash('message', 'Usuario deshabilitado correctamente.');
        $this->dispatch('close-modal', 'disable-user-modal');
    }

    public function enableUser()
    {
        $this->user->is_active = true;
        $this->user->save();
        session()->flash('message', 'Usuario habilitado correctamente.');
        $this->dispatch('close-modal', 'enable-user-modal');
    }

    #[Layout('components.layouts.admin')] 
    public function render()
    {
        return view('livewire.admin.users.show', [
            'user' => $this->user
        ]);
    }
}
