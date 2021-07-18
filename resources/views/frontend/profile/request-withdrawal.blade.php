@extends('frontend.profile.layout')
@section('profile-content')
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <b>
                    Wallet Balance:
                </b>
                {{Auth::user()->wallet_balance_text}}
            </div>
            <div class="col-md-6 text-right">
                <a href="#" data-bs-target="#requestWithdrawalModal" data-bs-toggle="modal"
                    class="btn btn-buy-now w-auto m-0">Request Withdrawal</a>
            </div>
            <div class="col-md-12 text-danger">
                <p>{{session('error')}}</p>
                <p class="text-success">{{session('status')}}</p>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                    @endforeach
                </ul>
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
                            <th>Receivable Amount</th>
                            <th>Tds Amount</th>
                            <th>Reqeusted Amount</th>
                            <th>Bank Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($requestWithdrawals as $key => $request)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>₹ {{ $request->amount  }}</td>
                            <td>₹ {{ $request->tds_amount  }}</td>
                            <td>₹ {{ $request->requested_amount  }}</td>
                            <td>{{ $request->bank_name }}</td>
                            <td>{{ $request->status_text }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" align="center">No request found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                {{$requestWithdrawals->links()}}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="requestWithdrawalModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="requestWithdrawalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="requestWithdrawalModalLabel">Request Withdrawal</h5>
            </div>
            <form action="{{route('frontend.request-withdrawal.store')}}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            Amount will be transfered to
                            <br>
                            Bank Name: <strong>{{Auth::user()->bank_name}}</strong>
                            <br>
                            Acc Holder Name: <strong>{{Auth::user()->acc_holder_name}}</strong>
                            <br>
                            Acc Number: <strong>{{Auth::user()->acc_number}}</strong>
                            <br>
                            You can update the bank details from <a
                                href="{{route('frontend.profile.editBankDetails')}}">edit bank details</a> page.
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="current_password">Current Password</label>
                            <input name="current_password" id="current_password" type="password" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="amount">Amount</label>
                            <input name="amount" id="amount" type="number" min="1" class="form-control"
                                max={{Auth::user()->wallet_balance}}>
                            @if(Setting::get('tds_percent'))
                            <small class="text-danger">
                                {{Setting::get('tds_percent')}}% will be decucted in the amount as TDS deduction.
                            </small>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @endsection
