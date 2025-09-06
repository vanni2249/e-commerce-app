<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ItemForm extends Form
{
    public $item;
    public $section_id;
    public $seller_id;
    public $en_title;
    public $es_title;
    public $en_short_description;
    public $es_short_description;
    public $en_description;
    public $es_description;
    public $en_specifications =  [];
    public $new_en_specification = [];
    public $es_specifications = [];
    public $new_es_specification = [];
    public $en_shipping_policy;
    public $es_shipping_policy;
    public $en_return_policy;
    public $es_return_policy;

    public function rules(): array
    {
        return [
            'section_id' => 'required|exists:sections,id',
            'en_title' => 'required|string|max:120',
            'es_title' => 'nullable|string|max:120',
            'en_short_description' => 'nullable|string|max:255',
            'es_short_description' => 'nullable|string|max:255',
            'en_description' => 'nullable|string',
            'es_description' => 'nullable|string',
            'en_specifications' => 'nullable|array',
            'es_specifications' => 'nullable|array',
        ];
    }

    public function addEnglishSpecification()
    {
        $this->validate([
            'new_en_specification.label' => 'required|string|max:100',
            'new_en_specification.value' => 'required|string|max:255',
        ]);

        $this->en_specifications[] = [
            'label' => $this->new_en_specification['label'],
            'value' => $this->new_en_specification['value'],
        ];

        
        $this->new_en_specification = [];
    }

    public function addSpanishSpecification()
    {
        $this->validate([
            'new_es_specification.label' => 'required|string|max:100',
            'new_es_specification.value' => 'required|string|max:255',
        ]);

        $this->es_specifications[] = [
            'label' => $this->new_es_specification['label'],
            'value' => $this->new_es_specification['value'],
        ];

        
        $this->new_es_specification = [];
    }
    
    public function store()
    {
        $this->item->update([
            'section_id' => $this->section_id,
            'seller_id' => $this->seller_id !== null ? $this->seller_id : 0,
            'en_title' => $this->en_title,
            'es_title' => $this->es_title,
            'en_short_description' => $this->en_short_description,
            'es_short_description' => $this->es_short_description,
            'en_description' => $this->en_description,
            'es_description' => $this->es_description,
            'en_specifications' => $this->en_specifications,
            'es_specifications' => $this->es_specifications,
            'en_shipping_policy' => $this->en_shipping_policy,
            'es_shipping_policy' => $this->es_shipping_policy,
            'en_return_policy' => $this->en_return_policy,
            'es_return_policy' => $this->es_return_policy,
        ]);
    }
}
