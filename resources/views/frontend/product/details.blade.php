@extends('frontend.layout.master')
@section('content')


<div class="container">
    <section class="product-detail-main">
        <div class="row">
            <div class="col-lg-6 product-detail-gallery">
                @foreach ($product->productVariations as $key => $variation)
                <div id="productDetailCarousel-{{$variation->id}}"
                    class="productDetailCarousel carousel carousel-dark slide carousel-fade {{ $loop->first ? '' : 'd-none' }} "
                    data-bs-ride="carousel" data-bs-interval="false">
                    <div class="carousel-indicators d-sm-flex d-none">
                        @foreach ($variation->images as $key => $image)
                        <button type="button" data-bs-target="#productDetailCarousel-{{$variation->id}}"
                            data-bs-slide-to="{{$key}}" class="{{$loop->first ? 'active' : ''  }} " aria-current="true"
                            aria-label="Slide {{$key + 1}}">
                            <img src="{{ $image->image_path }}">
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
            </div>
            <div class="col-lg-6">
                <div class="product-detail-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="#">{{$product->name}}</a></li>
                        </ol>
                    </nav>
                    <h1 class="product-title">{{$product->name}}</h1>
                    <h3 class="product-price">
                        <span class="product-Price-symbol">₹</span>
                        @foreach ($product->productVariations as $key => $variation)
                        <span id="price-{{$variation->id}}" class="price {{$loop->first ? '' : 'd-none'}}">
                            {{$variation->price}}
                        </span>
                        @endforeach
                    </h3>
                    <div class="product-short-description">
                        <h5 class="product-desc-main">
                            {{$product->sub_description}}
                        </h5>
                        <p>{{$product->description}}</p>
                    </div>

                    <form class="variations_form theme-form">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="choose_size" class=" col-form-label">Choose a Size</label>
                            </div>
                            <div class="col-md-9">
                                <select name="product_size" id="choose_size" class="form-control">
                                    @foreach ($product->productVariations as $variation)
                                    <option value="{{$variation->id}}">{{ $variation->size }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="product-main-detail-submission">
                            <div class="quantity_selector">
                                <div class="input-group mb-3">
                                    <button class="btn decrease" type="button">-</button>
                                    <input type="text" class="form-control quantity" readonly value="1">
                                    <button class="btn increase" type="button">+</button>
                                </div>
                            </div>
                            <button class="btn btn-warning shop-now-btn">Shop Now <i
                                    class="fa fa-angle-right"></i></button>
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
                        <div class="desc-section">
                            <h1 class="section-title bold">Suggested For</h1>
                            <p>{!! $product->suggested_for !!}</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="desc-section">
                            <h1 class="section-title bold">Composition (Per Tablet)</h1>
                            <p>{!! $product->composition !!}</p>
                        </div>
                        <div class="desc-section">
                            <h1 class="section-title bold">Directions for Use</h1>
                            <p>{!! $product->direction_for_use !!}</p>
                        </div>
                    </div>

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

    @if(count($relatedProducts))
    <section class="related-products-section mt-40">
        <h1>RELATED PRODUCTS</h1>
        <div class="owl-carousel owl-theme related-products-slider">
            @foreach ($relatedProducts as $relatedProduct)
            <div class="item">
                <div class="related-product-item">
                    <div class="related-product-image position-relative">
                        <img src="{{$relatedProduct->image_path}}" style="max-height:258px !important;"
                            class="object-fit-contain img-fluid img-main">
                        {{-- <img src="{{asset('frontend/assets/images/sllider-image-hover.png')}}"
                        class="img-fluid img-hover"> --}}
                        @if($relatedProduct->is_sale)
                        <div class="sale-badge">Sale!</div>
                        @endif
                        <button class="btn quick-view-btn" data-bs-toggle="modal"
                            data-bs-target="#relatedProductModal-{{$relatedProduct->id}}">Quick View</button>
                    </div>
                    <div class="related-product-desc">
                        <h6 class="related-product-category">{{$product->name}}</h6>
                        <h3 class="related-product-price">₹250.00 – ₹910.00</h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <section class="client-experience-section  text-center mt-40 font-grey font-small">
        <h1 class="section-title">Client Experiences</h1>

        <div class="experience-cards text-left">
            <div class="row">
                <div class="col-md-4">
                    <div class="experience-item">
                        <div class="experience-image">
                            <img src="{{asset('frontend/assets/images/blavkdog.jpeg')}}" class="img-fluid">
                        </div>
                        <div class="experience-caption mt-40">
                            ” We’ve been using Venttura Bioceuticals’ products Omega+ and Nutri+ Pro for
                            our dogs
                            for over 3 years now and the results speak for themselves.Omega+ has made
                            our dog coat
                            extremely shiny, healthy, soft and no skin problems at all. “
                            <h6 class="mt-1 mb-0">Ashdeen J.</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="experience-item">
                        <div class="experience-image">
                            <img src="{{asset('frontend/assets/images/blavkdog.jpeg')}}" class="img-fluid">
                        </div>
                        <div class="experience-caption mt-40">
                            ” We’ve been using Venttura Bioceuticals’ products Omega+ and Nutri+ Pro for
                            our dogs
                            for over 3 years now and the results speak for themselves.Omega+ has made
                            our dog coat
                            extremely shiny, healthy, soft and no skin problems at all. “
                            <h6 class="mt-1 mb-0">Ashdeen J.</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="experience-item">
                        <div class="experience-image">
                            <img src="{{asset('frontend/assets/images/blavkdog.jpeg')}}" class="img-fluid">
                        </div>
                        <div class="experience-caption mt-40">
                            ” We’ve been using Venttura Bioceuticals’ products Omega+ and Nutri+ Pro for
                            our dogs
                            for over 3 years now and the results speak for themselves.Omega+ has made
                            our dog coat
                            extremely shiny, healthy, soft and no skin problems at all. “
                            <h6 class="mt-1 mb-0">Ashdeen J.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@foreach ($relatedProducts as $relatedProduct)
<!-- Related Product Modal -->
<div class="modal fade" id="relatedProductModal-{{$relatedProduct->id}}" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="relatedProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="row">
                    <div class="col-lg-6 related-product-detail-gallery">
                        <div id="relatedProductDetailCarousel" class="carousel slide carousel-fade"
                            data-bs-ride="carousel" data-bs-interval="false">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#relatedProductDetailCarousel"
                                    data-bs-slide-to="0" class="active" aria-current="true"
                                    aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#relatedProductDetailCarousel"
                                    data-bs-slide-to="1" aria-label="Slide 2"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{asset('frontend/assets/images/dog1.jpg')}}" class="d-block w-100"
                                        alt="...">

                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('frontend/assets/images/dog2.jpg')}}" class="d-block w-100"
                                        alt="...">

                                </div>
                                <button class="carousel-control-prev carousel-controls" type="button"
                                    data-bs-target="#relatedProductDetailCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next carousel-controls" type="button"
                                    data-bs-target="#relatedProductDetailCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                @if ($relatedProduct->is_sale)
                                <div class="sale-badge">Sale!</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-detail-right">
                            <h1 class="product-title modal-product-title">{{$relatedProduct->name}}</h1>
                            <h3 class="product-price">₹250.00 – ₹910.00</h3>
                            <div class="product-short-description">
                                {!! $product->description !!}
                            </div>

                            <form class="variations_form theme-form">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="choose_size" class=" col-form-label">Choose a
                                            Size</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="product_size" id="choose_size" class="form-control">
                                            <option value="">Select an option</option>
                                            <option value="60">60 Tablets</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="product-main-detail-submission">
                                    <div class="quantity_selector">
                                        <div class="input-group mb-3">
                                            <button class="btn decrease" type="button">-</button>
                                            <input type="text" class="form-control quantity" readonly value="1">
                                            <button class="btn increase" type="button">+</button>
                                        </div>
                                    </div>
                                    <button class="btn btn-warning shop-now-btn">Shop Now <i
                                            class="fa fa-angle-right"></i></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@section('additional_script')
<script src='{{asset('frontend/assets/js/jquery.zoom.min.js')}}'></script>
<script src='{{asset('frontend/assets/js/jquery.zoom.min.js')}}'></script>
<script>
    $(document).ready(function(){
        $('#choose_size').change(function(){
            $('.productDetailCarousel').addClass('d-none');
            $('.price').addClass('d-none');
            var sizeValue = $(this).val();
            $('#productDetailCarousel-'+sizeValue).removeClass('d-none');
            $('#price-'+sizeValue).removeClass('d-none');
        });
    });
</script>
@endsection
