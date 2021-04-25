<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.dashboard')}}" class="nav-link">Home</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="nav-link">
                <i class="fa fa-sign-out"></i>
                Log Out
            </a>
        </li>
        <form id="logout-form" action="{{route('admin.logout')}}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</nav>
