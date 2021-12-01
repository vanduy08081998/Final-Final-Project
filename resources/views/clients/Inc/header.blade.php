<?php
use App\Models\Category;
$categories = Category::where('category_parent_id', null)
    ->orderBy('id_cate', 'desc')
    ->get();
?>
<header class="shadow-sm">
  <!-- Topbar-->
  <div class="topbar topbar-dark bg-dark">
    <div class="container">
      <div>
        <div class="topbar-text text-nowrap d-none d-md-inline-block border-light">
          <span class="text-muted me-1">Tư vấn 24/7 tại</span>
          <a class="topbar-link" href="tel:00331697720">(00) 33 169 7720</a>
        </div>
      </div>
      <div class="topbar-text dropdown d-md-none ms-auto"><a class="topbar-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Yêu thích
          / So sánh / Đơn hàng</a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="{{ route('account.wishlist') }}">
              <i class="ci-heart text-muted me-2"></i>Yêu thích (3)</a>
          </li>
          <li>
            <a class="dropdown-item" href="comparison.html"><i class="ci-compare text-muted me-2"></i>So
              sánh (3)</a>
          </li>
          <li><a class="dropdown-item" href="{{ route('account.order-tracking') }}"><i class="ci-location text-muted me-2"></i>Theo dõi
              đơn hàng</a></li>
        </ul>
      </div>
      <div class="d-none d-md-block ms-3 text-nowrap">
        <a class="topbar-link d-none d-md-inline-block" href="{{ route('account.wishlist') }}"><i class="ci-heart mt-n1"></i>Yêu thích
          (3)</a>
        <a class="topbar-link ms-3 ps-3 border-start border-light d-none d-md-inline-block" href="comparison.html"><i
            class="ci-compare mt-n1"></i>So sánh (3)</a>
        <a class="topbar-link ms-3 border-start border-light ps-3 d-none d-md-inline-block"
          href="{{ route('account.order-tracking') }}"><i class="ci-location mt-n1"></i>Theo dõi đơn
          hàng</a>
      </div>
    </div>
  </div>
  <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
  <div class="navbar-sticky bg-light">
    <div class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand d-none d-sm-block me-3 flex-shrink-0" href="{{ route('clients.index') }}">
          <img src="{{ asset('frontend/img/logo/logo.png') }}" width="142" alt="Cartzilla">
        </a>
        <a class="navbar-brand d-sm-none me-2" href="index.html">
          <img src="{{ asset('frontend/img/logo/logo.png') }}" width="74" alt="Cartzilla">
        </a>
        <!-- Search-->
        <div class="input-group d-none d-lg-flex flex-nowrap mx-4"><i
            class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
          <input class="form-control rounded-start w-100" type="text" placeholder="Tìm kiếm sản phẩm">
          <select class="form-select flex-shrink-0" style="width: 10.5rem;">
            <option>Tất cả</option>
            <option>Computers</option>
            <option>...</option>
          </select>
        </div>
        <!-- Toolbar-->
        <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
          @if (Auth::user())
            </a><a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="{{ route('account.account-info') }}">
              <div class="navbar-tool-icon-box">
                @if (Auth::user()->avatar)
                  <img src="{{ URL::to(Auth::user()->avatar) }}" alt="" width="37px" />
                @else
                  <img src="{{ URL::to('backend/img/profiles/avt.png') }}" alt="" width="37px">
                @endif
              </div>
              <div class="navbar-tool-text ms-n3">{{ Auth::user()->name }}</div>
            </a>
          @else
            </a><a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="{{ route('login') }}">
              <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
              <div class="navbar-tool-text ms-n3"><small>Đăng nhập / Đăng ký</small>Tài khoản</div>
            </a>
          @endif
          <div class="navbar-tool dropdown ms-3 cart__dropdown">

          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <!-- Search-->
          <div class="input-group d-lg-none my-3"><i class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
            <input class="form-control rounded-start" type="text" placeholder="Tìm kiếm sản phẩm...">
          </div>
          <!-- Departments menu-->
          <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0" href="#" data-bs-toggle="dropdown"
                data-bs-auto-close="outside"><i class="ci-menu align-middle mt-n1 me-2"></i>Danh mục</a>
              <ul class="dropdown-menu">
                @foreach ($categories as $cate)
                  <li class="dropdown mega-dropdown">
                    <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">
                      <i class="ci-laptop opacity-60 fs-lg mt-n1 me-2"></i>
                      {{ $cate->category_name }}
                    </a>
                    <div class="dropdown-menu p-0">
                      <div class="d-flex flex-wrap flex-sm-nowrap px-2">
                        <div class="mega-dropdown-column pt-4 pb-0 py-sm-4 px-3">
                          <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Thương hiệu</h6>
                            <ul class="widget-list">
                              @foreach ($cate->brands as $brand)
                                <li class="widget-list-item pb-1">
                                  <a class="widget-list-link" href="#">{{ $brand->brand_name }}</a>
                                </li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                        <div class="mega-dropdown-column py-4 px-3">
                          <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Accessories</h6>
                            <ul class="widget-list">
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Monitors</a></li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Bags, Cases &amp;
                                  Sleeves</a></li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Batteries</a>
                              </li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Charges &amp;
                                  Adapters</a></li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Cooling Pads</a>
                              </li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Mounts</a></li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Replacement
                                  Screens</a></li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Security
                                  Locks</a></li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Stands</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2" href="#"><img
                              src="{{ asset('frontend/img/shop/departments/07.jpg') }}" alt="Computers &amp; Accessories"></a>
                          <div class="fs-sm mb-3">Starting from <span class='fw-medium'>$149.<small>80</small></span></div><a
                            class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i class="ci-arrow-right fs-xs ms-1"></i></a>
                        </div>
                      </div>
                    </div>
                  </li>
                @endforeach
                {{-- <li class="dropdown mega-dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                        <i class="ci-laptop opacity-60 fs-lg mt-n1 me-2"></i>
                                        Computers &amp; Accessories
                                    </a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-sm-nowrap px-2">
                                            <div class="mega-dropdown-column pt-4 pb-0 py-sm-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="fs-base mb-3">Computers</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Laptops &amp; Tablets</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Desktop Computers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Computer External Components</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Computer Internal Components</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Networking Products (NAS)</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Single Board Computers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Desktop Barebones</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="fs-base mb-3">Accessories</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Monitors</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Bags, Cases &amp; Sleeves</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Batteries</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Charges &amp; Adapters</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Cooling Pads</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Mounts</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Replacement Screens</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Security Locks</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                                href="#">Stands</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a
                                                    class="d-block mb-2" href="#"><img
                                                        src="{{ asset('frontend/img/shop/departments/07.jpg') }}"
                                alt="Computers &amp; Accessories"></a>
                                <div class="fs-sm mb-3">Starting from <span
                                        class='fw-medium'>$149.<small>80</small></span></div><a
                                    class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i
                                        class="ci-arrow-right fs-xs ms-1"></i></a>
                </div>
            </div>
        </div>
        </li>
        <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                data-bs-toggle="dropdown"><i class="ci-mobile opacity-60 fs-lg mt-n1 me-2"></i>Smartphones &amp;
                Tablets</a>
            <div class="dropdown-menu p-0">
                <div class="d-flex flex-wrap flex-md-nowrap px-2">
                    <div class="mega-dropdown-column pt-4 pb-0 py-sm-4 px-3">
                        <div class="widget widget-links mb-3">
                            <h6 class="fs-base mb-3">Smartphones</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Apple iPhone</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Android
                                        Smartphones</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Phablets</a></li>
                            </ul>
                        </div>
                        <div class="widget widget-links">
                            <h6 class="fs-base">Tablets</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Apple iPad</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Android
                                        Tablets</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Tablets with
                                        Keyboard</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column py-4 px-3">
                        <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Accessories</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Accessory
                                        Kits</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Batteries &amp;
                                        Battery Packs</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Cables</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Car
                                        Accessories</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Charges &amp;
                                        Power Adapters</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">FM
                                        Transmitters</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Lens
                                        Attachments</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Mounts &amp;
                                        Stands</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Repair Kits</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Replacement
                                        Parts</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Styluses</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2"
                            href="#"><img src="{{ asset('frontend/img/shop/departments/09.jpg') }}"
                                alt="Smartphones &amp; Tablets"></a>
                        <div class="fs-sm mb-3">Starting from <span class='fw-medium'>$127.<small>00</small></span>
                        </div><a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i
                                class="ci-arrow-right fs-xs ms-1"></i></a>
                    </div>
                </div>
            </div>
        </li>
        <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                data-bs-toggle="dropdown"><i class="ci-monitor opacity-60 fs-lg mt-n1 me-2"></i>TV, Video &amp;
                Audio</a>
            <div class="dropdown-menu p-0">
                <div class="d-flex flex-wrap flex-md-nowrap px-2">
                    <div class="mega-dropdown-column pt-4 pb-0 py-sm-4 px-3">
                        <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Television &amp; Video</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">TV Sets</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Home Theater
                                        Systems</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">DVD Players &amp;
                                        Recorders</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Blue-ray Players
                                        &amp; Recorders</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">HD DVD Players
                                        &amp; Recorders</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">DVD-VCR
                                        Combos</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">DTV
                                        Converters</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">AV Receivers</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">AV Amplifiers</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Projectors</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Projection
                                        Screens</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Satelite
                                        Television</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column pt-0 pb-4 py-sm-4 px-3">
                        <div class="widget widget-links">
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">TV-DTD Combos</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Sound Systems</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Home Cinema
                                        Systems</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Streaming Media
                                        Players</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">VCRs</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Video Glasses</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Lens
                                        Attachments</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2"
                            href="#"><img src="{{ asset('frontend/img/shop/departments/08.jpg') }}"
                                alt="TV, Video &amp; Audio"></a>
                        <div class="fs-sm mb-3">Starting from <span class='fw-medium'>$78.<small>00</small></span></div>
                        <a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i
                                class="ci-arrow-right fs-xs ms-1"></i></a>
                    </div>
                </div>
            </div>
        </li>
        <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                data-bs-toggle="dropdown"><i class="ci-camera opacity-60 fs-lg mt-n1 me-2"></i>Cameras, Photo &amp;
                Video</a>
            <div class="dropdown-menu p-0">
                <div class="d-flex flex-wrap flex-md-nowrap px-2">
                    <div class="mega-dropdown-column pt-4 pb-0 py-sm-4 px-3">
                        <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Cameras &amp; Lenses</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Point &amp; Shoot
                                        Digital Cameras</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">DSLR Cameras</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Mirrorless
                                        Cameras</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Body Mounted
                                        Cameras</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Camcorders</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Camcorder
                                        Lenses</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Camera Lenses</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Macro &amp;
                                        Ringlight Flashes</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Shoe Mount
                                        Flashes</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Tripods &amp;
                                        Monopods</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Video Studio</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column py-4 px-3">
                        <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Accessories</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Bags &amp;
                                        Cases</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Binoculars &amp;
                                        Scopes</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Batteries &amp;
                                        Chargers</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Cables &amp;
                                        Cords</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Camcorder
                                        Accessories</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Cleaning
                                        Equipment</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Protector
                                        Foils</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Filters &amp;
                                        Accessories</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Remote
                                        Controls</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Rain Covers</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Viewfinders</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2"
                            href="#"><img src="{{ asset('frontend/img/shop/departments/10.jpg') }}"
                                alt="Cameras, Photo &amp; Video"></a>
                        <div class="fs-sm mb-3">Starting from <span class='fw-medium'>$210.<small>00</small></span>
                        </div><a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i
                                class="ci-arrow-right fs-xs ms-1"></i></a>
                    </div>
                </div>
            </div>
        </li>
        <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                data-bs-toggle="dropdown"><i class="ci-earphones opacity-60 fs-lg mt-n1 me-2"></i>Headphones</a>
            <div class="dropdown-menu p-0">
                <div class="d-flex flex-wrap flex-md-nowrap px-2">
                    <div class="mega-dropdown-column pt-4 pb-0 py-sm-4 px-3">
                        <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Headphones</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Earbud
                                        Headphones</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Over-Ear
                                        Headphones</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">On-Ear
                                        Headphones</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Bluetooth
                                        Headphones</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Sports &amp;
                                        Fitness Headphones</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Noise-Cancelling
                                        Headphones</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column py-4 px-3">
                        <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Accessories</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Cases &amp;
                                        Sleeves</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Cables &amp;
                                        Cords</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Ear Pads</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Repair Kits</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Cleaning
                                        Equipment</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2"
                            href="#"><img src="{{ asset('frontend/img/shop/departments/11.jpg') }}"
                                alt="Headphones"></a>
                        <div class="fs-sm mb-3">Starting from <span class='fw-medium'>$35.<small>99</small></span></div>
                        <a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i
                                class="ci-arrow-right fs-xs ms-1"></i></a>
                    </div>
                </div>
            </div>
        </li>
        <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                data-bs-toggle="dropdown"><i class="ci-watch opacity-60 fs-lg mt-n1 me-2"></i>Wearable Electronics</a>
            <div class="dropdown-menu p-0">
                <div class="d-flex flex-wrap flex-md-nowrap px-2">
                    <div class="mega-dropdown-column py-4 px-3">
                        <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Gadgets</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Smartwatches</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Fitness
                                        Trackers</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Smart Glasses</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Rings</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Virtual
                                        Reality</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Clips, Arm &amp;
                                        Wristbands</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Accessories</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2"
                            href="#"><img src="{{ asset('frontend/img/shop/departments/12.jpg') }}"
                                alt="Wearable Electronics"></a>
                        <div class="fs-sm mb-3">Starting from <span class='fw-medium'>$79.<small>50</small></span></div>
                        <a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i
                                class="ci-arrow-right fs-xs ms-1"></i></a>
                    </div>
                </div>
            </div>
        </li>
        <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                data-bs-toggle="dropdown"><i class="ci-printer opacity-60 fs-lg mt-n1 me-2"></i>Printers &amp; Ink</a>
            <div class="dropdown-menu p-0">
                <div class="d-flex flex-wrap flex-md-nowrap px-2">
                    <div class="mega-dropdown-column pt-4 pb-0 py-sm-4 px-3">
                        <div class="widget widget-links mb-3">
                            <h6 class="fs-base mb-3">By type</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">All-in-One</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Copying</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Faxing</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Photo
                                        Printing</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Printing Only</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Scanning</a></li>
                            </ul>
                        </div>
                        <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Scanners</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Business Card
                                        Scanners</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Document
                                        Scanners</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Flatbed &amp;
                                        Photo Scanners</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Slide &amp;
                                        Negative Scanners</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column py-4 px-3">
                        <div class="widget widget-links">
                            <h6 class="fs-base">Printers</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Dot Matrix
                                        Printers</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Inkjet
                                        Printers</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Label
                                        Printers</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laser
                                        Printers</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Photo
                                        Printers</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Wide Format
                                        Printers</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Plotter
                                        Printers</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2"
                            href="#"><img src="{{ asset('frontend/img/shop/departments/13.jpg') }}"
                                alt="Printers &amp; Ink"></a>
                        <div class="fs-sm mb-3">Starting from <span class='fw-medium'>$54.<small>00</small></span></div>
                        <a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i
                                class="ci-arrow-right fs-xs ms-1"></i></a>
                    </div>
                </div>
            </div>
        </li>
        <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                data-bs-toggle="dropdown"><i class="ci-joystick opacity-60 fs-lg mt-n1 me-2"></i>Video Games</a>
            <div class="dropdown-menu p-0">
                <div class="d-flex flex-wrap flex-md-nowrap px-2">
                    <div class="mega-dropdown-column pt-4 pb-0 py-sm-4 px-3">
                        <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Games &amp; Hardware</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Video Games</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">PlayStation 4</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">PlayStation 3</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Xbox One</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Xbox 360</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Nintendo
                                        Switch</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Wii U</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Wii</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">PC</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Mac</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Nintendo 3DS
                                        &amp; 2DS</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Nintendo DS</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column pt-0 pb-4 py-sm-4 px-3">
                        <div class="widget widget-links">
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">PlayStation
                                        Vita</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Sony PSP</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Retro Gaming</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Microconsoles</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Accessories</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Digital Games</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2"
                            href="#"><img src="{{ asset('frontend/img/shop/departments/14.jpg') }}"
                                alt="Video Games"></a>
                        <div class="fs-sm mb-3">Starting from <span class='fw-medium'>$19.<small>00</small></span></div>
                        <a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i
                                class="ci-arrow-right fs-xs ms-1"></i></a>
                    </div>
                </div>
            </div>
        </li>
        <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                data-bs-toggle="dropdown"><i class="ci-speaker opacity-60 fs-lg mt-n1 me-2"></i>Speakers &amp; Home
                Music</a>
            <div class="dropdown-menu p-0">
                <div class="d-flex flex-wrap flex-md-nowrap px-2">
                    <div class="mega-dropdown-column pt-4 pb-0 py-sm-4 px-3">
                        <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Speakers</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Bluetooth
                                        Speakers</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Bookshelf
                                        Speakers</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Ceiling &amp;
                                        In-Wall Speakers</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Center-Channel
                                        Speakers</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Floorstanding
                                        Speakers</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Outdoor
                                        Speakers</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Satellite
                                        Speakers</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Sound Bars</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Subwoofers</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Surround Sound
                                        Systems</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column py-4 px-3">
                        <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Home Audio</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Home Theater</a>
                                </li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Wireless &amp;
                                        Streaming Audio</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Stereo System
                                        Components</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Compact Radios
                                        &amp; Stereos</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Home Audio
                                        Accessories</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2"
                            href="#"><img src="{{ asset('frontend/img/shop/departments/16.jpg') }}"
                                alt="Speakers &amp; Home Music"></a>
                        <div class="fs-sm mb-3">Starting from <span class='fw-medium'>$43.<small>00</small></span></div>
                        <a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i
                                class="ci-arrow-right fs-xs ms-1"></i></a>
                    </div>
                </div>
            </div>
        </li>
        <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                data-bs-toggle="dropdown"><i class="ci-server opacity-60 fs-lg mt-n1 me-2"></i>HDD/SSD Data Storage</a>
            <div class="dropdown-menu p-0">
                <div class="d-flex flex-wrap flex-md-nowrap px-2">
                    <div class="mega-dropdown-column py-4 px-3">
                        <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Data Storage</h6>
                            <ul class="widget-list">
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">External Hard
                                        Drives</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">External Solid
                                        State Drives</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">External Zip
                                        Drives</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Floppy &amp; Tape
                                        Drives</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Internal Hard
                                        Drives</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Internal Solid
                                        State Drives</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Network Attached
                                        Storage</a></li>
                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">USB Flash
                                        Drives</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2"
                            href="#"><img src="{{ asset('frontend/img/shop/departments/15.jpg') }}"
                                alt="HDD/SSD Data Storage"></a>
                        <div class="fs-sm mb-3">Starting from <span class='fw-medium'>$21.<small>60</small></span></div>
                        <a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i
                                class="ci-arrow-right fs-xs ms-1"></i></a>
                    </div>
                </div>
            </div>
        </li> --}}
              </ul>
            </li>
          </ul>
          <!-- Primary menu-->
          <ul class="navbar-nav">
            <li class="nav-item dropdown active">
              <a class="nav-link" href="{{ route('clients.index') }}"><i class="ci-home"></i> Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('clients.about') }}" data-bs-auto-close="outside"><i class="ci-flag"></i>
                Giới thiệu</a>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i
                  class="ci-lable"></i> Cửa hàng</a>
              <div class="dropdown-menu p-0">
                <div class="d-flex flex-wrap flex-sm-nowrap px-2">
                  <div class="mega-dropdown-column pt-1 pt-lg-4 pb-4 px-2 px-lg-3">
                    <div class="widget widget-links mb-4">
                      <h6 class="fs-base mb-3">Danh mục 1</h6>
                      <ul class="widget-list">
                        <li class="widget-list-item"><a class="widget-list-link" href="{{ route('shop.shop-grid') }}">Cửa hàng dạng
                            luới</a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link" href="{{ route('shop.shop-list') }}">Cửa hàng dạng
                            list</a>
                        </li>
                      </ul>
                    </div>
                    <div class="widget widget-links">
                      <h6 class="fs-base mb-3">Danh mục 2</h6>
                      <ul class="widget-list">
                        <li class="widget-list-item"><a class="widget-list-link" href="marketplace-category.html">Category Page</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="marketplace-single.html">Single Item Page</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="marketplace-vendor.html">Vendor Page</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="marketplace-cart.html">Cart</a></li>
                        <li class="widget-list-item"><a class="widget-list-link"
                            href="{{ route('checkout.checkout-details') }}">Checkout</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="mega-dropdown-column pt-1 pt-lg-4 pb-4 px-2 px-lg-3">
                    <div class="widget widget-links">
                      <h6 class="fs-base mb-3">Danh mục 3</h6>
                      <ul class="widget-list">
                        <li class="widget-list-item"><a class="widget-list-link" href="shop-categories.html">Shop Categories</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="shop-single-v1.html">Product Page v.1</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="shop-single-v2.html">Product Page v.2</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="shop-cart.html">Cart</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="checkout-details.html">Checkout - Details</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="checkout-shipping.html">Checkout - Shipping</a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link" href="checkout-payment.html">Checkout - Payment</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="checkout-review.html">Checkout - Review</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="checkout-complete.html">Checkout - Complete</a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link" href="order-tracking.html">Order Tracking</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="comparison.html">Product Comparison</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="mega-dropdown-column pt-1 pt-lg-4 pb-4 px-2 px-lg-3">
                    <div class="widget widget-links mb-4">
                      <h6 class="fs-base mb-3">Danh mục 4</h6>
                      <ul class="widget-list">
                        <li class="widget-list-item"><a class="widget-list-link" href="grocery-catalog.html">Product Catalog</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="grocery-single.html">Single Product Page</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="grocery-checkout.html">Checkout</a></li>
                      </ul>
                    </div>
                    <div class="widget widget-links">
                      <h6 class="fs-base mb-3">Danh mục 5</h6>
                      <ul class="widget-list">
                        <li class="widget-list-item"><a class="widget-list-link" href="food-delivery-category.html">Category Page</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="food-delivery-single.html">Single Item
                            (Restaurant)</a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link" href="food-delivery-cart.html">Cart (Your Order)</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="food-delivery-checkout.html">Checkout (Address
                            &amp;
                            Payment)</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                data-bs-auto-close="outside"><i class="ci-store"></i>
                Nhãn hiệu</a>
              <ul class="dropdown-menu">
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Shop User
                    Account</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="account-orders.html">Orders History</a>
                    </li>
                    <li><a class="dropdown-item" href="account-profile.html">Profile Settings</a>
                    </li>
                    <li><a class="dropdown-item" href="account-address.html">Account Addresses</a>
                    </li>
                    <li><a class="dropdown-item" href="account-payment.html">Payment Methods</a>
                    </li>
                    <li><a class="dropdown-item" href="account-wishlist.html">Wishlist</a></li>
                    <li><a class="dropdown-item" href="account-tickets.html">My Tickets</a></li>
                    <li><a class="dropdown-item" href="account-single-ticket.html">Single
                        Ticket</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Vendor
                    Dashboard</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="dashboard-settings.html">Settings</a></li>
                    <li><a class="dropdown-item" href="dashboard-purchases.html">Purchases</a>
                    </li>
                    <li><a class="dropdown-item" href="dashboard-favorites.html">Favorites</a>
                    </li>
                    <li><a class="dropdown-item" href="dashboard-sales.html">Sales</a></li>
                    <li><a class="dropdown-item" href="dashboard-products.html">Products</a></li>
                    <li><a class="dropdown-item" href="dashboard-add-new-product.html">Add New
                        Product</a></li>
                    <li><a class="dropdown-item" href="dashboard-payouts.html">Payouts</a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="account-signin.html">Sign In / Sign Up</a></li>
                <li><a class="dropdown-item" href="account-password-recovery.html">Password
                    Recovery</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('clients.blog') }}"><i class="ci-store"></i>
                Bài viết</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('clients.contact') }}" data-bs-auto-close="outside"><i
                  class="ci-phone"></i> Liên hệ và Phản hồi</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
