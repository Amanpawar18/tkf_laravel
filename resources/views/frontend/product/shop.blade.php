@extends('frontend.layout.master')
@section('content')
<div class="container">
    <section class="product-detail-main">
        <div class="row position-relative">
            <div class="col-md-12 text-center">
                <h3>
                    All Products
                </h3>
                At Venttura we believe your pet comes FIRST. With this simple approach to
                guide all our decisions our goal is to help pets be healthy and to provide
                wellness solutions to pets of all ages, at all stages.
                <hr>
            </div>
            <div class="col-md-3">
                <div class="card card-body position-sticky" style="top: 20px;">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($categories as $category)
                            <label for="">{{$category->name}}</label>
                            <ul class="" style="list-style-type: none;">
                                @foreach ($category->categories as $subCategory)
                                <li>
                                    <a class="text-dark text-decoration-none"
                                        href="{{route('frontend.product.shop', ['category' => $category->slug, 'subcategory' => $subCategory->slug])}}">
                                        {{$subCategory->name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @forelse ($products as $product)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="product-item">
                            <a href="{{route('frontend.product.details', $product->slug)}}"
                                class="text-decoration-none">
                                <div class="product-image" style="height: 200px !important;">
                                    <div class="featured-badge black" style="width: 125px; height:145px; top:-90px;">
                                        {{$product->category->name}}
                                    </div>
                                    <img src="{{$product->image_path}}" class="img-fluid">
                                </div>
                            </a>
                            <div class="product-info">
                                <a href="{{route('frontend.product.details', $product->slug)}}"
                                    class="text-dark text-decoration-none">
                                    <p class="m-0 p-0 text-capitalize">
                                        <strong>
                                            {{$product->name}}
                                        </strong>
                                    </p>
                                    <small>
                                        {{$product->sub_description}}
                                    </small>
                                    <h5>
                                        starting at <strong>{{$product->cost}}</strong>
                                    </h5>
                                </a>
                                <a href="{{route('frontend.product.details', $product->slug)}}" class="btn btn-buy-now">Buy Now</a>
                            </div>

                        </div>
                    </div>
                    @empty
                    <div class="col-md-12 text-center">
                        No Data Found
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('additional_script')
<script src='{{asset('frontend/assets/js/jquery.zoom.min.js')}}'></script>
<script src='{{asset('frontend/assets/js/jquery.zoom.min.js')}}'></script>
@endsection
