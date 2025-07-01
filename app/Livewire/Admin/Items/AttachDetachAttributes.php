<?php

namespace App\Livewire\Admin\Items;

use App\Models\Attribute;
use Livewire\Component;

class AttachDetachAttributes extends Component
{
    public $item;

    public $attrs;

    public $selectedAttributes = [];

    public function mount($item)
    {
        $this->item = $item;
        $this->attrs = Attribute::all();
        $this->selectedAttributes = $item->attributes->pluck('id')->toArray();
    }

    public function sync()
    {
        $this->item->attributes()->sync($this->selectedAttributes);

        session()->flash('message', 'Attributes attached successfully.');

        $this->redirect(route('admin.items.show', $this->item->id . '#attributes'));
    }
    public function render()
    {
        return view('livewire.admin.items.attach-detach-attributes');
    }
}
