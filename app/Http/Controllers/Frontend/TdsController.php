<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TdsTransaction;
use Illuminate\Http\Request;
use Auth;

class TdsController extends Controller
{
    public function transactionsIndex()
    {
        $transactions = TdsTransaction::whereUserId(Auth::id())
            ->when(request()->start_date, function ($query) {
                $query->whereDate('period_start', '>=', request()->start_date);
            })
            ->when(request()->end_date, function ($query) {
                $query->whereDate('period_end', '<=', request()->end_date);
            })
            ->paginate(20);
        return view('frontend.profile.tds-transaction', compact('transactions'));
    }
}
