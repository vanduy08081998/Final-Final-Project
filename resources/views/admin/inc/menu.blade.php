<ul>
    @impersonate
    <li class="">
        <a href="{{ route('impersonate_destroy') }}"><i class="bi bi-stop-circle text-danger"></i> <span
                class="text-danger">Thoát đăng
                nhập</span> </a>
    </li>
    @endimpersonate
    <li class="">
        <a href="{{ url('admin') }}" style="font-size: 23px;"><i class="la la-dashboard" style="font-size: 25px;"></i>
            <span>Thống
                Kê</span></span></a>
    </li>

    @role('admin')
        <li class="menu-title">
            <span>Nhân viên</span>
        </li>
        <li class="submenu">
            <a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i> <span>Chức vụ</span> <span
                    class="menu-arrow"></span></a>
            <ul style="display: none;">
                <li><a href="{{ route('list-role') }}">Vai trò</a></li>

            </ul>
        </li>
        <li class="submenu">
            <a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>Nhân viên</span> <span
                    class="menu-arrow"></span></a>
            <ul style="display: none;">
                <li><a href="{{ route('users.index') }}">Danh sách</a></li>
                <li><a href="{{ route('users.create') }}">Thêm nhân viên</a></li>
            </ul>
        </li>
    @endrole
    <li class="menu-title">
        <span>Bài viết</span>
    </li>
    <li class="submenu">
        <a href="#"
            class="{{ request()->is('admin/blogCate') || request()->is('admin/blogCate/*') ? 'active' : '' }}">
            <i class="fa fa-bookmark" aria-hidden="true"></i>
            <span> Thể loại</span>
            <span class="menu-arrow"></span>
        </a>
        <ul style="display: none;">
            <li><a href="{{ route('blogCate.index') }}">Danh sách</a></li>
            <li><a href="{{ route('blogCate.create') }}">Thêm danh mục</a></li>

        </ul>
    </li>
    <li class="submenu">
        <a href="#" class="{{ request()->is('admin/blogs') || request()->is('admin/blogs/*') ? 'active' : '' }}"><i
                class="fa fa-newspaper-o" aria-hidden="true"></i> <span> Bài viết</span> <span
                class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('blogs.index') }}">Bài viết</a></li>
            <li><a href=" {{ route('blogs.create') }}">Viết bài</a></li>

        </ul>
    </li>
    <li class="menu-title">
        <span>Sản phẩm</span>
    </li>
    <li class="submenu">
        <a href="#"
            class="{{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}"><i
                class="fa fa-list-ul" aria-hidden="true"></i> <span>Danh mục</span> <span
                class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('categories.index') }}">Danh sách</a></li>
            <li><a href="{{ route('categories.create') }}">Thêm mới</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="#"><i class="fa fa-ioxhost" aria-hidden="true"></i> <span>Thương hiệu</span> <span
                class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('brand.index') }}">Danh sách</a></li>
            <li><a href="{{ route('brand.create') }}">Thêm mới</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="#"
            class="{{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}"><i
                class="fa fa-dropbox" aria-hidden="true"></i> <span> Sản phẩm</span> <span
                class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('products.index') }}">Danh sách</a></li>
            <li><a href="{{ route('products.create') }}">Thêm sản phẩm</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="#"><i class="fas fa-clipboard-list"></i> <span> Thuộc tính</span> <span
                class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('attribute.index') }}">Danh sách</a></li>
        </ul>
    </li>

    <li class="submenu">
        <a href="#"><i class="fa fa-university" aria-hidden="true"></i> <span>Tồn kho</span> <span
                class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="#">Danh sách</a></li>
        </ul>
    </li>
    <li class="menu-title">
        <span>Chiến lược</span>
    </li>
    <li class="submenu">
        <a href="#"
            class="{{ request()->is('admin/banners') || request()->is('admin/banners/*') ? 'active' : '' }}"><i
                class="fa fa-object-ungroup" aria-hidden="true"></i> <span> Slide</span> <span
                class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('banners.index') }}">Danh sách</a></li>
            <li><a href="{{ route('banners.create') }}">Thêm slide</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="#"
            class="{{ request()->is('admin/discount') || request()->is('admin/discount/*') ? 'active' : '' }}"><i
                class="fa fa-tags" aria-hidden="true"></i> <span> Phiếu giảm giá</span> <span
                class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('discount.index') }}">Danh sách</a></li>
            <li><a href="{{ route('discount.create') }}">Thêm phiếu</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="#"
            class="{{ request()->is('admin/flash-deals') || request()->is('admin/flash-deals/*') ? 'active' : '' }}"><i
                class="fas fa-bookmark"></i> <span> Flash Sale</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('flash-deals.index') }}">Danh sách</a></li>
        </ul>
    </li>
    <li class="menu-title">
        <span>Khách hàng</span>
    </li>
    <li class="submenu">
        <a href="#" class="{{ request()->is('admin/list_customer') ? 'active' : '' }}"><i class="fa fa-users"
                aria-hidden="true"></i> <span> Khách hàng</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('list_customer') }}">Danh sách</a></li>
        </ul>
    </li>
    <li class="menu-title">
        <span>Hóa đơn</span>
    </li>
    <li class="submenu">
        <a href="#" class="{{ request()->is('admin/orders') ? 'active' : '' }}"><i class="fa fa-shopping-cart"></i>
            <span>Hóa đơn</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('orders.index') }}">Danh sách</a></li>
        </ul>
    </li>
    <li class="menu-title">
        <span>Đánh giá & Bình luận</span>
    </li>
    <li class="submenu">
        <a href="#"
            class="{{ request()->is('admin/review-admin') || request()->is('admin/review-admin/*') ? 'active' : '' }}"><i
                class="fa fa-star-half-o" aria-hidden="true"></i> <span>Đánh giá</span> <span
                class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('review-admin.index') }}">Danh sách</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="#"
            class="{{ request()->is('admin/comment') || request()->is('admin/comment/*') ? 'active' : '' }}"><i
                class="fa fa-commenting" aria-hidden="true"></i> <span>Bình luận</span> <span
                class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('comment.index') }}">Danh sách</a></li>
        </ul>
    </li>
    <li class="menu-title">
        <span>Quản lý file</span>
    </li>
    <li>
        <a href="{{ route('filemanager') }}"> <i class="fa fa-folder"></i> <span>Quản lý
                file</span></a>
    </li>
    <li class="menu-title">
        <span>Website</span>
    </li>
    <li>
        <a href="#"
            class="{{ request()->is('admin/informations') || request()->is('admin/informations/*') ? 'active' : '' }}"><i
                class="fa fa-file-text" aria-hidden="true"></i> <span>Thông tin</span><span
                class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('informations.index') }}">Danh sách</a></li>
            <li><a href="{{ route('informations.create') }}">Thêm địa chỉ</a></li>
        </ul>
    </li>
</ul>
