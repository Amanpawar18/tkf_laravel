<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\TdsController;
use App\Http\Controllers\Controller;
use App\Models\RequestWithdrawal;
use App\Models\TdsTransaction;
use App\Models\Transaction;
use App\Models\User;
use Auth;
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

            // if (request()->amount < 500) {
            //     return redirect()->route('frontend.request-withdrawal.index')->withErrors(['Requested Amount should be greater than 500']);
            // }


            if (request()->amount >= $user->wallet_balance || $user->wallet_balance - request()->amount < 0) {
                return redirect()->route('frontend.request-withdrawal.index')->withErrors(['Requested Amount is greater than wallet balance.']);
            }

            $amount = request()->amount;
            $tdsAmount = User::getTdsDeductionAmount($amount);
            $amount -= $tdsAmount;

            $data = array(
                'requested_amount' => request()->amount,
                'amount' => $amount,
                'tds_amount' => $tdsAmount,
                'acc_holder_name' => $user->acc_holder_name,
                'acc_number' => $user->acc_number,
                'bank_name' => $user->bank_name,
                'ifsc_code' => $user->ifsc_code,
                'branch_name' => $user->branch_name,
            );

            $user->requestWithdrawals()->create($data);

            $user->forceFill([
                'wallet_balance' => $user->wallet_balance - request()->amount,
            ]);
            $user->save();

            $user->createTransaction($user->id, $amount, $message = 'Requested Withdrawal', $type = Transaction::TYPE_DEBIT);

            if ($tdsAmount > 0) {
                $user->createTransaction($user->id, $tdsAmount, $message = 'Tds Deduction', $type = Transaction::TYPE_DEBIT);
                $user->createTdsTransaction($user->id, $tdsAmount);
            }

            return redirect()->route('frontend.request-withdrawal.index')->with('status', 'Request submitted successfully !!');
        } else {

            return redirect()->route('frontend.request-withdrawal.index')->withErrors(['Current password is not correct']);
        }
    }
}
