<footer class="footer bg-dark pt-5">
    <div class="container">
        <div class="row pb-2">
            <div class="col-md-4 col-sm-6">
                <div class="widget widget-links widget-light pb-2 mb-4">
                    <h3 class="widget-title text-light">Danh mục sản phẩm</h3>
                    <ul class="widget-list">
                        @foreach (App\Models\Category::orderBy('id_cate', 'ASC')->get() as $cate)
                            <li class="widget-list-item"><a class="widget-list-link"
                                    href="{{ route('shop.shop-grid', $cate->category_slug) }}">{{ $cate->category_name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="widget widget-links widget-light pb-2 mb-4">
                    <h3 class="widget-title text-light">Tài khoản &amp; Thông tin giao hàng</h3>
                    <ul class="widget-list">
                        <li class="widget-list-item"><a class="widget-list-link"
                                href="{{ route('account.account-info') }}">Tài khoản của bạn</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="#">Giao hàng &amp; Điều khoản</a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link" href="#">Theo dõi đơn hàng</a></li>
                    </ul>
                </div>
                <div class="widget widget-links widget-light pb-2 mb-4">
                    <h3 class="widget-title text-light">Thông tin cửa hàng</h3>
                    <ul class="widget-list">
                        <li class="widget-list-item"><a class="widget-list-link"
                                href="{{ route('clients.about') }}">Về
                                Công ty</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="#">Về nhóm</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="#">Chăm sóc khách hàng</a></li>
                        <li class="widget-list-item"><a class="widget-list-link"
                                href="{{ route('clients.blog') }}">Tin
                                tức</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget pb-2 mb-4">
                    <h3 class="widget-title text-light pb-1">Theo dõi chúng tôi tại: </h3>
                    <div class="d-flex flex-wrap">
                        <a class="btn-social bs-light bs-twitter mb-2" href="#"><i class="ci-twitter"></i></a>
                        <a class="btn-social bs-light bs-facebook ms-2 mb-2" rel="noopener noreferrer" target="_blank" href="https://www.facebook.com/BigDeal-106183301182718"><i class="ci-facebook"></i></a>
                        <a class="btn-social bs-light bs-instagram ms-2 mb-2" href="#"><i
                                class="ci-instagram"></i></a>
                        <a class="btn-social bs-light bs-pinterest ms-2 mb-2" href="#"><i
                                class="ci-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-5 bg-darker">
        <div class="container">
            <div class="row pb-3">
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="d-flex"><i class="ci-rocket text-primary" style="font-size: 2.25rem;"></i>
                        <div class="ps-3">
                            <h6 class="fs-base text-light mb-1">Giao hàng nhanh và miễn phí</h6>
                            <p class="mb-0 fs-ms text-light opacity-50">Miễn phí vận chuyển cho đơn hàng<br> >
                                2.000.000VND</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="d-flex"><i class="ci-currency-exchange text-primary"
                            style="font-size: 2.25rem;"></i>
                        <div class="ps-3">
                            <h6 class="fs-base text-light mb-1">Hỗ trợ đổi trả</h6>
                            <p class="mb-0 fs-ms text-light opacity-50">Đổi trả tronng vòng 30 ngày</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="d-flex"><i class="ci-support text-primary" style="font-size: 2.25rem;"></i>
                        <div class="ps-3">
                            <h6 class="fs-base text-light mb-1">Hỗ trợ 24/7</h6>
                            <p class="mb-0 fs-ms text-light opacity-50">Tận tình hỗ trợ 24/7</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="d-flex"><i class="ci-security-check text-primary"
                            style="font-size: 2.25rem;"></i>
                        <div class="ps-3">
                            <h6 class="fs-base text-light mb-1">Giao dịch bảo mật</h6>
                            <p class="mb-0 fs-ms text-light opacity-50">Bảo mật thông tin người dùng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
