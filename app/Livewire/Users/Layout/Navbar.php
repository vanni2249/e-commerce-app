<?php

namespace App\Livewire\Users\Layout;

use App\Models\Search as ModelsSearch;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class Navbar extends Component
{
    public $user;
    public $cart;
    public $count = 10;

    #[Url(except: '')]
    public ?string $search = '';
    public $ipAddress;
    public $userAgent;
    public $showBoxMore = false;
    public $hiddenBoxMore = true;

    #[On('update-counter-products')]
    public function mount()
    {
        $this->user = Auth::user();
        $this->cart = ($this->user && $this->user->cart)
            ? $this->user->cart->where('type', 'cart')->doesntHave('order')->first()
            : null;
        if ($this->user && $this->cart) {
            $this->count = $this->cart->products->sum(function ($product) {
            return $product->pivot->quantity;
            });
        }
        else {
            $this->count = 0;
        }

        $this->ipAddress = request()->ip();
        $this->userAgent = request()->header('User-Agent');
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
        return view('livewire.users.layout.navbar');
    }
}
