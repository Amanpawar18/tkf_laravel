<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\Transaction;
use App\Models\User;
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

    public function editBankDetails()
    {
        $user = Auth::user();
        return view('frontend.profile.bank-details', compact('user'));
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
            return redirect()->route('frontend.profile.edit')->with('status', 'Password changed successfully !!');
        } else {

            return redirect()->route('frontend.profile.edit')->withErrors(['Current password is not correct']);
        }
    }

    public function updateBankDetails()
    {
        request()->validate([
            'current_password' => ['required', 'string'],
        ]);


        if (Hash::check(request()->current_password, Auth::user()->password)) {
            $user = Auth::user();
            $user->forceFill([
                'acc_holder_name' => request()->acc_holder_name,
                'acc_number' => request()->acc_number,
                'bank_name' => request()->bank_name,
                'ifsc_code' => request()->ifsc_code,
                'branch_name' => request()->branch_name,
            ]);
            $user->save();
            return redirect()->route('frontend.profile.editBankDetails')->with('status', 'Bank Details saved successfully !!');
        } else {

            return redirect()->route('frontend.profile.editBankDetails')->withErrors(['Current password is not correct']);
        }
    }

    public function update()
    {
        $user = Auth::user();
        $user->update([
            'name' => request()->name,
            'phone_no' => request()->phone_no,
        ]);
        return redirect()->route('frontend.profile.edit')->with('status', 'Profile details updated !!');
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
