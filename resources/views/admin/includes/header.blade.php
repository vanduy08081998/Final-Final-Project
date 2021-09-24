<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
            </a>
        </div>

        @auth
        <div class="right-topbar ml-auto">
            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                        <div class="media user-box align-items-center">
                            <div class="media-body user-info">
                                <p class="user-name mb-0">{{ auth()->user()->name }}</p>
                                <p class="designattion mb-0 text-success">Available</p>
                            </div>
                            <img src="{{ URL::to('Backend/images/avatars/avatar-1.png') }}" class="user-img" alt="user avatar">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="javascript:;"><i
                                class="bx bx-user"></i><span>Trang cá nhân</span></a>
                        <a class="dropdown-item" href="javascript:;"><i
                                class="bx bx-cog"></i><span>Thiết lập</span></a>


                        <div class="dropdown-divider mb-0"></div>	<a class="dropdown-item" href="{{ url('/logout') }}" onclick=""><i
                                class="bx bx-power-off"></i><span>Đăng xuất</span></a>
                    </div>
                </li>
            </ul>
        </div>
        @endauth

        @guest
            <div class="right-topbar ml-auto">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown dropdown-user-profile">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                            <div class="media user-box align-items-center">
                                <div class="media-body user-info">
                                    <p class="user-name mb-0">Jessica Doe</p>
                                    <p class="designattion mb-0">Available</p>
                                </div>
                                <img src="{{ URL::to('Backend/images/avatars/avatar-1.png') }}" class="user-img" alt="user avatar">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="javascript:;"><i
                                    class="bx bx-user"></i><span>Profile</span></a>
                            <a class="dropdown-item" href="javascript:;"><i
                                    class="bx bx-cog"></i><span>Settings</span></a>
                            <a class="dropdown-item" href="javascript:;"><i
                                    class="bx bx-tachometer"></i><span>Dashboard</span></a>
                            <a class="dropdown-item" href="javascript:;"><i
                                    class="bx bx-wallet"></i><span>Earnings</span></a>
                            <a class="dropdown-item" href="javascript:;"><i
                                    class="bx bx-cloud-download"></i><span>Downloads</span></a>
                            <div class="dropdown-divider mb-0"></div>	<a class="dropdown-item" href="javascript:;"><i
                                    class="bx bx-power-off"></i><span>Logout</span></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-language">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                            <div class="lang d-flex">
                                <div><i class="flag-icon flag-icon-um"></i>
                                </div>
                                <div><span>En</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="javascript:;"><i
                                    class="flag-icon flag-icon-de"></i><span>German</span></a>
                            <a class="dropdown-item" href="javascript:;"><i
                                    class="flag-icon flag-icon-fr"></i><span>French</span></a>
                            <a class="dropdown-item" href="javascript:;"><i
                                    class="flag-icon flag-icon-um"></i><span>English</span></a>
                            <a class="dropdown-item" href="javascript:;"><i
                                    class="flag-icon flag-icon-in"></i><span>Hindi</span></a>
                            <a class="dropdown-item" href="javascript:;"><i
                                    class="flag-icon flag-icon-cn"></i><span>Chinese</span></a>
                            <a class="dropdown-item" href="javascript:;"><i
                                    class="flag-icon flag-icon-ae"></i><span>Arabic</span></a>
                        </div>
                    </li>
                </ul>
            </div>
        @endguest


    </nav>
</header>
