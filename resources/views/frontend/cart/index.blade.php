@extends('frontend.layout.master')
@section('content')
@php
$cartTotal = 0;
@endphp
<div class="container py-5">
    <div class="card">
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
                                    <td class="align-middle">
                                        <button type="button" data-url={{route('frontend.cart.delete', $item->id)}}
                                            data-delete-element='item-{{$item->id}}'
                                            class="ajax-post-request btn btn-outline-danger btn-sm">
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
    </div>
</div>
@endsection
