<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('frontend.profile.view', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('frontend.profile.edit', compact('user'));
    }

    public function updatePassword()
    {
        request()->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        if (Hash::check(request()->current_password, Auth::user()->password)) {
            $bcryptPassword = bcrypt(request()->password);
            $user = Auth::user();
            $user->password = $bcryptPassword;
            $user->save();
            return back()->with('status', 'Password changed successfully !!');
        } else {

            return back()->withErrors(['Current password is not correct']);
        }
    }

    public function update()
    {
        $user = Auth::user();
        $user->update([
            'name' => request()->name,
            'phone_no' => request()->phone_no,
        ]);
        return view('frontend.profile.edit', compact('user'));
    }

    public function orderHistory()
    {
        $user = Auth::user();
        $orderProducts = OrderProduct::whereUserId($user->id)->simplePaginate(10);
        return view('frontend.profile.order-history', compact('user', 'orderProducts'));
    }

    public function transactionIndex()
    {
        $user = Auth::user();
        $transactions = Transaction::whereUserId($user->id)->paginate(10);
        return view('frontend.profile.transaction', compact('user', 'transactions'));
    }

    public function referralIndex()
    {
        $user = Auth::user();
        $referredUsers = User::whereReferrerUserId($user->id)->paginate(10);
        return view('frontend.profile.referral', compact('user', 'referredUsers'));
    }
}
