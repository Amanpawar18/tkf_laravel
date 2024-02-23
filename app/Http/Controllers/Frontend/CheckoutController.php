<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Api\DelhiveryController;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $cartItems = Cart::where('user_id', Auth::id())->get();
        } else {
            $cartItems = Cart::where('session_id', session('userCartSessionId'))->get();
        }
        foreach ($cartItems as $item) {
            if (!$item->stock) {
                return redirect()->route('frontend.cart.index')->withErrors("Can't proceed for checkout some items are out of stock. Update cart and Try Again");
            }
        }
        return view('frontend.checkout.index', compact('cartItems'));
    }

    public function shipping()
    {
        if(request()->has('address_id')){
            $address = ShippingAddress::find(request()->address_id);
        } else {
            $address = $this->saveAddress();
        }
        if (Auth::check()) {
            $cartItems = Cart::where('user_id', Auth::id())->get();
        } else {
            $cartItems = Cart::where('session_id', session('userCartSessionId'))->get();
        }
        // $delhiveryObject = new DelhiveryController();
        // $isDeliveryEligible = $delhiveryObject->checkPinCode($address->pin_code);
        $isDeliveryEligible = true;
        return view('frontend.checkout.shipping', compact('cartItems', 'address', 'isDeliveryEligible'));
    }

    public function saveAddress()
    {
        $addressData = request()->except('_token');

        $addressData['user_id'] = Auth::id();

        $address = null;
        $previousAddress = ShippingAddress::where($addressData)->first();
        if ($previousAddress) {
            $address = $previousAddress;
            if (request()->status) {
                $previousAddress->status = request()->status;
                $previousAddress->save();
            }
        } else {
            $newAddress = ShippingAddress::firstOrCreate($addressData);
            $address = $newAddress;
        }
        return $address;
    }
}
