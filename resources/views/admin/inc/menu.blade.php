<ul>
    <li class="">
        <a href="{{ url('admin') }}" style="font-size: 23px;"><i class="la la-dashboard" style="font-size: 25px;"></i> <span>Thống
                Kê</span></span></a>
    </li>
    <li class="menu-title">
        <span>Bài viết</span>
    </li>
    <li class="submenu">
        <a href="#"><i class="fa fa-shopping-cart"></i> <span> Danh mục</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('blogCate.index') }}">Danh sách</a></li>
            <li><a href="{{ route('blogCate.create') }}">Thêm danh mục</a></li>

        </ul>
    </li>
    <li class="submenu">
        <a href="#"><i class="fa fa-shopping-cart"></i> <span> Bài viết</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('blogs.index') }}"">Bài viết</a></li>
            <li><a href="{{ route('blogs.create') }}">Thêm bài viết</a></li>

        </ul>
    </li>
    <li class="menu-title">
        <span>Sản phẩm</span>
    </li>
    <li class="submenu">
        <a href="#"><i class="fa fa-shopping-cart"></i> <span> Sản phẩm</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('products.create') }}">Thêm sản phẩm</a></li>
            <li><a href="{{ route('products.index') }}">Danh sách sản phẩm</a></li>
            <li><a href="{{ route('brand.index') }}">Thương hiệu</a></li>
            <li><a href="{{ route('categories.index') }}">Loại sản phẩm</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="#"><i class="fa fa-user-circle"></i> <span> Khách hàng</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            {{-- <li><a href="{{ route('products.create') }}">Thêm sản phẩm</a></li>
									<li><a href="{{ route('products.index') }}">Danh sách sản phẩm</a></li>
									<li><a href="{{ route('brand.index') }}">Thương hiệu</a></li>
									<li><a href="{{ route('categories.index') }}">Loại sản phẩm</a></li> --}}
        </ul>
    </li>
    <li>
        <a href="{{ route('filemanager') }}"> <i class="fa fa-folder"></i> <span>Quản lý
                file</span></a>
    </li>

</ul>
