<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $orderProducts = OrderProduct::whereUserId($user->id)->simplePaginate(10);
        return view('frontend.profile.view', compact('user', 'orderProducts'));
    }

    public function orderHistory()
    {
        $user = Auth::user();
        $orderProducts = OrderProduct::whereUserId($user->id)->simplePaginate(10);
        return view('frontend.profile.order-history', compact('user', 'orderProducts'));
    }
}
