<header>
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark p-0" aria-label="Fourth navbar example">
        <div class="container-fluid">
            <!-- <div class="d-flex flex-wrap justify-content-between w-100">
                <div> -->
            <a class="navbar-brand" href="{{route('frontend.home')}}">
                @if(file_exists(public_path('frontend/uploads/home-page/' . Setting::get('website_logo')))
                && is_file(public_path('frontend/uploads/home-page/' . Setting::get('website_logo'))))
                <img width="152px" height="58px" class="object-fit-contain"
                    src="{{  asset('frontend/uploads/home-page/' . Setting::get('website_logo')) }}" alt="Logo">
                @else
                <img width="152px" height="58px" class="object-fit-contain"
                    src="{{asset('frontend/assets/images/logo.jpeg')}}">
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
                aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- </div> -->
            <div class="collapse navbar-collapse" id="navbarsExample04">
                {{-- <ul class="navbar-nav ms-auto mb-2 mb-md-0 position-relative"> --}}
                <ul class="navbar-nav mx-auto mb-2 mb-md-0 position-relative">
                    @foreach (App\Models\Category::whereHas('childrenCategories')->take(4)->get() as $headerCategory)
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{route('frontend.category', $headerCategory->slug)}}">{{$headerCategory->name}}</a>
                    </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="{{FooterData::get('who_we_are_link') ?? '#'}}">Who we Are</a>
                    </li>
                    <li class="nav-item has-dropdown mega-menu">
                        <a class="nav-link" href="{{route('frontend.product.shop')}}">Shop
                            <span class="drop-icon">
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </span>
                        </a>
                        <div class="nav-dropdown-hoverable sub-mega-menu">
                            <h2>Categories</h2>

                            <div class="row">
                                <div class="col-md-8 col-4">
                                    <div class="row">
                                        @foreach (App\Models\Category::whereHas('products')->take(4)->get() as $key =>
                                        $category)
                                        <div class="col-6 col-md-6">
                                            <div class="sub-mega-menu-item">
                                                <h5>{{$category->name}}</h5>
                                                <ul>
                                                    @foreach ($category->categories as $subCategory)
                                                    <li>
                                                        <a
                                                            href="{{route('frontend.product.shop', ['category' => $category->slug, 'subcategory' => $subCategory->slug])}}">
                                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                            {{$subCategory->name}}
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-4 col-md-4">
                                    <div class="sub-mega-menu-item">
                                        <img src="{{asset('frontend/assets/images/shop-img-1.jpeg')}}"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Referral</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item has-dropdown">
                        <a class="nav-link" href="#">Registration <span class="drop-icon"><i class="fa fa-angle-down"
                                    aria-hidden="true"></i></span></a>
                        <ul class="nav-dropdown-hoverable">
                            <li><a href="#">Dog Registration</a></li>
                            <li><a href="#">Cat Registration</a></li>
                            <li><a href="#">Doctor Registration</a></li>
                        </ul>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);'"
                            onclick="event.preventDefault(); document.getElementById('logOut').submit();">
                            Logout
                        </a>
                    </li>
                    <form method="post" id="logOut" action="{{route('logout')}}">
                        @csrf
                    </form>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">
                            Login/Register
                        </a>
                    </li>
                    @endauth
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- </div> -->
        </div>
    </nav>
</header>
