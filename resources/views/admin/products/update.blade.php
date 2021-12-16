@extends('admin.layouts.master')

@section('title', $product->product_name)


@section('content')


<div class="content container-fluid">
  <div class="row">

    <style>
      .text-danger {
        font-style: italic;
      }
    </style>

    <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">

      <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data"
        id="choice-form">
        @csrf
        @method('PUT')

        <div class="row">
          <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-8">
            <div class="row">

              <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                <div class="card">
                  <div class="card-header">Thông tin cơ bản</div>
                  <div class="card-body">
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <div class="form-group">
                      <label>Nhập tên sản phẩm</label>
                      <input class="form-control" name="product_name" onchange="update_sku()" type="text"
                        onkeyup="ChangeToSlug();" id="slug" value="{{ $product->product_name }}">
                    </div>

                    @error('product_name')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror

                    <div class="form-group">
                      <label>Slug sản phẩm</label>
                      <input class="form-control" name="product_slug" type="text" id="convert_slug"
                        value="{{ $product->product_slug }}">
                    </div>

                    @error('product_slug')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror

                    <div class="form-group">
                      <label>Đơn vị sản phẩm</label>
                      <input class="form-control" name="product_unit" type="text" id="convert_slug"
                        value="{{ $product->product_unit }}" required>
                    </div>

                    <div class="form-group">
                      <label for="name">Thương hiệu sản phẩm</label>
                      <select name="product_id_brand" class="form-control" id="">
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $product->product_id_brand == $brand->id ? 'selected' : ''
                          }}>
                          {{ $brand->brand_name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="name">Tiêu đề (SEO)</label>
                      <input class="form-control" name="meta_title" type="text" value="{{ $product->meta_title }}">
                    </div>

                    @error('meta_title')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror

                    <div class="form-group">
                      <label for="">Từ khóa (SEO)</label><br>
                      <input type="text" data-role="tagsinput" class="form-control" name="meta_keywords"
                        value="{{ $product->meta_keywords }}" placeholder="Enter your meta keywords">
                    </div>

                    @error('meta_keywords')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror

                    <div class="form-group">
                      <label for="name">Mô tả (SEO)</label>
                      <textarea class="form-control" name="meta_description" id="meta_desc" type="text"
                        placeholder="Enter your meta description" cols="30"
                        rows="10">{{ $product->meta_description }}</textarea>
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
                        <a class="btn-file iframe-btn" href="{{ asset('rfm/filemanager') }}/dialog.php?field_id=image"
                          style="color: #1e272e; font-size: 24px;"><input class="upload"><i
                            class="fa fa-upload"></i></a>
                      </div>
                      <input type="hidden" id="image" data-upload="product_image" data-preview="image__preview">
                      <input type="hidden" name="product_image" value="{{ $product->product_image }}">
                      <div id="image__preview">
                        <img src="{{ asset($product->product_image) }}" width="80" height="80" alt="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Thư viện ảnh sản phẩm (200 x 200 - Hơn 1 hình)</label>
                      <div class="file-options">
                        <a class="btn-file iframe-btn" href="{{ asset('rfm/filemanager') }}/dialog.php?field_id=gallery"
                          style="color: #1e272e; font-size: 24px;"><input class="upload"><i
                            class="fa fa-upload"></i></a>
                      </div>
                      <input type="hidden" id="gallery" data-upload="product_gallery" data-preview="gallery__preview">
                      <input type="hidden" name="product_gallery" value="{{ $product->product_gallery }}">
                      <div id="gallery__preview">
                        @foreach (explode(',', $product->product_gallery) as $key => $value)
                        <img src="{{ asset($value) }}" width="80" height="80" alt="">
                        @endforeach
                      </div>
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
                      <textarea name="short_description" id="short_description" cols="30"
                        rows="10">{{ $product->short_description }}</textarea>
                      @error('short_description')
                      <div class="text-danger text-italic">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Mô tả dài</label>
                      <textarea name="long_description" id="long_description" cols="30"
                        rows="10">{{ $product->long_description }}</textarea>
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
                        @foreach (App\Models\Category::where('category_parent_id', null)->get() as $item)
                        @include('admin.Categories.categoryOptions', ['item' => $item,'category' => $product->product_id_category])

                        @foreach ($item->subcategory()->get() as $childCategory)
                        @include('admin.Categories.categoryOptions', ['item' =>
                        $childCategory,
                        'prefix' => '--','category' => $product->product_id_category])

                        @foreach ($childCategory->subcategory()->get() as $childCategory2)
                        @include('admin.Categories.categoryOptions', ['item' =>
                        $childCategory2,
                        'prefix' => '----','category' => $product->product_id_category])
                        @endforeach
                        @endforeach
                        @endforeach
                      </select>
                    </div>
                    @error('product_id_category')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    @if ($product->colors != null)
                    <div class="form-group">

                      <div class="status-toggle">

                        <input value="1" type="checkbox" name="colors_active" id="colors_active" class="check" checked>
                        <label for="colors_active" class="checktoggle">checkbox</label>

                      </div>
                      <label class="mt-3">Màu sắc sản phẩm</label>


                      <select name="colors[]" id="product_color" class="form-control" multiple="multiple"
                        data-live-search="true" disabled>
                        @foreach (\App\Models\Color::all() as $color)
                        <option value="{{ $color->color_code }}" @if(in_array($color->
                          color_code,json_decode($product->colors)))
                          selected @endif>
                          {{ $color->color_name }}
                        </option>
                        @endforeach
                      </select>
                    </div>
                    @else
                    <div class="form-group">

                      <div class="status-toggle">

                        <input value="1" type="checkbox" name="colors_active" id="colors_active" class="check">
                        <label for="colors_active" class="checktoggle">checkbox</label>

                      </div>
                      <label class="mt-3">Màu sắc sản phẩm</label>


                      <select name="colors[]" id="product_color" class="form-control" multiple="multiple"
                        data-live-search="true" disabled>
                        @foreach (\App\Models\Color::all() as $color)
                        <option value="{{ $color->color_code }}">
                          {{ $color->color_name }}
                        </option>
                        @endforeach
                      </select>
                    </div>
                    @endif
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
                            <input type="text" class="form-control" name="discount" value="{{ $product->discount }}">
                          </div>
                          <div class="col-md-6t form-group">
                            <select name="discount_unit" id="" class="form-control">
                              <option value="%" @if ($product->discount_unit == '%') selected @endif>
                                %
                              </option>
                              <option value="money" @if ($product->discount_unit == 'money') selected @endif>
                                VND/USD
                              </option>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 form-group">
                            <label>Ngày giảm giá</label>
                            @php
                            $start_date = date('m/d/Y h:m:s', $product->discount_start_date);
                            $end_date = date('m/d/Y h:m:s', $product->discount_end_date);
                            @endphp
                            <input type="text" name="sale_dates" class="form-control"
                              value="{{ $start_date . ' - ' . $end_date }}">
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
                          <input type="radio" id="free_ship" name="shipping_type" value="free_ship" class="check"
                            @if($product->shipping_type == 'free_ship') checked @endif>
                          <label for="free_ship" class="checktoggle">checkbox</label>
                        </div>
                      </li>
                      <li class="list-group-item">
                        Vận chuyển nhanh
                        <div class="status-toggle">
                          <input type="radio" id="flat_rate" name="shipping_type" value="flat_rate" class="check"
                            @if($product->shipping_type == 'flat_rate') checked @endif>
                          <label for="flat_rate" class="checktoggle">checkbox</label>
                        </div>

                        <div class="flat_rate_shipping_div mt-3">
                          <div class="form-group">
                            <label>Phí vận chuyển</label>
                            <input type="text" class="form-control" name="shipping_stock"
                              value="{{ $product->shipping_stock }}">
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        Sản phẩm số lượng lớn
                        <div class="status-toggle">
                          <input type="checkbox" id="multiple_stock" name="multiple_stock" class="check"
                            @if($product->multiple_stock == 'on') checked @endif>
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
                      <input type="number" name="stock_warning" id="stock_warning" class="form-control"
                        value="{{ $product->stock_warning }}">
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
                          <input type="checkbox" id="feature_product" name="feature_product" class="check"
                            @if($product->feature_product == 'on') checked @endif>
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
                      <input type="text" name="shipping_day" id="" class="form-control"
                        value="{{ $product->shipping_day }}">
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
                      <input type="text" name="vat" id="" class="form-control" value="{{ $product->vat }}">
                    </div>
                    <div class="form-group">
                      <label>Đơn vị</label>
                      <select name="vat_unit" class="form-control" id="">
                        <option value="%" @if ($product->vat_unit == '%') selected @endif>
                          %
                        </option>
                        <option value="money" @if ($product->vat_unit == 'money') selected @endif>VND/USD
                        </option>
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
                            @if($product->show_hide_quantity == 'qt_total') checked @endif>
                          <label for="qt_total" class="checktoggle">radio</label>
                        </div>
                      </li>
                      <li class="list-group-item">
                        Hiển thị số lượng tồn kho
                        <div class="status-toggle">
                          <input type="radio" id="qt_stock" name="show_hide_quantity" value="qt_stock" class="check"
                            @if($product->show_hide_quantity == 'qt_stock') checked @endif>
                          <label for="qt_stock" class="checktoggle">radio</label>
                        </div>
                      </li>
                      <li class="list-group-item">
                        Không hiển thị
                        <div class="status-toggle">
                          <input type="radio" id="stock_hidden" name="show_hide_quantity" value="qt_hidden"
                            class="check" @if ($product->show_hide_quantity == 'qt_hidden') checked @endif>
                          <label for="stock_hidden" class="checktoggle">radio</label>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                  <div class="card-header">Flash sale</div>
                  <div class="card-body">

                    <div class="form-group">
                      <label>Thêm vào chiến dịch</label>
                      <select name="id_flash_deal[]" id="id_flash_deal" class="form-control" multiple="multiple"
                        data-live-search="true">
                        @foreach ($flash_deals as $deal)
                        @foreach ($product->flash_deals as $flash_deal)
                        <option value="{{ $deal->id }}" @if ($flash_deal->id == $deal->id) selected @endif>{{
                          $deal->title }}</option>

                        @endforeach
                        @endforeach
                      </select>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                  <div class="card-header">Giảm giá trong ngày</div>
                  <div class="card-body">
                    <ul class="list-group notification-list">
                      <li class="list-group-item">
                        Giảm giá trong ngày
                        <div class="status-toggle">
                          <input type="checkbox" id="deals_today" name="deals_today" class="check">
                          <label for="deals_today" class="checktoggle">checkbox</label>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
            <div class="card">

              <div class="card-header">
                <ul class="list-group notification-list">
                  <li class="list-group-item">
                    Hiển thị thuộc tính
                    <div class="status-toggle">
                      <input type="radio" id="is__attribute" name="type_of_category" value="isAttribute" class="check"
                        @if ($product->type_of_category == 'isAttribute') checked @endif>
                      <label for="is__attribute" class="checktoggle">checkbox</label>
                    </div>
                  </li>
                  <li class="list-group-item">
                    Không hiển thị thuộc tính
                    <div class="status-toggle">
                      <input type="radio" id="is__not__attribute" name="type_of_category" value="isNotAttribute"
                        class="check" @if ($product->type_of_category == 'isNotAttribute') checked @endif>
                      <label for="is__not__attribute" class="checktoggle">checkbox</label>
                    </div>
                  </li>
                </ul>


              </div>
              <div class="card-body">
                <div class="is__attribute">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                      <div class="card">
                        <div class="card-header">Thuộc tính và biến thể</div>
                        <div class="card-body">
                          <div class="form-group mb-3">
                            <label>Giá gốc (*)</label>
                            @if ($product->type_of_category == 'isAttribute')
                            <input type="text" name="unit_price" id="" value="{{ $product->unit_price }}"
                              class="form-control">
                            @else
                            <input type="text" name="unit_price" id="" value="" class="form-control">
                            @endif

                            @error('unit_price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="form-group mb-3">
                            <label>Liên kết bên ngoài</label>
                            <input type="text" name="ex_link" id="" class="form-control"
                              value="{{ $product->ex_link }}">
                          </div>
                          <div id="attribute__and__variant">
                            <!-- Category End -->
                            <div id="choiceAttribute">
                              <div class="form-group">
                                <?php $array_attribute = array() ?>
                                <select class="js-example-basic-multiple form-control" id="attribute" name="attribute[]"
                                  multiple="multiple" data-live-search="true">
                                  @if ($product->product_attribute != null)
                                  @foreach (App\Models\Attribute::all() as $attribute)
                                  
                                    @foreach (json_decode($product->product_attribute) as $key => $val)
                                    <?php array_push($array_attribute,$val); ?>
                                    @endforeach

                                    <option value="{{ $attribute->id }}" @if (in_array($attribute->id,
                                      $array_attribute)) selected @endif>
                                      {{ $attribute->name }}
                                    </option>
                                  @endforeach
                                  @else
                                  @foreach (App\Models\Attribute::all() as $attribute)
                                  <option value="{{ $attribute->id }}">
                                    {{ $attribute->name }}
                                  </option>
                                  @endforeach
                                  @endif
                                </select>
                              </div>
                              @error('attribute')
                              <div class="text-danger">{{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div id="customer_choice_options">
                              @foreach (json_decode($product->choice_options) as $index => $options)
                              <div class="form-group">
                                <label>{{ \App\Models\Attribute::where('id', $options->attribute_id)->first()->name
                                  }}</label>
                                <input type="hidden" name="choice_no[]" value="{{ $options->attribute_id }}">
                                <select name="attribute_value_{{ $options->attribute_id }}[]" multiple="multiple"
                                  data-live-search="true" class="form-control attribute-value"
                                  id="attribute-value-{{ $index }}">
                                  @foreach (\App\Models\Attribute::where('id',
                                  $options->attribute_id)->first()->variants()->get()
                                  as $variant)
                                  <option value="{{ $variant->name }}" @if (in_array($variant->name,
                                    $options->values)) selected @endif>
                                    {{ $variant->name }}</option>
                                  @endforeach
                                </select>
                              </div>

                              @endforeach
                            </div>
                            <input type="hidden" name="total_quantity" id="totalquantity">
                          </div>
                          <input type="hidden" id="customer_choice_option_values" value="">
                          @error('unit_price')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                          <div class="sku_combination mb-3" id="sku_combination">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="is__not__attribute">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="form-group mb-3">
                            <label>Giá sản phẩm (*)</label>
                            @if ($product->type_of_category == 'isNotAttribute')
                            <input type="text" name="price" id="" class="form-control"
                              value="{{ $product->unit_price }}">
                            @else
                            <input type="text" name="price" id="" class="form-control">
                            @endif
                          </div>
                          <div class="form-group mb-3">
                            <label>Số lượng (*)</label>
                            @if ($product->type_of_category == 'isNotAttribute')
                            <input type="text" name="quantity" id="" class="form-control"
                              value="{{ $product->quantity }}">
                            @else
                            <input type="text" name="quantity" id="" class="form-control" value="">
                            @endif
                          </div>
                          <div class="form-group mb-3" id="show_hide_date_of_manufacture_and_expiry">
                            <label>Ngày sản xuát - Hạn sử dụng</label>
                            @php
                            $date_of_manufacture = date('m/d/Y h:m:s', $product->date_of_manufacture);
                            $expiry = date('m/d/y h:m:s', $product->expiry);
                            @endphp
                            <input type="text" name="expiry" class="form-control"
                              value="{{ $date_of_manufacture . ' - ' . $expiry }}">
                          </div>
                          <div class="form-group mb-3">
                            <label>SKU (*)</label>
                            @if ($product->type_of_category == 'isNotAttribute')
                            <input type="text" name="sku" id="" class="form-control" value="{{ $product->sku }}">
                            @else
                            <input type="text" name="sku" id="" class="form-control" value="">
                            @endif
                          </div>
                          <div class="form-group mb-3">
                            <label>Liên kết bên ngoài</label>
                            @if ($product->type_of_category == 'isNotAttribute')
                            <input type="text" name="ex_link_not_attr" id="" class="form-control"
                              value="{{ $product->ex_link }}">
                            @else
                            <input type="text" name="ex_link_not_attr" id="" class="form-control" value="">
                            @endif
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
        <ul class="list-group notification-list mb-3">
          <li class="list-group-item">
            Hiển thị thông số kĩ thuật
            <div class="status-toggle">
              <input type="checkbox" id="is-specification" name="has_specification" value="isAttribute" class="check"
                @if(count($product->specifications()->get()) > 0) checked @endif>
              <label for="is-specification" class="checktoggle">checkbox</label>
            </div>
          </li>
        </ul>
        <div class="row" id="show-hide-specification">
          <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
            <div class="card">
              <div class="card-header">Thông số kỹ thuật</div>
              <div class="card-body">
                <div class="form-group">
                  <select class="form-control" style="width:100%" name="choose_specification[]"
                    id="choose_specification" multiple="multiple">
                    @foreach (\App\Models\Attribute::all() as $attr)
                    <?php $fix_arr_specification = array(); ?>
                    @foreach (\App\Models\Specification::where('product_id', $product->id)->get() as $specification)
                    <?php array_push($fix_arr_specification, $specification->specifications);?>
                    @endforeach
                    <option value="{{ $attr->id }}" @if(in_array($attr->name, $fix_arr_specification)) selected
                      @endif>{{ $attr->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="sp-row">
                  <table class="table table-bordered mb-0 table-specifiation">
                    <thead class="thead-light text-center">
                      <tr>
                        <th scope="col">Thộc tính cố định</th>
                        <th scope="col">Giá trị</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse (\App\Models\Specification::where('product_id', $product->id)->get() as $specification)
                      @foreach(\App\Models\Attribute::where('name', $specification->specifications)->get() as
                      $fixed_attribute)
                      <tr>
                        <input type="hidden" name="choice_fixed_attribute[]" value="{{ $fixed_attribute->id }}">
                        <td>{{ $fixed_attribute->name }} <input type="hidden"
                            name="fixed_attribute_{{ $fixed_attribute->id }}" value="{{ $fixed_attribute->name }}">
                        </td>
                        <td>
                          <select name="specifications_{{ $fixed_attribute->id }}" class="form-control">
                            @foreach (\App\Models\Variant::where('attribute_id', $fixed_attribute->id)->get() as
                            $fixed_variant)
                            <option value="{{ $fixed_variant->name }}" @if($fixed_variant->name ==
                              $specification->value) selected @endif>{{ $fixed_variant->name }}</option>
                            @endforeach
                          </select>
                        </td>
                      </tr>
                      @endforeach
                      @empty
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="row">
          <div class="col-sm-8">
            <button type="submit" class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"><i class="fa fa-check"></i>Cập
              nhật sản phẩm
            </button>
            <button type="reset" class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"><i class="fa fa-times"></i>Hủy
            </button>
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
@if ($product->type_of_category == 'isNotAttribute')

<script>
  $('.is__attribute').hide();
      $('.is__not__attribute').show();
</script>
@else
<script>
  $('.is__attribute').show();
      $('.is__not__attribute').hide();
</script>
@endif

@if ($product->shipping_type == 'flat_rate')
<script>
  $('.flat_rate_shipping_div').show()
</script>
@else
<script>
  $('.flat_rate_shipping_div').hide()
</script>
@endif
@if(count($product->specifications()->get()) > 0)
<script>
  $('#show-hide-specification').show()
</script>
@else
<script>
  $('#show-hide-specification').hide()
</script>
@endif
<script>
  $('input[name="has_specification"]').on('change', function () {
        if (!$('input[name="has_specification"]').is(':checked')) {
            $('#show-hide-specification').hide()
        } else {
            $('#show-hide-specification').show()
        }
    });
  // CKEDITOR.replace('meta_description')
    CKEDITOR.replace('short_description');
    CKEDITOR.replace('long_description');

    $('#choose_specification').select2()
    $('#choose_specification').on('change', function() {
        $('.table-specifiation tbody').html(null);
        $.each($("#choose_specification option:selected"), function () {
            customer_choice_specification($(this).val(), $(this).text())
        })
    })
    
    function customer_choice_specification(i, name) { 
        $.ajax({
            type: "POST",
            url: '{{ route('admin.products.specifications') }}',
            data: {
                id: i,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (response) {
                $('.table-specifiation tbody').append(`
                    
                    <tr>
                        <input type="hidden" name="choice_fixed_attribute[]" value="${i}">
                        <td>${name} <input type="hidden" name="fixed_attribute_${i}" value="${name}"></td>
                        <td>
                            <select name="specifications_${i}" class="form-control">
                                ${response}
                            </select>
                        </td>
                    </tr>
                `)     
            }
        });
    }

    $('.js-example-basic-multiple').select2();
    $('input[name="sale_dates"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
        format: 'M/DD/YYYY hh:mm:ss'
        }
    });

    $('input[name="expiry"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
        format: 'M/DD/YYYY hh:mm:ss'
        }
    });
    $('#product_color').select2();

    // $('form').on('submit', function(event) {


    //   let quantity = $('.qty');
    //   let total_quantity = 0;
    //   for (let index = 0; index < quantity.length; index++) {
    //     total_quantity += Number(quantity[index].value)
    //   }
    //   console.log(total_quantity);

    //   if ($('input[name="type_of_category"]:checked').val() == 'isAttribute') {
    //     if ($('#stock_warning').val() >= total_quantity) {
    //       event.preventDefault()
    //       $('#stock_error').html('Số lượng cảnh báo không được lớn hơn số lượng tổng');
    //     }
    //   }

    //   if ($('input[name="type_of_category"]:checked').val() == 'isNotAttribute') {
    //     if ($('input[name="quantity"]').val() <= $('#stock_warning').val()) {
    //       event.preventDefault()
    //       $('#stock_error').html('Số lượng cảnh báo không được lớn hơn số lượng tổng');
    //     }
    //   }
    // });


    $('input[name="type_of_category"]').on("change", function() {
      if ($(this).val() == 'isNotAttribute') {
        $('.is__attribute').hide();
        $('.is__not__attribute').show()
      } else {
        $('.is__attribute').show();
        $('.is__not__attribute').hide();
      }
    })

    $.each($('.attribute-value option:selected'), function(index, val) {
      update_sku()
    })


    const add_more_customer_choice_option = (i, name) => {
      $.ajax({
            type: "GET",
            url: "{{ route('admin.product__variants') }}",
            data: {
                id: i
            },
            success: function (response) {
                // var obj = JSON.parse(response)
                $('#customer_choice_options').append(`<div class="form-group">
                      <label>${name}</label>
                      <input type="hidden" name="choice_no[]" value="${i}">
                      <select name="attribute_value_${i}[]" multiple="multiple" class="form-control attribute-value" id="attribute-value-${i}">
                        ${response}
                      </select>
                  </div>`)
                $(`#attribute-value-${i}`).select2();
            }
        });
    }

    $(document).ready(function() {
      $.each($('.attribute-value'), (i,j) => {
        $(`#attribute-value-${i}`).select2();
      })
    });


    function update_sku() {
      $.ajax({
        type: "PUT",
        url: "{{ route('sku_combinations_edit') }}",
        data: $('#choice-form').serialize(),
        success: function(response) {
          $('#sku_combination').html(response)
        }
      });
    }

    $(document).on("change", ".attribute-value", function() {
      update_sku();
    });

    $('#attribute').on('change', function() {
        $.each($("#attribute option:selected"), function(j, attribute){
            flag = false;
            $('input[name="choice_no[]"]').each(function(i, choice_no) {
                if($(attribute).val() == $(choice_no).val()){
                    flag = true;
                }
            });
            if(!flag){
                add_more_customer_choice_option($(attribute).val(), $(attribute).text());
            }
        });

        @if($product->product_attribute != null)
        var str = @php echo $product->product_attribute @endphp;
        @else
        var str = '';
        @endif
        $.each(str, function(index, value){
            flag = false;
            $.each($("#attribute option:selected"), function(j, attribute){
                if(value == $(attribute).val()){
                    flag = true;
                }
            });
            if(!flag){
                $('input[name="choice_no[]"][value="'+value+'"]').parent().remove();
            }
        });

        update_sku();
    });
    

    $("[name=shipping_type]").on("change", function() {
      $(".flat_rate_shipping_div").hide();

      if ($(this).val() == 'flat_rate') {
        $(".flat_rate_shipping_div").show();
      }
    });

    if (!$('input[name="colors_active"]').is(':checked')) {
      $('#product_color').prop('disabled', true);
    } else {
      $('#product_color').prop('disabled', false);
    }

    $.each($('#product_color option:selected'), function() {
      update_sku()
    })

    $('input[name="colors_active"]').on('change', function() {
      if (!$('input[name="colors_active"]').is(':checked')) {
        $('#product_color').prop('disabled', true);
      } else {
        $('#product_color').prop('disabled', false);
      }
      update_sku();
    });


    $('#product_color').on('change', () => {
      update_sku();
    })

    // $.each($('.js-example-basic-multiple option:selected'), function (j, attribute) {
    //     add_more_customer_choice_option($(attribute).val(), $(this).text())
    //     update_sku();
    // })
</script>
@endpush