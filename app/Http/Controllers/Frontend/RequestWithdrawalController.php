<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\RequestWithdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RequestWithdrawalController extends Controller
{
    public function index()
    {
        $requestWithdrawals = RequestWithdrawal::whereUserId(Auth::id())->paginate(10);
        return view('frontend.profile.request-withdrawal', compact('requestWithdrawals'));
    }

    public function store()
    {
        request()->validate([
            'current_password' => ['required', 'string'],
        ]);


        if (Hash::check(request()->current_password, Auth::user()->password)) {

            $user = Auth::user();

            $data = array(
                'amount' => request()->amount,
                'acc_holder_name' => $user->acc_holder_name,
                'acc_number' => $user->acc_number,
                'bank_name' => $user->bank_name,
                'ifsc_code' => $user->ifsc_code,
                'branch_name' => $user->branch_name,
            );

            $user->requestWithdrawals()->create($data);

            return redirect()->route('frontend.request-withdrawal.index')->with('status', 'Request submitted successfully !!');
        } else {

            return redirect()->route('frontend.request-withdrawal.index')->withErrors(['Current password is not correct']);
        }
    }
}
