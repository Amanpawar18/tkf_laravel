<hr class="m-0">
<section class="mt-30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2 text-center">
                <a href="{{FooterData::get('image_one_link') ?? '#'}}">
                    <img src="{{FooterData::get('image_one_path')}}" class="img-fluid">
                </a>
            </div>
            <div class="col-md-2 text-center">
                <a href="{{FooterData::get('image_two_link') ?? '#'}}">
                    <img src="{{FooterData::get('image_two_path')}}" class="img-fluid">
                </a>
            </div>
            <div class="col-md-2 text-center">
                <a href="{{FooterData::get('image_three_link') ?? '#'}}">
                    <img src="{{FooterData::get('image_three_path')}}" class="img-fluid">
                </a>
            </div>
            <div class="col-md-2 text-center">
                <a href="{{FooterData::get('image_four_link') ?? '#'}}">
                    <img src="{{FooterData::get('image_four_path')}}" class="img-fluid">
                </a>
            </div>
            <div class="col-md-2 text-center">
                <a href="{{FooterData::get('image_five_link') ?? '#'}}">
                    <img src="{{FooterData::get('image_five_path')}}" class="img-fluid">
                </a>
            </div>
            {{-- <div class="col-md-10">
                <img src="{{asset('frontend/assets/images/Screen-Shot-2021-03-01-at-11.04.08-AM.png')}}"
            class="img-fluid">
        </div> --}}
    </div>
    </div>
</section>

<div class="site-footer mt-30">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <span class="widget-title">Help</span>
                <div class="is-divider small"></div>

                <ul id="menu-help" class="menu">
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Term of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                <span class="widget-title">Shopping</span>
                <div class="is-divider small"></div>

                <ul id="menu-shopping" class="menu">
                    <li><a href="#">Order</a></li>
                    <li><a href="#">Shipping, Exchange, Cancellation</a></li>
                </ul>

            </div>
            <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                <span class="widget-title">Information</span>
                <div class="is-divider small"></div>

                <ul id="menu-about-us" class="menu">
                    <li><a href="#">Who We Are</a></li>
                    <li><a href="#">Products Faq’s</a></li>
                    <li><a href="#">Science</a></li>
                    <li><a href="#">Quality</a></li>
                    <li><a href="#">Buddy Club</a></li>
                    <li><a href="#">Subscribe</a></li>
                    <li><a href="#">Affiliate</a></li>
                </ul>

            </div>
            <div id="custom_html-4"
                class="widget_text col-12 col-md-6 col-lg-3  pb-0 widget widget_custom_html  mt-5 mt-lg-0"><span
                    class="widget-title">Contact Us</span>
                <div class="is-divider small"></div>

                <div>
                    @if(file_exists(public_path('frontend/uploads/home-page/' . Setting::get('footer_logo')))
                    && is_file(public_path('frontend/uploads/home-page/' . Setting::get('footer_logo'))))
                    <img class="img-fluid mb-30 object-fit-contain"
                        src="{{  asset('frontend/uploads/home-page/' . Setting::get('footer_logo')) }}" alt="Logo">
                    @else
                    <img src="{{asset('frontend/assets/images/footer-logo.png')}}" class="img-fluid mb-30">
                    @endif
                    <div class="footer-address">
                        <p>
                            {!! Setting::get('footer_address') !!}
                        </p>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<div class="copyright-footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <strong>All Rights Reserved Venttura</strong>
            </div>
            <div class="col-12 col-md-6 text-right">
                <div class="footer-payment-nav">
                    <i class="fa fa-cc-visa" aria-hidden="true"></i>
                    <i class="fa fa-cc-paypal" aria-hidden="true"></i>
                    <i class="fa fa-cc-stripe" aria-hidden="true"></i>
                    <i class="fa fa-cc-mastercard" aria-hidden="true"></i>
                    <i class="fa fa-money" aria-hidden="true"></i>
                </div>

            </div>
        </div>
    </div>
</div>
