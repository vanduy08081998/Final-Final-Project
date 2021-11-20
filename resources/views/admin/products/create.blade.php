@extends('admin.layouts.master')

@section('title', 'Thêm sản phẩm')


@section('content')


<div class="content container-fluid">
  <div class="row">

    <style>
      .text-danger {
        font-style: italic;
      }

    </style>

    <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">

      <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data"
            id="choice-form">
        @csrf
        @method('POST')

        <div class="row">
          <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-8">
            <div class="row">

              <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                <div class="card">
                  <div class="card-header">Thông tin cơ bản</div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nhập tên sản phẩm</label>
                      <input class="form-control" name="product_name" onchange="update_sku()"
                             type="text" onkeyup="ChangeToSlug();" id="slug"
                             placeholder="Enter your name product">
                    </div>

                    @error('product_name')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror

                    <div class="form-group">
                      <label>Slug sản phẩm</label>
                      <input class="form-control" name="product_slug" type="text" id="convert_slug"
                             placeholder="Enter your name product">
                    </div>

                    @error('product_slug')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror

                    <div class="form-group">
                      <label for="name">Tiêu đề (SEO)</label>
                      <input class="form-control" name="meta_title" type="text" value=""
                             placeholder="Enter your meta title">
                    </div>

                    @error('meta_title')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror

                    <div class="form-group">
                      <label for="">Từ khóa (SEO)</label><br>
                      <input type="text" data-role="tagsinput" class="form-control"
                             name="meta_keywords" value="" placeholder="Enter your meta keywords">
                    </div>

                    @error('meta_keywords')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror

                    <div class="form-group">
                      <label for="name">Mô tả (SEO)</label>
                      <textarea class="form-control" name="meta_description" id="meta_desc"
                                type="text" placeholder="Enter your meta description" cols="30"
                                rows="10"></textarea>
                    </div>

                    @error('meta_description')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                  </div>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                <div class="card">
                  <div class="card-header">Hình ảnh sản phẩm</div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">Hình ảnh sản phẩm (1 hình 300 x 300)</label>
                      <div class="file-options">
												<a class="btn-file iframe-btn" href="{{ asset('rfm/filemanager') }}/dialog.php?field_id=image" style="color: #1e272e; font-size: 24px;"><input class="upload"><i class="fa fa-upload"></i></span></a>
											</div>
                      <input type="hidden" id="image" data-upload="product_image" data-preview="image__preview">
                      <input type="hidden" name="product_image">
                      <div id="image__preview"></div>
                    </div>
                    <div class="form-group">
                      <label for="">Thư viện ảnh sản phẩm (200 x 200 - Hơn 1 hình)</label>
                      <div class="file-options">
												<a class="btn-file iframe-btn" href="{{ asset('rfm/filemanager') }}/dialog.php?field_id=gallery" style="color: #1e272e; font-size: 24px;"><input class="upload"><i class="fa fa-upload"></i></span></a>
											</div>
                      <input type="hidden" id="gallery" data-upload="product_gallery" data-preview="gallery__preview">
                      <input type="hidden" name="product_gallery">
                      <div id="gallery__preview"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                <div class="card">
                  <div class="card-header">Mô tả sản phẩm</div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Mô tả ngắn</label>
                      <textarea name="short_description" id="short_description" cols="30" rows="10"></textarea>
                      @error('short_description')
                      <div class="text-danger text-italic">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Mô tả dài</label>
                      <textarea name="long_description" id="long_description" cols="30" rows="10"></textarea>
                      @error('long_description')
                      <div class="text-danger text-italic">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                <div class="card">
                  <div class="card-header">Thuộc tính và biến thể</div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Loại sản phẩm</label>
                      <select name="product_id_category" class="form-control" id="single__category">
                        <option value=""> -- Xin mời chọn loại sản phẩm</option>
                        @foreach (App\Models\Category::where('category_parent_id', null)->get() as $item)
                        @include('admin.Categories.categoryOptions', ['item' => $item])

                        @foreach ($item->subcategory()->get() as $childCategory)
                        @include('admin.Categories.categoryOptions', ['item' =>
                        $childCategory,
                        'prefix' => '--'])

                        @foreach ($childCategory->subcategory()->get() as $childCategory2)
                        @include('admin.Categories.categoryOptions', ['item' =>
                        $childCategory2,
                        'prefix' => '----'])
                        @endforeach
                        @endforeach
                        @endforeach
                      </select>
                    </div>
                    @error('product_id_category')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh mục, thuộc tính, biến thể</h4>
                    <ul class="nav nav-tabs nav-tabs-top nav-justified">
                      <li class="nav-item" onclick="isProductAttribute('true')"><a class="nav-link active"
                           href="#top-justified-tab1"
                           data-toggle="tab">Sản phẩm có thuộc tính</a></li>
                      <li class="nav-item" onclick="isProductAttribute('false')"><a class="nav-link"
                           href="#top-justified-tab2" data-toggle="tab">Sản phẩm
                          không thuộc tính</a>
                      </li>
                      <input type="hidden" name="type_of_category">
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane show active" id="top-justified-tab1">
                        <!-- Category - Attribure and Variant -->

                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                            <div class="card">
                              <div class="card-header">Thuộc tính và biến thể</div>
                              <div class="card-body">
                                <div class="form-group mb-3">
                                  <label>Giá gốc (*)</label>
                                  <input type="text" name="unit_price" id="" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                  <label>Liên kết bên ngoài</label>
                                  <input type="text" name="ex-link" id="" class="form-control"
                                         placeholder="http://www.example.com">
                                </div>
                                <div id="attribute__and__variant">
                                  <!-- Category End -->
                                  <div id="choiceAttribute">
                                    <div class="form-group">
                                      <label>Thuộc tính sản phẩm</label>
                                      <select class="js-example-basic-multiple form-control" id="attribute"
                                              name=""
                                              multiple="multiple" data-live-search="true">

                                        @foreach (App\Models\Attribute::all() as $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                        @endforeach
                                      </select>
                                      <input type="hidden" name="attribute[]" id="attribute_array">
                                    </div>
                                    @error('attribute')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                  </div>
                                  <div id="customer_choice_options">
                                  </div>
                                    <input type="hidden" name="total_quantity" id="totalquantity">
                                </div>
                                <input type="hidden" id="customer_choice_option_values" value="">
                                @error('unit_price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="sku_combination mb-3" id="sku_combination"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End -->
                      </div>
                      <div class="tab-pane" id="top-justified-tab2">
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                            <div class="card">
                              <div class="card-header">Biến thể</div>
                              <div class="card-body">
                                <div class="form-group mb-3">
                                  <label>Giá sản phẩm (*)</label>
                                  <input type="text" name="price" id="" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                  <label>Số lượng (*)</label>
                                  <input type="text" name="quantity" id="" class="form-control">
                                </div>
                                <div class="form-group mb-3" id="show_hide_date_of_manufacture_and_expiry">
                                  <label>Ngày sản xuát - Hạn sử dụng</label>
                                  <input type="text" name="expiry" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                  <label>SKU (*)</label>
                                  <input type="text" name="sku" id="" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                  <label>Liên kết bên ngoài</label>
                                  <input type="text" name="ex_link" id="" class="form-control"
                                         placeholder="http://www.example.com">
                                </div>
                                @error('unit_price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                          </div>


                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-4">
            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                  <div class="card-header">Khuyến mãi</div>
                  <div class="card-body">
                    <ul class="list-group notification-list">
                      <li class="list-group-item">
                        <div class="row">
                          <div class="col-md-6 form-group">
                            <input type="text" class="form-control" name="discount">
                          </div>
                          <div class="col-md-6t form-group">
                            <select name="discount_unit" id="" class="form-control">
                              <option value="%">%</option>
                              <option value="money">VND/USD</option>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 form-group">
                            <label>Ngày giảm giá</label>
                            <input type="text" name="sale_dates" class="form-control" value="">
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                  <div class="card-header">Vận chuyển</div>
                  <div class="card-body">
                    <ul class="list-group notification-list">
                      <li class="list-group-item">
                        Vận chuyển miễn phí
                        <div class="status-toggle">
                          <input type="radio" id="free_ship" name="shipping_type" value="free_ship" class="check">
                          <label for="free_ship" class="checktoggle">checkbox</label>
                        </div>
                      </li>
                      <li class="list-group-item">
                        Vận chuyển nhanh
                        <div class="status-toggle">
                          <input type="radio" id="flat_rate" name="shipping_type" value="flat_rate" class="check"
                                 checked="">
                          <label for="flat_rate" class="checktoggle">checkbox</label>
                        </div>
                        <div class="flat_rate_shipping_div mt-3">
                          <div class="form-group">
                            <label>Phí vận chuyển</label>
                            <input type="text" class="form-control" name="shipping_stock">
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        Sản phẩm số lượng lớn
                        <div class="status-toggle">
                          <input type="checkbox" id="multiple_stock" name="multiple_stock" class="check" checked="">
                          <label for="multiple_stock" class="checktoggle">checkbox</label>
                        </div>
                      </li>

                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                  <div class="card-header">Cảnh báo sắp hết hàng</div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Số lượng cảnh báo</label>
                      <input type="number" name="stock_warning" id="stock_warning" class="form-control">
                      <div class="text-danger text-italic" id="qt_error"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                  <div class="card-header">Nổi bật</div>
                  <div class="card-body">
                    <ul class="list-group notification-list">
                      <li class="list-group-item">
                        Trạng thái
                        <div class="status-toggle">
                          <input type="checkbox" id="feature_product" name="feature_product" class="check" checked="">
                          <label for="feature_product" class="checktoggle">checkbox</label>
                        </div>
                      </li>
                    </ul>

                  </div>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                  <div class="card-header">Ước tính thời gian vận chuyển</div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Ngày vận chuyển</label>
                      <input type="text" name="shipping_day" id="" class="form-control">
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                  <div class="card-header">Vat + Tax</div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>VAT</label>
                      <input type="text" name="vat" id="" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Đơn vị</label>
                      <select name="vat_unit" class="form-control" id="">
                        <option value="%">%</option>
                        <option value="money">VND/USD</option>
                      </select>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                  <div class="card-header">Hiển thị số lượng</div>
                  <div class="card-body">

                    <ul class="list-group notification-list">
                      <li class="list-group-item">
                        Hiển thị tổng số lượng
                        <div class="status-toggle">
                          <input type="radio" id="qt_total" name="show_hide_quantity" value="qt_total" class="check"
                                 checked="">
                          <label for="qt_total" class="checktoggle">radio</label>
                        </div>
                      </li>
                      <li class="list-group-item">
                        Hiển thị số lượng tồn kho
                        <div class="status-toggle">
                          <input type="radio" id="qt_stock" name="show_hide_quantity" value="qt_stock" class="check"
                                 checked="">
                          <label for="qt_stock" class="checktoggle">radio</label>
                        </div>
                      </li>
                      <li class="list-group-item">
                        Không hiển thị
                        <div class="status-toggle">
                          <input type="radio" id="stock_hidden" name="show_hide_quantity" value="qt_hidden"
                                 class="check"
                                 checked="">
                          <label for="stock_hidden" class="checktoggle">radio</label>
                        </div>
                      </li>
                    </ul>


                    </ul>

                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>


        <div class="row">
          <div class="col-sm-8">
            <button
                    class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"><i
                 class="fa fa-check"></i>Thêm sản phẩm</button>
            <button type="reset" class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"><i
                 class="fa fa-times"></i>Hủy</button>
          </div>
        </div>


      </form>

    </div>
  </div>


</div>

<!--end page-content-wrapper-->
</div>
@endsection

@push('script')
<script>
            CKEDITOR.replace( 'meta_description' )
            CKEDITOR.replace('short_description');
            CKEDITOR.replace('long_description');

            $('.js-example-basic-multiple').selectpicker();
            $('input[name="sale_dates"]').daterangepicker();
            $('input[name="expiry"]').daterangepicker();



            $('.iframe-btn').fancybox({
            'width'		: 900,
            'height'	: 600,
            'type'		: 'iframe',
            'autoScale'    	: false
            });

        const add_more_customer_choice_option = (i, name) => {
            $.ajax({
                type: "GET",
                url: "{{ route('admin.product__variants') }}",
                data: {
                    id: i
                },
                success: function (response) {
                    $('#customer_choice_options').append(`<div class="form-group">
                      <label>${name}</label>
                      <input type="hidden" name="choice_no[]" value="${i}">
                      <select name="attribute_value_${i}[]" multiple="multiple" data-live-search="true"  class="form-control attribute-value" id="attribute-value">
                        ${response}
                      </select>
                    </div>`)
                    $('.attribute-value').selectpicker('refresh');

                }
            });
        }

        $(document).ready(function () {
            $('.attribute-value').selectpicker();
        });

        $(document).on("change", ".attribute-value", function () {
            update_sku();
        });

        function update_sku() {
            $.ajax({
                type: "POST",
                url: "{{ route('sku_combinations') }}",
                data: $('#choice-form').serialize(),
                success: function (response) {
                    $('#sku_combination').html(response);
                    // let qtyPro = $('.qty');
                    // let quantity = 0;
                    // for(let i = 0; i< qtyPro.length; i++){
                    //     quantity += Number(qtyPro[i].value);
                    //     qtyPro[i].addEventListener('keyup', function () {
                    //         quantity += Number(qtyPro[i].value);
                    //     })
                    // }
                    // console.log(quantity)
                    // $('#totalquantity').val(quantity)
                }
            });
        }




        $('#attribute').on('change', function () {
            $('#attribute_array').val($(this).val())
            $('#customer_choice_options').html(null);
            $.each($("#attribute option:selected"), function () {
                add_more_customer_choice_option($(this).val(), $(this).text())
            })
            update_sku()
        })

        $("[name=shipping_type]").on("change", function (){
            $(".flat_rate_shipping_div").hide();

            if($(this).val() == 'flat_rate'){
                $(".flat_rate_shipping_div").show();
            }
        });


        const isProductAttribute = (boolean) => {

          if(boolean == 'true'){
            $('input[name="type_of_category"]').val('isAttribute')
            $('#show_hide_date_of_manufacture_and_expiry').hide()
          }else if(boolean == 'false'){
            $('input[name="type_of_category"]').val('isNotAttribute')
            $('#show_hide_date_of_manufacture_and_expiry').show()
          }

        }

        isProductAttribute('true')



</script>
@endpush
