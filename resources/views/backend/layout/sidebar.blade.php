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
                <li class="nav-item">
                    <a href="{{route('admin.contactUs.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'ContactUsController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Contact us leads
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.request-withdrawal.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'RequestWithdrawalController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Request Withdrawals
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.tds.transactionIndex')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'TdsTransactionController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Tds Transactions
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.tds-report.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'TdsReportController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Tds Reports
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.client-experience.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'ClientExperienceController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Client Experiences
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.user.index')}}" class="nav-link
                {{(App\Helper\Common::getCurrentController() == 'UserController') ? 'active' : ''}}">
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
                </li>
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
                    <a href="{{route('admin.blog.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'BlogController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Blogs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.image.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'ImageController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Images
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
                    <a href="{{route('admin.tds.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'TdsController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Tds Settings
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
