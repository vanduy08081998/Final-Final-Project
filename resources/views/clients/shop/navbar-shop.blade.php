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
                                        <input class="widget-filter-search form-control rounded-end" type="text"
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
        <div class="widget widget-filter mb-4 pb-4 pt-4 border-bottom">
            <h3 class="widget-title">Thương hiệu</h3>
            <div class="input-group input-group-sm mb-2">
                <input class="widget-filter-search form-control rounded-end pe-5" type="text" placeholder="Search"><i
                    class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>
            </div>
            <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;" data-simplebar
                data-simplebar-auto-hide="false">
                @foreach ($brands as $brand)
                    <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="adidas">
                            <label class="form-check-label widget-filter-item-text"
                                for="adidas">{{ $brand->brand_name }}</label>
                        </div>
                        <span class="fs-xs text-muted">123</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Filter by Size-->
        <div class="widget widget-filter mb-4 pb-4 border-bottom">
            <h3 class="widget-title">Size</h3>
            <div class="input-group input-group-sm mb-2">
                <input class="widget-filter-search form-control rounded-end pe-5" type="text" placeholder="Search"><i
                    class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>
            </div>
            <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;" data-simplebar
                data-simplebar-auto-hide="false">
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-xs">
                        <label class="form-check-label widget-filter-item-text" for="size-xs">XS</label>
                    </div><span class="fs-xs text-muted">34</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-s">
                        <label class="form-check-label widget-filter-item-text" for="size-s">S</label>
                    </div><span class="fs-xs text-muted">57</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-m">
                        <label class="form-check-label widget-filter-item-text" for="size-m">M</label>
                    </div><span class="fs-xs text-muted">198</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-l">
                        <label class="form-check-label widget-filter-item-text" for="size-l">L</label>
                    </div><span class="fs-xs text-muted">72</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-xl">
                        <label class="form-check-label widget-filter-item-text" for="size-xl">XL</label>
                    </div><span class="fs-xs text-muted">46</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-39">
                        <label class="form-check-label widget-filter-item-text" for="size-39">39</label>
                    </div><span class="fs-xs text-muted">112</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-40">
                        <label class="form-check-label widget-filter-item-text" for="size-40">40</label>
                    </div><span class="fs-xs text-muted">85</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-41">
                        <label class="form-check-label widget-filter-item-text" for="size-40">41</label>
                    </div><span class="fs-xs text-muted">210</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-42">
                        <label class="form-check-label widget-filter-item-text" for="size-42">42</label>
                    </div><span class="fs-xs text-muted">57</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-43">
                        <label class="form-check-label widget-filter-item-text" for="size-43">43</label>
                    </div><span class="fs-xs text-muted">30</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-44">
                        <label class="form-check-label widget-filter-item-text" for="size-44">44</label>
                    </div><span class="fs-xs text-muted">61</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-45">
                        <label class="form-check-label widget-filter-item-text" for="size-45">45</label>
                    </div><span class="fs-xs text-muted">23</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-46">
                        <label class="form-check-label widget-filter-item-text" for="size-46">46</label>
                    </div><span class="fs-xs text-muted">19</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-47">
                        <label class="form-check-label widget-filter-item-text" for="size-47">47</label>
                    </div><span class="fs-xs text-muted">15</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-48">
                        <label class="form-check-label widget-filter-item-text" for="size-48">48</label>
                    </div><span class="fs-xs text-muted">12</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-49">
                        <label class="form-check-label widget-filter-item-text" for="size-49">49</label>
                    </div><span class="fs-xs text-muted">8</span>
                </li>
                <li class="widget-filter-item d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-50">
                        <label class="form-check-label widget-filter-item-text" for="size-50">50</label>
                    </div><span class="fs-xs text-muted">6</span>
                </li>
            </ul>
        </div>
        <!-- Filter by Color-->
        <div class="widget">
            <h3 class="widget-title">Color</h3>
            <div class="d-flex flex-wrap">
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                    <input class="form-check-input" type="checkbox" id="color-blue-gray">
                    <label class="form-option-label rounded-circle" for="color-blue-gray"><span
                            class="form-option-color rounded-circle" style="background-color: #b3c8db;"></span></label>
                    <label class="d-block fs-xs text-muted mt-n1" for="color-blue-gray">Blue-gray</label>
                </div>
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                    <input class="form-check-input" type="checkbox" id="color-burgundy">
                    <label class="form-option-label rounded-circle" for="color-burgundy"><span
                            class="form-option-color rounded-circle" style="background-color: #ca7295;"></span></label>
                    <label class="d-block fs-xs text-muted mt-n1" for="color-burgundy">Burgundy</label>
                </div>
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                    <input class="form-check-input" type="checkbox" id="color-teal">
                    <label class="form-option-label rounded-circle" for="color-teal"><span
                            class="form-option-color rounded-circle" style="background-color: #91c2c3;"></span></label>
                    <label class="d-block fs-xs text-muted mt-n1" for="color-teal">Teal</label>
                </div>
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                    <input class="form-check-input" type="checkbox" id="color-brown">
                    <label class="form-option-label rounded-circle" for="color-brown"><span
                            class="form-option-color rounded-circle" style="background-color: #9a8480;"></span></label>
                    <label class="d-block fs-xs text-muted mt-n1" for="color-brown">Brown</label>
                </div>
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                    <input class="form-check-input" type="checkbox" id="color-coral-red">
                    <label class="form-option-label rounded-circle" for="color-coral-red"><span
                            class="form-option-color rounded-circle" style="background-color: #ff7072;"></span></label>
                    <label class="d-block fs-xs text-muted mt-n1" for="color-coral-red">Coral red</label>
                </div>
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                    <input class="form-check-input" type="checkbox" id="color-navy">
                    <label class="form-option-label rounded-circle" for="color-navy"><span
                            class="form-option-color rounded-circle" style="background-color: #696dc8;"></span></label>
                    <label class="d-block fs-xs text-muted mt-n1" for="color-navy">Navy</label>
                </div>
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                    <input class="form-check-input" type="checkbox" id="color-charcoal">
                    <label class="form-option-label rounded-circle" for="color-charcoal"><span
                            class="form-option-color rounded-circle" style="background-color: #4e4d4d;"></span></label>
                    <label class="d-block fs-xs text-muted mt-n1" for="color-charcoal">Charcoal</label>
                </div>
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                    <input class="form-check-input" type="checkbox" id="color-sky-blue">
                    <label class="form-option-label rounded-circle" for="color-sky-blue"><span
                            class="form-option-color rounded-circle" style="background-color: #8bcdf5;"></span></label>
                    <label class="d-block fs-xs text-muted mt-n1" for="color-sky-blue">Sky blue</label>
                </div>
            </div>
        </div>
    </div>
</div>
