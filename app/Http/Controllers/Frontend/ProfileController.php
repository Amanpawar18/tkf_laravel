<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\User;
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

    public function referralIndex ()
    {
        $user = Auth::user();
        $referredUsers = User::whereReferrerUserId($user->id)->paginate(10);
        return view('frontend.profile.referral', compact('user', 'referredUsers'));
    }
}
