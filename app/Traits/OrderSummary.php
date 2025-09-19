<?php

namespace App\Traits;

trait OrderSummary
{
    public function summary()
    {
        return [
            [
                'label' => 'Items in Cart',
                'value' => $this->order ? $this->order->sales->sum('quantity') : 0,
            ],
            [
                'label' => 'Subtotal',
                'value' => $this->order ? '$' . number_format($this->order->sales->sum(function ($sale) {
                    return $sale->price * $sale->quantity;
                }), 2) : '$0.00',
            ],
            [
                'label' => 'Shipping',
                'value' => $this->order ? '$' . number_format($this->order->sales->sum(function ($sale) {
                    return $sale->shipping_cost * $sale->quantity;
                }), 2) : '$0.00',
            ],
            [
                'label' => 'Total after Tax',
                'value' => $this->order ? '$' . number_format($this->order->sales->sum(function ($sale) {
                    return ($sale->price + $sale->shipping_cost) * $sale->quantity;
                }), 2) : '$0.00',
            ],
            [
                'label' => 'Tax (10%)',
                'value' => $this->order ? '$' . number_format($this->order->sales->sum(function ($sale) {
                    return (($sale->price + $sale->shipping_cost) * 0.1) * $sale->quantity;
                }), 2) : '$0.00',
            ],
            [
                'label' => 'Discount',
                'value' => '$0.00',
            ],
            [
                'label' => 'Grand Total',
                'value' => $this->order ? '$' . number_format($this->order->sales->sum(function ($sale) {
                    return (($sale->price + $sale->shipping_cost) * 1.1) * $sale->quantity;
                }), 2) : '$0.00',
            ]
        ];
    }
}
