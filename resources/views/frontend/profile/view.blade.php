@extends('frontend.profile.layout')
@section('profile-content')
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-body">
                <p>
                    Hello,
                    <strong>
                        {{Auth::user()->name}}
                    </strong>
                    , (Not
                    <strong>
                        {{Auth::user()->name}}
                    </strong>
                    ?
                    <a class="text-decoration-none" href="javascript:void(0);'"
                        onclick="event.preventDefault(); document.getElementById('logOut').submit();">
                        Logout
                    </a>
                    )
                </p>
                <p>
                    From your account dashboard you can review orders, manage your shippping and billing addresses and
                    edit your password and account details.
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header bg-transparent">
                Log In Information
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <p>
                        {{$user->name}}
                        <br>
                        {{$user->email}}
                        <br>
                        {{$user->phone_no}}
                        <br>
                        <a href="#" class="">Edit Profile</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header bg-transparent">
                Referral Details
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <p>
                        <b>
                            Referral Code:
                        </b>
                        {{Auth::user()->referral_code}}
                        <br>
                        <b>
                            Referral Url:
                        </b>
                        <a href=" {{route('register', ['referrer_user_code' => Auth::user()->referral_code])}}" target="_blank">
                            {{route('register', ['referrer_user_code' => Auth::user()->referral_code])}}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header bg-transparent">
                Wallet Balance
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <p>
                        <b>
                            Wallet Balance:
                        </b>
                        {{Auth::user()->wallet_balance_text}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header bg-transparent">
                Default Address
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <p>
                        @if($user->addresses()->first())
                        {!! $user->addresses()->first()->address_in_text !!}
                        @else
                        No Address Found
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
