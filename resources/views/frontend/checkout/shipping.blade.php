@extends('frontend.layout.master')
@section('content')
@php
$subTotal = 0;
@endphp
<div class="container py-5">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="fw-500 text-center">Preview order</h4>
            <hr>
            <div class="form-group text-left mb-4">
                <p>
                    {!! $address->address_in_text !!}
                </p>
            </div>
            <hr>
            @if($isDeliveryEligible)
            <button type="button" id="checkout-button" class="btn btn-buy-now"
                data-redirect-url={{route('frontend.razorpay.orderSave')}}
                data-razorpay-url={{route('frontend.razorpay.orderCreate')}}>
                Place Order
            </button>
            @else
            <p class="text-center text-danger">
                Currently not deliverable at your address
            </p>
            @endif
            <p class="text-center mt-3">
                <a href="{{route('frontend.checkout', request()->all())}}" class="mt-3 text-dark fw-500">
                    Edit addresss
                </a>
            </p>
        </div>
        <div class="col-sm-2 col-2">
        </div>
        <div class="col-sm-4 col-xs-12 col-4 mr-0">
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
                                    <strong class="pull-right">
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
                    <p class=" pull-left">
                        SUBTOTAL
                    </p>
                    <p class=" pull-right">
                        <strong>₹{{$subTotal}}</strong>
                    </p>
                </div>
                @if($subTotal < 500)
                <div class="col-md-12">
                    <p class=" pull-left">
                        SHIPPING
                    </p>
                    <p class=" pull-right">
                        @php
                        $subTotal = $subTotal + 50;
                        @endphp
                        <strong>₹50</strong>
                    </p>
                </div>
                @endif
                <div class="col-md-12">
                    <p class=" pull-left">
                        TOTAL
                    </p>
                    <p class=" pull-right">
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
@endsection
@section('additional_script')
<script src="{{asset('frontend/js/shipping.js?v='.time())}}" type="text/javascript"></script>
<script>
    var razorPayKey = '<?=env('RAZORPAY_API_KEY') ?>';
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection
