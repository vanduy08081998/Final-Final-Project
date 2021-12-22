@extends('layouts.client_master')


@section('title', 'Thông tin')


@section('content')
    <main class="container px-0">
        <!-- Row: Shop online-->
        <section class="row g-0">
            <div class="col-md-6 bg-position-center bg-size-cover bg-secondary"
                style="min-height: 15rem; background-image: url({{ asset('frontend/img/about/01.jpg') }});">
            </div>
            <div class="col-md-6 px-3 px-md-5 py-5">
                <div class="mx-auto py-lg-5" style="max-width: 35rem; text-align:justify">
                    <h2 class="h3 pb-3">Tìm kiếm, lựa chọn, mua sắm trực tuyến</h2>
                    <p class="fs-sm pb-3 text-muted" style="text-align: justify; margin-right: -10%"> Siêu thị và cửa hàng Bigdeal và Bigdeal+ là hai thương hiệu bán lẻ
                        thuộc Tập Đoàn Trường Anh Group. Ra đời từ năm 2021 cho đến nay, hệ thống Bigdeal & Bigdeal+ không
                        ngừng phát triển vươn lên, ra mắt với các siêu thị Bigdeal và cửa hàng Bigdeal+ ở Việt Nam, mang đến
                        cho người tiêu dùng sự lựa chọn đa dạng về chất lượng hàng hóa và dịch vụ, đáp ứng đầy đủ nhu cầu
                        trải nghiệm mua sắm từ bình dân đến cao cấp của mọi khách hàng.</p><a
                        class="btn btn-primary btn-shadow" href="{{ route('shop.shop-grid', ['slug' => 'all-category' ]) }}">Xem sản phẩm</a>
                </div>
            </div>
        </section>
        <!-- Row: Delivery-->
        <section class="row g-0">
            <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2"
                style="min-height: 15rem; background-image: url({{ asset('frontend/img/about/02.jpg') }});"></div>
            <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
                <div class="mx-auto py-lg-5" style="max-width: 35rem;text-align: justify;">
                    <h2 class="h3 pb-3">Các chính sách giao hàng và nhận hàng</h2>
                    <p class="fs-sm pb-3 text-muted"><b>Khi nhận hàng, quý khách hàng cần lưu ý thực hiện:</b>
                    <p>Mở gói hàng và đối chiếu hàng hóa với hoá đơn tính tiền</p>
                    <p>Kiểm tra sản phẩm thực tế có đúng với sản phẩm mà Khách hàng đã đặt mua hay không.</p>
                    <p>Kiểm tra bao bì và sản phẩm có bị hư hại do quá trình vận chuyển hay không.</p>
                    <p> Nếu không hài lòng với 1 trong 3 điều trên, khách hàng có thể yêu cầu nhân viên giao hàng xác nhận
                        và trả lại hàng.</p>
                    Nếu không hài lòng với 1 trong 3 điều trên, khách hàng có thể yêu cầu nhân viên giao hàng xác nhận và
                    trả lại hàng.
                    <p>
                        Bigdeal sẽ không chịu trách nhiệm giải quyết khiếu nại về việc thiếu hàng hoặc giao sai hàng của
                        khách hàng sau khi khách hàng đã ký nhận và thanh toán.</p>

                    </p>
                    <!-- <a class="btn btn-accent btn-shadow" href="#">Shipping details</a> -->
                </div>
            </div>
        </section>
        <!-- Row: Mobile app-->
        <section class="row g-0">
            <div class="col-md-6 bg-position-center bg-size-cover bg-secondary"
                style="min-height: 15rem; background-image: url({{ asset('frontend/img/about/03.jpg') }});"></div>
            <div class="col-md-6 px-3 px-md-5 py-5">
                <div class="mx-auto py-lg-5" style="max-width: 35rem;text-align: justify;">
                    <h2 class="h3 pb-3">Chính sách bảo mật thông tin</h2>
                    <p class="fs-sm pb-3 text-muted" style="margin-right: -10%">Chúng tôi cam kết sẽ bảo mật các Thông tin cá nhân của khách hàng, sẽ
                        nỗ lực hết sức và sử dụng các biện pháp thích hợp để các thông tin mà khách hàng cung cấp cho chúng
                        tôi trong quá trình sử dụng website & ứng dụng này được bảo mật và bảo vệ khỏi sự truy cập trái
                        phép. Tuy nhiên, Bigdeal không đảm bảo ngăn chặn được tất cả các truy cập trái phép. Công ty CP
                        Bigdeal không ủy quyền cho bên thứ ba thực hiện việc thu thập, lưu trữ thông tin cá nhân của người
                        tiêu dùng. Trong trường hợp truy cập trái phép nằm ngoài khả năng kiểm soát của chúng tôi, Bigdeal
                        sẽ không chịu trách nhiệm dưới bất kỳ hình thức nào đối với bất kỳ khiếu nại, tranh chấp hoặc thiệt
                        hại nào phát sinh từ hoặc liên quan đến truy cập trái phép đó.</p>

                </div>
            </div>
        </section>
        <!-- Section: Shopping outlets-->
        <section class="row g-0">
            <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2"
                style="min-height: 15rem; background-image: url({{ asset('frontend/img/about/07.jpg') }});"></div>
            <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
                <div class="mx-auto py-lg-5" style="max-width: 35rem;text-align: justify;">
                    <h2 class="h3 pb-3">Chính sách bảo hành và bảo trì</h2>
                    <p class="fs-sm pb-3 text-muted">
                    <p>Với tiêu chí đặt quyền lợi của khách hàng lên hàng đầu, Bigdeal cam kết tất cả các sản phẩm được cung
                        cấp tại Bigdeal là sản phẩm chính hãng, có nguồn gốc, xuất xứ rõ ràng và đảm bảo chất lượng.</p>
                    <p>Sản phẩm cung cấp tại Bigdeal được bảo hành theo chế độ bảo hành của nhà sản xuất hoặc nhà phân phối
                        chính thức tương ứng.</p>
                    <p>Việc sản phẩm được bảo hành tại hệ thống cửa hàng Bigdeal hoặc được gửi đến Trung Tâm Bảo Hành sẽ phụ
                        thuộc vào chính sách bảo hành cụ thể của từng dòng sản phẩm.</p>
                    <p>Thời gian sản phẩm bảo hành được tính từ ngày nhân viên Bigdeal tiếp nhận sản phẩm sẽ phụ thuộc vào
                        tình trạng của từng sản phẩm và chính sách bảo hành của mỗi nhà cung cấp.</p>
                    <p>Các thông tin về Trung tâm bảo hành được ghi trên phiếu bảo hành kèm theo của sản phẩm bao gồm: Tên
                        công ty, địa chỉ bảo hành, số điện thoại. Điều kiện bảo hành được ghi rõ trong phiếu bảo hành của
                        nhà sản xuất hoặc nhà nhập khẩu.</p>

                    </p>
                    <!-- <a class="btn btn-warning btn-shadow" href="contacts.html">See outlet stores</a> -->
                </div>
            </div>
        </section>
        <hr>
    </main>
@endsection
