@extends('admin.layouts.master')

@section('title', 'Quản lý file')

@section('content')
		<div class="content container-fluid">
				<!--page-content-wrapper-->
				<div class="row">
						<div class="col-sm-12">
								<div class="card" style="height: 800px">
										<div class="card-body">
												<style>
														iframe {
																width: 100%;
																height: 100%;
														}

												</style>
												<iframe src="{{ url('filemanager') }}/dialog.php" frameborder="0"></iframe>
										</div>
								</div>
						</div>
				</div>
				<!--end page-content-wrapper-->
		</div>
@endsection
