@extends('admin.layouts.master')

@section('title', 'Quản lý sản phẩm')

@section('content')
		<!-- Page Wrapper -->

		<div class="content container-fluid">

				@include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Quản lý sản
				phẩm'])

				<div class="row">
						<div class="col-sm-12">
								<div class="card mb-0">
										@include('admin.inc.card-header', ['table_title' => 'Sản phẩm' , 'table_content' =>
										'Quản lý sản phẩm'])
										<div class="card-body">

												<div class="table-responsive">
														<table class="datatable table table-stripped mb-0">
																<thead>
																		<tr>
																				<th style="text-align: center;">Sản phẩm</th>
																				<th style="text-align: center;">Tên SP</th>
																				<th style="text-align: center;">Hành động</th>
																		</tr>
																</thead>
																<tbody>
																		@foreach ($product as $pro)
																				<tr>
																						<td class="py-2">
																								<div style="text-align: center;">
																										<div class="position-relative mr-2">
																												<img class="avatar" width="110" height="115"
																														src="{{ url('uploads/', $pro->product_image) }}" />
																										</div>
																								</div>
																						</td>
																						<td style="text-align: center;">{{ $pro->product_name }}</td>
																						<td style="text-align: center;">
																								<div class="btn-group">
																										<button type="button" class="btn btn-success dropdown-toggle radius-30"
																												data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
																														class="bx bx-cog"></i></button>
																										<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
																												<a class="dropdown-item text-warning"
																														href="{{ route('products.edit', ['product' => $pro->id]) }}">Sửa</a>
																												<form action="{{ route('products.destroy', ['product' => $pro->id]) }}"
																														method="POST">
																														@csrf
																														@method('DELETE')
																														<button class="dropdown-item text-danger">Xóa</button>
																												</form>

																										</div>
																								</div>
																						</td>
																				</tr>
																		@endforeach
																</tbody>
														</table>
												</div>
										</div>
								</div>
						</div>
				</div>

		</div>

@endsection
