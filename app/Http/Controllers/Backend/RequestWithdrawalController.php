<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RequestWithdrawal;
use App\Models\Transaction;
use Illuminate\Http\Request;

class RequestWithdrawalController extends Controller
{
    public function index()
    {
        $requestWithdrawals = RequestWithdrawal::when(request()->has('status'), function ($query) {
            $query->whereStatus(request()->status);
        })->paginate(10);
        return view('backend.request-withdrawal.index', compact('requestWithdrawals'));
    }

    public function edit(RequestWithdrawal $requestWithdrawal)
    {
        return view('backend.request-withdrawal.edit', compact('requestWithdrawal'));
    }

    public function update(RequestWithdrawal $requestWithdrawal)
    {
        $requestWithdrawal->update(request()->all());
        if (request()->status == RequestWithdrawal::STATUS_DECLINE) {

            $requestWithdrawal->user->forceFill([
                'wallet_balance' => $requestWithdrawal->user->wallet_balance + $requestWithdrawal->amount,
            ]);
            $requestWithdrawal->user->save();
            $requestWithdrawal->user->createTransaction(
                $requestWithdrawal->user->id,
                $requestWithdrawal->amount,
                $message = 'Requested Withdrawal Refund',
                $type = Transaction::TYPE_CREDIT
            );
        }
        return redirect()->route('admin.request-withdrawal.edit', $requestWithdrawal->id)->with('status', 'Request updated successfully !!');
    }
}
