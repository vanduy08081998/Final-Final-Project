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

												<div class="col-md-8 col-sm-12 col-lg-8 col-8 col-xl-8">
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
																				<label for="">Từ khóa (SEO)</label>
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
												<div class="col-md-8 col-sm-12 col-lg-8 col-8 col-xl-8">
														<div class="card">
																<div class="card-header">Hình ảnh sản phẩm</div>
																<div class="card-body">
																		<div class="form-group">
																				<label class="mb-3">Hình ảnh sản phẩm</label>
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
																		<div class="form-group">
																				<label class="mb-3">Thư viện ảnh</label>
																				<div class="input-group" data-type="image">
																						<div class=" input-group-prepend">
																								<div class="input-group-text bg-soft-secondary font-weight-medium">
																										{{ 'Browse' }}
																								</div>
																						</div>
																						<div class="form-control file-amount"
																								onclick="multipleModalShow('multipleImage','render__image__multiple')">
																								{{ 'Choose File' }}</div>
																						<input type="hidden" name="product_gallery" id="multipleImage" value=""
																								class="selected-files">
																				</div>
																		</div>
																		<div id="render__image__multiple"></div>
																		@error('product_gallery')
																				<span class="text-danger"> {{ $message }} </span>
																		@enderror
																</div>
														</div>
												</div>
										</div>
										<div class="row">
												<div class="col-md-8 col-sm-12 col-lg-8 col-8 col-xl-8">
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
																		<div id="attribute__and__variant">
																				<!-- Category End -->
																				<div id="choiceAttribute">
																						<div class="form-group">
																								<label>Thuộc tính sản phẩm</label>
																								<select class="js-example-basic-multiple form-control" id="attribute" name=""
																										multiple="multiple" data-live-search="true">
																								</select>
																								<input type="hidden" name="attribute[]" id="attribute_array">
																						</div>
																						@error('attribute')
																								<div class="text-danger">{{ $message }}</div>
																						@enderror
																				</div>
																				<div id="customer_choice_options">
																				</div>
																		</div>
																		<input type="hidden" id="customer_choice_option_values" value="">
																</div>
														</div>
												</div>
										</div>
										<div class="row">
												<div class="col-md-8 col-sm-12 col-lg-8 col-8 col-xl-8">
														<div class="card">
																<div class="card-header">Biến thể</div>
																<div class="card-body">
																		<div class="form-group mb-3">
																				<label>Giá gốc (*)</label>
																				<input type="text" name="unit_price" id="" class="form-control">
																		</div>
																		@error('unit_price')
																				<div class="text-danger">{{ $message }}</div>
																		@enderror
																		{{-- <div id="show-hide-div">
																				<div class="form-group mb-3">
																						<label>Số lượng (*)</label>
																						<input type="text" name="quantity" id="" class="form-control">
																				</div>
																				<div class="form-group mb-3">
																						<label>SKU</label>
																						<input type="text" name="sku" id="" class="form-control">
																				</div>
																		</div> --}}
																		<div class="sku_combination mb-3" id="sku_combination"></div>
																</div>
														</div>
												</div>


										</div>
										<div class="row">
												<div class="col-sm-8">
														<button class="btn btn-primary">Thêm sản phẩm</button>
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

		  // ClassicEditor
		  //   .create(document.querySelector('#short-description'))
		  // ClassicEditor
		  //   .create(document.querySelector('#long-description'))
		</script>
@endpush
