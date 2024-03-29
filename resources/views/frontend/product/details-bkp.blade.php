@extends('frontend.layout.master')
@section('content')
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown"> {{$product->name}}</h1>
    </div>
</div>
<div class="container">
    <section class="product-detail-main">
        <div class="row">
            <div class="col-lg-6 product-detail-gallery">
                @if(count($product->productVariations))
                @foreach ($product->productVariations as $key => $variation)
                <div id="productDetailCarousel-{{$variation->id}}"
                    class="productDetailCarousel carousel carousel-dark slide carousel-fade {{ $loop->first ? '' : 'd-none' }} "
                    data-bs-ride="carousel" data-bs-interval="false">
                    <div class="carousel-indicators d-sm-flex d-none">
                        @foreach ($variation->images as $key => $image)
                        <button type="button" data-bs-target="#productDetailCarousel-{{$variation->id}}"
                            data-bs-slide-to="{{$key}}" class="{{$loop->first ? 'active' : ''  }} " aria-current="true"
                            aria-label="Slide {{$key + 1}}">
                            <img src="{{ $image->image_path }}" style="height: 50px !important"
                                class="object-fit-contain w-100">
                        </button>
                        @endforeach
                        </button>
                    </div>
                    <div class="carousel-inner">
                        @foreach ($variation->images as $key => $image)
                        <div class="carousel-item {{$loop->first ? 'active' : ''  }}">
                            <img src="{{$image->image_path}}" style="height: 450px !important"
                                class="d-block object-fit-contain w-100" alt="...">
                        </div>
                        @endforeach
                        <button class="carousel-control-prev carousel-controls" type="button"
                            data-bs-target="#productDetailCarousel-{{$variation->id}}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next carousel-controls" type="button"
                            data-bs-target="#productDetailCarousel-{{$variation->id}}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="carousel-indicators d-sm-none">
                        <button type="button" data-bs-target="#productDetailCarousel-{{$variation->id}}"
                            data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"><img
                                src="{{asset('frontend/assets/images/dog1.jpg')}}"></button>
                        <button type="button" data-bs-target="#productDetailCarousel" data-bs-slide-to="1"
                            aria-label="Slide 2"><img src="{{asset('frontend/assets/images/dog2.jpg')}}"></button>
                    </div>
                </div>
                @endforeach
                @else
                <div id="productDetailCarousel-{{$product->id}}"
                    class="productDetailCarousel carousel carousel-dark slide carousel-fade " data-bs-ride="carousel"
                    data-bs-interval="false">
                    <div class="carousel-indicators d-sm-flex d-none">
                        @foreach ($product->productImages as $key => $image)
                        <button type="button" data-bs-target="#productDetailCarousel-{{$product->id}}"
                            data-bs-slide-to="{{$key}}" class="{{$loop->first ? 'active' : ''  }} " aria-current="true"
                            aria-label="Slide {{$key + 1}}">
                            <img src="{{ $image->image_path }}" style="height: 50px !important"
                                class="object-fit-contain w-100">
                        </button>
                        @endforeach
                        </button>
                    </div>
                    <div class="carousel-inner">
                        @foreach ($product->productImages as $key => $image)
                        <div class="carousel-item {{$loop->first ? 'active' : ''  }}">
                            <img src="{{$image->image_path}}" style="height: 450px !important"
                                class="d-block object-fit-contain w-100" alt="...">
                        </div>
                        @endforeach
                        <button class="carousel-control-prev carousel-controls" type="button"
                            data-bs-target="#productDetailCarousel-{{$product->id}}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next carousel-controls" type="button"
                            data-bs-target="#productDetailCarousel-{{$product->id}}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="carousel-indicators d-sm-none">
                        <button type="button" data-bs-target="#productDetailCarousel-{{$product->id}}"
                            data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"><img
                                src="{{asset('frontend/assets/images/dog1.jpg')}}"></button>
                        <button type="button" data-bs-target="#productDetailCarousel" data-bs-slide-to="1"
                            aria-label="Slide 2"><img src="{{asset('frontend/assets/images/dog2.jpg')}}"></button>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="product-detail-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="#">{{$product->name}}</a></li>
                        </ol>
                    </nav>
                    <h1 class="product-title">
                        {{$product->name}}
                        @if($product->is_sale)
                        <span class="text-danger h6">
                            (On Sale)
                        </span class="text-danger h6">
                        @endif
                    </h1>
                    <div class="product-short-description">
                        <h5 class="product-desc-main">
                            {{$product->sub_description}}
                        </h5>
                        <p>{{$product->description}}</p>
                        @if($product->referral_percent)
                        <p class="text-theme">
                            Refer this product and get {{$product->referral_percent}} % cashback in your wallet.
                        </p>
                        @endif
                        <div class="col-md-12">
                            <h3 class="product-price">
                                @if(count($product->productVariations))
                                @foreach ($product->productVariations as $key => $variation)
                                <span id="price-{{$variation->id}}"
                                    class="price {{$loop->first ? '' : 'd-none'}}">
                                    <span class="product-Price-symbol h3 product-price">₹</span>
                                    {{$variation->cost}}
                                </span>
                                @endforeach
                                @else
                                @if($product->is_sale)
                                <span class="h6" style="margin-right:5px">
                                    <del>
                                        ₹{{$product->regular_price}}
                                    </del>
                                </span>
                                @endif
                                {{-- <span class="product-Price-symbol h3 product-price">₹</span> --}}
                                 ₹ {{$product->cost}}
                                @endif
                            </h3>
                        </div>
                    </div>

                    <form class="variations_form theme-form" action="{{route('frontend.cart.store', $product->id)}}"
                        method="POST">
                        @csrf
                        @if(count($product->productVariations))
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="choose_size" class=" col-form-label">Choose a Size</label>
                            </div>
                            <div class="col-md-9">
                                <select name="variation_id" id="choose_size" class="form-control">
                                    @foreach ($product->productVariations as $variation)
                                    <option value="{{$variation->id}}">{{ $variation->size }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="product-main-detail-submission">
                            <div class="row align-items-center">
                                <div class="col-md-7 mb-1 product-short-description">
                                    <p>
                                        Free delivery above ₹500
                                        @if($product->made_in)
                                        <br>
                                        Made in {{$product->made_in}}
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-5 mb-1 product-short-description text-right">
                                    <p>
                                        <a href="" data-bs-target="#checkPinCodeMOdal" data-bs-toggle="modal"
                                            class="text-decoration-none">Check delivery eligblity</a>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <div class="quantity_selector">
                                        <div class="input-group mb-3">
                                            <button class="btn decrease" type="button">-</button>
                                            <input type="text" name="quantity" class="form-control quantity" readonly
                                                value="1">
                                            <button class="btn increase" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    @include('frontend.product.price')
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-product_desc-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-product_desc" type="button" role="tab" aria-controls="nav-product_desc"
                    aria-selected="true">Description</button>
                <button class="nav-link" id="nav-add_info-tab" data-bs-toggle="tab" data-bs-target="#nav-add_info"
                    type="button" role="tab" aria-controls="nav-add_info" aria-selected="false">Additional
                    Information</button>
                <button class="nav-link" id="nav-reviews-tab" data-bs-toggle="tab" data-bs-target="#nav-reviews"
                    type="button" role="tab" aria-controls="nav-reviews" aria-selected="false">Reviews (0)</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-product_desc" role="tabpanel"
                aria-labelledby="nav-product_desc-tab">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <div class="desc-section">
                            <h1 class="section-title bold">Products Details</h1>
                            <p>{!! $product->product_detail !!}</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="desc-section">
                            <h1 class="section-title bold">Directions for Use</h1>
                            <p>{!! $product->direction_for_use !!}</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="desc-section">
                            <h1 class="section-title bold">Suggested For</h1>
                            <p>{!! $product->suggested_for !!}</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="desc-section">
                            <h1 class="section-title bold">Composition</h1>
                            <p>{!! $product->composition !!}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if(count($product->productFaqs))
                    <div class="col-md-6">
                        <div class="accordion-section">
                            <h1 class="text-center section-title bold">{{$product->name}} FAQ</h1>
                            <div class="accordion accordion-flush" id="product_faq_accordion">
                                @foreach ($product->productFaqs as $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="faq-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#accordion_faq_{{$faq->id}}"
                                            aria-expanded="false" aria-controls="accordion_faq_{{$faq->id}}">
                                            {{$faq->faq_heading}}
                                        </button>
                                    </h2>
                                    <div id="accordion_faq_{{$faq->id}}" class="accordion-collapse collapse"
                                        aria-labelledby="faq-headingOne" data-bs-parent="#product_faq_accordion">
                                        <div class="accordion-body">
                                            {!! $faq->faq_description !!}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(count($product->productBenefits))
                    <div class="col-md-6">
                        <div class="accordion-section">
                            <h1 class="text-center section-title bold">Benefits Of {{$product->name}} Ingredients</h1>
                            <div class="accordion accordion-flush" id="product_benefit_accordion">
                                @foreach ($product->productBenefits as $benefit)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="benefit-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#accordion_benefit_{{$benefit->id}}" aria-expanded="false"
                                            aria-controls="accordion_benefit_{{$benefit->id}}">
                                            {{$benefit->heading}}
                                        </button>
                                    </h2>
                                    <div id="accordion_benefit_{{$benefit->id}}" class="accordion-collapse collapse"
                                        aria-labelledby="benefit-headingOne"
                                        data-bs-parent="#product_benefit_accordion">
                                        <div class="accordion-body">
                                            {!! $benefit->description !!}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <section class="note-section">
                    <h5>Note*</h5>
                    <div class="text-center">
                        <p>{{$product->note}}</p>
                    </div>
                </section>

            </div>
            <div class="tab-pane fade" id="nav-add_info" role="tabpanel" aria-labelledby="nav-add_info-tab">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th scope="row">SIZE</th>
                            <th scope="row">PRICE</th>
                        </thead>
                        <tbody>
                            @foreach ($product->productVariations as $variation)
                            <tr>
                                <td>{{ $variation->size }}</td>
                                <td>{{ $variation->price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                <div class="reviews-section">
                    <h3 class="heading-level-3">Reviews</h3>
                    <p>No Reviews Yet.</p>
                </div>
                <div class="review-form-wrapper">
                    <h3 class="heading-level-3">Be the first to review “{{$product->name}}” </h3>
                    <form class="theme-form">
                        <div class="comment-form-rating mb-3">
                            <label for="rating">Your rating&nbsp;<spanclass="required">*</span></label>
                            <div class="ratings-radio-group">
                                <div class="ratings-cb">
                                    <input type="radio" id="product_rating_1" name="product_ratings" value="1">
                                    <label for="product_rating_1"><i class="fa fa-star"></i></label>
                                </div>
                                <div class="ratings-cb">
                                    <input type="radio" id="product_rating_2" name="product_ratings" value="2">
                                    <label for="product_rating_2"><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i></label>
                                </div>
                                <div class="ratings-cb">
                                    <input type="radio" id="product_rating_3" name="product_ratings" value="3">
                                    <label for="product_rating_3"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i></label>
                                </div>
                                <div class="ratings-cb">
                                    <input type="radio" id="product_rating_4" name="product_ratings" value="4">
                                    <label for="product_rating_4"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i></label>
                                </div>
                                <div class="ratings-cb">
                                    <input type="radio" id="product_rating_5" name="product_ratings" value="5">
                                    <label for="product_rating_5"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i></label>
                                </div>
                            </div>
                        </div>
                        <div class="comment-form-comment mb-3">
                            <label for="comment">Your review*</label>
                            <textarea id="comment" name="comment" cols="45" rows="8" required=""
                                class="form-control"></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="revier_name">Name*</label>
                                <input id="revier_name" name="revier_name" type="text" required="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="revier_email">Email*</label>
                                <input id="revier_email" name="revier_email" type="email" required=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="review_consent">
                            <label class="form-check-label" for="review_consent">Save my name, email, and website in
                                this browser
                                for the next time I comment.</label>
                        </div>
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.product.relatedProducts')


    @if(count($clientExperiences))
    <section class="home-section">
        <div class="container-fluid">
            <h1 class="section-title text-center">Client Experiences</h1>

            <div class="experience-cards text-left">
                <div class="row">

                    @foreach ($clientExperiences as $experience)
                    <div class="col-md-4 mx-auto">
                        <div class="experience-item">
                            <div class="experience-image">
                                <img src="{{$experience->image_path}}" class="img-fluid object-fit-contain">
                            </div>
                            <div class="experience-caption mt-40">
                                ” {{$experience->description}} “
                                <h6 class="bold mt-1 mb-0">By: {{$experience->user_name}}</h6>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    @endif
</div>
<div class="modal fade" id="checkPinCodeMOdal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 4px; ">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title ">Check delivery eligblity</h5>
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <form action="{{route('api.delhivery.checkPinCode')}}" id="checkPinCode" method="get">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="number" maxlength="6" name="pin_code" minlength="6" class="form-control">
                            <small id="pinCodeStatus" class="small"></small>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-buy-now w-auto">Check</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('additional_script')
<script src='{{asset('frontend/assets/js/jquery.zoom.min.js')}}'></script>
<script>
    $(document).ready(function(){
        $('#choose_size').change(function(){
            $('.productDetailCarousel').addClass('d-none');
            $('.price').addClass('d-none');
            $('.buyNow').addClass('d-none');
            var sizeValue = $(this).val();
            $('#productDetailCarousel-'+sizeValue).removeClass('d-none');
            $('#price-'+sizeValue).removeClass('d-none');
            $('#buyNow-'+sizeValue).removeClass('d-none');
        });
        $('#checkPinCode').ajaxForm(function(response) {
            if(response){
                 $('#pinCodeStatus').removeClass('text-success');
                 $('#pinCodeStatus').addClass('text-success');
                 $('#pinCodeStatus').html('Your area is currently servicable');
            } else {
                $('#pinCodeStatus').removeClass('text-danger');
                 $('#pinCodeStatus').addClass('text-danger');
                 $('#pinCodeStatus').html('Your area is currently not servicable');
            }
        });
    });
</script>
@endsection
