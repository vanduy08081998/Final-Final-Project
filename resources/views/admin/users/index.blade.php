@extends('admin.layouts.master')

@section('title')
		Quản lý tài khoản
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
																				<th>Họ và tên</th>
																				<th>Email</th>
																				<th>Hành động</th>
																		</tr>
																</thead>
																<tbody>
																		@foreach ($userAll as $user)
																				<tr>
																						<td>{{ $user->name }}</td>
																						<td>{{ $user->email }}</td>
																						<td>
																								<div class="btn-group">
																										<button type="button" class="btn btn-success dropdown-toggle radius-30"
																												data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
																														class="bx bx-cog"></i></button>
																										<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
																												<a class="dropdown-item text-warning"
																														href="{{ route('user.edit', ['user' => $user->id]) }}">Sửa</a>
																												<form action="{{ route('user.destroy', ['user' => $user->id]) }}"
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
