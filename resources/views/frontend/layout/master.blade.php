<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/new-theme/') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/new-theme/') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/new-theme/') }}/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/new-theme/') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/new-theme/') }}/css/style.css" rel="stylesheet">

    <link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('meta_title', Setting::get('website_name'))</title>
    @hasSection('meta_description')
    <meta name='description' content="@yield('meta_description')" />
    @else
    <meta name='description' content='{{Setting::get('website_name')}}' />
    @endif
    @hasSection('meta_keywords')
    <meta name='keywords' content="@yield('meta_keywords')" />
    @else
    <meta name='keywords' content='{{Setting::get('website_name')}}' />
    @endif

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    @include('frontend.layout.header')

    @yield('content')
    
    @include('frontend.layout.footer')
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
    

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/new-theme/') }}/lib/wow/wow.min.js"></script>
    <script src="{{ asset('frontend/new-theme/') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('frontend/new-theme/') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('frontend/new-theme/') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend/new-theme/') }}/lib/counterup/counterup.min.js"></script>
    <script src="{{ asset('frontend/new-theme/') }}/lib/parallax/parallax.min.js"></script>
    <script src="{{ asset('frontend/new-theme/') }}/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="{{ asset('frontend/new-theme/') }}/lib/lightbox/js/lightbox.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('frontend/new-theme/') }}/js/main.js"></script>

    @yield('additional_script')
    <script type="text/javascript" src="{{asset('frontend/assets/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('custom/common.js')}}"></script>

</body>

</html>