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
                    @foreach (App\Models\Category::whereHas('childrenCategories')->take(3)->get() as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('frontend.category', $category->slug)}}">{{$category->name}}</a>
                    </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="#">Who we Are</a>
                    </li>
                    <li class="nav-item has-dropdown mega-menu">
                        <a class="nav-link" href="#">Shop <span class="drop-icon"><i class="fa fa-angle-down"
                                    aria-hidden="true"></i></span></a>
                        <div class="nav-dropdown-hoverable sub-mega-menu">
                            <h2>Categories</h2>

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="sub-mega-menu-item">
                                        <h5>Dogs</h5>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                        </ul>
                                    </div>
                                    <div class="sub-mega-menu-item">
                                        <h5>Cats</h5>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                        </ul>
                                    </div>
                                    <div class="sub-mega-menu-item">
                                        <h5>Horses</h5>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                        </ul>
                                    </div>
                                    <div class="sub-mega-menu-item">
                                        <h5>For You</h5>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="sub-mega-menu-item">
                                        <h5>Health</h5>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Petraceuticals</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
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
                        <a class="nav-link" href="#">News</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="nav-item has-dropdown has-dropdown-right">
                        <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <div class="nav-dropdown-hoverable">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <button class="btn btn-warning" type="submit"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                    </li>
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
