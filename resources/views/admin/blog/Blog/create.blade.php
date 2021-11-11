@extends('admin.layouts.master')

@section('title', 'Thêm sản phẩm')

@section('content')

    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data" id="choice-form">
                    @csrf
                    @method('POST')
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 col-sm-12 col-lg-8 col-8 col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select name="product_id_category" class="form-control" id="single__category">
                                            <option value=""> Danh mục bài viết</option>
                                            @foreach (App\Models\BlogCate::where('id', null)->get() as $item)
                                                @include('admin.', ['item' => $item])

                                                @foreach ($item->subcategory()->get() as $childCategory)
                                                    @include('admin.', ['item' =>
                                                    $childCategory,
                                                    'prefix' => '--'])

                                                    @foreach ($childCategory->subcategory()->get() as $childCategory2)
                                                        @include('admin.', ['item' =>
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

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 col-sm-12 col-lg-8 col-8 col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input class="form-control" name="blog_title" type="text" id="slug"
                                            placeholder="Enter your name post">
                                    </div>

                                    @error('product_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="name">Mô tả ngắn</label>
                                        <input class="form-control" name="blog_description" type="text" value=""
                                            placeholder="Enter your meta title">
                                    </div>

                                    @error('meta_title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="">Từ khóa</label>
                                        <input type="text" data-role="tagsinput" class="form-control" name="meta_keywords"
                                            value="" placeholder="Enter your meta keywords">
                                    </div>

                                    @error('meta_keywords')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="name">Nội dung</label>
                                        <textarea class="form-control" name="blog_content" id="meta_desc" type="text"
                                            placeholder="Enter your meta description" cols="30" rows="10"></textarea>
                                    </div>

                                    @error('meta_description')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 col-sm-12 col-lg-8 col-8 col-xl-8">
                            <div class="card">
                                <div class="card-header">Ảnh tiêu đề</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group mb-3" data-type="image">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                    {{ 'Browse' }}</div>
                                            </div>
                                            <div class="form-control file-amount"
                                                onclick="singleModalShow('image','render__image__single')">
                                                {{ 'Choose File' }}</div>
                                            <input type="hidden" name="product_image" id="image" value=""
                                                class="selected-files">
                                        </div>
                                    </div>
                                    <div id="render__image__single"></div>
                                    @error('product_image')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-8">
                            <button class="btn btn-primary" style="float: right;">Thêm sản phẩm</button>
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
        $(document).ready(function() {
            $('.js-example-basic-multiple').selectpicker();
        });

        $('#single__category').on('change', () => {
            let idCategory = $(`#single__category option:selected`).val()

            $.ajax({
                type: "GET",
                url: "{{ route('admin.product__attributes') }}",
                data: {
                    id: idCategory
                },
                success: function(response) {
                    let val = new Array()
                    $.each(response, (indexInArray, valueOfElement) => {
                        console.log(valueOfElement)
                        $('#attribute').append(
                            `<option value="${valueOfElement.id}">${valueOfElement.name}</option>`
                        )
                        val.push(valueOfElement.name)
                    });
                    $('#attribute_array').val(val)
                    $('.js-example-basic-multiple').selectpicker('refresh')

                }
            });
            update_sku()
        })

        const add_more_customer_choice_option = (i, name) => {
            $.ajax({
                type: "GET",
                url: "{{ route('admin.product__variants') }}",
                data: {
                    id: i
                },
                success: function(response) {
                    console.log("🚀 ~ file: create.blade.php ~ line 325 ~ response", response)
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

        $(document).ready(function() {
            $('.attribute-value').selectpicker();
        });

        $(document).on("change", ".attribute-value", function() {
            update_sku();
        });

        function update_sku() {
            $.ajax({
                type: "POST",
                url: "{{ route('sku_combinations') }}",
                data: $('#choice-form').serialize(),
                success: function(response) {
                    $('#sku_combination').html(response);
                }
            });
        }

        $('#attribute').on('change', function() {
            $('input[name="attribute"]').val($(this).val())
            $('#customer_choice_options').html(null);
            $.each($("#attribute option:selected"), function() {
                add_more_customer_choice_option($(this).val(), $(this).text())

            })
            update_sku()
        })
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#meta_desc'))
    </script>
@endpush
