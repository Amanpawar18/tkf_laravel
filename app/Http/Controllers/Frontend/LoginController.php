<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function view()
    {
        return view('auth.login');
    }

    public function loginAttempt(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password]) && Auth::guard()->check()) {

            if (Auth::user()->status == User::ACTIVE) {
                $this->assignCartProducts();

                return redirect()->intended(route('frontend.profile.show'));
            } else {
                Auth::logout();
                return redirect()->back()->withInput()->with('error', "Your account is temporary blocked kindly contact admin to reactivate account !!");
            }
        } else {
            return redirect()->back()->withInput()->with('error', "We didn't find any matching record please try again !!");
        }
    }

    public function assignCartProducts()
    {
        $sessionId = session('userCartSessionId');

        if ($sessionId) {
            $sessionCartItems = Cart::whereSessionId($sessionId)->get();

            foreach ($sessionCartItems as $cartItem) {
                Cart::firstOrCreate([
                    'user_id' => Auth::id(),
                    'session_id' => null,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'size' => $cartItem->size,
                ]);
                $cartItem->delete();
            }
        }

        session()->forget('userCartSessionId');
        return true;
    }
}
