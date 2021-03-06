<?php
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\Information;
$wishlist = Wishlist::all();
$categories = Category::where('category_parent_id', null)
    ->orderBy('id_cate', 'asc')
    ->get();
$category = Category::all();
$infor = Information::orderByDESC('id')
    ->where('infor_status', 1)
    ->first();
?>

<style>
    .twitter-typeahead {
        width: 30rem;
    }

    .tt-dataset-productList .tt-suggestion {
        display: flex;
    }

    .tt-menu {
        min-width: calc(100% - 20px);
        margin-left: 20px;
    }

    .tt-menu .search-name {
        margin: auto 0;
    }

    .tt-menu .search-price {
        margin: auto 0;
    }

</style>
<header class="shadow-sm">
    <!-- Topbar-->
    <div class="topbar topbar-dark bg-dark">
        <div class="container">
            <div>
                <div class="topbar-text text-nowrap d-none d-md-inline-block border-light">
                    <span class="text-muted me-1">Tư vấn 24/7: </span>
                    <a class="topbar-link" href="tel:{{ $infor->phone }}"><i class="ci-phone text-primary"></i> {{ $infor->phone }}</a>
                </div>
            </div>
            <div data-url="{{ route('wishlist.show_icon_wishlist') }}" class="topbar-text dropdown d-md-none ms-auto">
                <a class="topbar-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Yêu thích / So sánh / Đơn
                    hàng</a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        @if ($wishlist == null && Auth::user == null)
                            <a class="topbar-link d-none d-md-inline-block" href="{{ route('account.wishlist') }}">
                                <i class="ci-heart mt-n1"></i>Yêu thích (0)
                            </a>
                        @elseif ($wishlist != NULL && Auth::user())
                            <a class="topbar-link d-none d-md-inline-block" href="{{ route('account.wishlist') }}">
                                <i class="ci-heart mt-n1"></i>Yêu thích <span class="count_wishlist"></span>
                                {{-- ({{ Wishlist::orderByDESC('id')->where('id_user', Auth::user()->id)->count() }}) --}}
                            </a>
                        @endif
                    </li>
                    <li>
                            <a class="topbar-link ms-3 ps-3 border-start border-light d-none d-md-inline-block" style="cursor: pointer"
                               onclick="show()"><i class="ci-compare mt-n1"></i>So sánh
                            </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('account.order-tracking') }}">
                            <i class="ci-location text-muted me-2"></i>Theo dõi đơn hàng
                        </a>
                    </li>
                </ul>
            </div>
            <div data-url="{{ route('wishlist.show_icon_wishlist') }}"
                class="count-wishlist d-none d-md-block ms-3 text-nowrap">
                @if ($wishlist == null && Auth::user == null)
                    <a class="topbar-link d-none d-md-inline-block" href="{{ route('account.wishlist') }}">
                        <i class="ci-heart mt-n1"></i>Yêu thích (0)
                    </a>
                @elseif ($wishlist != NULL && Auth::user())
                    <a class="topbar-link d-none d-md-inline-block" href="{{ route('account.wishlist') }}">
                        <i class="ci-heart mt-n1"></i>Yêu thích <span class="count_wishlist"></span>
                        {{-- ({{ Wishlist::orderByDESC('id')->where('id_user', Auth::user()->id)->count() }}) --}}
                    </a>
                @endif
                <a class="topbar-link ms-3 ps-3 border-start border-light d-none d-md-inline-block" style="cursor: pointer"
                   onclick="show()"><i class="ci-compare mt-n1"></i>So sánh
                </a>
                <a class="topbar-link ms-3 border-start border-light ps-3 d-none d-md-inline-block"
                    href="{{ route('account.order-list') }}"><i class="ci-location mt-n1"></i>Theo dõi đơn hàng
                </a>
            </div>
        </div>
      </div>
    <div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand d-none d-sm-block me-3 flex-shrink-0" href="{{ route('clients.index') }}">
                    <img src="{{ asset('frontend/img/logo/logo.png') }}" width="142" alt="Cartzilla">
                </a>
                <a class="navbar-brand d-sm-none me-2" href="{{ route('clients.index') }}">
                    <img src="{{ asset('frontend/img/logo/logo.png') }}" width="74" alt="Cartzilla">
                </a>
                <!-- Search-->
                <form class="input-group d-none d-lg-flex flex-nowrap mx-4 typeahead search-form-header"
                    action="{{ route('search.searchs') }}" method="POST" enctype="multipart/form-data"
                    id="choice-form">
                    @csrf
                    @method('POST')
                    <input class="form-control rounded-start w-100 search-input"
                        style="border-radius: 25px 0 0 25px !important;" name="key" id="search" type="text"
                        placeholder="Tìm kiếm sản phẩm" required>
                    <select class="form-select flex-shrink-0" style="width: 10.5rem;" name="category">
                        <option name="category" value="0">Tất cả</option>
                        @foreach ($category as $cate)
                            <option name="category" value="{{ $cate->id_cate }}">{{ $cate->category_name }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn-primary" type="submit" style="border-radius: 0 25px 25px 0; border: none"><i
                            class="fas fa-search"
                            style="font-size: 23px; margin-left: 10px; margin-right: 10px; margin-top: 3px;"></i>
                    </button>
                </form>
                <!-- Toolbar-->
                <div class="user-space">
                    @if (Auth::user())
                        <div class="user-ct" style="position: relative">
                            <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2"
                                href="{{ route('account.account-info') }}">
                                <div class="navbar-tool-icon-box">
                                    @if (Auth::user()->avatar)
                                        @if (Auth::user()->provider_id == null)
                                            <img class="customer_picture"
                                                src="{{ URL::to('uploads/Users/', Auth::user()->avatar) }}"
                                                width="90" alt="avatar" style="border-radius:50%;">
                                        @else
                                            <img class="customer_picture" src="{{ URL::to(Auth::user()->avatar) }}"
                                                width="90" alt="avatar" style="border-radius:50%;">
                                        @endif
                                    @else
                                        <img class="customer_picture"
                                            src="{{ URL::to('backend/img/profiles/avt.png') }}" width="90"
                                            alt="avatar">
                                    @endif
                                </div>
                                <div class="navbar-tool-text ms-n3">{{ Auth::user()->name }}</div>

                            </a>
                            <div class="content-user">
                                <ul>
                                    <li><a href="{{ route('account.order-list') }}"><i
                                                class="fas fa-file-invoice-dollar"></i> Đơn
                                            hàng</a></li>
                                    <li>
                                        <a href="{{ route('account.notification') }}">
                                            <i class="far fa-bell"></i>
                                            Thông báo <span>{{ Auth::user()->notification->count() }}</span></a>

                                    </li>
                                    <li><a href="{{ route('account.account-info') }}"><i
                                                class="far fa-user-circle"></i>
                                            Tài khoản</a></li>
                                    @if (Auth::user()->position == 'admin')
                                        <li><a href="{{ route('admin.index') }}"><i class="fas fa-user-shield"></i>
                                                Quản trị admin</a></li>
                                    @endif
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit"><i class="fas fa-sign-out-alt"></i> Đăng xuất</button>
                                        </form>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                    <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center user-icon">
                        <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="{{ route('login') }}">
                            <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                            <div class="navbar-tool-text ms-n3"><small>Đăng nhập / Đăng ký</small>Tài khoản</div>
                        </a>
                    </div>
                    @endif
                    <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                        <div class="navbar-tool dropdown ms-3 cart__dropdown">
                          {{-- cart dropdown --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <!-- Search-->
                    <div class="input-group d-lg-none my-3"><i
                            class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input class="form-control rounded-start" type="text" placeholder="Tìm kiếm sản phẩm...">
                    </div>
                    <!-- Departments menu-->
                    <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle ps-lg-0" href="#" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside">
                                <i class="ci-menu align-middle mt-n1 me-2"></i>Danh mục
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $cate)
                                    <li class="dropdown mega-dropdown">
                                        <a href="{{ route('shop.shop-grid', ['slug' => $cate->category_slug]) }}"
                                            class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">
                                            <span style="margin-right: 10px">{!! $cate->category_icon !!}</span>
                                            {{ $cate->category_name }}
                                        </a>
                                        <div class="dropdown-menu p-0">
                                            <div class="d-flex flex-wrap flex-sm-nowrap px-2">
                                                <div class="mega-dropdown-column py-4 px-3">
                                                    <p>Thương hiệu</p>
                                                    <div class="widget widget-links">
                                                        <ul class="widget-list">
                                                            @foreach ($cate->brands as $brand)
                                                                <li class="widget-list-item pb-2">
                                                                    <a class="widget-list-link" href="{{route('shop.products_brand_all',['cate_slug' => $cate->category_slug,'brand_slug' => $brand->brand_slug])}}">
                                                                        <img src="{{ url($brand->brand_image) }}"
                                                                            height="90px" width="70px">
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>

                                                {{-- <div class="mega-dropdown-column pt-4 pb-0 py-sm-4 px-3">
                          @foreach ($cate->subcategory as $cateChild)
                            <div class="widget widget-links pb-2">
                              <h6 class="fs-base mb-3">
                                {{ $cateChild->category_name }}
                              </h6>
                              <ul class="widget-list">
                                @foreach ($cateChild->brands as $brand)
                                  <li class="widget-list-item pb-1">
                                   <a class="widget-list-link" href="{{route('shop.products_brand_all',['id_cate' => $cate->id_cate,'brand_id' => $brand->id])}}">
                                   <img src="{{ url($brand->brand_image) }}" height="100px" width="80px"></a>
                                  </li>
                                @endforeach
                              </ul>
                            </div>
                          @endforeach
                        </div> --}}
                                                <div class="mega-dropdown-column d-none d-lg-block py-4 text-center">
                                                    <a class="d-block mb-2" href="#">
                                                        <img src="{{ asset('https://lh3.googleusercontent.com/jSPmSAwSsjO3grPdLl49HYHhDKZwMZHs-Uj8-rcM8g3v_ObfkNkzvsGp5V-Ro4ZuZQWdyycYwU6YLfO6_qMFQ-NOewp3e7MPBw=rw-w400') }}"
                                                            alt="Computers &amp; Accessories" height="350px"
                                                            width="200px"></a>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <!-- Primary menu-->
                    <ul class="navbar-nav">
                        <li
                            class="nav-item dropdown {{ Route::currentRouteNamed('clients.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('clients.index') }}"><i
                                    class="ci-home"></i> Trang
                                chủ</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteNamed('clients.about') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('clients.about') }}"
                                data-bs-auto-close="outside"><i class="ci-flag"></i>
                                Giới thiệu</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteNamed('shop.shop-grid') ? 'active' : '' }}"><a
                                class="nav-link"
                                href="{{ route('shop.shop-grid', ['slug' => 'all-category']) }}"><i
                                    class="ci-lable"></i> Cửa hàng</a>
                        </li>
                        <li
                            class="nav-item {{ Route::currentRouteNamed('client-flash-deals.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('client-flash-deals.index') }}"
                                data-bs-auto-close="outside"><i class="ci-bookmark"></i>
                                Khuyến mãi</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteNamed('clients.blog') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('clients.blog') }}">
                                <i class="ci-store"></i>
                                Bài viết</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteNamed('clients.contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('clients.contact') }}"
                                data-bs-auto-close="outside"><i class="ci-phone"></i> Liên hệ và Phản hồi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
