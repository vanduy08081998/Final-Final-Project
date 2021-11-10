@extends('admin.layouts.master')

@section('title')
		Quản lý loại sản phẩm
@endsection

@section('content')
		<!-- Page Wrapper -->

		<div class="content container-fluid">

				@include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Quản lý danh
				mục'])

				<div class="row">
						<div class="col-sm-12">
								<div class="card mb-0">
										@include('admin.inc.card-header', ['table_title' => 'Loại sản phẩm' , 'table_content' =>
										'Quản lý loại sản phẩm'])
										<div class="card-body">

												<div class="table-responsive">
														<table class="datatable table table-stripped mb-0">
																<thead>
																		<tr>
																		<tr>
																				<th>{{ trans('Tên danh mục') }}</th>
																				<th>{{ trans('Tiêu đề (SEO)') }}</th>
																				<th>{{ trans('Từ khóa (SEO)') }}</th>
																				<th>{{ trans('Mô tả (SEO)') }}</th>
																				<th>{{ trans('Hành động') }}</th>
																		</tr>
																		</tr>
																</thead>
																<tbody>
																		@foreach ($categories as $key => $value)
																				@include('admin.Categories.category_indexRows', ['value' => $value])

																				@foreach ($value->subcategory()->get() as $childCategory)
																						@include('admin.Categories.category_indexRows', ['value' => $childCategory,
																						'prefix' => '--'])

																						@foreach ($childCategory->subcategory()->get() as $childCategory2)
																								@include('admin.Categories.category_indexRows', ['value' => $childCategory2,
																								'prefix' => '----'])
																						@endforeach
																				@endforeach
																		@endforeach
																</tbody>
														</table>
												</div>
										</div>
								</div>
						</div>
				</div>

		</div>

		<!-- /Page Wrapper -->
@endsection
