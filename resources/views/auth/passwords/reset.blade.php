@extends('admin.layouts.user')

@section('content')
		<div class="wrapper">
				<div class="authentication-reset-password d-flex align-items-center justify-content-center">
						<div class="col-12 col-lg-10 mx-auto">
								<div class="card radius-15">
										<div class="row no-gutters">
												<div class="col-lg-5">
														<div class="card-body p-md-5">
																<div class="text-left">
																		<img src="{{ asset('backend/images/logo-img.png') }}" width="180" alt="">
																</div>
																<h4 class="mt-5 font-weight-bold">{{ __('Genrate New Password') }}</h4>
																<p class="text-muted">
																		{{ __('We received your reset password request. Please enter your new password!') }}
																</p>

																<form method="POST" action="{{ route('password.update') }}">
																		@csrf

																		<input type="hidden" name="token" value="{{ $token }}">

																		<div class="form-group mt-1">
																				<label for="email"
																						class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
																				<input id="email" type="email"
																						class="form-control @error('email') is-invalid @enderror" name="email"
																						value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

																				@error('email')
																						<span class="invalid-feedback" role="alert">
																								<strong>{{ $message }}</strong>
																						</span>
																				@enderror
																		</div>

																		<label for="password"
																				class="col-form-label text-md-right">{{ __('Password') }}</label>
																		<div id="show_hide_password" class="input-group mt-3">
																				<input id="password" type="password"
																						class="form-control @error('password') is-invalid @enderror" name="password"
																						required autocomplete="new-password">
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

																		<label for="password-confirm"
																				class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
																		<div id="show_hide_password2" class="input-group mt-3">
																				<input id="password-confirm" type="password" class="form-control"
																						name="password_confirmation" required autocomplete="new-password">
																				<div class="input-group-append"> <a href="javascript:;"
																								class="input-group-text bg-transparent border-left-0"><i
																										class='bx bx-hide'></i></a>
																				</div>
																		</div>
																		<button type="submit"
																				class="btn btn-primary mt-3 btn-block">{{ __('Change Password') }}</button>
																		<a href="{{ route('login') }}" class="btn btn-link btn-block"><i
																						class='bx bx-arrow-back mr-1'></i>{{ __('Back to Login') }}</a>

																</form>


														</div>
												</div>
												<div class="col-lg-7">
														<img src="{{ asset('backend/images/login-images/forgot-password-frent-img.jpg') }}"
																class="card-img login-img h-100" alt="...">
												</div>
										</div>
								</div>
						</div>

				</div>
		</div>
@endsection
