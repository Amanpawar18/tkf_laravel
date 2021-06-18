@extends('frontend.profile.layout')
@section('profile-content')
<div class="row">
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
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header bg-transparent">
                Update Password
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8 mx-auto">
                        <form method="POST" action="{{ route('frontend.profile.updateBankDetails') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="current_password">Current Password*</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="current_password" name="current_password" type="password" required=""
                                        class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="acc_holder_name">Acc Holder Name*</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="acc_holder_name" value="{{$user->acc_holder_name}}" name="acc_holder_name" type="text" required="" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="bank_name">Bank Name*</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="bank_name" value="{{$user->bank_name}}" name="bank_name" type="text" required="" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="ifsc_code">Ifsc Code*</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="ifsc_code" value="{{$user->ifsc_code}}" name="ifsc_code" type="text" required="" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="branch_name">Branch Name*</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="branch_name" value="{{$user->branch_name}}" name="branch_name" type="text" required="" class="form-control">
                                </div>
                                <div class="col-md-12 text-right mb-3">
                                    <button class="btn btn-buy-now w-auto btn-block" type="submit">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
