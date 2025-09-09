<?php

namespace App\Livewire\Users;

use App\Models\Search as ModelsSearch;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;

class Search extends Component
{
    #[Url(except: '')]
    public ?string $search = '';
    public $ipAddress;
    public $userAgent;
    public $user;
    public $showBoxMore = false;
    public $hiddenBoxMore = true;

    public function mount()
    {
        $this->ipAddress = request()->ip();
        $this->userAgent = request()->header('User-Agent');
        $this->user = Auth::user();
    }

    public function updatingSearch($property)
    {
        // if (strlen($this->search) >= 2) {
        //     $this->showBoxMore = true;
        //     $this->hiddenBoxMore = false;
        // }else {
        //     $this->showBoxMore = false;
        //     $this->hiddenBoxMore = true;
        // }
    }

    public function send()
    {
        $this->validate([
            'search' => 'required|string|min:2|max:255',
        ]);
        $this->getData();
        $this->redirect(route('items.index', ['search' => $this->search]), navigate: true);
    }

    public function getData() 
    {
        $isset = \App\Models\Search::where('search', $this->search)
            ->where('ip_address', $this->ipAddress)
            ->where('created_at', '>=', now()->subMinutes(10))
            ->exists();

            if ($isset || $this->search == '') {
                return;
            }
            else {
                $this->store();
            }
    }
    public function store()
    {

        ModelsSearch::create([
            'user_id' => $this->user ? $this->user->id : null,
            'ip_address' => $this->ipAddress,
            'user_agent' => $this->userAgent,
            'search' => $this->search,
        ]);
    }
    public function render()
    {
        return view('livewire.users.search');
    }
}
