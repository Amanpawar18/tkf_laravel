<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TdsTransaction;
use App\Models\User;
use Illuminate\Http\Request;

class TdsTransactionController extends Controller
{
    public function transactionIndex()
    {
        $transactions = TdsTransaction::when(request()->user_email, function ($query) {
            $query->whereHas('user', function ($userQuery) {
                $userQuery->whereEmail(request()->user_email);
            });
        })
            ->when(request()->start_date, function ($query) {
                $query->whereDate('period_start', '>=', request()->start_date);
            })
            ->when(request()->end_date, function ($query) {
                $query->whereDate('period_end', '<=', request()->end_date);
            })
            ->paginate(20);
        $users = User::all();
        return view('backend.tds.index', compact('users', 'transactions'));
    }
}
