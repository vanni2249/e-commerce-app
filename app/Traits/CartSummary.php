<?php

namespace App\Traits;

trait CartSummary
{
    public function summary()
    {
        return [
            [
                'label' => 'Items in Cart',
                'value' => $this->cart ? $this->cart->products->sum('pivot.quantity') : 0,
            ],
            [
                'label' => 'Subtotal',
                'value' => $this->cart ? '$' . number_format($this->cart->products->sum(function ($product) {
                    return $product->price * $product->pivot->quantity;
                }), 2) : '$0.00',
            ],
            [
                'label' => 'Shipping',
                'value' => $this->cart ? '$' . number_format($this->cart->products->sum(function ($product) {
                    return $product->shipping_cost * $product->pivot->quantity;
                }), 2) : '$0.00',
            ],
            [
                'label' => 'Total after Tax',
                'value' => $this->cart ? '$' . number_format($this->cart->products->sum(function ($product) {
                    return ($product->price + $product->shipping_cost) * $product->pivot->quantity;
                }), 2) : '$0.00',
            ],
            [
                'label' => 'Tax (10%)',
                'value' => $this->cart ? '$' . number_format($this->cart->products->sum(function ($product) {
                    return (($product->price + $product->shipping_cost) * 0.1) * $product->pivot->quantity;
                }), 2) : '$0.00',
            ],
            [
                'label' => 'Discount',
                'value' => '$0.00',
            ],
            [
                'label' => 'Grand Total',
                'value' => $this->cart ? '$' . number_format($this->cart->products->sum(function ($product) {
                    return (($product->price + $product->shipping_cost) * 1.1) * $product->pivot->quantity;
                }), 2) : '$0.00',
            ]
        ];
    }
}
