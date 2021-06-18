<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RequestWithdrawal;
use Illuminate\Http\Request;

class RequestWithdrawalController extends Controller
{
    public function index()
    {
        $requestWithdrawals = RequestWithdrawal::paginate(10);
        return view('backend.request-withdrawal.index', compact('requestWithdrawals'));
    }

    public function edit(RequestWithdrawal $requestWithdrawal)
    {
        return view('backend.request-withdrawal.view', compact('requestWithdrawal'));
    }

}
