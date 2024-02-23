@extends('frontend.layout.master')
@section('content')
@php
$subTotal = 0;
@endphp
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-5">Shipping</h1>
        </div>
        <div class="card card-body shadow">
            <div class="row ">
                <div class="col-md-6 col-12">
                    <div class="card card-body shadow">
                        <h4 class="fw-500 text-center">Preview order</h4>
                        <hr>
                        <div class="form-group text-left mb-4">
                            <p>
                                {!! $address->address_in_text !!}
                            </p>
                        </div>
                        <hr>
                        @if($isDeliveryEligible)
                        <button type="button" id="checkout-button" class="btn btn-primary mb-2"
                            data-redirect-url={{route('frontend.razorpay.orderSave')}}
                            data-razorpay-url={{route('frontend.razorpay.orderCreate')}}>
                            Place Order
                        </button>
                        @else
                        <p class="text-center text-danger">
                            Currently not deliverable at your address
                        </p>
                        @endif
                        <a href="{{route('frontend.checkout', request()->all())}}" class="btn btn-primary">
                            Edit addresss
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    @foreach ($cartItems as $item)
                    <div class="card mb-1">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <img src="{{$item->product->image_path}}" class="object-fit-contain" width="70px"
                                        height="70px">
                                </div>
                                <div class="col-md-8">
                                    <div class="content">
                                        <p>
                                            {{$item->product->name}} <b>x</b>
                                            {{ $item->quantity }}
                                            <strong class="float-end">
                                                ₹{{ $item->quantity * ($item->product_cost)}}
                                                @php
                                                $subTotal += $item->quantity * ($item->product_cost);
                                                @endphp
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <p class=" float-start">
                                SUBTOTAL
                            </p>
                            <p class=" float-end">
                                <strong>₹{{$subTotal}}</strong>
                            </p>
                        </div>
                        @if($subTotal < 500) <div class="col-md-12">
                            <p class=" float-start">
                                SHIPPING
                            </p>
                            <p class=" float-end">
                                @php
                                $subTotal = $subTotal + 50;
                                @endphp
                                <strong>₹50</strong>
                            </p>
                    </div>
                    @endif
                    <div class="col-md-12">
                        <p class=" float-start">
                            TOTAL
                        </p>
                        <p class=" float-end">
                            <strong>₹{{$subTotal}}</strong>
                        </p>
                    </div>
                </div>
                <input type="hidden" name="sub_total" value="{{$subTotal}}">
                <input type="hidden" name="address" value="{{$address->id}}">
                @csrf
            </div>
        </div>
    </div>
</div>
@endsection
@section('additional_script')
<script src="{{asset('frontend/js/shipping.js?v='.time())}}" type="text/javascript"></script>
<script>
    var razorPayKey = '<?=env('RAZORPAY_API_KEY') ?>';
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection