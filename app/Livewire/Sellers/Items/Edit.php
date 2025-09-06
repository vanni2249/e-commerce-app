<?php

namespace App\Livewire\Sellers\Items;

use App\Livewire\Forms\ItemForm;
use App\Models\Item;
use App\Models\Section;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    public ItemForm $form;

    public $item_id;

    public function mount($item)
    {
        $this->item_id = $item;
        $this->form->item = Item::find($item);
        $this->form->section_id = $this->form->item->section_id;
        $this->form->seller_id = $this->form->item->seller_id;
        $this->form->en_title = $this->form->item->en_title;
        $this->form->es_title = $this->form->item->es_title;
        $this->form->en_short_description = $this->form->item->en_short_description;
        $this->form->es_short_description = $this->form->item->es_short_description;
        $this->form->en_description = $this->form->item->en_description;
        $this->form->es_description = $this->form->item->es_description;
        $this->form->en_specifications = $this->form->item->en_specifications;
        $this->form->es_specifications = $this->form->item->es_specifications;
        $this->form->en_shipping_policy = $this->form->item->en_shipping_policy;
        $this->form->es_shipping_policy = $this->form->item->es_shipping_policy;
        $this->form->en_return_policy = $this->form->item->en_return_policy;
        $this->form->es_return_policy = $this->form->item->es_return_policy;
    }

    public function save()
    {
        $this->validate();

        $this->form->store();

        return $this->redirect('/sellers/items/'.$this->item_id.'', navigate:true);
    }

    public function addEnglishSpecification()
    {
        $this->form->addEnglishSpecification();

        $this->dispatch('close-modal', 'add-english-specification-modal');
    }

    public function addSpanishSpecification()
    {
        $this->form->addSpanishSpecification();

        $this->dispatch('close-modal', 'add-spanish-specification-modal');
    }

    #[Layout('components.layouts.seller')]
    public function render()
    {
        return view('livewire.sellers.items.edit', [
            'item' => Item::find($this->item_id),
            'sections' => Section::all(),
        ]);
    }
}
