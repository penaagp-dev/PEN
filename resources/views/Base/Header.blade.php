<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
            <img src="{{asset('assets/images/logo.png')}}" alt="" class="logo">
            <img src="{{asset('assets/images/logo-icon.png')}}" alt="" class="logo-thumb">
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" class="img-radius" alt="User-Profile-Image">
                            <span>{{Auth::user()->username}}</span>
                        </div>
                        <ul class="pro-body">
                            {{-- <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-pie-chart"></i>
                                    Pengaturan Akun</a></li> --}}
                            <li><a href="{{route('logout')}}" class="dropdown-item"><i class="feather icon-log-out"></i> My
                                    Logout</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
