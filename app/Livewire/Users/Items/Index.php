<?php

namespace App\Livewire\Users\Items;

use App\Models\Item;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url(except: '')]
    public $search = '';

    public $sortBy = 'created_at';

    public $sortDirection = 'desc';

    public $perPage = 24;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[Layout('components.layouts.customer')]
    public function render()
    {
        return view('livewire.users.items.index', [
            'items' => Item::query()
                ->with(['categories', 'products'])
                ->when($this->search, function ($query) {
                    $search = strtolower($this->search);
                    $words = explode(' ', $search);

                    $excludedWordsForJson = ['label', 'value'];
                    $query->where(function ($q) use ($words, $excludedWordsForJson) {
                        foreach ($words as $word) {
                            $q->orWhere(function ($sub) use ($word, $excludedWordsForJson) {
                                $sub->whereRaw('LOWER(en_title) LIKE ?', ['%' . $word . '%'])
                                    ->orWhereRaw('LOWER(en_description) LIKE ?', ['%' . $word . '%'])
                                    ->orWhereRaw('LOWER(en_short_description) LIKE ?', ['%' . $word . '%']);

                                // Solo buscar en JSON si la palabra no está excluida
                                if (!in_array($word, $excludedWordsForJson)) {
                                    $sub->orWhereRaw('LOWER(en_specifications) LIKE ?', ['%' . $word . '%']);
                                }
                            });
                        }
                    });
                })
                ->show()
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
}
