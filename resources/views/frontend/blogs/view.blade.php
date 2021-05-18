@extends('frontend.layout.master')
@section('meta_title')
{{$blog->meta_title}}
@endsection
@section('meta_description')
{{$blog->meta_description}}
@endsection
@section('meta_keywords')
{{$blog->meta_keywords}}
@endsection
@section('content')

<section class="" id="">
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="{{$blog->banner_image_path}}" class="object-fit-contain" height="300px" alt="">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        {!! $blog->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
