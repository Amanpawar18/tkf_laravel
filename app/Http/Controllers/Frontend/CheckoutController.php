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
        return view('frontend.checkout.index', compact('cartItems'));
    }

    public function shipping()
    {
        $address = $this->saveAddress();
        if (Auth::check()) {
            $cartItems = Cart::where('user_id', Auth::id())->get();
        } else {
            $cartItems = Cart::where('session_id', session('userCartSessionId'))->get();
        }
        $delhiveryObject = new DelhiveryController();
        $isDeliveryEligible = $delhiveryObject->checkPinCode($address->pin_code);
        return view('frontend.checkout.shipping', compact('cartItems', 'address', 'isDeliveryEligible'));
    }

    public function saveAddress()
    {
        $addressData = request()->except('_token');

        $addressData['user_id'] = Auth::id();

        $address = null;
        $previousAddress = ShippingAddress::where($addressData)->first();
        if($previousAddress){
            $address = $previousAddress;
            if(request()->status){
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
