@extends('frontend.layout.master')
@section('content')
@php
$subTotal = 0;
@endphp

<!-- Slider -->
<section id="checkout" class="">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">

                <!-- steps -->
                <div id="container">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step col-xs-3">
                                <a href="{{route('frontend.checkout', request()->all())}}" type="button"
                                    class="btn  btn-default btn-circle" disabled="disabled">1</a>
                                <p><small>Information</small></p>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="{{route('frontend.checkout', request()->all())}}" type="button"
                                    class="btn btn-success btn-circle" disabled="disabled">2</a>
                                <p><small>Shipping</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary setup-content" id="step-2">
                        <div class="panel-body">
                            <div class="panel-body">
                                <h4 class="fw-500 text-center">Shipping Address</h4>
                                <div class="form-group text-left mb-4">
                                    <p>
                                       {!! $address->address_in_text !!}
                                    </p>
                                </div>
                                <hr>
                                <button type="button" id="checkout-button" class="btn nextBtn bg-dark btn-block">
                                    Checkout
                                </button>
                                <button type="button" id="stripe-checkout-button" class="d-none btn btn-primary float-right">
                                    Checkout
                                </button>
                                <p class="text-center mt-3">
                                    <a href="{{route('frontend.checkout', request()->all())}}"
                                        class="mt-3 text-dark fw-500">
                                        Edit addresss
                                    </a>
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <div class="offset-sm-1 col-sm-5 col-xs-12">

                @foreach ($cartItems as $item)

                <div class="card shadow-none">
                    <div class="card-body ">
                        <img src="{{$item->product->image_path}}" class="object-fit-contain" width="70px" height="70px">
                        <div class="content">
                            <h5 class="card-subtitle mb-2 text-muted">{{$item->product->name}} <b>x</b>
                                {{ $item->quantity }}</h5>


                            <p class="h4 fw-500">
                                <small class="text-dark fw-500">{{$item->size}}</small>
                                <strong class="pull-right">
                                    ${{ $item->quantity * ($item->product->cost)}}
                                    @php
                                    $subTotal += $item->quantity * ($item->product->cost);
                                    @endphp
                                </strong>
                            </p>
                        </div>

                    </div>
                </div>
                @endforeach

                <hr>
                <p class="fw-500">Subtotal <span class=" h5 float-right m-0"> ${{$subTotal}}</span> </p>
                <p class="fw-500">Shipping <span class=" h5 float-right m-0"> <small>Calculated at next
                            step</small></span> </p>
                <hr>
                <p class="fw-500">TOTAL <span class=" h5 float-right m-0"> <strong>${{$subTotal}}</strong></span> </p>
            </div>
        </div>
    </div>
</section>
@endsection
@section('additional-js')
<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    var stripe = Stripe('<?=env('STRIPE_PUBLISH_KEY')?>');
    var stripeInitializeUrl = '<?php echo route('frontend.stripe.initialize', ["addressId" => $address->id]) ?>';
</script>
<script src="{{asset('frontend/shipping.js?v='.time())}}" type="text/javascript"></script>
@endsection
