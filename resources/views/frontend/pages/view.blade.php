@extends('frontend.layout.master')
@section('meta_title')
{{$page->meta_title}}
@endsection
@section('meta_description')
{{$page->meta_description}}
@endsection
@section('meta_keywords')
{{$page->meta_keywords}}
@endsection
@section('content')

<section class="" id="">
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                {!! $page->content !!}
            </div>
        </div>
    </div>
</section>

@endsection
