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
                        <li class="breadcrumb-item active">Users</a></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">{{$user->name}} detail</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">
                                        Name
                                    </label>
                                    <p>
                                        {{$user->name . ' ' .$user->last_name}}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        Email
                                    </label>
                                    <p>
                                        {{$user->email}}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        Phone No.
                                    </label>
                                    <p>
                                        {{$user->phone_no}}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Pan no</label>
                                    <p>
                                        {{$user->pan_no}}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Pan front image</label>
                                    <p>
                                        <a href="{{$user->pan_front_image_path}}" target="_blank">Click here to see
                                            image</a>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Pan back image</label>
                                    <p>
                                        <a href="{{$user->pan_back_image_path}}" target="_blank">Click here to see
                                            image</a>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Aadhaar no</label>
                                    <p>
                                        {{$user->aadhaar_no}}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Aadhaar front image</label>
                                    <p>
                                        <a href="{{$user->aadhaar_front_image_path}}" target="_blank">Click here to see
                                            image</a>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Aadhaar back image</label>
                                    <p>
                                        <a href="{{$user->aadhaar_back_image_path}}" target="_blank">Click here to see
                                            image</a>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">

                                    <p class="">
                                        <u>
                                            Order History
                                        </u>
                                    </p>

                                    <table class="table">

                                        <thead>
                                            <tr class="">
                                                <th scope="col" colspan="2">Product</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($user->orderProducts()->take(5)->get() as $orderProduct)
                                            <tr>
                                                <td scope="row">
                                                    <img src="{{$orderProduct->product->image_path}}"
                                                        class="object-fit-contain img-sm" width="100" height="82">
                                                </td>
                                                <td>
                                                    <p>{{$orderProduct->product->name}}</p>
                                                </td>
                                                <td>{{$orderProduct->amount}}</td>
                                                <td>{{$orderProduct->quantity}}</td>
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
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{route('admin.user.index')}}" class="btn btn-primary btn-sm">Go back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
