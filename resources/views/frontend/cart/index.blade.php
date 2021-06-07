@extends('frontend.layout.master')
@section('content')
@php
$cartTotal = 0;
@endphp
<div class="container py-5">
    <form action="{{route('frontend.cart.update')}}" method="POST">
        @csrf
        <div class="row no-gutters position-relative">
            <aside class="col-md-9 mx-auto">
                @forelse ($cartItems as $item)
                <div class="card mb-3" id="item-{{$item->id}}">
                    <article class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <a class="h6 text-dark text-decoration-none"
                                    href="{{route('frontend.product.details', $item->product->slug)}}">
                                    <figure class="media">
                                        <div class="img-wrap mr-3">
                                            <img src="{{asset($item->product->image_path)}}"
                                                class="img-sm object-fit-contain img-fluid" style="height: 100px">
                                        </div>
                                    </figure>
                                </a>
                            </div> <!-- col.// -->
                            <div class="col-md-2 col-sm-12">
                                <a class="h6 text-dark text-decoration-none"
                                    href="{{route('frontend.product.details', $item->product->slug)}}">
                                    {{$item->product->name}}
                                </a>
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
                                    class="ajax-post-request btn btn-outline-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div> <!-- row.// -->
                    </article> <!-- card-group.// -->
                </div>
                @empty
                <div class="card mb-3">
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
                <div class="card position-sticky" style="top: 20px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-6 ">Total price:</div>
                            <div class="col-md-6 col-6  text-right">₹{{$cartTotal}}</div>
                        </div>
                        <hr>
                        <button class="btn btn-buy-now btn-block"> Update Cart </Button>
                        <a href="{{route('frontend.product.shop')}}" class="btn btn-buy-now btn-block">Continue
                        Shopping</a>
                        <br>
                        <p class="mt-4 text-center">
                            <small class="text-danger">
                                Checkout Option is under maintenance.
                            </small>
                        </p>
                        {{-- <a href="{{route('frontend.checkout')}}" class="btn btn-buy-now btn-block">Checkout</a> --}}
                    </div> <!-- card-body.// -->
                </div>
            </aside> <!-- col.// -->
            @endif
        </div> <!-- row.// -->
    </form>
</div>
@endsection
