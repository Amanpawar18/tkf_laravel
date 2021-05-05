@extends('frontend.layout.master')
@section('content')
@php
$cartTotal = 0;
@endphp
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-12 col-lg-12 text-center">
            <table class="table">
                <thead>
                    <tr class="">
                        <th scope="col" colspan="2">Product</th>
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
                            <td scope="row">
                                <img src="{{asset($item->product->image_path)}}" class="object-fit-contain"
                                    width="100px" height="82px">
                            </td>
                            <td>
                                <p>
                                    <a href="{{route('frontend.product.details', $item->product->slug)}}">
                                        {{$item->product->name}}
                                    </a>
                                </p>
                                <p><small class="fw-500">{{$item->size}}</small> </p>
                                <button type="button" data-url={{route('frontend.cart.delete', $item->id)}}
                                    data-delete-element='item-{{$item->id}}'
                                    class="ajax-post-request btn bg-dark btn-round btn-sm">
                                    <i class="material-icons">delete_outline</i> Remove
                                </button>
                            </td>
                            <td>
                                $ {{$item->product->cost}}
                            </td>
                            <td>
                                <input type="number" id="item-{{$item->id}}-quantity"
                                    name="item[{{$item->id}}][quantity]" value="{{$item->quantity}}">
                            </td>
                            <td>
                                <strong class="fw-500">
                                    @php // Adding the product cost in cart total
                                    $cartTotal += $item->quantity * $item->product->cost;
                                    @endphp
                                    {{-- Showing the product cost in table --}}
                                    ${{ $item->quantity * ($item->product->cost) }}
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
                            <td colspan="2">

                            </td>
                            <td class="text-center">
                                <strong>SUBTOTAL</strong>
                            </td>
                            <td> &nbsp; </td>
                            <td><strong class="fw-500">${{$cartTotal}}</strong></td>
                        </tr>

                        <tr>
                            <td colspan="3">

                            </td>
                            <td class="text-center">
                                <button type="submit" class="btn btn-black btn-block mt-4 text-dark bg-white">Update
                                    Cart
                                    <div class="ripple-container"></div>
                                    <div class="ripple-container"></div>
                                </button>
                            </td>
                            @if(count($cartItems))
                            <td>
                                <a href="{{route('frontend.checkout')}}" class="btn btn-black btn-block mt-4 bg-dark">
                                    Check Out
                                    <div class="ripple-container"></div>
                                    <div class="ripple-container"></div>
                                </a>
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

@endsection
