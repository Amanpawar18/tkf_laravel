@extends('frontend.layout.master')
@section('content')
@php
$subTotal = 0;
@endphp
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-5">Checkout</h1>
        </div>
        <div class="row position-relative">
            @if(session('error'))
            <div class="col-md-12 text-center">
                <div class="alert alert-danger p-2" role="alert">
                    <p class="m-0">
                        {{session('error')}}
                    </p>
                </div>
            </div>
            @endif
            <div class="col-sm-8 col-12">
                <div class="card card-body shadow">
                    <form action="{{route('frontend.shipping')}}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center">Shipping Address </h4>
                                <hr>
                                <div class="form-group mb-2">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="name" class="form-control" id="firstName" name="first_name" required
                                        value="{{request()->first_name ?? Auth::user()->name }}"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="exampleInputEmail1">Eamil</label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                        value="{{request()->email ?? Auth::user()->email }}"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="address_id">Choose Address</label>
                                    <select name="address_id" id="address_id" class="form-control">
                                        <option disabled selected>Choose</option>
                                        @foreach (Auth::user()->addresses as $address)
                                        <option value="{{$address->id}}" {{request()->address_id == $address->id ?
                                            'selected' : ''}}>
                                            {{$address->first_name . ' ' . $address->last_name . ', ' . Str::limit($address->address, 30). ', ' . $address->pin_code }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <small>
                                        <a href="#" id="show-addNewAddress">
                                            Add New Address
                                        </a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="addNewAddress">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="addressInputFIeld">Address</label>
                                    <input type="text" class="form-control" id="addressInputFIeld" name="address"
                                        value="{{request()->address ?? old('address') }}" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="exampleInputPassword1">Address 2</label>
                                    <input type="text" class="form-control"
                                        value="{{request()->apartment_no ?? old('apartment_no') }}" required
                                        name="apartment_no">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="inputCountry">Country/Region</label>
                                    <input type="text" class="form-control"
                                        value="{{request()->country ?? old('country') }}" required name="country">
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="inputState">State</label>
                                        <input type="text" class="form-control"
                                            value="{{request()->state ?? old('state') }}" required name="state">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-2">
                                            <label for="exampleInputPassword1">City </label>
                                            <input type="text" class="form-control"
                                                value="{{request()->city ?? old('city') }}" required name="city">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="inputpin_code">Pin Code</label>
                                        <input type="number" class="form-control"
                                            value="{{request()->pin_code ?? old('pin_code') }}" required name="pin_code"
                                            placeholder="ZIP code">
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="exampleInputPassword1">Phone Number </label>

                                    <input type="tel" minlength="10" maxlength="10" name="phone_no"
                                        value="{{request()->phone_no ?? old('phone_no') }}" class="form-control"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary mb-1">
                                    Place order
                                </button>
                                <a href="{{route('frontend.profile.show')}}" class="btn btn-primary mb-1">
                                    My Account
                                </a>
                                <a href="{{route('frontend.cart.index')}}" class="btn btn-primary mb-1">
                                    Return to cart
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4 col-12 col-xs-12 col-4 mr-0">
                <div class="row position-sticky" style="top: 30px;">
                    <div class="col-md-12">
                        @foreach ($cartItems as $item)
                        <div class="card mb-3 shadow">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <img src="{{$item->product->image_path}}" class="object-fit-contain"
                                            width="70px" height="70px">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="content">
                                            <p>
                                                <span class="text-primary">
                                                    {{$item->product->name}}
                                                </span>
                                                <b>x</b>
                                                {{ $item->quantity }}
                                                <strong class="float-end">
                                                     ₹{{ $item->quantity * ($item->product_cost)}}
                                                    @php
                                                    $subTotal += $item->quantity * ($item->product_cost);
                                                    @endphp
                                                </strong>
                                            </p>
                                            <small>
                                                {{ Str::limit($item->product->sub_description, 40)}}
                                            </small>
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
                                <p class="float-start">
                                    SHIPPING
                                </p>
                                <p class="float-end">
                                    @php
                                    $subTotal = $subTotal + 50;
                                    @endphp
                                    <strong>₹50</strong>
                                </p>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <hr>
                            <p class=" float-start">
                                TOTAL
                            </p>
                            <p class="float-end">
                                <strong>₹{{$subTotal}}</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('additional_script')
<script>
    $(document).ready(function(){
        $('#address_id').change(function(){
            hideAddNewAddressRow();
        });
        hideAddNewAddressRow();
        $('#show-addNewAddress').click(function(){
            $('#addNewAddress').show()
            $('#addNewAddress .form-control').attr('disabled', false)
        });
    });
    function hideAddNewAddressRow(){
        $('#addNewAddress').hide()
        $('#addNewAddress .form-control').attr('disabled', true)
    }
</script>
@endsection