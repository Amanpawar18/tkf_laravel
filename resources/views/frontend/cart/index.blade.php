@extends('frontend.layout.master')
@section('content')
@php
$cartTotal = 0;
@endphp
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-5">Cart</h1>
        </div>
        <div class="row justify-content-center">
            <form action="{{route('frontend.cart.update')}}" method="POST">
                @csrf
                <div class="row no-gutters position-relative">
                    @if($errors->any())
                    <div class="col-md-12 alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach
                    </div>
                    @endif
                    <aside class="col-md-9 mx-auto">
                        @forelse ($cartItems as $item)
                        <div class="card mb-3 shadow wow fadeInUp" data-wow-delay="0.1s" id="item-{{$item->id}}">
                            <article class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <a class="h6 text-dark text-decoration-none"
                                            href="{{route('frontend.product.details', $item->product->slug)}}">
                                            <figure class="media">
                                                <div class="img-wrap mr-3">
                                                    <img src="{{asset($item->product->image_path)}}"
                                                        class="img-sm object-fit-contain img-fluid"
                                                        style="height: 100px">
                                                </div>
                                            </figure>
                                        </a>
                                    </div> <!-- col.// -->
                                    <div class="col-md-2 col-sm-12">
                                        <a class="h6 text-decoration-none text-primary"
                                            href="{{route('frontend.product.details', $item->product->slug)}}">
                                            <u>
                                                {{$item->product->name}}
                                            </u>
                                        </a>
                                        @if(!$item->stock)
                                        <br>
                                        <small class="text-danger">Out of stock</small>
                                        @endif
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-12 my-3 my-md-0 text-md-center d-flex">
                                        <input type="number" id="item-{{$item->id}}-quantity" class="form-control"
                                            style="width: 80px; !important" name="item[{{$item->id}}][quantity]"
                                            value="{{$item->quantity}}">
                                        @php // Adding the product cost in cart total
                                        $cartTotal += $item->quantity * $item->product_cost;
                                        @endphp
                                        <span class="mx-3 p-2">
                                            X &nbsp; {{ $item->product_cost }}
                                        </span>
                                    </div>
                                    <div class="col-md-3 col-sm-8 col-8 text-md-left">
                                        <span class="mx-md-3 p-1  mx-sm-0 p-sm-0">
                                            Total: ₹{{ $item->quantity * $item->product_cost }}
                                        </span>
                                    </div>
                                    <div class="col-md-1 col-sm-4 col-4 text-md-right text-right">
                                        <button type="button" data-url={{route('frontend.cart.delete', $item->id)}}
                                            data-delete-element='item-{{$item->id}}'
                                            class="ajax-post-request btn btn-primary btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div> <!-- row.// -->
                            </article> <!-- card-group.// -->
                        </div>
                        @empty
                        <div class="card mb-3 wow fadeInUp" data-wow-delay="0.1s">
                            <article class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="price-wrap">Add some products in cart</div>
                                    </div> <!-- col.// -->
                                </div> <!-- row.// -->
                            </article> <!-- card-group.// -->
                        </div>
                        @endforelse
                    </aside> <!-- col.// -->
                    @if(count($cartItems))
                    <aside class="col-md-3 border-left">
                        <div class="card position-sticky shadow" style="top: 20px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-6 text-primary">Total price:</div>
                                    <div class="col-md-6 col-6  text-right">
                                        <strong>
                                            ₹{{$cartTotal}}
                                        </strong>
                                    </div>
                                </div>
                                <hr>
                                <button class="btn btn-primary w-100 mb-1"> Update Cart </Button>
                                <a href="{{route('frontend.product.shop')}}" class="btn btn-primary w-100 mb-1">Continue
                                    Shopping</a>
                                <a href="{{route('frontend.checkout')}}" class="btn btn-primary w-100 mb-1">Checkout</a>
                            </div> <!-- card-body.// -->
                        </div>
                    </aside> <!-- col.// -->
                    @endif
                </div> <!-- row.// -->
            </form>
        </div>
    </div>
</div>
@endsection