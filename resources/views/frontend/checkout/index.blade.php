@extends('frontend.layout.master')
@section('content')
@php
$subTotal = 0;
@endphp

<!-- Slider -->
<section id="checkout" class="">
    <div class="container">
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
            <div class="col-sm-6">

                <div id="container">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step col-xs-3">
                                <a href="{{route('frontend.checkout')}}" type="button"
                                    class="btn  btn-success btn-circle" disabled="disabled">1</a>
                                <p><small>Information</small></p>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                <p><small>Shipping</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary setup-content" id="step-2">

                        <div class="panel-body">
                            <div class="panel-body">
                                <form action="{{route('frontend.shipping')}}" method="GET">
                                    @csrf
                                    <h4 class="fw-500 text-center">Express checkout </h4>

                                    @guest
                                    <h4 class="fw-500">Contact information <small class="pull-right">
                                            Already have an account?
                                            <a class="fw-500 text-dark" href="#"> Login </a>
                                        </small>
                                    </h4>
                                    @endif
                                    <div class="form-group mb-4">
                                        <label for="exampleInputEmail1">Email ID</label>
                                        <input type="email" class="form-control" id="email" name="email" required
                                            value="{{request()->email ?? Auth::user()->email }}"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <h4 class="fw-500">Shipping Address </h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-4">
                                                <label for="exampleInputEmail1">First Name</label>
                                                <input type="name" class="form-control" id="firstName" name="first_name"
                                                    required value="{{request()->first_name ?? Auth::user()->name }}"
                                                    aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-4">
                                                <label for="exampleInputEmail1">Last Name</label>
                                                <input type="text" class="form-control" id="lastname" name="last_name"
                                                    required
                                                    value="{{request()->last_name ?? Auth::user()->last_name }}"
                                                    aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="addressInputFIeld">Address</label>
                                        <input type="text" class="form-control" id="addressInputFIeld" name="address"
                                            value="{{request()->address ?? old('address') }}" required>
                                    </div>


                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Apartment, suite, etc. (optional)</label>
                                        <input type="text" class="form-control"
                                            value="{{request()->apartment_no ?? old('apartment_no') }}" required
                                            name="apartment_no">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">City </label>
                                        <input type="text" class="form-control"
                                            value="{{request()->city ?? old('city') }}" required name="city">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4">
                                                <label for="inputCountry">Country/Region</label>
                                                <input type="text" class="form-control"
                                                    value="{{request()->country ?? old('country') }}" required
                                                    name="country">
                                                {{-- <select id="inputCountry" class="form-control" required name="country">
                                                    <option selected disabled>Choose...</option>
                                                    <option {{request()->country == 'India' ? 'selected' : '' }}
                                                value="India">
                                                India</option>
                                                <option {{request()->country == 'USA' ? 'selected' : '' }} value="USA">
                                                    USA
                                                </option>
                                                <option {{request()->country == 'Pakistan' ? 'selected' : '' }}
                                                    value="Pakistan">Pakistan</option>
                                                </select> --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="inputState">State</label>
                                            <input type="text" class="form-control"
                                                value="{{request()->state ?? old('state') }}" required name="state">
                                            {{-- <select id="inputState" class="form-control" required name="state">
                                                <option selected disabled>Choose...</option>
                                                <option {{request()->state == 'Rajasthan' ? 'selected' : '' }}
                                            value="Rajasthan">Rajasthan</option>
                                            <option {{request()->state == 'J&K' ? 'selected' : '' }} value="J&K">J&K
                                            </option>
                                            <option {{request()->state == 'Gujrat' ? 'selected' : '' }} value="Gujrat">
                                                Gujrat</option>
                                            </select> --}}
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="exampleInputPassword1"> &nbsp; </label>

                                            <input type="text" class="form-control"
                                                value="{{request()->pin_code ?? old('pin_code') }}" required
                                                name="pin_code" placeholder="ZIP code">
                                        </div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Phone Number </label>

                                        <input type="tel" minlength="10" maxlength="10" name="phone_no"
                                            value="{{request()->phone_no ?? old('phone_no') }}" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-group mb-5">

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" name="status"
                                                    {{request()->status ? 'checked' : '' }} type="checkbox" value="1">
                                                Save this information for next time
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn nextBtn bg-dark btn-block">
                                        Continue to shipping
                                    </button>

                                    <p class="text-center mt-3">
                                        <a href="{{route('frontend.cart.index')}}" class="mt-3 text-dark fw-500">Return
                                            to cart</a>
                                    </p>

                                </form>
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
@endsection
