<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $cartItems = Cart::where('user_id', Auth::id())->get();
        } else {
            $cartItems = Cart::where('session_id', $this->getSessionId())->get();
        }
        return view('frontend.cart.index', compact('cartItems'));
    }

    public function getSessionId()
    {
        $sessionId = session('userCartSessionId');
        if (!isset($sessionId) && $sessionId == null) {
            session(['userCartSessionId' => uniqid()]);
            $sessionId = session('userCartSessionId');
        }
        return $sessionId;
    }

    public function store($productId)
    {

        $product = Product::find($productId);
        if(isset($product->variation_id)){
            request()->validate([
                'variation_id' => 'required'
            ]);
        }

        $data['user_id'] = Auth::id();
        $data['product_id'] = $productId;
        $data['quantity'] = request()->quantity ?? 1;
        $data['variation_id'] = request()->variation_id;
        $data['session_id'] = Auth::check() ? null : $this->getSessionId();

        $isAlreadyAdded = Cart::where(function ($query) {
            if(Auth::check()){
                $query->where('user_id', Auth::id());
            } else {
                $query->orWhere('session_id', Auth::check() ? null : $this->getSessionId());
            }
        })
            ->where('product_id',  $productId)
            ->where('quantity',  $data['quantity'])
            ->where('variation_id',  $data['variation_id'])
            ->first();

        if (!$isAlreadyAdded) {
            $cartData = Cart::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'session_id' => Auth::check() ? null : $this->getSessionId(),
                    'product_id' =>  $productId,
                    'variation_id' =>   $data['variation_id']
                ],
                $data
            );
            return redirect()->route('frontend.cart.index')->with('status', 'Product added to cart successfully !!');
        }
        return redirect()->route('frontend.cart.index')->with('status', 'Product already added to cart !!');
        // return redirect()->back()->with('status', 'Product already added to cart !!');
    }

    public function assignCartProducts()
    {
        $sessionId = session('userCartSessionId');
        if ($sessionId) {
            $cartItems = Cart::whereSessionId($sessionId)->update(['user_id' => Auth::id()]);
        }
        return true;
    }

    public function update()
    {
        if (isset(request()->item) && count(request()->item)) {
            foreach (request()->item as $key => $item) {
                $cartItem = Cart::find($key);
                $cartItem->update($item);
            }
        }
        if (request()->ajax()) {
            return true;
        }
        return redirect()->back();
    }

    public function delete(Cart $item)
    {
        $item->delete();
        return true;
    }
}
