<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>DASHBOARD</label>
                </li>
                <li class="nav-item {{ request()->routeIs('cms.dashboard') ? 'active' : '' }}">
                    <a href="index.html" class="nav-link "><span class="pcoded-micon"><i
                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>DATA</label>
                </li>
                <li class="nav-item {{ request()->routeIs('cms.general_info') ? 'active' : '' }}">
                    <a href="{{route('cms.general_info')}}" class="nav-link "><span class="pcoded-micon"><i
                    class="feather icon-file-text"></i></span><span class="pcoded-mtext">General Information</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('cms.generation') ? 'active' : '' }}">
                    <a href="{{route('cms.generation')}}" class="nav-link "><span class="pcoded-micon"><i
                    class="feather icon-file-text"></i></span><span class="pcoded-mtext">Generation</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('cms.galery') ? 'active' : '' }}">
                    <a href="{{route('cms.galery')}}" class="nav-link "><span class="pcoded-micon"><i
                    class="feather icon-file-text"></i></span><span class="pcoded-mtext">Galery</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('cms.social_media') ? 'active' : '' }}">
                    <a href="{{route('cms.social_media')}}" class="nav-link "><span class="pcoded-micon"><i
                    class="feather icon-file-text"></i></span><span class="pcoded-mtext">Social Media</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
