@extends('frontend.layout.master')
@section('content')
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-12 text-center">
            <h2>
                Thank You! .. {{Auth::user()->name}}
                <br>
                Your order placed successfully
            </h2>
        </div>
        <div class="col-md-12 text-center">
            <hr>
        </div>
        <div class="col-md-2 text-right">
            <img src="{{asset('frontend/assets/images/mail.png')}}" height="100px" class="object-fit-contain" alt="">
        </div>
        <div class="col-md-10">
            <p class="h4">
                Your order has been revived and we are working on getting it ready for despatch.
                <br>
                We have sent you an email covering your order summary to the email address provided by you.
            </p>
        </div>
        <div class="col-md-12 text-center mt-4">
            <p class="h4">
                You can visit <a href="{{route('frontend.profile.show')}}">My Account</a> page to check on the status of your order.
            </p>
        </div>
    </div>
</div>
@endsection
