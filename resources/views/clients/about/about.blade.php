@extends('layouts.client_master')


@section('title', 'Thông tin')


@section('content')
    <main class="container px-0">
        <!-- Row: Shop online-->
        <section class="row g-0">
            <div class="col-md-6 bg-position-center bg-size-cover bg-secondary"
                style="min-height: 15rem; background-image: url({{asset('frontend/img/about/01.jpg')}});">
            </div>
            <div class="col-md-6 px-3 px-md-5 py-5">
                <div class="mx-auto py-lg-5" style="max-width: 35rem;">
                    <h2 class="h3 pb-3">Tìm kiếm, lựa chọn, mua sắm trực tuyến</h2>
                    <p class="fs-sm pb-3 text-muted"> Siêu thị và cửa hàng Bigdeal và Bigdeal+ là hai thương hiệu bán lẻ thuộc Tập Đoàn Trường Anh Group. Ra đời từ năm 2021 cho đến nay, hệ thống Bigdeal & Bigdeal+ không ngừng phát triển vươn lên, ra mắt với các siêu thị Bigdeal và cửa hàng Bigdeal+ ở Việt Nam, mang đến cho người tiêu dùng sự lựa chọn đa dạng về chất lượng hàng hóa và dịch vụ, đáp ứng đầy đủ nhu cầu trải nghiệm mua sắm từ bình dân đến cao cấp của mọi khách hàng.</p><a class="btn btn-primary btn-shadow" href="shop-grid-ls.html">Xem sản phẩm</a>
                </div>
            </div>
        </section>
        <!-- Row: Delivery-->
        <section class="row g-0">
            <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2"
                style="min-height: 15rem; background-image: url({{asset('frontend/img/about/02.jpg')}});"></div>
            <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
                <div class="mx-auto py-lg-5" style="max-width: 35rem;">
                    <h2 class="h3 pb-3">Chính sách giao nhận hàng</h2>
                    <p class="fs-sm pb-3 text-muted"><b>Khi nhận hàng, quý khách hàng cần lưu ý thực hiện:</b>
                        <p>- Mở gói hàng và đối chiếu hàng hóa với hoá đơn tính tiền</p>
                        <p>- Kiểm tra sản phẩm thực tế có đúng với sản phẩm mà Khách hàng đã đặt mua hay không.</p>
                        <p>- Kiểm tra bao bì và sản phẩm có bị hư hại do quá trình vận chuyển hay không.</p>
                        <p>  Nếu không hài lòng với 1 trong 3 điều trên, khách hàng có thể yêu cầu nhân viên giao hàng xác nhận và trả lại hàng.</p>
                        Nếu không hài lòng với 1 trong 3 điều trên, khách hàng có thể yêu cầu nhân viên giao hàng xác nhận và trả lại hàng.
                        <p>
                        Bigdeal sẽ không chịu trách nhiệm giải quyết khiếu nại về việc thiếu hàng hoặc giao sai hàng của khách hàng sau khi khách hàng đã ký nhận và thanh toán.</p>

                    </p>
                    <!-- <a class="btn btn-accent btn-shadow" href="#">Shipping details</a> -->
                </div>
            </div>
        </section>
        <!-- Row: Mobile app-->
        <section class="row g-0">
            <div class="col-md-6 bg-position-center bg-size-cover bg-secondary"
                style="min-height: 15rem; background-image: url({{asset('frontend/img/about/03.jpg')}});"></div>
            <div class="col-md-6 px-3 px-md-5 py-5">
                <div class="mx-auto py-lg-5" style="max-width: 35rem;">
                    <h2 class="h3 pb-3">Chính sách bảo mật thông tin</h2>
                    <p class="fs-sm pb-3 text-muted">Chúng tôi cam kết sẽ bảo mật các Thông tin cá nhân của khách hàng, sẽ nỗ lực hết sức và sử dụng các biện pháp thích hợp để các thông tin mà khách hàng cung cấp cho chúng tôi trong quá trình sử dụng website & ứng dụng này được bảo mật và bảo vệ khỏi sự truy cập trái phép. Tuy nhiên, Bigdeal không đảm bảo ngăn chặn được tất cả các truy cập trái phép. Công ty CP Bigdeal không ủy quyền cho bên thứ ba thực hiện việc thu thập, lưu trữ thông tin cá nhân của người tiêu dùng. Trong trường hợp truy cập trái phép nằm ngoài khả năng kiểm soát của chúng tôi, Bigdeal sẽ không chịu trách nhiệm dưới bất kỳ hình thức nào đối với bất kỳ khiếu nại, tranh chấp hoặc thiệt hại nào phát sinh từ hoặc liên quan đến truy cập trái phép đó.</p>

                </div>
            </div>
        </section>
        <!-- Section: Shopping outlets-->
        <section class="row g-0">
            <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2"
                style="min-height: 15rem; background-image: url({{asset('frontend/img/about/07.jpg')}});"></div>
            <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
                <div class="mx-auto py-lg-5" style="max-width: 35rem;">
                    <h2 class="h3 pb-3">Chính sách bảo hành và bảo trì</h2>
                    <p class="fs-sm pb-3 text-muted">
                        <p>Với tiêu chí đặt quyền lợi của khách hàng lên hàng đầu, Bigdeal cam kết tất cả các sản phẩm được cung cấp tại Bigdeal là sản phẩm chính hãng, có nguồn gốc, xuất xứ rõ ràng và đảm bảo chất lượng.</p>
                        <p>Sản phẩm cung cấp tại Bigdeal được bảo hành theo chế độ bảo hành của nhà sản xuất hoặc nhà phân phối chính thức tương ứng.</p>
                        <p>Việc sản phẩm được bảo hành tại hệ thống cửa hàng Bigdeal hoặc được gửi đến Trung Tâm Bảo Hành sẽ phụ thuộc vào chính sách bảo hành cụ thể của từng dòng sản phẩm.</p>
                        <p>Thời gian sản phẩm bảo hành được tính từ ngày nhân viên Bigdeal tiếp nhận sản phẩm sẽ phụ thuộc vào tình trạng của từng sản phẩm và chính sách bảo hành của mỗi nhà cung cấp.</p>
                        <p>Các thông tin về Trung tâm bảo hành được ghi trên phiếu bảo hành kèm theo của sản phẩm bao gồm: Tên công ty, địa chỉ bảo hành, số điện thoại. Điều kiện bảo hành được ghi rõ trong phiếu bảo hành của nhà sản xuất hoặc nhà nhập khẩu.</p>

                    </p>
                    <!-- <a class="btn btn-warning btn-shadow" href="contacts.html">See outlet stores</a> -->
                </div>
            </div>
        </section>
        <hr>
        <!-- Section: Team-->
        <!-- <section class="container py-3 py-lg-5 mt-4 mb-3">
            <h2 class="h3 my-2">Our core team</h2>
            <p class="fs-sm text-muted">People behind your great shopping experience</p>
            <div class="row pt-3">
                <div class="col-lg-4 col-sm-6 mb-grid-gutter">
                    <div class="d-flex align-items-center"><img class="rounded-circle" src="img/team/03.jpg" width="96"
                            alt="Jonathan Doe">
                        <div class="ps-3">
                            <h6 class="fs-base pt-1 mb-1">Jonathan Doe</h6>
                            <p class="fs-ms text-muted mb-0">CEO, Co-founder</p><a class="nav-link-style fs-ms text-nowrap"
                                href="mailto:johndoe@example.com"><i class="ci-mail me-2"></i>johndoe@example.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-grid-gutter">
                    <div class="d-flex align-items-center"><img class="rounded-circle" src="img/team/04.jpg" width="96"
                            alt="Barbara Palson">
                        <div class="ps-3">
                            <h6 class="fs-base pt-1 mb-1">Barbara Palson</h6>
                            <p class="fs-ms text-muted mb-0">Chief of Marketing</p><a
                                class="nav-link-style fs-ms text-nowrap" href="mailto:b.palson@example.com"><i
                                    class="ci-mail me-2"></i>b.palson@example.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-grid-gutter">
                    <div class="d-flex align-items-center"><img class="rounded-circle" src="img/team/06.jpg" width="96"
                            alt="William Smith">
                        <div class="ps-3">
                            <h6 class="fs-base pt-1 mb-1">William Smith</h6>
                            <p class="fs-ms text-muted mb-0">Financial director</p><a
                                class="nav-link-style fs-ms text-nowrap" href="mailto:w.smith@example.com"><i
                                    class="ci-mail me-2"></i>w.smith@example.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-grid-gutter">
                    <div class="d-flex align-items-center"><img class="rounded-circle" src="img/team/02.jpg" width="96"
                            alt="Amanda Gallaher">
                        <div class="ps-3">
                            <h6 class="fs-base pt-1 mb-1">Amanda Gallaher</h6>
                            <p class="fs-ms text-muted mb-0">Lead UX designer</p><a class="nav-link-style fs-ms text-nowrap"
                                href="mailto:a.gallaher@example.com"><i
                                    class="ci-mail me-2"></i>a.gallaher@example.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-grid-gutter">
                    <div class="d-flex align-items-center"><img class="rounded-circle" src="img/team/01.jpg" width="96"
                            alt="Benjamin Miller">
                        <div class="ps-3">
                            <h6 class="fs-base pt-1 mb-1">Benjamin Miller</h6>
                            <p class="fs-ms text-muted mb-0">Website development</p><a
                                class="nav-link-style fs-ms text-nowrap" href="mailto:b.miller@example.com"><i
                                    class="ci-mail me-2"></i>b.miller@example.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-grid-gutter">
                    <div class="d-flex align-items-center"><img class="rounded-circle" src="img/team/07.jpg" width="96"
                            alt="Miguel Rodrigez">
                        <div class="ps-3">
                            <h6 class="fs-base pt-1 mb-1">Miguel Rodrigez</h6>
                            <p class="fs-ms text-muted mb-0">Content manager</p><a class="nav-link-style fs-ms text-nowrap"
                                href="mailto:b.miller@example.com"><i class="ci-mail me-2"></i>m.rodrigez@example.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Section: We are hiring-->
        <!-- <hr>
        <section class="row g-0">
            <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2"
                style="min-height: 15rem; background-image: url(img/about/05.jpg);"></div>
            <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
                <div class="mx-auto py-lg-5" style="max-width: 35rem;">
                    <h2 class="h3 mb-2">We are hiring new talents</h2>
                    <p class="fs-sm text-muted pb-2">If you want to be part of our team please submit you CV using the form
                        below:</p>
                    <form class="needs-validation row g-4" method="post" novalidate>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" placeholder="Your name" required>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="email" placeholder="Your email" required>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" rows="4" placeholder="Message" required></textarea>
                        </div>
                        <div class="col-12">
                            <input class="form-control" type="file" required>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-info btn-shadow" type="submit">Submit your CV</button>
                        </div>
                    </form>
                </div>
            </div>
        </section> -->
    </main>
@endsection
