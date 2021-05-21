<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\OrderPlaceMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;
use Log;


class RazorpayPaymentController extends Controller
{
    public static function orderCreate()
    {
        $amount = request()->sub_total;
        $currency = "INR";
        $orderId = null;
        try {
            $api = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));

            $order  = $api->order->create([
                'receipt'         => 'order_rcptid_' . time(),
                'amount'          => $amount * 100, // amount in the smallest currency unit
                'currency'        => $currency,
                'payment_capture' =>  1
            ]);
            $orderId = $order->id;
        } catch (\Exception $e) {
            Log::error("razorpay payment error", [$e->getMessage()]);
        }
        return $orderId;
    }

    public function orderSave()
    {
        // dd(request()->all());
        $orderData['user_id'] = Auth::id();
        $orderData['payment_status'] = Order::PAYMENT_COMPLETED;
        $orderData['razorpay_order_id'] = request()->razorpay_order_id;
        $orderData['razorpay_payment_id'] = request()->razorpay_payment_id;
        $orderData['razorpay_signature'] = request()->razorpay_signature;
        $orderData['address_id'] = request()->address;
        $orderData['total_amount'] = $this->cartTotal();

        $order = Order::create($orderData);
        $this->addOrderProducts($order);
        if(Auth::user()){
            Mail::to(Auth::user()->email)->send(new OrderPlaceMail($order));
        }
        return route('frontend.thankYouPage');
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
                'variation_id' => $item->variation_id,
                'quantity' => $item->quantity,
                'amount' => $item->quantity * $item->product_cost,
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
            $cartTotal += $item->quantity * $item->product_cost;
        }

        if($cartTotal < 500){
            $cartTotal += 50 ; // shipping charges
        }

        return $cartTotal;
    }

    public function handlePayment(Request $request)
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        try {

            $razorpayPaymentId = $request->razorpay_payment_id;
            $razorpayOrderId = $request->razorpay_order_id;
            $razorpaySignature = $request->razorpay_signature;
            $apiSecret = env('RAZORPAY_API_SECRET');

            $expectedSignature = hash_hmac('sha256', $razorpayOrderId . '|' . $razorpayPaymentId, $apiSecret);


            $api = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));
            // payment successfull
            if ($razorpaySignature == $expectedSignature) {
                $payment = $api->payment->fetch($razorpayPaymentId);
                if ($payment) {
                    echo $payment->id;
                    echo '<br>';
                    echo $payment->amount;
                }
                // dd($payment);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
