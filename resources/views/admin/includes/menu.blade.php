<ul class="metismenu" id="menu">
    <li>
        <a href="{{ url('admin') }}" class="" style=" font-size: 22px; font-weight: 700;">
            <div class="parent-icon icon-color-1"><i class="bx bx-bar-chart-alt-2"></i>
            </div>
            <div class="menu-title">Thống kê</div>
        </a>
    </li>

    <li>

        <a href="{{ route('categories.index') }}">


            <a class="has-arrow" href="#">
                <div class="parent-icon icon-color-2"><i class="bx bx-grid"></i>
                </div>
                <div class="menu-title"> Danh mục</div>
            </a>
            <ul>
                <li> <a href="{{ route('categories.index') }}"> Danh sách</a>
                </li>
                <li> <a href="{{ route('categories.create') }}"> Thêm mới</a>

                </li>
            </ul>
    </li>

    <li>
        <a class="has-arrow" href="#">
            <div class="parent-icon icon-color-2"><i class="bx bx-copy-alt"></i>
            </div>
            <div class="menu-title">Thương hiệu</div>
        </a>
        <ul>
            <li> <a href="{{ route('brand.index') }}"> Danh sách</a>
            </li>
            <li> <a href="{{ route('brand.create') }}"> Thêm mới</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="#">
            <div class="parent-icon icon-color-2"><i class="bx bx-copy-alt"></i>
            </div>
            <div class="menu-title">Sản phẩm</div>
        </a>
        <ul>
            <li> <a href="{{ route('products.index') }}"> Danh sách</a>
            </li>
            <li> <a href="{{ route('products.create') }}"> Thêm mới</a>
            </li>
        </ul>
    </li>
</ul>
