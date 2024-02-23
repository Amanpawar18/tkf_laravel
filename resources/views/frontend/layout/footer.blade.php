<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Our Office</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ Setting::get('address') }}</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ Setting::get('mobile_no') }}</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ Setting::get('email') }}</p>
                <div class="d-flex pt-2">
                    @if (Setting::get('instagram_link'))
                    <a class="btn btn-square btn-outline-light rounded-circle me-2" href="{{ Setting::get('instagram_link') }}">
                        <i class="fab fa-instagram"></i>
                    </a>
                    @endif
                    @if (Setting::get('facebook_link'))
                    <a class="btn btn-square btn-outline-light rounded-circle me-2" href="{{ Setting::get('facebook_link') }}">
                        <i class="fab fa-facebook"></i>
                    </a>
                    @endif
                    @if (Setting::get('youtube_link'))
                    <a class="btn btn-square btn-outline-light rounded-circle me-2" href="{{ Setting::get('youtube_link') }}">
                        <i class="fab fa-youtube"></i>
                    </a>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Services</h4>
                <a class="btn btn-link" href="{{FooterData::get('order_link') ?? '#'}}">Track Your Order</a>
                <a class="btn btn-link" href="{{FooterData::get('shipping_link') ?? '#'}}">Shipping, Exchange, Cancellation</a></a>
                <a class="btn btn-link" href="{{FooterData::get('contact_us_link') ?? '#'}}">Contact Us</a></a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Quick Links</h4>
                <a class="btn btn-link" href="{{FooterData::get('who_we_are_link') ?? '#'}}">
                    About Us
                </a>
                <a class="btn btn-link" href="{{FooterData::get('product_faqs_link') ?? '#'}}">
                    Products Faq's
                </a>
                <a class="btn btn-link" href="{{FooterData::get('terms_of_use_link') ?? '#'}}">
                    Terms & Condition
                </a>
                <a class="btn btn-link" href="{{FooterData::get('privacy_policy_link') ?? '#'}}">
                    Privacy Policy
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Newsletter</h4>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative w-100">
                    <input class="form-control bg-light border-light w-100 py-3 ps-4 pe-5" type="text"
                        placeholder="Your email">
                    <button type="button"
                        class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a class="border-bottom" href="#">The Keshav Farm</a>, All Right Reserved.
            </div>
            <div class="col-md-6 text-center text-md-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By <a class="border-bottom" href="https://htmlcod  ex.com">HTML Codex</a> Distributed By <a
                    href="https://themewagon.com">ThemeWagon</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->