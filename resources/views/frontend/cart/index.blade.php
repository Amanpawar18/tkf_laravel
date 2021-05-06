@extends('frontend.layout.master')
@section('content')
@php
$cartTotal = 0;
@endphp
<div class="container py-5">
    <div class="card card-body">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-12 col-lg-12 text-center">
                <table class="table">
                    <thead>
                        <tr class="">
                            <th scope="col" colspan="3">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>

                    <form action="{{route('frontend.cart.update')}}" method="POST">
                        @csrf
                        <tbody>
                            @forelse ($cartItems as $item)
                            <tr id="item-{{$item->id}}">
                                <td class="align-middle" scope="row">
                                    <img src="{{asset($item->product->image_path)}}" class="object-fit-contain"
                                        width="100px" height="82px">
                                </td>
                                <td class="align-middle">
                                    <p>
                                        <a href="{{route('frontend.product.details', $item->product->slug)}}">
                                            {{$item->product->name}}
                                        </a>
                                    </p>
                                </td>
                                <td class="align-middle">
                                    <button type="button" data-url={{route('frontend.cart.delete', $item->id)}}
                                        data-delete-element='item-{{$item->id}}'
                                        class="ajax-post-request btn btn-outline-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                                <td class="align-middle">
                                    {{$item->product->cost}}
                                </td>
                                <td class="align-middle" align="center">
                                    <input type="number" id="item-{{$item->id}}-quantity" class="form-control"
                                        style="width: auto; !important" name="item[{{$item->id}}][quantity]"
                                        value="{{$item->quantity}}">
                                </td>
                                <td class="align-middle">
                                    <strong class="fw-500">
                                        @php // Adding the product cost in cart total
                                        $cartTotal += $item->quantity * $item->product->cost_numeric;
                                        @endphp
                                        {{-- Showing the product cost in table --}}
                                        ${{ $item->quantity * ($item->product->cost_numeric) }}
                                    </strong>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td scope="row" align="center" colspan="5">
                                    Add items to cart !!
                                </td>
                            </tr>
                            @endforelse
                            <tr>
                                <td colspan="3">
                                </td>
                                <td class="text-center">
                                    <strong>SUBTOTAL</strong>
                                </td>
                                <td> &nbsp; </td>
                                <td><strong class="fw-500">${{$cartTotal}}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                </td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-buy-now mt-4 " style="width: auto; !important">
                                        Update Cart
                                    </button>
                                </td>
                                @if(count($cartItems))
                                <td>
                                    {{-- <a href="{{route('frontend.checkout')}}" class="btn btn-black btn-block mt-4
                                    bg-dark">
                                    Check Out
                                    <div class="ripple-container"></div>
                                    <div class="ripple-container"></div>
                                    </a> --}}
                                </td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                        </tbody>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
