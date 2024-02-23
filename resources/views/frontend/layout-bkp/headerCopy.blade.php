<nav class="text-dark navbar navbar-expand-lg mb-0" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{route('frontend.home')}}">
                <strong>E Commerce</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('frontend.home')}}">
                        HOME
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('frontend.collections')}}">
                        COLLECTIONS
                    </a>
                </li>
                {{-- @foreach (App\Models\Category::whereHas('childrenCategories')->take(5)->get() as $category) --}}
                @foreach (App\Models\Category::whereNull('category_id')->where(function ($query) {
                $query->has('products')->orHas('categories.products');
                })->get() as $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('frontend.collections', ['category' => $category->slug])}}">
                        {{$category->name}}
                    </a>
                </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="{{route('frontend.cart.index')}}">
                        Cart
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('frontend.shipping.return')}}">
                        Return/Shipping
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('frontend.about.us')}}">
                        About Us
                    </a>
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
            </ul>

            <ul class="navbar-nav ml-auto">


                <li class="nav-item">
                    <a id='menu' class="nav-link js-menu-open menu-open" href="javascript:void(0)">
                        <i class="material-icons">shopping_cart</i>
                    </a>
                </li>

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('frontend.profile.show')}}">
                        <i class="material-icons">person</i>
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>