<?php

namespace App\Livewire\Admin\Items;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    public $admin;

    public $item;

    public $is_active;

    public $approved_by;

    public $approved_at;

    public $available_at;

    public function mount($item)
    {
        $this->admin = Auth::guard('admin')->check();
        $this->item = Item::with(['seller', 'seller.user'])->findOrFail($item);
        $this->is_active = $this->item->is_active;
        $this->approved_by = $this->item->approvedBy->name ?? '';
        $this->approved_at = $this->item->approved_at;
        $this->available_at = $this->item->available_at;

    }


    // public function addEnglishSpecification()
    // {
    //     $this->validate([
    //         'new_en_specification.label' => 'required|string|max:100',
    //         'new_en_specification.value' => 'required|string|max:255',
    //     ]);

    //     $this->en_specifications[] = [
    //         'label' => $this->new_en_specification['label'],
    //         'value' => $this->new_en_specification['value'],
    //     ];

    //     $this->item->update([
    //         'en_specifications' => $this->en_specifications,
    //     ]);

    //     $this->new_en_specification = [];

    //     $this->dispatch('close-modal', 'new_en_specification-modal');
    // }

    // public function removeEnglishSpecification($index)
    // {
    //     if (isset($this->en_specifications[$index])) {
    //         unset($this->en_specifications[$index]);
    //         $this->en_specifications = array_values($this->en_specifications); // Reindex the array

    //         $this->item->update([
    //             'en_specifications' => $this->en_specifications,
    //         ]);
    //     }
    // }

    // public function addSpanishSpecification()
    // {
    //     $this->validate([
    //         'new_es_specification.label' => 'required|string|max:100',
    //         'new_es_specification.value' => 'required|string|max:255',
    //     ]);

    //     $this->es_specifications[] = [
    //         'label' => $this->new_es_specification['label'],
    //         'value' => $this->new_es_specification['value'],
    //     ];

    //     $this->item->update([
    //         'es_specifications' => $this->en_specifications,
    //     ]);

    //     $this->new_es_specification = [];

    //     $this->dispatch('close-modal', 'new_es_specification-modal');
    // }

    // public function removeSpanishSpecification($index)
    // {
    //     if (isset($this->es_specifications[$index])) {
    //         unset($this->es_specifications[$index]);
    //         $this->es_specifications = array_values($this->es_specifications); // Reindex the array

    //         $this->item->update([
    //             'es_specifications' => $this->es_specifications,
    //         ]);
    //     }
    // }


    public function approveItem()
    {
        $this->validate([
            'available_at' => 'required'
        ]);


        $this->item->update([
            'is_active' => true,
            'approved_by' => Auth::guard('admin')->user()->id,
            'approved_at' => now(),
            'available_at' => $this->available_at,
        ]);

        $this->is_active = $this->item->is_active;
        $this->approved_by = $this->item->approvedBy->name ?? '';
        $this->approved_at = $this->item->approved_at;
        $this->available_at = $this->item->available_at;

        $this->dispatch('close-modal', 'approved-modal');
    }

    public function setAvailableAt()
    {
        $this->item->update([
            'available_at' => $this->available_at,
        ]);

        $this->available_at = $this->item->available_at;

        $this->dispatch('close-modal', 'available-at-modal');
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.items.edit');
    }
}
