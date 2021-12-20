@extends('layouts.client_master')


@section('title', 'Danh sách sản phẩm')


@section('content')
    <?php
    use App\Models\Wishlist;
    ?>
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2 pb-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i
                                    class="ci-home"></i>Trang chủ</a></li>
                        @if ($id_cate == 0)
                            <li class="breadcrumb-item text-nowrap"><a href="#">Cửa hàng của tôi</a>
                            @else
                            <li class="breadcrumb-item text-nowrap"><a
                                    href="#">{{ \App\Models\Category::where('id_cate', $id_cate)->first()->category_name }}</a>
                        @endif
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 text-center">
                @if ($id_cate == 0)
                    <h1 class="h5 text-light mb-0">
                        Cửa hàng của tôi</h1>
                @else
                    <h1 class="h5 text-light mb-0">
                        {{ \App\Models\Category::where('id_cate', $id_cate)->first()->category_name }}</h1>
                @endif

            </div>
        </div>
    </div>
    <div class="container-fluid pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- Sidebar-->
            <aside class="col-lg-3">
                <!-- Sidebar-->
                @include('clients.shop.navbar-shop');
            </aside>
            <!-- Content  -->
            <section class="col-lg-9 tab-content-shop" style="padding-right: 50px;">
                <!-- Toolbar-->
                <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
                    <div class="d-flex flex-wrap">
                        <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">
                            <label class="text-light opacity-75 text-nowrap fs-sm me-2 d-none d-sm-block" for="sorting">Sắp
                                xếp theo:</label>
                            <select class="form-select" name="shorting" onchange="shorting()" id="sorting">
                                <option value="all">Tất cả</option>
                                <option value="unit_price" data-short="ASC">Giá tăng dần</option>
                                <option value="unit_price" data-short="DESC">Giá giảm dần</option>
                                <option value="product_name" data-short="ASC">Từ A - Z</option>
                                <option value="product_name" data-short="DESC">Từ Z - A</option>
                            </select><span class="fs-sm text-light opacity-75 text-nowrap ms-2 d-none d-md-block">của
                                {{ count($product) }}
                                sản phẩm</span>
                        </div>
                    </div>
                    {{-- <div class="d-none d-sm-flex pb-3"><a
                            class="btn btn-icon nav-link-style bg-light text-dark disabled opacity-100 me-2"
                            href="{{ route('shop.shop-grid',['id', $id_cate]) }}"><i class="ci-view-grid"></i></a><a
                            class="btn btn-icon nav-link-style nav-link-light" href="{{ route('shop.shop-list') }}"><i
                                class="ci-view-list"></i></a>
                    </div> --}}
                </div>
                <!-- Products grid-->
                <div class="row mx-n2" id="product-short">
                    <!-- Product-->

                    @foreach ($product as $pro)
                        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                            <div class="card product-card">
                                @if (Auth::user() != null)
                                    <input type="hidden" id="wishlist_productsku{{ $pro->id }}"
                                        value="{{ $pro->specifications }}">
                                    <input type="hidden" value="{{ $pro->id }}">
                                    <input type="hidden" id="wishlist_productname{{ $pro->id }}"
                                        value="{{ $pro->product_name }}">
                                    <input type="hidden" id="wishlist_productprice{{ $pro->id }}"
                                        value="{{ number_format($pro->unit_price) }}">
                                    <input type="hidden" id="wishlist_productimg{{ $pro->id }}"
                                        value="{{ url($pro->product_image) }}">

                                    <a type="hidden" id="wishlist_producturl{{ $pro->id }}"
                                        href="{{ route('shop.product-details', $pro->product_slug) }}">
                                    </a>
                                    <div style="display: inline; padding: 10px">
                                        <a class="btn-action nav-link-style me-2" style="cursor:pointer;text-align: center;"
                                            onclick="add_compare({{ $pro->id }})">
                                            <i class="ci-compare me-1"></i>So sánh
                                        </a>
                                        <?php
                                        $user = Auth::user()->id;
                                        $wishlist = Wishlist::orderByDESC('id')
                                            ->where('id_prod', $pro->id)
                                            ->where('id_user', $user)
                                            ->first();
                                        ?>
                                        @if ($wishlist != null)
                                            <button
                                                class="btn-wishlist_{{ $pro->id }} btn-sm float-end text-danger type="
                                                button" data-bs-toggle="tooltip" data-bs-placement="left"
                                                title="Xóa khỏi yêu thích" onclick="add_to_wishlist({{ $pro->id }})">
                                                <i class="ci-heart"></i>
                                            </button>
                                        @elseif ($wishlist == NULL)
                                            <button class="btn-wishlist_{{ $pro->id }} btn-sm float-end text-muted"
                                                type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                                                title="Thêm vào yêu thích" onclick="add_to_wishlist({{ $pro->id }})">
                                                <i class="ci-heart"></i>
                                            </button>
                                        @endif
                                    </div>

                                @else
                                @endif
                                <a class="card-img-top d-block overflow-hidden"
                                    href="{{ route('shop.product-details', $pro->product_slug) }}">
                                    <img srcset="{{ URL::to($pro->product_image) }} 2x" alt="Product" width="200px"
                                        style="margin: auto; display: block">
                                </a>
                                <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1 category-name"
                                        href="#">{{ $pro->Category->category_name }}</a>
                                    <h3 class="product-title fs-sm"><a
                                            href="shop-single-v1.html">{{ Str::limit($pro->product_name, 30, '...') }}</a>
                                    </h3>
                                    <div class="d-flex justify-content-between">
                                        <div class="product-price"><span
                                                class="text-accent">{{ number_format($pro->unit_price) }} ₫</span>
                                        </div>
                                        <div class="star-rating">
                                            <i class="star-rating-icon ci-star-filled active"></i>
                                            <i class="star-rating-icon ci-star-filled active"></i>
                                            <i class="star-rating-icon ci-star-filled active"></i>
                                            <i class="star-rating-icon ci-star-filled active"></i>
                                            <i class="star-rating-icon ci-star"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body card-body-hidden">
                                    <div class="text-center">
                                        <a class="nav-link-style fs-ms"
                                            data-bs-target="#modal-quickview-{{ $pro->id }}" data-bs-toggle="modal">
                                            <i class="ci-eye align-middle me-1"></i>Xem nhanh
                                        </a>
                                    </div>
                                </div>
                                <!-- Quick View Modal-->
                            </div>
                        </div>
                        <hr class="d-sm-none">
                        @include('clients.Inc.quickview',['id' => $pro->id])
                    @endforeach
                </div>
                @include('clients.Inc.compare')
                <!-- Pagination-->
                <nav class="d-flex justify-content-center pt-2" aria-label="Page navigation">
                    {{ $product->links() }}
                </nav>
            </section>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function shorting() {
            var value = $('select[name="shorting"] option:selected').val()
            var orderby = $('select[name="shorting"] option:selected').attr('data-short')
            let _token = $('meta[name="csrf-token"]').attr('content')
            let id_cate = @php echo $id_cate @endphp;
            $.ajax({
                type: "POST",
                url: "{{ route('clients.products.short') }}",
                data: {
                    value: value,
                    orderby: orderby,
                    id_cate: id_cate,
                    _token: _token
                },
                success: function(response) {
                    $('#product-short').html(response)
                }

            })
        }

        function search_by_cate(id) {
            let _token = $('meta[name="csrf-token"]').attr('content')
            let id_cate = @php echo $id_cate @endphp;
            let key = $(`#category_search_${id}`).val()
            $.ajax({
                type: "POST",
                url: "{{ route('clients.products.searchbycate') }}",
                data: {
                    id: id,
                    id_cate: id_cate,
                    key: key,
                    _token: _token
                },
                success: function(response) {
                    $('#product-short').html(response)
                }

            })
        }

        function focusout(id) {
            let _token = $('meta[name="csrf-token"]').attr('content')
            let id_cate = @php echo $id_cate @endphp;
            let key = $(`#category_search_${id}`).val()
            $.ajax({
                type: "POST",
                url: "{{ route('clients.products.searchbycate') }}",
                data: {
                    id: id,
                    id_cate: id_cate,
                    key: '',
                    _token: _token
                },
                success: function(response) {
                    $('#product-short').html(response)
                }

            })
        }

        function searchBrand() {

            $.ajax({
                type: "POST",
                url: "{{ route('clients.products.searchbybrand') }}",
                data: $('#form-search-brand').serializeArray(),
                success: function(response) {
                    console.log(response)
                }
            });


        }

        function delete_compare(id) {
            if (localStorage.getItem('compare') != null) {
                var data = JSON.parse(localStorage.getItem('compare'));
                var index = data.filter(item => item.id != id);
                localStorage.setItem('compare', JSON.stringify(index));
                document.getElementById("row_compare" + id).remove();
            }
        }

        function add_compare(product_id) {
            $('#title-compare').innerText = 'Chỉ cho phép so sánh 3 sản phẩm';
            var id = product_id;
            var name = document.getElementById('wishlist_productname' + id).value;
            var content = document.getElementById('wishlist_productsku' + id).value;
            //  var value = document.getElementById('wishlist_skuvalue'+id).value;
            var price = document.getElementById('wishlist_productprice' + id).value;
            var img = document.getElementById('wishlist_productimg' + id).value;
            var url = document.getElementById('wishlist_producturl' + id).href;
            var newItem = {
                'url': url,
                'id': id,
                'name': name,
                'price': price,
                'img': img,
                'content': content
            }
            if (localStorage.getItem('compare') == null) {
                localStorage.setItem('compare', '[]');
            }
            var old_data = JSON.parse(localStorage.getItem('compare'));
            var matches = $.grep(old_data, function(obj) {
                return obj.id == id;
            })

            if (matches.length) {
                toastr.error('Sản phẩm đã có trong so sánh', 'Xin mời chọn sản phẩm khác')
                //   alert('Sản phẩm đã có trong so sánh');
                localStorage.setItem('compare', JSON.stringify(old_data));
                // $('#sosanh').modal('show');
            } else {
                if (old_data.length <= 2) {
                    old_data.push(newItem);
                    var html = '';
                    let list_compare = '';

                    html += `<div class="col-sm-4" id="row_compare` + newItem.id + `">
                       <span><img width="200px" style="padding: 10px;" src="` + newItem.img + `"></span>
                       <div style="padding: 10px;">
                           <span><a href="` + newItem.url + `" style="color:black;">` + newItem.name + `</a></span>
                           <p> <b style="text-align:center">` + newItem.price + `VNĐ</b> </p>
                           <a href="` + newItem.url +
                        `" style="color:green;cursor:pointer";position: absolute;top: 3px;right: 60px; class="deleteProduct" >Xem chi tiết</a> &nbsp;|&nbsp;
                           <a style="cursor:pointer";position: absolute;top: 3px;right: 60px; class="deleteProduct" onclick="delete_compare(` +
                        id + `)">Xóa so sánh</a>
                       </div>
                       <strong style="background-color: #f1f1f1;text-transform: uppercase;padding: 8px;display: block;"> Thông số kỹ thuật</strong>
                       <div>
                       <ul class="compare-list-attribute-${newItem.id}">

                       </ul>
                       </div>
                   </div>`
                    //foreach item conten ra gắn vào list_compare
                    $.each(JSON.parse(newItem.content), function(index, value) {
                        list_compare += `<li>${value.specifications}: ${value.value}</li>`
                    })
                    $('#row_compare').find('.anh').append(html);
                    //gắn list compare vào html
                    $(`.compare-list-attribute-${newItem.id}`).html(list_compare)
                    $('#sosanh').modal('show');
                } else {
                    toastr.error("Chỉ có thể so sánh tối đa 3 sản phẩm", 'Rất tiếc');
                }
                localStorage.setItem('compare', JSON.stringify(old_data));

            }
        }
        $(".js-range-slider").ionRangeSlider({
            type: "double",
            min: @php echo $min @endphp,
            max: @php echo $max @endphp,
            from: 200,
            to: 500,
            grid: true
        });
        $('#search-by-price').on('change', function(event) {
            event.preventDefault()
            $.ajax({
                type: "POST",
                url: "{{ route('search.range') }}",
                data: $(this).serializeArray(),
                success: function(response) {
                    $('#product-short').html(response)
                }
            });
        })
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush
