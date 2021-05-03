<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link text-center">
        <span class="brand-text font-weight-light">{{Setting::get('website_name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{route('admin.category.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'CategoryController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.product.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'ProductController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{route('admin.user.index')}}" class="nav-link
                {{(App\Helper\Common::getCurrentController() == 'HomeController') ? 'active' : ''}}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Users
                </p>
                </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.orders.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'OrderController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Orders
                        </p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{route('admin.newsletter.index')}}" class="nav-link
                {{(App\Helper\Common::getCurrentController() == 'NewsletterController') ? 'active' : ''}}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    News Letter
                </p>
                </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{route('admin.home-page.edit')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'HomeController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Home Page
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.footer-data.edit')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'FooterDataController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Footer Data
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.pages.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'PageController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Pages
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.profile')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'ProfileController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.settings')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'SettingsController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Website Settings
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
