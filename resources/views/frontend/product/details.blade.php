@extends('frontend.layout.master')
@section('content')
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h2 class="display-3 text-white mb-4 animated slideInDown"> {{$product->sub_description}}</h2>
    </div>
</div>
<div class="container-xxl py-5">
    <section class="product-detail-main">
        <div class="card card-body shadow">
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
                                data-bs-slide-to="{{$key}}" class="{{$loop->first ? 'active' : ''  }} "
                                aria-current="true" aria-label="Slide {{$key + 1}}">
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
                        class="productDetailCarousel carousel carousel-dark slide carousel-fade "
                        data-bs-ride="carousel" data-bs-interval="false">
                        <div class="carousel-indicators d-sm-flex d-none">
                            @foreach ($product->productImages as $key => $image)
                            <button type="button" data-bs-target="#productDetailCarousel-{{$product->id}}"
                                data-bs-slide-to="{{$key}}" class="{{$loop->first ? 'active' : ''  }} "
                                aria-current="true" aria-label="Slide {{$key + 1}}">
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
                <div class="col-lg-6 g-5 align-items-end">
                    <div class="wow" data-wow-delay="0.3s">
                        <h1 class="display-1 text-primary mb-0">
                            {{$product->name}}
                            @if($product->is_sale)
                            <span class="text-danger h6">
                                (On Sale)
                            </span class="text-danger h6">
                            @endif
                        </h1>
                        <p class="mb-4">
                            {{ $product->description }}
                        </p>
                        <h3 class="product-price">
                            @if(count($product->productVariations))
                            @foreach ($product->productVariations as $key => $variation)
                            <span id="price-{{$variation->id}}" class="price {{$loop->first ? '' : 'd-none'}}">
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
                            ₹ {{$product->cost}}
                            @endif
                        </h3>

                        @if($product->referral_percent)
                        <p class="text-theme">
                            Refer this product and get {{$product->referral_percent}} % cashback in your wallet.
                        </p>
                        @endif
                        <p>
                            Free delivery above ₹1000
                            @if($product->made_in)
                            <br>
                            Made in {{$product->made_in}}
                            @endif
                        </p>
                        <form class="variations_form theme-form" action="{{route('frontend.cart.store', $product->id)}}"
                            method="POST">
                            @csrf
                            @if(count($product->productVariations))
                            <div class="row mb-3">
                                <hr>
                                <div class="col-md-4">
                                    <label for="choose_size" class=" col-form-label">Choose a variant</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="variation_id" id="choose_size" class="form-select">
                                        @foreach ($product->productVariations as $variation)
                                        <option value="{{$variation->id}}">{{ $variation->size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-4 align-items-center">
                                    <p>
                                        <a href="#" data-bs-target="#checkPinCodeMOdal" data-bs-toggle="modal"
                                            class="text-decoration-none">Check delivery eligblity</a>
                                    </p>
                                </div>
                                <div class="col-md-4 align-items-center">
                                    <div class="input-group">
                                        <button class="btn btn-primary decrease" type="button">-</button>
                                        <input type="text" name="quantity" class="form-control quantity" readonly
                                            value="1">
                                        <button class="btn btn-primary increase" type="button">+</button>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right align-items-center">
                                    @include('frontend.product.price')
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="container-xxl">
    <section class="card shadow card-body">
        <nav>
            <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
                <button class="nav-link btn active btn-primary mx-1" id="nav-product_desc-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-product_desc" type="button" role="tab" aria-controls="nav-product_desc"
                    aria-selected="true">Description</button>
                <button class="nav-link btn btn-primary mx-1" id="nav-add_info-tab " data-bs-toggle="tab"
                    data-bs-target="#nav-add_info" type="button" role="tab" aria-controls="nav-add_info"
                    aria-selected="false">Additional
                    Information</button>
            </div>
            <hr>
        </nav>
        <div class="tab-content mt-2" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-product_desc" role="tabpanel"
                aria-labelledby="nav-product_desc-tab">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="desc-section">
                            <h3 class="text-primary bold">
                                Products Details
                            </h3>
                            <p>{!! $product->product_detail !!}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="desc-section">
                            <h3 class="text-primary bold">Directions for Use</h3>
                            <p>{!! $product->direction_for_use !!}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="desc-section">
                            <h3 class="text-primary bold">Suggested For</h3>
                            <p>{!! $product->suggested_for !!}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="desc-section">
                            <h3 class="text-primary bold">Composition</h3>
                            <p>{!! $product->composition !!}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="desc-section">
                            <p>
                                <strong class="text-primary bold">Note: </strong>
                                {!! $product->note !!}
                            </p>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row mt-5    ">
                    @if(count($product->productFaqs))
                    <div class="col-md-6">
                        <div class="accordion-section">
                            <h3 class="text-center section-title bold">{{$product->name}} FAQ</h3>
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
                            <h3 class="text-center section-title bold">Benefits Of {{$product->name}} Ingredients
                            </h3>
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
            </div>
            <div class="tab-pane fade" id="nav-add_info" role="tabpanel" aria-labelledby="nav-add_info-tab">
                <div class="table-responsive">
                    <table class="table table-hover table-success ">
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
        </div>
    </section>

    @include('frontend.product.relatedProducts')


    @if(count($clientExperiences))
    <section class="home-section">
        <div class="container-fluid">
            <h3 class="section-title text-center">Client Experiences</h3>

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
<script src='{{asset(' frontend/assets/js/jquery.zoom.min.js')}}'></script>
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