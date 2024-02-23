<!-- Topbar Start -->
<div class="container-fluid bg-dark text-light px-0 py-2">
    <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center me-4">
                <span class="fa fa-phone-alt me-2"></span>
                <span>{{ Setting::get('mobile_no') }}</span>
            </div>
            <div class="h-100 d-inline-flex align-items-center">
                <span class="far fa-envelope me-2"></span>
                <span>{{ Setting::get('email') }}</span>
            </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
            <div class="h-100 d-inline-flex align-items-center mx-n2">
                <span>Follow Us:</span>
                @if (Setting::get('instagram_link'))
                <a class="btn btn-link text-light" href="{{ Setting::get('instagram_link') }}"><i
                        class="fab fa-instagram"></i></a>
                @endif
                @if (Setting::get('youtube_link'))
                <a class="btn btn-link text-light" href="{{ Setting::get('youtube_link') }}"><i class="fab fa-youtube"></i></a>
                @endif
                @if (Setting::get('facebook_link'))
                <a class="btn btn-link text-light" href="{{ Setting::get('facebook_link') }}"><i class="fab fa-facebook"></i></a>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h1 class="m-0">The Keshav Farm</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.html" class="nav-item nav-link active">Home</a>
            <a href="{{FooterData::get('who_we_are_link') ?? '#'}}" class="nav-item nav-link">About</a>
            <a href="{{route('frontend.product.shop')}}" class="nav-item nav-link">Shop</a>
            <a href="{{route('frontend.blog.index')}}" class="nav-item nav-link">Blogs</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Categories</a>
                <div class="dropdown-menu bg-light m-0">
                    @foreach (App\Models\Category::whereHas('childrenCategories')->take(4)->get() as $headerCategory)
                    <a href="{{route('frontend.category', $headerCategory->slug)}}"
                        class="dropdown-item">{{$headerCategory->name}}
                    </a>
                    @endforeach
                </div>
            </div>
            @auth
            <a class="nav-item nav-link" href="{{route('frontend.profile.show')}}">
                My Account
            </a>
            <a class="nav-link nav-item" href="javascript:void(0);'"
                onclick="event.preventDefault(); document.getElementById('logOut').submit();">
                Logout
            </a>
            <form method="post" id="logOut" action="{{route('logout')}}">
                @csrf
            </form>
            @else
            <a class="nav-item nav-link" href="{{route('login')}}">
                Login/Register
            </a>
            @endauth
        </div>
        <a href="{{route('frontend.cart.index')}}" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">
            Cart
            <i class="fa fa-shopping-cart ms-3">
                @auth
                {{App\Models\Cart::where('user_id', Auth::id())->count()}}
                @else
                {{session('userCartSessionId') ? App\Models\Cart::where('session_id', session('userCartSessionId'))->count() : 0}}
                @endauth
            </i>
        </a>
    </div>
</nav>
<!-- Navbar End -->