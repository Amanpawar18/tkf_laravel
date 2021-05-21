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
                    <h6 class="related-product-category">{{$relatedProduct->name}}</h6>
                    <h3 class="related-product-price">{{$relatedProduct->priceRange()}}</h3>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

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
                                    <img src="{{$relatedProduct->image_path}}" height="350px"
                                        class="object-fit-contain d-block w-100" alt="...">
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
                            <h1 class="product-title modal-product-title">
                                <a href="{{route('frontend.product.details', $relatedProduct->slug)}}"
                                    class="text-dark text-decoration-none">
                                    {{$relatedProduct->name}}
                                </a>
                            </h1>
                            {{-- <h3 class="product-price">₹250.00 – ₹910.00</h3> --}}
                            <h3 class="product-price">{{ $relatedProduct->priceRange() }}</h3>
                            <div class="product-short-description">
                                {!! $product->description !!}
                            </div>

                            <form class="variations_form theme-form">
                                @if(count($relatedProduct->productVariations))
                                <div class="row mb-3 mt-2">
                                    <div class="col-md-3">
                                        <label for="choose_size" class=" col-form-label">
                                            Choose a Size
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="product_size" id="choose_size" class="form-control">
                                            <option value="">Select an option</option>
                                            @foreach ($relatedProduct->productVariations as $variation)
                                            <option value="{{$variation->id}}">{{$variation->size}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="product-main-detail-submission">
                                    <div class="quantity_selector">
                                        <div class="input-group mb-3">
                                            <button class="btn decrease" type="button">-</button>
                                            <input type="text" class="form-control quantity" readonly value="1">
                                            <button class="btn increase" type="button">+</button>
                                        </div>
                                    </div>
                                    <button class="btn btn-warning shop-now-btn">
                                        Buy Now
                                        <i class="fa fa-angle-right"></i>
                                    </button>
                                    <a href="{{route('frontend.product.details', $relatedProduct->slug)}}" class="btn text-dark btn-warning shop-now-btn">
                                        View product
                                        <i class="fa fa-angle-right"></i>
                                    </a>
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
