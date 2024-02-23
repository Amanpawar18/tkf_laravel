@extends('frontend.layout.master')
@section('content')


<div class="container">
    <section class="product-detail-main">
        <div class="row">
            <div class="col-lg-6 product-detail-gallery">
                <div id="productDetailCarousel" class="carousel carousel-dark slide carousel-fade"
                    data-bs-ride="carousel" data-bs-interval="false">
                    <div class="carousel-indicators d-sm-flex d-none">
                        <button type="button" data-bs-target="#productDetailCarousel" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"><img
                                src="{{asset('frontend/assets/images/dog1.jpg')}}"></button>
                        <button type="button" data-bs-target="#productDetailCarousel" data-bs-slide-to="1"
                            aria-label="Slide 2"><img src="{{asset('frontend/assets/images/dog2.jpg')}}"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('frontend/assets/images/dog1.jpg')}}" class="d-block w-100" alt="...">

                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('frontend/assets/images/dog2.jpg')}}" class="d-block w-100" alt="...">

                        </div>
                        <button class="carousel-control-prev carousel-controls" type="button"
                            data-bs-target="#productDetailCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next carousel-controls" type="button"
                            data-bs-target="#productDetailCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="carousel-indicators d-sm-none">
                        <button type="button" data-bs-target="#productDetailCarousel" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"><img
                                src="{{asset('frontend/assets/images/dog1.jpg')}}"></button>
                        <button type="button" data-bs-target="#productDetailCarousel" data-bs-slide-to="1"
                            aria-label="Slide 2"><img src="{{asset('frontend/assets/images/dog2.jpg')}}"></button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-detail-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="#">Petraceuticals</a></li>
                        </ol>
                    </nav>
                    <h1 class="product-title">Fur+ Chewable Tablets</h1>
                    <h3 class="product-price"><span class="product-Price-symbol">₹</span>500.00</h3>
                    <div class="product-short-description">
                        <h5 class="product-desc-main">Comprehensive skin &amp; coat formula with MSM, Brewer’s
                            Yeast,
                            lecithin &amp; synergistic vitamins and minerals</h5>
                        <p>Fur+ contains a
                            range of nutrients necessary for healthy skin and glossy coat. Fur+ helps promote
                            healthy fur, improve coat condition &amp; reduce excessive shedding.</p>
                        <ul class="product-detail-links">
                            <li><a href="">More Details and Product composition</a></li>
                            <li><a href="">Add Dog Name ( Optional )</a></li>
                            <li><a href="">Sign in to Select Dog</a></li>
                        </ul>
                    </div>

                    <form class="variations_form theme-form">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="choose_size" class=" col-form-label">Choose a Size</label>
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
                                    <button class="btn" type="button">-</button>
                                    <input type="text" class="form-control" value="1">
                                    <button class="btn" type="button">+</button>
                                </div>
                            </div>
                            <button class="btn btn-warning shop-now-btn">Buy Now <i
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
                    <div class="col-md-6">
                        <div class="desc-section">
                            <h1 class="section-title bold">Products Details</h1>
                            <p>Your pet’s coat is a barometer to his overall health. A soft, shiny coat is evidence
                                that he is healthy, happy & thriving. Dull, smelly or rough fur, bald patches, hair
                                loss, scaly, dry or itchy skin; are all indicators of potential health issues that
                                need to be addressed. Fur+ has all the nutrients needed to prevent deficiencies and
                                maintain healthy skin and coat. For better results, use Fur+ with Omega+</p>
                        </div>
                        <div class="desc-section">
                            <h1 class="section-title bold">Suggested For</h1>
                            <ul>
                                <li>Maintaining healthy skin and coat</li>
                                <li>Maintaining healthy skin and coat</li>
                                <li>Maintaining healthy skin and coat</li>
                                <li>Maintaining healthy skin and coat</li>
                                <li>Maintaining healthy skin and coat</li>
                                <li>Maintaining healthy skin and coat</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="desc-section">
                            <h1 class="section-title bold">Composition (Per Tablet)</h1>
                            <p>Lecithin 380 mgBrewer’s Yeast 50 mg, MSM 50 mgZinc 5 mg, Cysteine 3 mg, Vitamin B3
                                1.14 mg, Vitamin B2 1 mg, Vitamin B5 1 mg, Iodine 200 mcg, Biotin 150 mcg, Vitamin
                                B6 0.1 mg, Copper 20 mcg, Carotenoids 0.01 mg, Vitamin A 5I.U.Vitamin E10 I.U.</p>
                        </div>
                        <div class="desc-section">
                            <h1 class="section-title bold">Directions for Use</h1>
                            <p>Daily dosage can be split in two servings am & pmFor puppies & kittens: 1/2 – 1
                                tablet dailyFor Dogs & CatsUnder 5 kg: 1 tablet daily5 kg – 15 kg: 1 – 2 tablets
                                daily15 kg – 25 kg: 2 – 3 tablets daily25 kg – 40 kg: 3 – 4 tablets dailyOver 40 kg:
                                4 – 6 tablets dailyOr as directed by the veterinarian</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="accordion-section">
                            <h1 class="text-center section-title bold">FUR+FAQ</h1>
                            <div class="accordion accordion-flush" id="product_faq_accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="faq-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#accordion_faq_1"
                                            aria-expanded="false" aria-controls="accordion_faq_1">
                                            When Should i give Fur+ to my pet ?
                                        </button>
                                    </h2>
                                    <div id="accordion_faq_1" class="accordion-collapse collapse"
                                        aria-labelledby="faq-headingOne" data-bs-parent="#product_faq_accordion">
                                        <div class="accordion-body">
                                            <p>Fur+ is suggested for<br>
                                                 Maintaining healthy skin and coat<br>
                                                 Improving rough coat<br>
                                                 Reducing shedding<br>
                                                 Improving immunity of skin<br>
                                                 Dry or dull coat<br>
                                                 Dry skin and dandruff<br>
                                                 Hair loss<br>
                                                 Show animals<br>
                                                And any other conditions your veterinarian may see usage necessary
                                                in</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="faq-headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#accordion_faq_2"
                                            aria-expanded="false" aria-controls="accordion_faq_2">
                                            When Should i give Fur+ to my pet ?
                                        </button>
                                    </h2>
                                    <div id="accordion_faq_2" class="accordion-collapse collapse"
                                        aria-labelledby="faq-headingTwo" data-bs-parent="#product_faq_accordion">
                                        <div class="accordion-body">
                                            <p>Fur+ is suggested for<br>
                                                 Maintaining healthy skin and coat<br>
                                                 Improving rough coat<br>
                                                 Reducing shedding<br>
                                                 Improving immunity of skin<br>
                                                 Dry or dull coat<br>
                                                 Dry skin and dandruff<br>
                                                 Hair loss<br>
                                                 Show animals<br>
                                                And any other conditions your veterinarian may see usage necessary
                                                in</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="faq-headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#accordion_faq_3"
                                            aria-expanded="false" aria-controls="accordion_faq_3">
                                            When Should i give Fur+ to my pet ?
                                        </button>
                                    </h2>
                                    <div id="accordion_faq_3" class="accordion-collapse collapse"
                                        aria-labelledby="faq-headingThree" data-bs-parent="#product_faq_accordion">
                                        <div class="accordion-body">
                                            <p>Fur+ is suggested for<br>
                                                 Maintaining healthy skin and coat<br>
                                                 Improving rough coat<br>
                                                 Reducing shedding<br>
                                                 Improving immunity of skin<br>
                                                 Dry or dull coat<br>
                                                 Dry skin and dandruff<br>
                                                 Hair loss<br>
                                                 Show animals<br>
                                                And any other conditions your veterinarian may see usage necessary
                                                in</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="accordion-section">
                            <h1 class="text-center section-title bold">Benefits Of Fur+ Ingredients</h1>
                            <div class="accordion accordion-flush" id="product_benefit_accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="benefit-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#accordion_benefit_1"
                                            aria-expanded="false" aria-controls="accordion_benefit_1">
                                            When Should i give Fur+ to my pet ?
                                        </button>
                                    </h2>
                                    <div id="accordion_benefit_1" class="accordion-collapse collapse"
                                        aria-labelledby="benefit-headingOne"
                                        data-bs-parent="#product_benefit_accordion">
                                        <div class="accordion-body">
                                            <p>Fur+ is suggested for<br>
                                                 Maintaining healthy skin and coat<br>
                                                 Improving rough coat<br>
                                                 Reducing shedding<br>
                                                 Improving immunity of skin<br>
                                                 Dry or dull coat<br>
                                                 Dry skin and dandruff<br>
                                                 Hair loss<br>
                                                 Show animals<br>
                                                And any other conditions your veterinarian may see usage necessary
                                                in</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="benefit-headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#accordion_benefit_2"
                                            aria-expanded="false" aria-controls="accordion_benefit_2">
                                            When Should i give Fur+ to my pet ?
                                        </button>
                                    </h2>
                                    <div id="accordion_benefit_2" class="accordion-collapse collapse"
                                        aria-labelledby="benefit-headingTwo"
                                        data-bs-parent="#product_benefit_accordion">
                                        <div class="accordion-body">
                                            <p>Fur+ is suggested for<br>
                                                 Maintaining healthy skin and coat<br>
                                                 Improving rough coat<br>
                                                 Reducing shedding<br>
                                                 Improving immunity of skin<br>
                                                 Dry or dull coat<br>
                                                 Dry skin and dandruff<br>
                                                 Hair loss<br>
                                                 Show animals<br>
                                                And any other conditions your veterinarian may see usage necessary
                                                in</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <section class="note-section">
                    <h5>Note*</h5>
                    <div class="text-center">
                        <p>This product is an Animal Feed Supplement for veterinary use only. It is not a drug and
                            is not intended to diagnose, treat, prevent or cure any diseases or be a replacement for
                            medicines. The time and manner of results vary from case to case and depend on the
                            health and condition of the individual animal. Please consult your veterinarian in case
                            of any doubts regarding your pet’s welfare. In addition to good supplements, your pet
                            needs a good quality diet, adequate exercise and lots of your love for it’s well –
                            being!.</p>
                    </div>
                </section>

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
                                        ” We've been using Venttura Bioceuticals; products Omega+ and Nutri+ Pro for
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
            <div class="tab-pane fade" id="nav-add_info" role="tabpanel" aria-labelledby="nav-add_info-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">CHOOSE A SIZE</th>
                                <td>60 Tablets</td>
                            </tr>
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
                    <h3 class="heading-level-3">Be the first to review “Fur+ Chewable Tablets” </h3>
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

    <section class="related-products-section mt-40">
        <h1>RELATED PRODUCTS</h1>
        <div class="owl-carousel owl-theme related-products-slider">
            <div class="item">
                <div class="related-product-item">
                    <div class="related-product-image position-relative">
                        <img src="{{asset('frontend/assets/images/sllider-image.png')}}" class="img-fluid img-main">
                        <img src="{{asset('frontend/assets/images/sllider-image-hover.png')}}" class="img-fluid img-hover">
                        <div class="sale-badge">Sale!</div>
                        <button class="btn quick-view-btn" data-bs-toggle="modal"
                            data-bs-target="#relatedProductModal">Quick View</button>
                    </div>
                    <div class="related-product-desc">
                        <h6 class="related-product-category">Petraceuticals</h6>
                        <h6 class="related-product-title"><a href="#">Nutri+ Pro </a></h6>
                        <h3 class="related-product-price">₹250.00 – ₹910.00</h3>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="related-product-item">
                    <div class="related-product-image position-relative">
                        <img src="{{asset('frontend/assets/images/sllider-image.png')}}" class="img-fluid img-main">
                        <img src="{{asset('frontend/assets/images/sllider-image-hover.png')}}" class="img-fluid img-hover">
                        <!-- <div class="sale-badge">Sale!</div> -->
                        <button class="btn quick-view-btn" data-bs-toggle="modal"
                            data-bs-target="#relatedProductModal">Quick View</button>
                    </div>
                    <div class="related-product-desc">
                        <h6 class="related-product-category">Petraceuticals</h6>
                        <h6 class="related-product-title"><a href="#">Nutri+ Pro </a></h6>
                        <h3 class="related-product-price">₹250.00 – ₹910.00</h3>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="related-product-item">
                    <div class="related-product-image position-relative">
                        <img src="{{asset('frontend/assets/images/sllider-image.png')}}" class="img-fluid img-main">
                        <img src="{{asset('frontend/assets/images/sllider-image-hover.png')}}" class="img-fluid img-hover">
                        <div class="sale-badge">Sale!</div>
                        <button class="btn quick-view-btn" data-bs-toggle="modal"
                            data-bs-target="#relatedProductModal">Quick View</button>
                    </div>
                    <div class="related-product-desc">
                        <h6 class="related-product-category">Petraceuticals</h6>
                        <h6 class="related-product-title"><a href="#">Nutri+ Pro </a></h6>
                        <h3 class="related-product-price">₹250.00 – ₹910.00</h3>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="related-product-item">
                    <div class="related-product-image position-relative">
                        <img src="{{asset('frontend/assets/images/sllider-image.png')}}" class="img-fluid img-main">
                        <img src="{{asset('frontend/assets/images/sllider-image-hover.png')}}" class="img-fluid img-hover">
                        <div class="sale-badge">Sale!</div>
                        <button class="btn quick-view-btn" data-bs-toggle="modal"
                            data-bs-target="#relatedProductModal">Quick View</button>
                    </div>
                    <div class="related-product-desc">
                        <h6 class="related-product-category">Petraceuticals</h6>
                        <h6 class="related-product-title"><a href="#">Nutri+ Pro </a></h6>
                        <h3 class="related-product-price">₹250.00 – ₹910.00</h3>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="related-product-item">
                    <div class="related-product-image position-relative">
                        <img src="{{asset('frontend/assets/images/sllider-image.png')}}" class="img-fluid img-main">
                        <img src="{{asset('frontend/assets/images/sllider-image-hover.png')}}" class="img-fluid img-hover">
                        <div class="sale-badge">Sale!</div>
                        <button class="btn quick-view-btn" data-bs-toggle="modal"
                            data-bs-target="#relatedProductModal">Quick View</button>
                    </div>
                    <div class="related-product-desc">
                        <h6 class="related-product-category">Petraceuticals</h6>
                        <h6 class="related-product-title"><a href="#">Nutri+ Pro </a></h6>
                        <h3 class="related-product-price">₹250.00 – ₹910.00</h3>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>

<!-- Related Product Modal -->
<div class="modal fade" id="relatedProductModal" data-bs-keyboard="false" tabindex="-1"
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
                                    <img src="{{asset('frontend/assets/images/dog1.jpg')}}" class="d-block w-100" alt="...">

                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('frontend/assets/images/dog2.jpg')}}" class="d-block w-100" alt="...">

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
                                <div class="sale-badge">Sale!</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-detail-right">
                            <h1 class="product-title modal-product-title">Livo+</h1>
                            <h3 class="product-price">₹250.00 – ₹910.00</h3>
                            <div class="product-short-description">
                                <h5 class="product-desc-main">Liver repair & support formula with silymarin,
                                    tricholine citrate, N-acetylcysteine & synergistic vitamins</h5>
                                <p>Livo+ is a complete liver support supplement that contains the full spectrum of
                                    nutrients needed for protecting & supporting liver repair and for maintaining
                                    liver functioning.</p>
                                <ul class="product-detail-links">
                                    <li><a href="">More Details and Product composition</a></li>
                                    <li><a href="">Add Dog Name ( Optional )</a></li>
                                    <li><a href="">Sign in to Select Dog</a></li>
                                </ul>
                            </div>

                            <form class="variations_form theme-form">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="choose_size" class=" col-form-label">Choose a Size</label>
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
                                            <button class="btn" type="button">-</button>
                                            <input type="text" class="form-control" value="1">
                                            <button class="btn" type="button">+</button>
                                        </div>
                                    </div>
                                    <button class="btn btn-warning shop-now-btn">Buy Now <i
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
@endsection
@section('additional_script')
<script src='{{asset('frontend/assets/js/jquery.zoom.min.js')}}'></script>
<script src='{{asset('frontend/assets/js/jquery.zoom.min.js')}}'></script>
@endsection
