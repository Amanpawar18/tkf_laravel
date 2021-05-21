@extends('frontend.layout.master')
@section('meta_title')
Venttura Blogs
@endsection
@section('meta_description')
Venttura Blogs
@endsection
@section('meta_keywords')
Venttura Blogs
@endsection
@section('content')
<div class="container">
    <section class="product-detail-main">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>
                    Blogs
                </h3>
                <hr>
            </div>
        </div>
        <div class="row">
            @forelse ($blogs as $blog)
            <div class="col-lg-3 mx-2 col-sm-6 col-12 mt-4 mt-lg-0 text-center">
                <div class="blog-item">
                    <div class="blog-image">
                        <img src="{{$blog->banner_image_path}}" style="height: 300px;"
                            class="img-fluid object-fit-contain">
                    </div>
                    <div class="blog-caption mt-40">
                        <h6 class="bold mb-40 mt-40">{{$blog->name}}</h6>
                        <p>
                            {!! Str::limit($blog->content, 100) !!}
                        </p>
                        <div class="text-center mt-40">
                            <a class="btn has-left-icon bold" href="{{route('frontend.blog.view', $blog->slug)}}" title=""><i class="fa fa-arrow-circle-right"
                                    aria-hidden="true"></i>Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-4 mb-3">
                <a href="{{route('frontend.blog.view', $blog->slug)}}" class=" text-dark text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <img src="{{$blog->banner_image_path}}" class="object-fit-contain" height="100px"
                                        alt="">
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    {{ $blog->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div> --}}
            @empty
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p>No Blog Found</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </section>
</div>
@endsection
