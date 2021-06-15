@extends('frontend.profile.layout')
@section('profile-content')
<div class="card">
    <div class="card-header bg-transparent">Referred Users ({{Auth::user()->referredUsers()->count()}})</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
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
            @forelse ($referredUsers as $user)
            <div class="col-md-6 mb-3">
                <div class="card card-body">
                    <p>
                        <strong>
                            Name:
                        </strong>
                        {{$user->name}}
                        <br>
                        <strong>
                            Email:
                        </strong>
                        {{$user->email}}
                    </p>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                No data found
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
