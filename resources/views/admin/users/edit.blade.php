@extends('admin.layouts.master')

@section('title')
		Thêm tài khoản
@endsection

@section('content')

		<div class="content container">
				<div class="row">
						<div class="col-sm-12">

								<div class="card radius-15">
										<div class="card-body border-lg-top-danger">


												<div class="card-body p-1">
														<div class="card-title d-flex align-items-center">
																<div><i class='bx bxs-user mr-1 font-24 text-danger'></i>
																</div>
																<h4 class="mb-0 text-danger">Tài khoản người dùng</h4>
														</div>
														<hr />
														<div class="form-body">
																<form method="POST" action="{{ route('user.update', ['user' => $userId->id]) }}">
																		@csrf
																		@method('PUT')
																		<div class="form-group">
																				<label>Họ và tên</label>
																				<div class="input-group">
																						<div class="input-group-prepend"> <span
																										class="input-group-text bg-transparent"><i class='bx bx-user'></i></span>
																						</div>
																						<input name="name" value="{{ $userId->name }}" type="text"
																								class="form-control  @error('name') is-invalid @enderror border-left-0"
																								placeholder="Name" required autocomplete="off" autofocus>
																						@error('name')
																								<span class="invalid-feedback" role="alert">
																										<strong>{{ $message }}</strong>
																								</span>
																						@enderror
																				</div>
																		</div>

																		<div class="form-group">
																				<label>Địa chỉ email</label>
																				<div class="input-group">
																						<div class="input-group-prepend"> <span
																										class="input-group-text bg-transparent"><i
																												class='bx bx-envelope'></i></span>
																						</div>
																						<input name="email" value="{{ $userId->email }}" type="text"
																								class="form-control @error('email') is-invalid @enderror border-left-0"
																								placeholder="Email Address" required autocomplete="email">
																						@error('email')
																								<span class="invalid-feedback" role="alert">
																										<strong>{{ $message }}</strong>
																								</span>
																						@enderror
																				</div>
																		</div>
																		<div class="form-group">
																				<label>Mật khẩu</label>

																				<div id="show_hide_password" class="input-group">
																						<div class="input-group-prepend"> <span
																										class="input-group-text bg-transparent"><i
																												class='bx bx-lock-open-alt'></i></span>
																						</div>
																						<input name="password" id="password" value="{{ $userId->password }}"
																								type="password"
																								class="form-control  @error('password') is-invalid @enderror border-left-0"
																								placeholder="Choose Password" required autocomplete="new-password">
																						<div class="input-group-append"> <a href="javascript:;"
																										class="input-group-text bg-transparent border-left-0"><i
																												class='bx bx-hide'></i></a>
																						</div>

																						@error('password')
																								<span class="invalid-feedback" role="alert">
																										<strong>{{ $message }}</strong>
																								</span>
																						@enderror
																				</div>

																		</div>

																		<div id="show_hide_password2" class="form-group">
																				<label>Nhập lại mật khẩu</label>
																				<div class="input-group">
																						<div class="input-group-prepend"> <span
																										class="input-group-text bg-transparent"><i
																												class='bx bx-lock-open-alt'></i></span>
																						</div>
																						<input id="password-confirm" name="password_confirmation"
																								value="{{ $userId->password }}" type="password"
																								class="form-control border-left-0" placeholder="Confirm Password" required
																								autocomplete="new-password">
																						<div class="input-group-append"> <a href="javascript:;"
																										class="input-group-text bg-transparent border-left-0"><i
																												class='bx bx-hide'></i></a>
																						</div>

																				</div>
																		</div>

																		<button type="submit" class="btn btn-danger px-5">Thêm tài khoản</button>
																		<form>
														</div>
												</div>
										</div>


								</div>

						</div>
				</div>
				<!--end page-content-wrapper-->
		</div>


@endsection
