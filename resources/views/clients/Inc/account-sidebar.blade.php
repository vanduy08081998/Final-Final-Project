<!-- Sidebar-->
<aside class="col-lg-4 pt-4 pt-lg-0 pe-xl-5">
    <div class="bg-white rounded-3 shadow-lg pt-1 mb-5 mb-lg-0">
        <div class="d-md-flex justify-content-between align-items-center text-center text-md-start p-4">
            <div class="d-md-flex align-items-center">
                <div class="img-thumbnail rounded-circle position-relative flex-shrink-0 mx-auto mb-2 mx-md-0 mb-md-0"
                    style="width: 6.375rem;">
                    @if (Auth::user()->avatar)
                        @if (Auth::user()->provider_id == null)
                            <img class="rounded-circle customer_picture"
                                src="{{ URL::to('uploads/Users/', Auth::user()->avatar) }}" width="90" alt="avatar">
                        @else
                            <img class="rounded-circle customer_picture" src="{{ URL::to(Auth::user()->avatar) }}"
                                width="90" alt="avatar">
                        @endif
                    @else
                        <img class="rounded-circle customer_picture"
                            src="{{ URL::to('backend/img/profiles/avt.png') }}" alt="avatar">
                    @endif
                </div>
                <div class="ps-md-3">
                    <h3 class="fs-base mb-0">{{ Auth::user()->name }}</h3>
                    <span class="text-accent fs-sm">{{ Auth::user()->email }}</span>
                </div>
            </div>
            <a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0" href="#account-menu" data-bs-toggle="collapse"
                aria-expanded="false">
                <i class="ci-menu me-2"></i>Danh mục tài khoản
            </a>
        </div>
        <div class="d-lg-block collapse" id="account-menu">
            <ul class="list-unstyled mb-0">
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3 {{ Route::currentRouteNamed('account.order-list') ? 'active' : '' }}"
                        href="{{ route('account.order-list') }}">
                        <i class="ci-bag opacity-60 me-2"></i>Đơn hàng<span class="fs-sm text-muted ms-auto">1</span>
                    </a>
                </li>
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3 {{ Route::currentRouteNamed('account.wishlist') ? 'active' : '' }}"
                        href="{{ route('account.wishlist') }}">
                        <i class="ci-heart opacity-60 me-2"></i>Danh sách yêu thích
                        <span
                            class="fs-sm text-muted ms-auto">{{ App\Models\Wishlist::orderByDESC('id')->where('id_user', Auth::user()->id)->count() }}</span>
                    </a>
                </li>
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3 {{ Route::currentRouteNamed('account.notification') ? 'active' : '' }}"
                        href="{{ route('account.notification') }}">
                        <i class="far fa-bell opacity-60 me-2"></i>Thông báo
                        <span class="fs-sm text-muted ms-auto">{{ Auth::user()->notification->count() }}</span>
                    </a>
                </li>
            </ul>
            <div class="bg-secondary px-4 py-3">
                <h3 class="fs-sm mb-0 text-muted">Cài đặt tài khoản</h3>
            </div>
            <ul class="list-unstyled mb-0">
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3 {{ Route::currentRouteNamed('account.account-info') ? 'active' : '' }}"
                        href="{{ route('account.account-info') }}">
                        <i class="ci-user opacity-60 me-2"></i>Thông tin cá nhân
                    </a>
                </li>
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3 {{ Route::currentRouteNamed('account.account-review') ? 'active' : '' }}"
                        href="{{ route('account.account-review') }}">
                        <i class="ci-star opacity-60 me-2"></i>Đánh giá của tôi
                    </a>
                </li>
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3 {{ Route::currentRouteNamed('account.account-address') ? 'active' : '' }}"
                        href="{{ route('account.account-address') }}">
                        <i class="ci-location opacity-60 me-2"></i>Địa chỉ giao nhận
                    </a>
                </li>
                <li class="mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3 {{ Route::currentRouteNamed('account.account-payment') ? 'active' : '' }}"
                        href="{{ route('account.account-payment') }}">
                        <i class="ci-card opacity-60 me-2"></i>Phương thức thanh toán
                    </a>
                </li>
                <li class="mb-0">
                    <form action="{{ route('logout') }}" method="POST">
                        <button type="submit" class="nav-link-style d-flex align-items-center px-4 py-3" href="#">
                            <i class="ci-sign-out opacity-60 me-2"></i>Đăng xuất
                        </button>
                    </form>

                </li>
            </ul>
        </div>
    </div>

</aside>
