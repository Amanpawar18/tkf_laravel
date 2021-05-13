@extends('frontend.layout.master')
@section('content')
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-12 text-center">
            <h1 class="display-3">
                Thank You!
            </h1>
            <h2>
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
                An email receipt including the details about your order has been sent to your email address.
                <br>
                Please keep it for your records.
            </p>
        </div>
        <div class="col-md-12 text-center mt-4">
            <p class="h4">
                You can visit my account page at any time to check your order status.
            </p>
        </div>
    </div>
</div>
@endsection
