@extends('frontend.layout.master')
@section('meta_title')
{{$homePageData->meta_title}}
@endsection
@section('meta_description')
{{$homePageData->meta_description}}
@endsection
@section('meta_keywords')
{{$homePageData->meta_keywords}}
@endsection
@section('content')
<div class="video-banner">
    <iframe width="950" height="600" frameborder="0" allowfullscreen="1"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        src="https://www.youtube.com/embed/{{$category->frontend_video_url}}?playlist={{$category->frontend_video_url}}&autoplay=1&mute=1&loop=1&controls=0">
    </iframe>
</div>
<section class="home-section">
    <div class="container-fluid">
        <div class="text-center">
            <h1 class="section-title">{{$homePageData->section_two_heading}}</h1>
            <p class="mb-0">{{$homePageData->section_two_heading_description}}</p>
        </div>

        <div class="product-cards pt-10">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-6 col-lg-3">
                    <div class="product-item mt-30">
                        <a href="{{route('frontend.product.details', $product->slug)}}" class="text-decoration-none">
                            <div class="product-image">
                                <div class="featured-badge black small-category-badge">{{$product->category->name}}
                                </div>
                                <img src="{{$product->image_path}}" class="img-fluid">
                            </div>
                        </a>
                        <div class="product-info">
                            <a href="{{route('frontend.product.details', $product->slug)}}"
                                class="text-dark text-decoration-none">
                                <h2>
                                    {{$product->name}}
                                    @if($product->is_sale)
                                        <span class="text-danger h6">
                                            (On Sale)
                                        </span class="text-danger h6">
                                        @endif
                                    <small>{{$product->sub_description}}</small>
                                </h2>
                                <p class="small">
                                    {{$product->description}}
                                </p>
                                <h5>starting at <span class="product-price">₹{{$product->cost}}</span></h5>
                            </a>
                            <a href="{{route('frontend.product.details', $product->slug)}}" class="btn btn-buy-now">Buy
                                Now</a>
                        </div>

                    </div>
                </div>
                @endforeach
                <div class="col-md-12 text-center">
                    <a href="{{route('frontend.product.shop', ['category' => $category->slug])}}"
                        class="btn btn-buy-now" style="width: auto; !important">View all</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="subscription-banner" @if($category->subscription_banner_path != null) style='background-image:
    url({{$category->subscription_banner_path}})' @endif>
    <div class="subscription-banner-container">
        <div class="subscription-banner-form-wrapper">
            <form>
                <h1>{{$homePageData->section_three_heading}}</h1>
                <input type="email" class="form-control" placeholder="Your Email">
                <button type="submit" class="btn btn-subscribe">Subscribe Now</button>
            </form>
        </div>
    </div>
</section>


<section class="home-section">
    <div class="container-fluid">
        <h1 class="section-title text-center">{{$homePageData->section_four_heading}}</h1>

        <div class="experience-cards text-left">
            <div class="row">
                <div class="col-md-4">
                    <div class="experience-item">
                        <div class="experience-image">
                            <img src="{{asset('frontend/assets/images/blavkdog.jpeg')}}" class="img-fluid">
                        </div>
                        <div class="experience-caption mt-40">
                            ” We’ve been using Venttura Bioceuticals’ products Omega+ and Nutri+ Pro for our dogs
                            for over 3 years now and the results speak for themselves.Omega+ has made our dog coat
                            extremely shiny, healthy, soft and no skin problems at all. “
                            <h5 class="bold mt-1 mb-0">Ashdeen J.</h5>

                            <div class="text-center mt-40">
                                <a class="btn has-left-icon bold" href="#" title=""><i class="fa fa-arrow-circle-right"
                                        aria-hidden="true"></i>Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="experience-item">
                        <div class="experience-image">
                            <img src="{{asset('frontend/assets/images/brown-dog.jpg')}}" class="img-fluid">
                        </div>
                        <div class="experience-caption mt-40">
                            “Fur+ helped to promote healthy fur and improved coat condition of my dog . Also there is no
                            excessive shedding after using this product .
                            i can see new hairs and coat on my dog . It is the best pet care product range i have ever
                            used ! ” .
                            <h5 class="bold mt-1 mb-0">A. Jamshedji</h5>

                            <div class="text-center mt-40">
                                <a class="btn has-left-icon bold" href="#" title=""><i class="fa fa-arrow-circle-right"
                                        aria-hidden="true"></i>Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="experience-item">
                        <div class="experience-image">
                            <img src="{{asset('frontend/assets/images/furdog.jpg')}}" class="img-fluid">
                        </div>
                        <div class="experience-caption mt-40">
                            “Nutri + Pro has helped in overall general health and vitality of the my dog. It helped in
                            growth and development with multivitamin and mineral contents. We are extremely happy with
                            these products and highly recommend them!”
                            <h5 class="bold mt-1 mb-0"> Mr. Kulkarni</h5>

                            <div class="text-center mt-40">
                                <a class="btn has-left-icon bold" href="#" title=""><i class="fa fa-arrow-circle-right"
                                        aria-hidden="true"></i>Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="reward-collage">
    <img src="{{$homePageData->section_five_image_path}}" height="420px" class="object-fit-contain img-fluid">
    <div class="container-fluid">

        <div class="row mt-30">
            <div class="col-12 col-lg-6 text-center">
                <img src="{{$category->frontend_image_one_path}}" height="410px" class="object-fit-contain img-fluid">
            </div>
            <div class="col-12 col-lg-6 mt-lg-0 mt-4 text-center">
                <img src="{{$category->frontend_image_two_path}}" height="410px" class="object-fit-contain img-fluid">
            </div>
        </div>
    </div>
    <img src="{{asset('frontend/assets/images/WhatsApp-Image-2021-02-08-at-3.05.03-PM-1.jpeg')}}" class="w-100 mt-30">
</section>
@endsection
