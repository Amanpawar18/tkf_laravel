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
        src="{{$homePageData->header_video_url}}">
    </iframe>
</div>

<section class="home-section">
    <div class="container-fluid text-center">
        <h1 class="section-title bold">{{$homePageData->section_one_heading}}</h1>
        <p class="mb-0">
            {{$homePageData->section_one_heading_description}}
        </p>
        <a class="btn btn-gradient-light has-right-icon mt-40" href="{{$homePageData->read_more_link}}" title="">
            Read More
            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
        </a>
    </div>
</section>
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
                                <div class="featured-badge black">{{$product->category->name}}</div>
                                <img src="{{$product->image_path}}" class="img-fluid">
                            </div>
                        </a>
                        <div class="product-info">
                            <a href="{{route('frontend.product.details', $product->slug)}}" class="text-dark text-decoration-none">
                                <h2>{{$product->name}}<small>{{$product->sub_description}}</small></h2>
                                <p class="small">
                                    {{$product->description}}
                                </p>
                                <h5>starting at <span class="product-price">{{$product->cost}}</span></h5>
                            </a>
                            <a class="btn btn-buy-now">Buy Now</a>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="subscription-banner" @if($homePageData->section_three_image_half_path != null) style='background-image:
    url({{$homePageData->section_three_image_half_path}})' @endif>
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
            <div class="col-12 col-lg-6">
                <img src="{{$homePageData->section_six_image_one_path}}" height="410px"
                    class="object-fit-contain img-fluid">
            </div>
            <div class="col-12 col-lg-6 mt-lg-0 mt-4">
                <img src="{{$homePageData->section_six_image_two_path}}" height="410px"
                    class="object-fit-contain img-fluid">
            </div>
        </div>
    </div>

    <img src="{{asset('frontend/assets/images/WhatsApp-Image-2021-02-08-at-3.05.03-PM-1.jpeg')}}" class="w-100 mt-30">

</section>
<section class="home-section">
    <div class="container-fluid">
        <div class="blog-cards text-left">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12 mt-4 mt-lg-0">
                    <div class="blog-item">
                        <div class="blog-image">
                            <img src="{{asset('frontend/assets/images/Joint-Health-in-Dogs-Copy.png')}}"
                                class="img-fluid">
                        </div>
                        <div class="blog-caption mt-40">
                            <h6 class="bold mb-40 mt-40">Joint Health in Dogs</h6>
                            <p>Joints allow dogs free movement and flexibility. Without joints the skeleton would be
                                a rigid bag of bones! Joints are incredible examples of engineering that are made of
                                a number of parts.</p>
                            <h6 class="bold mb-30 mt-40">Components of a Joint</h6>
                            <p><strong>Bones-</strong> A joint is formed where two or more bones meet to allow
                                movement.</p>

                            <div class="text-center mt-40">
                                <a class="btn has-left-icon bold" href="#" title=""><i class="fa fa-arrow-circle-right"
                                        aria-hidden="true"></i>Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 mt-4 mt-lg-0">
                    <div class="blog-item">
                        <div class="blog-image">
                            <img src="{{asset('frontend/assets/images/cat-blog.jpg')}}" class="img-fluid">
                        </div>
                        <div class="blog-caption mt-40">
                            <h6 class="bold mb-40 mt-40">
                                Litter Training your Cat
                            </h6>
                            <p> By the time most kittens leave their mother and come to live with their new family, they
                                have already been toilet trained, making life easy for the new family. This is because
                                mother cats often train their kittens’ proper toileting habits. However, sometimes it
                                will be necessary to train your new kitten or cat how to use the litter tray. .
                            </p>
                            <div class="text-center mt-40">
                                <a class="btn has-left-icon bold" href="#" title=""><i class="fa fa-arrow-circle-right"
                                        aria-hidden="true"></i>Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 mt-4 mt-lg-0">
                    <div class="blog-item">
                        <div class="blog-image">
                            <img src="{{asset('frontend/assets/images/puppy-blog.jpg')}}" class="img-fluid">
                        </div>
                        <div class="blog-caption mt-40">
                            <h6 class="bold mb-40 mt-40">
                                Boosting Your Dog’s Immune System
                            </h6>
                            <p>
                                Your dog’s immune system is a complex and intricate system that protects your pet from
                                external as well as internal factors. It consists of white blood cells, antibodies and
                                other components that help fight infections, pathogens like bacteria and viruses and
                                toxins, parasites, free radicals, etc. The immune system involves organs like the bone
                            </p>
                            <div class="text-center mt-40">
                                <a class="btn has-left-icon bold" href="#" title=""><i class="fa fa-arrow-circle-right"
                                        aria-hidden="true"></i>Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 mt-4 mt-lg-0">
                    <div class="blog-item">
                        <div class="blog-image">
                            <img src="{{asset('frontend/assets/images/Healthy-Skin-Coat.jpg')}}" class="img-fluid">
                        </div>
                        <div class="blog-caption mt-40">
                            <h6 class="bold mb-40 mt-40">
                                Healthy Skin & Coat in Dogs
                            </h6>
                            <p>
                                A dog’s skin and coat are a barometer to his overall health. Soft, shiny coat and supple
                                skin without redness or flakiness are signs of a healthy dog but dry itchy skin, brittle
                                rough coat, redness, scratching and hair loss are all indications that your dog may not
                                be feeling at his best and may need a visit to the vet’s. Skin and coat ‘issues’
                            </p>
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
@endsection
