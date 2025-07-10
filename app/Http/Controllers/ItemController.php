<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        $item->load([
            'attributes',
            'attributes.variants' => function($query) use ($item) {
                $query->where('item_id', $item->id);
            },
            'products',
            'products.variants',
            'products.variants.attribute'
        ]);

        return view('admin.items.show', [
            'item' => $item,
        ]);
    }

}
