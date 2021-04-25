@extends('frontend.layout.master')
@section('content')

<section class="" id="">
    <div class="container pt-5">
        <div class="row">
            <div class="card col-md-8 text-center mx-auto">
                <h3 class="font-weight-bold">About Us</h3>

                <p>Legacy will Reimagine your style. And add some luxury to it, We are a Luxury Brand of future.</p>
                <p>Our Clothing line also has Unisex Clothing, So that you can go twining with your Loved ones.</p>

                <div class="text-center">
                    <a href="https://www.instagram.com/legacy.the.brand/">
                        <img src="{{asset('frontend/uploads/instagram.png')}}" style="height: 100ox; width: 100px;">
                    </a>

                    <a href="https://twitter.com/LegacyTheBrnd">
                        <img src="{{asset('frontend/uploads/twitter.png')}}" style="height: 100ox; width: 100px;">
                    </a>

                    <a href="mailto:{{ Setting::get('website_email') }}">
                        <img src="{{asset('frontend/uploads/mail.png')}}" style="height: 100ox; width: 100px;">
                    </a>
                </div>

                <p> * Contact Us by sending DM on INSTAGRAM | TWITER | EMAIL.</p>
            </div>

        </div>
    </div>
</section>

@endsection
