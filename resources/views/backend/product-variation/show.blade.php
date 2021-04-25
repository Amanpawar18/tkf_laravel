@extends('backend.layout.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-text-width"></i>
                                <strong></strong>
                                {{$product->name}}'s Detail
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-center">
                                    @if(file_exists(public_path('frontend/uploads/product/'.$product->image))
                                    && is_file(public_path('frontend/uploads/product/'.$product->image)))
                                    <img src="{{asset('frontend/uploads/product/'.$product->image)}}"
                                        style="height: 100px; width: 100px; object-fit: contain;">
                                    @else
                                    <img src="{{asset('frontend/uploads/default_category.png')}}"
                                        style="height: 100px; width: 100px; object-fit: contain;">
                                    @endif
                                </div>

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Name :</label>
                                            {{ucwords($product->name)}}
                                        </div>
                                        <div class="col-md-12">
                                            <label>Description :</label>
                                            {!! ucwords($product->description) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Category Name :</label>
                                            {{ isset($product->category) ? ucwords($product->category->name) : 'N/A' }}
                                        </div>
                                        <div class="col-md-6">
                                            <label>Sub-Category Name :</label>
                                            {{ isset($product->subCategory) ? ucwords($product->subCategory->name) : 'N/A' }}
                                        </div>
                                        <div class="col-md-4">
                                            <label>Sale Price :</label>
                                            $ {{($product->sale_price)}}
                                        </div>
                                        <div class="col-md-4">
                                            <label>Regular Price :</label>
                                            $ {{($product->regular_price)}}
                                        </div>
                                        <div class="col-md-4">
                                            <label>Date :</label>
                                            {{date('d-F-Y',strtotime($product->created_at))}}
                                        </div>

                                        <div class="col-md-12 mt-3 table-responsive">
                                            @if(isset($product->size))
                                            <table class="table table-border">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Size
                                                        </th>
                                                        <th>
                                                            Availablity
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($product->size as $key => $val)
                                                    <tr>
                                                        <td>
                                                            {{$key}}
                                                        </td>
                                                        <td>
                                                            {{$val== 1? 'Available' : 'Not Available'}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.product.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection
