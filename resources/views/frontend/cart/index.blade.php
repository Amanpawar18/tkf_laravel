@extends('frontend.layout.master')
@section('content')
@php
$cartTotal = 0;
@endphp
<div class="container py-5">
    <form action="{{route('frontend.cart.update')}}" method="POST">
        @csrf
        <div class="row no-gutters">
            <aside class="col-md-9">
                @forelse ($cartItems as $item)
                <div class="card mb-3">
                    <article class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <figure class="media">
                                    <div class="img-wrap mr-3">
                                        <img src="{{asset($item->product->image_path)}}"
                                            class="img-sm object-fit-contain img-fluid" style="height: 100px">
                                    </div>
                                </figure>
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
                                $cartTotal += $item->quantity * $item->product->cost_numeric;
                                @endphp
                                <span class="mx-3 p-2">
                                    X &nbsp; {{ $item->product->cost }}
                                </span>
                            </div>
                            <div class="col-md-3 col-sm-8 col-8 text-md-left">
                                <span class="mx-md-3 p-1  mx-sm-0 p-sm-0">
                                    Total: ₹{{ $item->quantity * $item->product->cost_numeric }}
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
                <article class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="price-wrap">Add some products in cart</div>
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </article> <!-- card-group.// -->
                @endforelse
            </aside> <!-- col.// -->
            @if(count($cartItems))
            <aside class="col-md-3 border-left">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-6 ">Total price:</div>
                            <div class="col-md-6 col-6  text-right">₹{{$cartTotal}}</div>
                        </div>
                        <hr>
                        <button class="btn btn-buy-now btn-block"> Update Cart </Button>
                        <a href="#" class="btn btn-buy-now btn-block"> Make Purchase </a>
                        <a href="#" class="btn btn-buy-now btn-block">Continue Shopping</a>
                    </div> <!-- card-body.// -->
                </div>
            </aside> <!-- col.// -->
            @endif
        </div> <!-- row.// -->
    </form>
</div>
{{-- <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-sm-8 col-md-12 col-lg-12 text-center">
                    <table class="table table-hover">
                        <thead>
                            <tr class="">
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <form action="{{route('frontend.cart.update')}}" method="POST">
@csrf
<tbody>
    @forelse ($cartItems as $item)
    <tr id="item-{{$item->id}}">
        <td class="align-middle" scope="row">
            <img src="{{asset($item->product->image_path)}}" class="object-fit-contain" width="100px" height="82px">
        </td>
        <td class="align-middle">
            <p>
                <a href="{{route('frontend.product.details', $item->product->slug)}}">
                    {{$item->product->name}}
                </a>
            </p>
        </td>
        <td class="align-middle">
            {{$item->product->cost}}
        </td>
        <td class="align-middle" align="center">
            <input type="number" id="item-{{$item->id}}-quantity" class="form-control" style="width: auto; !important"
                name="item[{{$item->id}}][quantity]" value="{{$item->quantity}}">
        </td>
        <td class="align-middle">
            <strong class="fw-500">
                @php // Adding the product cost in cart total
                $cartTotal += $item->quantity * $item->product->cost_numeric;
                @endphp
                ${{ $item->quantity * ($item->product->cost_numeric) }}
            </strong>
        </td>
        <td class="align-middle">
            <button type="button" data-url={{route('frontend.cart.delete', $item->id)}}
                data-delete-element='item-{{$item->id}}' class="ajax-post-request btn btn-outline-danger btn-sm">
                <i class="fa fa-trash"></i>
            </button>
            <button type="submit" class="btn btn-sm btn-outline-primary">
                <i class="fa fa-save"></i>
            </button>
        </td>
    </tr>
    @empty
    <tr>
        <td scope="row" align="center" colspan="5">
            Add items to cart !!
        </td>
    </tr>
    @endforelse
</tbody>
</form>
</table>
</div>
</div>
</div>
<div class="card-footer bg-white">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-12 col-lg-12 text-center">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td class="text-center align-middle">
                            <strong>Cart Total: </strong>
                        </td>
                        <td class="align-middle">
                            <strong class="fw-500">${{$cartTotal}}</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div> --}}
@endsection
