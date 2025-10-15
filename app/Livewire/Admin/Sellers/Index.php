<?php

namespace App\Livewire\Admin\Sellers;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.sellers.index', [
            'sellers' => \App\Models\Seller::when('search', function ($search) {

                $search->where('store_name', 'like', '%' . $this->search . '%')
                    ->orWhere('contact_email', 'like', '%' . $this->search . '%');
            })->paginate($this->perPage),
        ]);
    }
}
