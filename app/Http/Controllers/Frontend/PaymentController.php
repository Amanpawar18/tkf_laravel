<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;

class PaymentController extends Controller
{
    public function receivePayment()
    {

        $stripe = \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $this->arrangeLineItems(),
            'mode' => 'payment',
            'success_url' => route('frontend.stripe.success'),
            'cancel_url' => route('frontend.stripe.cancel'),
        ]);

        session()->put('stripeCheckoutSessionId', $checkout_session->id);
        session()->put('stripePaymentSessionId', $checkout_session->payment_intent);
        session()->put('orderAddressId', request()->addressId);

        return json_encode(['id' => $checkout_session->id]);
    }

    public function stripeSuccess()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $paymentIntent = $stripe->paymentIntents->retrieve(
            session('stripePaymentSessionId'),
            []
        );


        $orderData['user_id'] = Auth::id();
        $orderData['payment_status'] = Order::PAYMENT_COMPLETED;
        $orderData['stripe_payment_id'] = $paymentIntent->id;
        $orderData['total_amount'] = $this->cartTotal();
        $orderData['address_id'] = session('orderAddressId');

        $order = Order::create($orderData);
        $this->addOrderProducts($order);
        $this->deleteSessionData();
        return redirect()->route('frontend.profile.show')->with('status', 'Order placed successfully !!');
    }

    public function stripeCancel()
    {
        $this->deleteSessionData();
        return redirect()->route('frontend.checkout')->with('error', 'Failed to place order !!');
    }

    public function addOrderProducts($order)
    {
        if (Auth::check()) {
            $cartItems = Cart::where('user_id', Auth::id())->get();
        } else {
            $cartItems = Cart::where('session_id', session('userCartSessionId'))->get();
        }

        foreach ($cartItems as $item) {

            $order->orderProducts()->create([
                'user_id' => Auth::id(),
                'product_id' => $item->product->id,
                'size' => $item->size,
                'quantity' => $item->quantity,
                'amount' => $item->quantity * $item->product->cost,
            ]);

            $item->delete();
        }
        return true;
    }

    public function cartTotal()
    {
        $cartTotal = 0;
        if (Auth::check()) {
            $cartItems = Cart::where('user_id', Auth::id())->get();
        } else {
            $cartItems = Cart::where('session_id', session('userCartSessionId'))->get();
        }

        foreach ($cartItems as $item) {
            // Adding the product cost in cart total
            $cartTotal += $item->quantity * $item->product->cost;
        }

        return $cartTotal;
    }

    public function deleteSessionData()
    {
        session()->forget('stripeCheckoutSessionId');
        session()->forget('stripePaymentSessionId');
        session()->forget('orderAddressId');
    }

    public function arrangeLineItems()
    {
        $lineItems = [];
        if (Auth::check()) {
            $cartItems = Cart::where('user_id', Auth::id())->get();
        } else {
            $cartItems = Cart::where('session_id', session('userCartSessionId'))->get();
        }

        foreach ($cartItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $item->product->cost * 100,
                    'product_data' => [
                        'name' =>  $item->product->name,
                        'images' =>  [$item->product->image_path],
                    ],
                ],
                'quantity' => $item->quantity,
            ];
        }
        return $lineItems;
    }
}
// $checkout_session = \Stripe\Checkout\Session::create([
//     'payment_method_types' => ['card'],
//     'line_items' => [[
//         'price_data' => [
//             'currency' => 'usd',
//             'unit_amount' => $this->cartTotal() * 100,
//             'product_data' => [
//                 'name' => 'Stubborn Attachments',
//                 'images' => ["https://i.imgur.com/EHyR2nP.png"],
//             ],
//         ],
//         'quantity' => 1,
//     ]],
//     'mode' => 'payment',
//     'success_url' => route('frontend.stripe.success'),
//     'cancel_url' => route('frontend.stripe.cancel'),
// ]);
