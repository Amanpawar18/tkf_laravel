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
                        <li class="breadcrumb-item active">Client Experience</a></li>
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
                            <h3 class="card-title">Experience</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <strong>Name:</strong>
                                    {{$clientExperience->user->name}}
                                </div>
                                <div class="col-md-3 mb-3">
                                    <strong>Email:</strong>
                                    {{$clientExperience->user->email}}
                                </div>
                                <div class="col-md-3 mb-3">
                                    <strong>Product Name:</strong>
                                    {{$clientExperience->product->name}}
                                </div>
                                <div class="col-md-3 mb-3">
                                    <strong>Category:</strong>
                                    {{$clientExperience->category->name}}
                                </div>
                                <div class="col-md-12 mb-3">
                                    <strong>Comment:</strong>
                                    {{$clientExperience->description}}
                                </div>
                                <div class="col-md-12 mb-3">
                                    <img src="{{$clientExperience->image_path}}" class="img-fluid object-fit-contain img-lg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('admin.client-experience.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
