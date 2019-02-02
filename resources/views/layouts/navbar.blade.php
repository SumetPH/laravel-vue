<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="@yield('title-link')">@yield('title-text')</a>
        <!-- Form -->
        {{-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
            <div class="form-group mb-0">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text">
                </div>
            </div>
        </form> --}}
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">

            <li class="nav-item">
                <a class="nav-link pr-0 text-white" href="#">
                    <span>{{ auth()->user()->firstname }}</span>
                </a>
            </li>
            @if (auth()->user()->firstname == 'Admin')
            <li class="nav-item">
                <a class="nav-link pr-0 text-white" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-admin').submit();">
                    <i class="ni ni-user-run"></i>
                    <span>ออกจากระบบ</span>
                </a>
                <form id="logout-form-admin" action="/admin/logout" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link pr-0 text-white" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-user').submit();">
                    <i class="ni ni-user-run"></i>
                    <span>ออกจากระบบ</span>
                </a>
                <form id="logout-form-user" action="/user/logout" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            @endif
        </ul>
    </div>
</nav>