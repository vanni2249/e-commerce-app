<?php

namespace App\Livewire\Users\Checkout;

use App\Models\Address;
use App\Models\Cart;
use App\Models\User;
use App\Traits\CartSummary;
use App\Traits\OrderNumber;
use App\Traits\SaleNumber;
use App\Traits\TransactionNumber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class Index extends Component
{
    use TransactionNumber;
    use OrderNumber;
    use CartSummary;
    use SaleNumber;


    public $user;
    public $address;
    public $cart;
    public $name;
    public $cardNumber;
    public $expMonth;
    public $expYear;
    public $cvc;
    public $amount;
    public $paymentMethod;
    public $status;

    public function mount()
    {
        $this->user = Auth::user();
        $this->address = $this->user->address;

        if (!$this->address) {

            session()->flash('error', 'Please add an address before proceeding to checkout. All addresses must be approved to complete the order.');

            return $this->redirect('/addresses', navigate: true);
        }

        $this->cart = Cart::where('user_id', $this->user->id)
            ->with('products', 'products.item')
            ->doesntHave('order')
            ->first();

        $this->amount = $this->cart ? $this->cart->products->sum(function ($product) {
            return (($product->price + $product->shipping_cost) * 1.1) * $product->pivot->quantity;
        }) : 0.00;
    }

    public function setAddress($addressId)
    {
        $this->address = $this->user->addresses()->where('id', $addressId)->first();

        $this->dispatch('close-modal', 'change-address-modal');
    }

    #[On('makePayment', ['paymentMethod'])]
    public function makePayment($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;


        DB::transaction(function () {

            // Stripe::setApiKey(env('STRIPE_SECRET'));
            // try {
            //     $amountInCents = (int) round($this->amount * 100);

            //     $paymentIntent = PaymentIntent::create([
            //         'amount' => $amountInCents,
            //         'currency' => 'usd',
            //         'customer' => $this->user->stripe_id,
            //         'payment_method' => $this->paymentMethod,
            //         'off_session' => true,
            //         'confirm' => true,
            //         'automatic_payment_methods' => [
            //             'enabled' => true,
            //             'allow_redirects' => 'never',
            //         ],
            //         'metadata' => [
            //             'user_id' => $this->user->id,
            //             'cart_id' => $this->cart->id,
            //         ],
            //     ]);
            // } catch (\Exception $e) {
            //     session()->flash('error', 'Error processing order: ' . $e->getMessage());
            //     return;
            // }

            $paymentIntent = ['id' => 'pi_123456789', 'status' => 'succeeded'];

            $transaction = $this->user->transactions()->create([
                'number' => $this->createTransactionNumber(),
                'cart_id' => $this->cart->id, // Assuming you have a cart session
                'amount' => $this->amount, // Example amount
                'status' => $paymentIntent['status'], // Example status
                'payment_method' => $this->paymentMethod, // Example payment method
                'transaction_id' => $paymentIntent['id'], // Unique transaction ID
            ]);

            // Check if the transaction was successful
            if ($transaction->status == 'succeeded') {
                // For example, if you have an Order model:
                $order = $this->user->orders()->create([
                    'number' => $this->createOrderNumber(),
                    'transaction_id' => $transaction->id,
                    'cart_id' => $this->cart->id, // Assuming you have a cart session
                    'address_id' => $this->address ? $this->address->id : null,
                    'status' => 'completed', // Example order status
                ]);
            }

            // Foreach item in the cart, you can create a sale record
            foreach ($this->cart->products as $product) {
                $order->sales()->create([
                    'number' => $this->createSaleNumber(),
                    'product_id' => $product->id,
                    'quantity' => $product->pivot->quantity,
                    'price' => $product->price,
                    'shipping_cost' => $product->shipping_cost ?? 0.00, // Assuming you have a shipping cost
                    'percentage_fee' => $product->item->section->percentage, // Assuming no percentage fee
                    'fixed_fee' => 0.00, // Assuming no fixed fee
                    'seller_id' => $product->item->user_id ?? null, // Assuming the product has a seller
                ]);
            }

            // return redirect()->route('completed', ['order' => $order->id]);
            return $this->redirect('/completed/orders/' . $order->id, navigate: true);
        });
    }

    #[Layout('components.layouts.customer')]
    public function render()
    {
        return view('livewire.users.checkout.index', [
            'products' => $this->cart->products ?? [],
            'addresses' => Address::with(['user', 'city', 'state'])
                ->where('user_id', $this->user->id)
                ->get(),
            'summary' => $this->summary(),
        ]);
    }
}
