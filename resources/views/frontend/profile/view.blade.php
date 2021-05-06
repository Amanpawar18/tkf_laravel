@extends('frontend.layout.master')
@section('content')

{{-- <div class="container">
    <section class="product-detail-main">
        <div class="row">
            <div class="col-md-6 text-left">
                <h3 class=">
                    Welcome,
                    {{$user->name .' ' .$user->last_name}}
</h3>
</div>
<div class="col-md-6 text-right">
    <button class="btn btn-buy-now">Logout</button>
</div>
</div>
<hr>
</section>
</div> --}}

<!-- Slider -->
<div class="container">
    <section id="cart" class="product-detail-main">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3 class="mt-0 mb-0">WELCOME</h3>
                <h3 class="mt-0 mb-0 fw-500"><strong> {{$user->name .' ' .$user->last_name}} </strong>
                </h3>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-6 pt-4 pb-4 border">
                <p class="h4">
                    My Account
                </p>
                <ul class="listing">
                    <li>
                        <a href="#" class="text-dark"
                            onclick="event.preventDefault(); document.getElementById('logOut').submit();">
                            Logout
                        </a>
                    </li>

                </ul>
            </div>
            <div class=" col-sm-6 pt-4 pb-4 border">
                <p class="h4">
                    Account Details
                </p>
                <ul class="listing">
                    <li> {{$user->name . ' ' .$user->last_name}} </li>
                    <li> {{$user->email}}</li>

                </ul>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12  p-4 border">
                <ul class="listing">
                    <li>
                        <p class="fw-500 mb-0 h4"> Order History </p>
                    </li>
                    <table class="table">
                        <thead>
                            <tr class="">
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($orderProducts as $orderProduct)
                            <tr>
                                <td scope="row">
                                    <img src="{{$orderProduct->product->image_path}}" class="object-fit-contain"
                                        width="100" height="82">
                                </td>
                                <td>
                                    <a href="{{route('frontend.product.details', $orderProduct->product->slug)}}"
                                        class="p">
                                        <p>
                                            {{$orderProduct->product->name}}
                                        </p>
                                    </a>
                                    <p><small class="fw-500">{{$orderProduct->size}}</small> </p>
                                    <a class="btn  btn-fab btn-fab-mini btn-round ">
                                        <i class="material-icons">bookmark</i>
                                    </a>
                                    <a class="btn  btn-fab btn-fab-mini btn-round ">
                                        <i class="material-icons">remove_red_eye</i>
                                    </a>
                                    <a class="btn  btn-fab btn-fab-mini btn-round ">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </td>
                                <td>$ {{$orderProduct->product->cost}}</td>
                                <td> <input type="number" id="quantity" name="quantity"
                                        value="{{$orderProduct->quantity}}" disabled> </td>
                                <td><strong class="fw-500">${{$orderProduct->amount}}</strong></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" align="center">
                                    No data found
                                </td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </ul>
            </div>
            <div class="col-md-12">
                {{$orderProducts->links()}}
            </div>
        </div>
    </section>
</div>
@endsection
