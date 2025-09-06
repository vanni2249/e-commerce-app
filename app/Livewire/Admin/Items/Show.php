<?php

namespace App\Livewire\Admin\Items;

use App\Models\Item;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;

    public $item_id;

    #[Validate('max:1024')]
    public $photo;

    public function mount($item)
    {
        $this->item_id = $item;

    }

    public function save()
    {
        $this->validate();

        if ($this->photo) {
            if (is_array($this->photo)) {
                foreach ($this->photo as $photo) {
                    $photo->store('photos');
                }
            } else {
                $this->photo->store('photos');
            }
        }

        $this->photo = null;
        $this->dispatch('close-modal', 'add-images-modal');
    }

    #[Layout('components.layouts.admin')] 
    public function render()
    {
        return view('livewire.admin.items.show', [
            'item' => Item::with(['seller'])->find($this->item_id),
        ]);
    }
}
