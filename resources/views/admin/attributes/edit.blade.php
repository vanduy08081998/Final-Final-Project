@extends('admin.layouts.master')

@section('title', 'Cập nhật thuộc tính')


@section('content')
		<div class="content container-fluid">
				<div class="row">
					<div class="card-title">
						<h4 class="text-primary mb-2 d-inline font-weight-bold">Cập nhật thuộc
							tính sản phẩm</h4>
					</div>
						<div class="col-sm-12">


								<div class="card radius-15">
										<div class="card-body">

												@if (session('message'))
														<div class="alert alert-success" role="alert">
																{{ session('message') }}
														</div>
												@endif

												<form action="{{ route('attribute.update', ['attribute' => $attribute->id]) }}"
														method="post" enctype="multipart/form-data">
														@csrf
														@method('PUT')
														<!-- INput Group -->
														<div class="col-md-12 mb-3">
																<div class="form-group">
																		<label for="name">Tên thuộc tính</label>
																		<input class="form-control" name="name" onkeyup="ChangeToSlug();" id="slug"
																				value="{{ $attribute->name }}" type="text">
																</div>

														</div>

														<div class="col-md-12 mb-3">
																<div class="form-group">
																		<label for="name">Slug</label>
																		<input class="form-control" name="slug" id="convert_slug"
																				value="{{ $attribute->slug }}" type="text">
																</div>

														</div>


														<div class="col-md-12 mb-3">
																<button type="submit" class="btn btn-primary radius-30"> <i
																				class="bx bx-cog"></i>Cập
																		nhật</button>
														</div>


												</form>

										</div>
								</div>

						</div>
				</div>
				<!--end page-content-wrapper-->
		</div>

@endsection
