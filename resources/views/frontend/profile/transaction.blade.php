@extends('frontend.profile.layout')
@section('profile-content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                Transacation
            </div>
            <div class="col-md-6 text-right">
                <b>
                    Wallet Balance:
                </b>
                {{Auth::user()->wallet_balance_text}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Amount</th>
                            <th>Message</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $key => $transaction)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $transaction->amount  }}</td>
                            <td>{{ Str::limit($transaction->message, 40) }}</td>
                            <td>{{ $transaction->type_text }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" align="center">No transaction found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                {{$transactions->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
