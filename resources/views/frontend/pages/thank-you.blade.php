@extends('frontend.layout.master')
@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-5 mb-5">
                Thank You! .. {{Auth::user()->name}}
                    <br>
                    Your order placed successfully
            </h1>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <hr>
            </div>
            <div class="col-md-2 text-right">
                <img src="{{asset('frontend/assets/images/mail.png')}}" height="100px" class="object-fit-contain"
                    alt="">
            </div>
            <div class="col-md-10">
                <p class="h4">
                    Your order has been received and we are working on getting it ready for dispatch.
                    <br>
                    We have sent you an email covering your order summary to the email address provided by you.
                </p>
            </div>
            <div class="col-md-12 text-center mt-4">
                <p class="h4">
                    You can visit <a href="{{route('frontend.profile.show')}}">My Account</a> page to check on the
                    status of your order.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection