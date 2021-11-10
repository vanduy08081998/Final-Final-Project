@extends('admin.layouts.user')

@section('content')

		<div class="wrapper">
				<div class="authentication-forgot d-flex align-items-center justify-content-center">
						<div class="card shadow-lg forgot-box">
								<div class="card-body p-md-5">
										<div class="text-center">
												<img src="{{ asset('backend/images/icons/forgot-2.png') }}" width="140" alt="" />
										</div>
										<h4 class="mt-5 font-weight-bold">{{ __('Forgot Password?') }}</h4>
										<p class="text-muted"> {{ __('Enter your registered email ID to reset the password') }}
										</p>
										@if (session('status'))
												<div class="alert alert-success" role="alert">
														{{ session('status') }}
												</div>
										@endif
										<form method="POST" action="{{ route('password.email') }}">
												@csrf

												<div class="form-group">
														<label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
														<input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
																name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
														@error('email')
																<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																</span>
														@enderror
														<button type="submit" class="btn btn-primary mt-4 btn-lg btn-block radius-30">
																{{ __('Send Password Reset Link') }}</button>
												</div>

										</form>

										<a href="{{ route('login') }}" class="btn btn-link btn-block"><i
														class='bx bx-arrow-back mr-1'></i>Back to
												Login</a>
								</div>
						</div>
				</div>
		</div>
@endsection
