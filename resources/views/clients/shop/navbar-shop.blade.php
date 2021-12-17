<div class="offcanvas offcanvas-collapse bg-white w-100 rounded-3 shadow-lg py-1" id="shop-sidebar"
    style="max-width: 24rem">
    <div class="offcanvas-header align-items-center shadow-sm">
        <h2 class="h5 mb-0">Bộ lọc</h2>
        <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas" aria-label="Thoát"></button>
    </div>
    <div class="offcanvas-body py-grid-gutter px-lg-grid-gutter">
        <!-- Categories-->
        <div class="widget widget-categories mb-4 pb-4 border-bottom">
            <h3 class="widget-title">Danh mục</h3>
            <div class="accordion mt-n1" id="shop-categories">
                @foreach ($category as $key => $cate)
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <a class="accordion-button collapsed" href="#collapseSection-{{ $key }}"
                                role="button" data-bs-toggle="collapse" aria-expanded="false"
                                aria-controls="collapseExample">
                                {{ $cate->category_name }}
                            </a>
                        </h3>
                        <div class="accordion-collapse collapse" id="collapseSection-{{ $key }}">
                            <div class="accordion-body">
                                <div class="widget widget-links widget-filter">
                                    <div class="input-group input-group-sm mb-2">
                                        <input class="widget-filter-search form-control rounded-end" onkeyup="search_by_cate({{ $cate->id_cate }})" onfocusout="focusout({{ $cate->id_cate }})" id="category_search_{{ $cate->id_cate }}" type="text"
                                            placeholder="Tìm kiếm">
                                        <i
                                            class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>
                                    </div>
                                    <ul class="widget-list widget-filter-list pt-1" style="height: 12rem;"
                                        data-simplebar data-simplebar-auto-hide="false">
                                        <li class="widget-list-item widget-filter-item">
                                            <a class="widget-list-link d-flex justify-content-between align-items-center"
                                                href="#">
                                                <span class="widget-filter-item-text">View all</span>
                                                <span
                                                    class="fs-xs text-muted ms-3">{{ $product->where('product_id_category', $cate->id_cate)->count() }}</span>
                                            </a>
                                        </li>
                                        @foreach ($cate->brands as $brand)
                                            <li class="widget-list-item widget-filter-item">
                                                <a class="widget-list-link d-flex justify-content-between align-items-center"
                                                    href="#">
                                                    <span
                                                        class="widget-filter-item-text">{{ $brand->brand_name }}</span>
                                                    <span class="fs-xs text-muted ms-3">247</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Price range-->
        <div class="widget mb-4 pb-4">
            <h3 class="widget-title">Tìm theo giá: <span id="demo"></span></h3>
            <form action="{{ route('search.range') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="range" name="range" max="{{ $max }}" min="{{ $min }}" id="myRange"
                    value="{{ $min }}" step="1000" style="width: 100%;"><br>
                <span style="float: left;"><span>{{ number_format($min) }} ₫</span></span>
                <span style="float: right;"><span>{{ number_format($max) }} ₫</span></span><br>
                <button class="btn btn-primary" style="float: right; margin-top: 20px" type="submit">Tìm</button>
            </form>
        </div>
        <div class="border-bottom" style="margin-top: 60px"></div>
        <!-- Filter by Brand-->
        <form id="form-search-brand" action="#" onchange="searchBrand()">
            @csrf
            <div class="widget widget-filter mb-4 pb-4 pt-4 border-bottom">
                <h3 class="widget-title">Thương hiệu</h3>
                <div class="input-group input-group-sm mb-2">
                    <input class="form-control rounded-end pe-5" type="text" name="brand_key" placeholder="Search">
                </div>
                <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;" data-simplebar
                    data-simplebar-auto-hide="false">
                    @foreach ($brands as $key => $brand)
                        <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="brandbox[]" value="{{ $brand->id }}" class="brand-box">
                                <label class="form-check-label widget-filter-item-text"
                                    for="adidas">{{ $brand->brand_name }}</label>
                            </div>
                            <span class="fs-xs text-muted">{{ count($brand->products) }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </form>
    </div>
</div>
