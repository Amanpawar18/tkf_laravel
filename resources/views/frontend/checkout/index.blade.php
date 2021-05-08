@extends('frontend.layout.master')
@section('content')
@php
$subTotal = 0;
@endphp
<div class="container py-5">
    <div class="row">
        @if(session('error'))
        <div class="col-md-12 text-center">
            <div class="alert alert-danger p-2" role="alert">
                <p class="m-0">
                    {{session('error')}}
                </p>
            </div>
        </div>
        @endif
        <div class="col-sm-6 col-6">
            <form action="{{route('frontend.shipping')}}" method="GET">
                @csrf
                <h4 class="text-center">Shipping Address </h4>
                <hr>
                <div class="form-group mb-2">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="name" class="form-control" id="firstName" name="first_name" required
                        value="{{request()->first_name ?? Auth::user()->name }}" aria-describedby="emailHelp">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputEmail1">Eamil</label>
                    <input type="email" class="form-control" id="email" name="email" required
                        value="{{request()->email ?? Auth::user()->email }}" aria-describedby="emailHelp">
                </div>

                <div class="form-group mb-2">
                    <label for="addressInputFIeld">Address</label>
                    <input type="text" class="form-control" id="addressInputFIeld" name="address"
                        value="{{request()->address ?? old('address') }}" required>
                </div>


                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">Apartment, suite, etc. (optional)</label>
                    <input type="text" class="form-control" value="{{request()->apartment_no ?? old('apartment_no') }}"
                        required name="apartment_no">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">City </label>
                    <input type="text" class="form-control" value="{{request()->city ?? old('city') }}" required
                        name="city">
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group mb-2">
                            <label for="inputCountry">Country/Region</label>
                            <input type="text" class="form-control" value="{{request()->country ?? old('country') }}"
                                required name="country">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="inputState">State</label>
                        <input type="text" class="form-control" value="{{request()->state ?? old('state') }}" required
                            name="state">
                    </div>

                    <div class="col-sm-4">
                        <label for="exampleInputPassword1"> &nbsp; </label>

                        <input type="text" class="form-control" value="{{request()->pin_code ?? old('pin_code') }}"
                            required name="pin_code" placeholder="ZIP code">
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">Phone Number </label>

                    <input type="tel" minlength="10" maxlength="10" name="phone_no"
                        value="{{request()->phone_no ?? old('phone_no') }}" class="form-control" required>
                </div>
                <div class="form-group mb-2">

                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="status" {{request()->status ? 'checked' : '' }}
                                type="checkbox" value="1">
                            Save this information for next time
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-buy-now btn-block">
                    Place order
                </button>

                <p class="text-center mt-3">
                    <a href="{{route('frontend.cart.index')}}" class="mt-3 text-dark fw-500">Return
                        to cart</a>
                </p>

            </form>
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
            <p class=" pull-left">
                TOTAL
            </p>
            <p class=" pull-right">
                <strong>₹{{$subTotal}}</strong>
            </p>
        </div>
    </div>
</div>
@endsection
