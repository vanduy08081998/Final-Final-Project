<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="{{ url('admin') }}" class="logo">
            <img src="{{ URL::to('backend/img/logo.png') }}" width="150" height="45" style="margin-left: -10px; margin-top: 8px;"
                alt="">
        </a>
    </div>
    <!-- /Logo -->

    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon mt-3">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>
    <style>
        .client-btn {
            color: #999;
            float: left;
            font-size: 22px;
            line-height: 60px;
            padding: 0 10px;
            margin-top: 15px;
            cursor: pointer;
        }

        .client-btn i {
            color: #fff;
        }

    </style>
    <a id="mobile_btn" class="mobile_btn" href="#sidebar" style="margin-top: 10px"><i class="fa fa-bars"></i></a>

    <!-- Header Menu -->
    <ul class="nav user-menu">
        @if (Auth::user())
            <li class="nav-item dropdown has-arrow main-drop">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img">
                        @if (Auth::user()->avatar)
                            @if (Auth::user()->provider_id != null)
                                <img src="{{ Auth::user()->avatar }}" alt="">
                            @else
                                <img src="{{ URL::to('uploads/Users/', Auth::user()->avatar) }}" alt="">
                            @endif
                        @else
                            <img src="{{ URL::to('backend/img/profiles/avt.png') }}" alt="">
                        @endif
                        <span class="status online"></span>
                    </span>
                    <span>{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-user-admin">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit"><i class="fas fa-sign-out-alt"></i> Đăng
                            xuất</button>
                    </form>
                </div>
            </li>
        @endif

    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.html">My Profile</a>
            <a class="dropdown-item" href="settings.html">Settings</a>
            <a class="dropdown-item" href="login.html">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->

</div>
<!-- /Header -->
