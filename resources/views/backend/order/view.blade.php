@extends('backend.layout.master')
@section('content')
@php
use Illuminate\Support\Facades\Route;
@endphp
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.orders.index')}}">Orders</a></li>
                        <li class="breadcrumb-item active">Order Detail</a></li>
                    </ol>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Order Detail</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-2">
                                    <label>User (Buyer) :</label>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('admin.user.show',$order->user->id)}}" target="_blank">
                                        {{$order->user->name}}
                                    </a>
                                </div>

                                <div class="col-md-2">
                                    <label>Order Status :</label>
                                </div>
                                <div class="col-md-4">
                                    {{$order->status_text}}
                                </div>

                                <div class="col-md-2">
                                    <label>Payment Status :</label>
                                </div>
                                <div class="col-md-4">
                                    {{$order->status_text}}
                                </div>

                                <div class="col-md-2">
                                    <label>Stripe Payment Id :</label>
                                </div>
                                <div class="col-md-4">
                                    {{$order->stripe_payment_id}}
                                </div>

                                <div class="col-md-2">
                                    <label>Total Amount :</label>
                                </div>
                                <div class="col-md-4">
                                    ₹{{$order->total_amount}}
                                </div>

                                <div class="col-md-2">
                                    <label>Address :</label>
                                </div>
                                <div class="col-md-4">
                                    {!! $order->shippingAddress ? $order->shippingAddress->address_in_text : 'N/A' !!}
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12 col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Product Name</th>
                                                    <th>Size</th>
                                                    <th>Quantity</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $i = 1;
                                                @endphp
                                                @foreach($order->orderProducts as $orderProduct)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>
                                                        <a href="{{route('admin.product.show',$orderProduct->product->slug)}}"
                                                            target="_blank">
                                                            {{$orderProduct->product->name}}
                                                        </a>
                                                    </td>
                                                    <td>{{$orderProduct->size ?? '-'}}</td>
                                                    <td>{{$orderProduct->quantity}}</td>
                                                    <td>₹{{$orderProduct->amount}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{route('admin.orders.index')}}" class="btn btn-primary">Go Back</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
