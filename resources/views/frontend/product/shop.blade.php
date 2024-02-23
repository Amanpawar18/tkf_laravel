@extends('frontend.layout.master')
@section('content')
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Shop from our inventory</h1>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <ul class="list-inline rounded mb-5" id="portfolio-flters">
                    <li class="mx-2 active" data-filter="*">All</li>
                    @foreach ($categories as $category)
                    <li class="mx-2" data-filter=".{{$category->name}}">{{$category->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row g-4 portfolio-container">
            @forelse ($products as $product)
            <div class="col-lg-4 col-md-6 portfolio-item {{ $product->category->name }} wow fadeInUp"
                data-wow-delay="0.1s">
                <a class="" href="{{ route('frontend.product.details', $product->slug) }}">
                    <div class="portfolio-inner rounded">
                        <img class="img-fluid" src="{{ $product->image_path }}" alt="">
                        <div class="portfolio-text">
                            <h4 class="text-white mb-4">{{ $product->name }}</h4>
                            <div class="d-flex">
                                <i class="fa fa-link"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-md-12 text-center">
                No Products Listed
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
@section('additional_script')
<script src='{{asset(' frontend/assets/js/jquery.zoom.min.js')}}'></script>
<script src='{{asset(' frontend/assets/js/jquery.zoom.min.js')}}'></script>
@endsection