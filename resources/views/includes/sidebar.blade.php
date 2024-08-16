<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="24">
                    </span>
                </a>
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('home') }}" >
                        <i data-feather="home"></i>
                        <span> Dashboard </span>

                    </a>

                </li>

                <li>
                    <a href="{{ route('elections') }}" class="tp-link">
                        <i data-feather="aperture"></i>
                        <span>Elections</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('positions') }}" class="tp-link">
                        <i data-feather="aperture"></i>
                        <span> Positions </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('nominees') }}" class="tp-link">
                        <i data-feather="aperture"></i>
                        <span> Nominees </span>
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ route('voters') }}" class="tp-link">
                        <i data-feather="aperture"></i>
                        <span>Voters </span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('results') }}" class="tp-link">
                        <i data-feather="aperture"></i>
                        <span> Results </span>
                    </a>
                </li>


                {{-- <li>
                    <a href="widgets.html" class="tp-link">
                        <i data-feather="aperture"></i>
                        <span> Users </span>
                    </a>
                </li> --}}













            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
