<ul>
  <li class="menu-title">
    <span>Main</span>
  </li>
  <li class="">
    <a href="{{ url('admin') }}"><i class="la la-dashboard"></i> <span>Trang thống
        kê</span></span></a>
  </li>
  <li class="menu-title">
    <span>Sản phẩm</span>
  </li>
  <li class="submenu">
    <a href="#"><i class="fa fa-shopping-cart"></i> <span> Sản phẩm</span> <span
            class="menu-arrow"></span></a>
    <ul style="display: none;">
      <li><a href="{{ route('products.create') }}">Thêm sản phẩm</a></li>
      <li><a href="{{ route('products.index') }}">Danh sách sản phẩm</a></li>
      <li><a href="{{ route('brand.index') }}">Thương hiệu</a></li>
      <li><a href="{{ route('categories.index') }}">Loại sản phẩm</a></li>
    </ul>
  </li>
  <li class="submenu">
    <a href="#"><i class="fa fa-user-circle"></i> <span> Khách hàng</span> <span
            class="menu-arrow"></span></a>
    <ul style="display: none;">
    </ul>
  </li>
  <li>
    <a href="{{ route('filemanager') }}"> <i class="fa fa-folder"></i> <span>Quản lý
        file</span></a>
  </li>
  <li><a href=""><i class="fa fa-money"></i> <span>Seller</span></a></li>

</ul>