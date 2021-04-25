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

                <div id="container">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-2" type="button" class="btn  btn-success btn-circle"
                                    disabled="disabled">1</a>
                                <p><small>Information</small></p>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle"
                                    disabled="disabled">2</a>
                                <p><small>Shipping</small></p>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-4" type="button" class="btn btn-default btn-circle"
                                    disabled="disabled">3</a>
                                <p><small>Payment</small></p>
                            </div>
                        </div>
                    </div>

                    <form role="form">

                        <div class="panel panel-primary setup-content" id="step-2">

                            <div class="panel-body">
                                <div class="panel-body">
                                    <form>
                                        <h4 class="fw-500 text-center">Express checkout </h4>
                                        <div class="form-group text-center mb-4">
                                            <button type="button" class="pl-5 pr-5 btn btn-sm bg-warning">
                                                <img width="80px" src="{{asset('frontend/assets/img/paypal.webp')}}" />
                                            </button>
                                        </div>
                                        <hr>


                                        <h4 class="fw-500">Contact information <small class="pull-right">Already have an
                                                account? <a class="fw-500 text-dark" href="#"> Login </a> </small> </h4>
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Email ID</label>
                                            <input type="text" class="form-control" id="firstname"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <h4 class="fw-500">Shipping Address </h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                    <label for="exampleInputEmail1">First Name</label>
                                                    <input type="email" class="form-control" id="lastname"
                                                        aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                    <label for="exampleInputEmail1">Last Name</label>
                                                    <input type="email" class="form-control" id="lastname"
                                                        aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="exampleInputPassword1">Apartment, suite, etc. (optional)</label>

                                            <input type="text" class="form-control" id="">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="exampleInputPassword1">City </label>

                                            <input type="text" class="form-control" id="">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4">
                                                    <label for="inputState">Country/Region</label>
                                                    <select id="inputState" class="form-control">
                                                        <option selected>Choose...</option>
                                                        <option>...</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="inputState">State</label>
                                                <select id="inputState" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="exampleInputPassword1"> &nbsp; </label>

                                                <input type="text" class="form-control" id="" placeholder="ZIP code">
                                            </div>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="exampleInputPassword1">Phone Number </label>

                                            <input type="" class="form-control" id="">
                                        </div>
                                        <div class="form-group mb-5">

                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    Save this information for next time
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn nextBtn bg-dark btn-block">Continue to
                                            shipping</button>

                                        <p class="text-center mt-3"><a href="login.html"
                                                class="mt-3 text-dark fw-500">Return to cart</a></p>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-primary setup-content" id="step-3">
                            <div class="panel-body">

                                <div class="form-group mb-4 bmd-form-group">
                                    <label for="exampleInputEmail1" class="bmd-label-static">Contact</label>
                                    <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp"
                                        value="demo@gmail.com">
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group mb-4 bmd-form-group">
                                            <label for="exampleInputEmail1" class="bmd-label-static">Ship to</label>
                                            <input type="email" class="form-control" id="lastname"
                                                aria-describedby="emailHelp" value="110/88 Anurag Aagar G.No 12">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mb-4 bmd-form-group">
                                            <label for="exampleInputEmail1" class="bmd-label-static">Method</label>
                                            <input type="email" class="form-control" id="lastname"
                                                aria-describedby="emailHelp" value="Priority Mail Express · $ 76.29">
                                        </div>
                                    </div>
                                </div>




                                <h4 class="fw-500 mt-5 mb-0">Shipping method</h4>
                                <div class="card card-nav-tabs mt-5">
                                    <div class="card-header card-header-warning pt-0 pb-0 mr-0 ml-0">
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label text-white d-block">
                                                <input class="form-check-input" type="radio" name="one" id=""
                                                    value="option2" checked>
                                                USPS Priority Mail <strong class="float-right">$28.33</strong>
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>


                                </div>
                                <div class="card card-nav-tabs mt-5">
                                    <div class="card-header card-header-warning pt-0 pb-0 mr-0 ml-0">
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label text-white d-block">
                                                <input class="form-check-input" type="radio" name="one" id=""
                                                    value="option2">
                                                USPS Priority Mail Express <strong class="float-right">$76.29</strong>
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>


                                </div>


                                <button type="submit" class="btn nextBtn bg-dark btn-block mt-4">Continue To
                                    Payment</button>
                                <p class="text-center mt-3"><a href="login.html" class="mt-3 text-dark fw-500">Return to
                                        cart</a></p>
                            </div>
                        </div>

                        <div class="panel panel-primary setup-content" id="step-4">
                            <div class="panel-body">

                                <div class="form-group mb-4 bmd-form-group">
                                    <label for="exampleInputEmail1" class="bmd-label-static">Contact</label>
                                    <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp"
                                        value="demo@gmail.com">
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group mb-4 bmd-form-group">
                                            <label for="exampleInputEmail1" class="bmd-label-static">Ship to</label>
                                            <input type="email" class="form-control" id="lastname"
                                                aria-describedby="emailHelp" value="110/88 Anurag Aagar G.No 12">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mb-4 bmd-form-group">
                                            <label for="exampleInputEmail1" class="bmd-label-static">Method</label>
                                            <input type="email" class="form-control" id="lastname"
                                                aria-describedby="emailHelp" value="Priority Mail Express · $ 76.29">
                                        </div>
                                    </div>
                                </div>


                                <h4 class="fw-500 mt-5 mb-0">Payment </h4>
                                <p class="mt-0 mb-0">All transactions are secure and encrypted.</p>
                                <div class="card dc card-nav-tabs mt-5">
                                    <div class="card-header card-header-warning pt-0 pb-0 mr-0 ml-0">
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label text-white d-block">
                                                <input class="form-check-input" type="radio" name="exampleRadios"
                                                    id="exampleRadios1" value="option1" checked>
                                                Credit card
                                                <img class="float-right"
                                                    src="{{asset('frontend/assets/img/master.svg')}}">
                                                <img class="float-right"
                                                    src="{{asset('frontend/assets/img/american-express.svg')}}">
                                                <img class="float-right"
                                                    src="{{asset('frontend/assets/img/discover.svg')}}">

                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-4 bmd-form-group is-filled">
                                            <input type="text" placeholder="Card number" class="form-control" id="">
                                        </div>
                                        <div class="form-group mb-4 bmd-form-group is-filled">
                                            <input type="text" placeholder="Name on card" class="form-control" id="">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4 bmd-form-group is-filled">
                                                    <!-- <label for="exampleInputEmail1" class="bmd-label-static">Expiration date (MM / YY)</label> -->
                                                    <input type="text" placeholder="Expiration date (MM / YY)"
                                                        class="form-control" id="">
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4 bmd-form-group is-filled">
                                                    <!-- <label for="exampleInputEmail1" class="bmd-label-static">Security code</label> -->
                                                    <input type="text" placeholder="Security code" class="form-control"
                                                        id="">
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- paypal -->
                                <div class="card card-nav-tabs mt-5">
                                    <div class="card-header card-header-warning pt-0 pb-0 mr-0 ml-0">
                                        <div class="form-check mb-0 form-check-radio">
                                            <label class="form-check-label text-white d-block">
                                                <input class="form-check-input" type="radio" name="exampleRadios"
                                                    id="exampleRadios1" value="option2">
                                                <img src="{{asset('frontend/assets/img/paypal.webp')}}">
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>


                                </div>
                                <!-- other -->
                                <div class="card card-nav-tabs mt-5">
                                    <div class="card-header card-header-warning pt-0 pb-0 mr-0 ml-0">
                                        <div class="form-check mb-0 form-check-radio">
                                            <label class="form-check-label text-white d-block">
                                                <input class="form-check-input" type="radio" name="exampleRadios"
                                                    id="exampleRadios1" value="option2">
                                                <img src="{{asset('frontend/assets/img/Sezzle_Logo_FullColor.svg')}}"
                                                    class="mt-0 mb-2">
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>


                                </div>

                                <h4 class="fw-500 mt-5 mb-0">Billing address </h4>
                                <p class="mt-0 mb-0">Select the address that matches your card or payment method.</p>
                                <div class="card card-nav-tabs mt-5">
                                    <div class="card-header card-header-warning pt-0 pb-0 mr-0 ml-0">
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label text-white d-block">
                                                <input class="form-check-input" type="radio" name="" id=""
                                                    value="option2">
                                                Same as shipping address
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>


                                </div>

                                <div class="card dc card-nav-tabs mt-5">
                                    <div class="card-header card-header-warning pt-0 pb-0 mr-0 ml-0">
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label text-white d-block">
                                                <input class="form-check-input" type="radio" name="" id="" value=""
                                                    checked>
                                                Use a different billing address
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group mb-2 bmd-form-group">
                                                    <label for="exampleInputEmail1" class="bmd-label-static">First
                                                        Name</label>
                                                    <input type="email" class="form-control" id="lastname"
                                                        aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mb-2 bmd-form-group">
                                                    <label for="exampleInputEmail1" class="bmd-label-static">Last
                                                        Name</label>
                                                    <input type="email" class="form-control" id="lastname"
                                                        aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-2 bmd-form-group">
                                            <label for="exampleInputEmail1" class="bmd-label-static">Address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group mb-2 bmd-form-group">
                                            <label for="exampleInputPassword1" class="bmd-label-static">Apartment,
                                                suite, etc. (optional)</label>

                                            <input type="text" class="form-control" id="">
                                        </div>
                                        <div class="form-group mb-2 bmd-form-group">
                                            <label for="exampleInputPassword1" class="bmd-label-static">City </label>

                                            <input type="text" class="form-control" id="">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4">
                                                    <label for="inputState">Country/Region</label>
                                                    <select id="inputState" class="form-control">
                                                        <option selected="">Choose...</option>
                                                        <option>...</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="inputState">State</label>
                                                <select id="inputState" class="form-control">
                                                    <option selected="">Choose...</option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="exampleInputPassword1"> &nbsp; </label>

                                                <span class="bmd-form-group"><input type="text" class="form-control"
                                                        id="" placeholder="ZIP code"></span>
                                            </div>
                                        </div>
                                        <div class="form-group mb-5 bmd-form-group">
                                            <label for="exampleInputPassword1" class="bmd-label-static">Phone Number
                                            </label>

                                            <input type="" class="form-control" id="">
                                        </div>

                                    </div>

                                </div>


                                <button type="submit" class="btn nextBtn bg-dark btn-block mt-4">Pay Now</button>
                                <p class="text-center mt-3"><a href="login.html" class="mt-3 text-dark fw-500">Return to
                                        cart</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="offset-sm-1 col-sm-5 col-xs-12">

                @foreach ($cartItems as $item)

                <div class="card shadow-none">
                    <div class="card-body ">
                        <img src="{{$item->product->image_path}}" class="object-fit-contain" width="70px" height="70px">
                        <div class="content">
                            <h5 class="card-subtitle mb-2 text-muted">{{$item->product->name}}</h5>


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

                <button type="button" id="checkout-button" class="btn btn-primary float-right">Checkout</button>
            </div>

        </div>

    </div>
</section>
@endsection
@section('additional-js')
<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">

    // Create an instance of the Stripe object with your publishable API key
    var stripe = Stripe('<?=env('STRIPE_PUBLISH_KEY')?>');
    var checkoutButton = document.getElementById("checkout-button");
    checkoutButton.addEventListener("click", function () {
      fetch('<?php echo route('frontend.stripe.initialize') ?>', {
        method: "POST",
      })
        .then(function (response) {
          return response.json();
        })
        .then(function (session) {
          return stripe.redirectToCheckout({ sessionId: session.id });
        })
        .then(function (result) {
          // If redirectToCheckout fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using error.message.
          if (result.error) {
            alert(result.error.message);
          }
        })
        .catch(function (error) {
          console.error("Error:", error);
        });
    });
</script>
@endsection
